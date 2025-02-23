<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user', 'region'])
            ->when(request('status'), function ($query) {
                return $query->where('status', request('status'));
            })
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::where('status', 'active')->get();
        $shippingTypes = Order::SHIPPING_TYPES;
        $paymentTypes = Order::PAYMENT_TYPES;

        return view('orders.create', compact('regions', 'shippingTypes', 'paymentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'client_name' => 'required|string|max:255',
                'client_phone' => 'required|string|max:20',
                'client_city' => 'required|string|max:255',
                'region_id' => 'required|exists:regions,id',
                'shipping_type' => 'required|string',
                'payment_type' => 'required|string',
                'products.*.product_name' => 'required|string',
                'products.*.product_quantity' => 'required|integer|min:1',
                'products.*.product_weight' => 'required|numeric|min:0',
                'products.*.product_price' => 'required|numeric|min:0',
                'village' => 'sometimes|boolean'
            ]);

            $order = Order::create([
                'user_id' => Auth::id(),
                'client_name' => $validated['client_name'],
                'client_phone' => $validated['client_phone'],
                'client_city' => $validated['client_city'],
                'region_id' => $validated['region_id'],
                'shipping_type' => $validated['shipping_type'],
                'payment_type' => $validated['payment_type'],
                'products' => $validated['products'],
                'status' => 'pending',
                'village' => $request->has('village')
            ]);

            return redirect()->route('orders.index')
                ->with('success', 'Order created successfully');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'An error occurred while creating the order: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        if (in_array($order->status, ['on_shipping', 'shipped'])) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'The order cannot be modified in this case');
        }

        $regions = Region::all();
        $shippingTypes = Order::SHIPPING_TYPES;
        $paymentTypes = Order::PAYMENT_TYPES;

        return view('orders.edit', compact('order', 'regions', 'shippingTypes', 'paymentTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        try {
            $validated = $request->validate([
                'client_name' => 'required|string|max:255',
                'client_phone' => 'required|string|max:20',
                'client_city' => 'required|string|max:255',
                'region_id' => 'required|exists:regions,id',
                'shipping_type' => 'required|string',
                'payment_type' => 'required|string',
                'products' => 'required|array',
                'products.*.name' => 'required|string',
                'products.*.quantity' => 'required|integer|min:1',
                'products.*.weight' => 'required|numeric|min:0',
                'products.*.price' => 'required|numeric|min:0',
                'village' => 'sometimes|boolean'
            ]);

            $order->update([
                'client_name' => $validated['client_name'],
                'client_phone' => $validated['client_phone'],
                'client_city' => $validated['client_city'],
                'region_id' => $validated['region_id'],
                'shipping_type' => $validated['shipping_type'],
                'payment_type' => $validated['payment_type'],
                'products' => $validated['products'],
                'village' => $request->has('village')
            ]);

            return redirect()->route('orders.index')
                ->with('success', 'Order updated successfully');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'An error occurred while updating the order']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        if (in_array($order->status, ['on_shipping', 'shipped'])) {
            return back()->with('error', 'The request cannot be deleted in this case');
        }

        try {
            $order->delete();
            return redirect()->route('orders.index')
                ->with('success', 'Request deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the request');
        }
    }

    public function updateStatus(Order $order, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:' . implode(',', array_keys(Order::STATUS))
        ]);

        $order->update($validated);

        return back()->with('success', 'Order status updated successfully');
    }

    public function report()
    {
        $orders = Order::with(['user', 'region'])
            ->when(request('from_date'), function ($query) {
                return $query->whereDate('created_at', '>=', request('from_date'));
            })
            ->when(request('to_date'), function ($query) {
                return $query->whereDate('created_at', '<=', request('to_date'));
            })
            ->when(request('status'), function ($query) {
                return $query->where('status', request('status'));
            })
            ->latest()
            ->get();

        return view('orders.report', compact('orders'));
    }

    public function conclusion()
    {
        $statistics = [
            'new' => Order::where('status', 'pending')->count(),
            'delivered' => Order::where('status', 'shipped')->count(),
            'delivered_to_delegate' => Order::where('status', 'on_shipping')->count(),
            'waiting' => Order::where('status', 'pending')->count(),
            'postponed' => Order::where('status', 'processing')->count(),
            'partially_delivered' => Order::where('status', 'partially_delivered')->count(),
            'canceled_by_client' => Order::where('status', 'cancelled_by_client')->count(),
            'cannot_reach' => Order::where('status', 'cannot_reach')->count(),
            'rejected_with_payment' => Order::where('status', 'rejected_with_payment')->count(),
            'rejected_with_partial_payment' => Order::where('status', 'rejected_with_partial_payment')->count(),
            'rejected_without_payment' => Order::where('status', 'rejected_without_payment')->count(),
        ];

        return view('orders.conclusion', compact('statistics'));
    }
}
