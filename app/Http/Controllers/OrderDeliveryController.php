<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderDeliveryController extends Controller
{
    
    public function myOrders()
    {
        $user = Auth::user();

        
        $orders = Order::whereIn('id', function ($query) use ($user) {
            $query->select('order_id')
                ->from('order_deliveries')
                ->where('user_id', $user->id);
        })->get();
        if($user->role === 'delivery_man'){
        return view('orders.my_orders', compact('orders'));
    }
    else{
        abort(403);
    }
}

    public function viewOrder($id)
    {
        $user = Auth::user();

 
        $order = Order::where('id', $id)
            ->whereIn('id', function ($query) use ($user) {
                $query->select('order_id')
                    ->from('order_deliveries')
                    ->where('user_id', $user->id);
            })->firstOrFail();

        return view('orders.view', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}
