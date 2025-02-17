<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use App\Models\Region;
use App\Models\RegionDelivery;
use App\Models\OrderDelivery;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; 

class EmployeeController extends Controller
{

public function pendingOrders()
{
    
    $orders = Order::with('region')->where('status', 'pending')->get();

 
    $delegates = User::where('role', 'delivery_man')->with('regions')->get();

   
    foreach ($orders as $order) {
        if ($order->region) {
           
            $hasDelegates = User::where('role', 'delivery_man')
                ->whereHas('regions', function ($query) use ($order) {
                    $query->where('region_id', $order->region->id);
                })
                ->exists();
            $order->region->status = $hasDelegates ? 'active' : 'not_active';
        }
    }

    return view('employee.orders.pending', compact('orders', 'delegates'));
}

public function activateRegion($regionId)
{
    $region = Region::findOrFail($regionId);
    $region->update(['status' => 'active']);

<<<<<<< HEAD
    return redirect()->route('employee.orders.pending')->with('success', 'ٌRegion activated successfully');
=======
    return redirect()->route('employee.orders.pending')->with('success', 'تم تفعيل المحافظة بنجاح.');
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67
}


public function showOrder($id)
{
    $order = Order::with('orderDeliveries.user.regions')->findOrFail($id);
    return view('employee.orders.show', compact('order'));
}

<<<<<<< HEAD
public function confirmProcessing($orderId)
{
    $order = Order::findOrFail($orderId);

    
    $order->update(['status' => 'processing']);

    return redirect()->route('employee.orders.pending')->with('success', 'order confirmed successfully.');
}


public function getDelegates($orderId)
{
    
    $order = Order::with('region')->findOrFail($orderId);

    if (!$order->region) {
        return response()->json(['error' => 'No region found for this order'], 404);
    }

    
    $delegates = User::where('role', 'delivery_man')
        ->where('address', $order->region->name) 
        ->get()
        ->map(function ($delegate) {
            return [
                'id' => $delegate->id,
                'name' => $delegate->name,
                'region' => $delegate->address, 
                'phone' => $delegate->phone,
            ];
        });

    return response()->json($delegates);
=======

public function assignForm(Order $order)
{
    
    $delegates = User::whereHas('regions', function ($query) use ($order) {
        $query->where('region_id', $order->region_id);
    })->get();

    return view('employee.orders.assign_delegate', compact('order', 'delegates'));
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67
}

public function assignDelegate($orderId, $delegateId)
{
    $order = Order::findOrFail($orderId);
    $delegate = User::findOrFail($delegateId);

   
<<<<<<< HEAD
    if ($order->orderDeliveries()->where('user_id', $delegateId)->exists()) {
        return response()->json(['error' => 'This delivery has already been assigned.'], 400);
    }

    
    $order->orderDeliveries()->updateOrCreate(['order_id' => $orderId], ['user_id' => $delegate->id]);

    return response()->json(['message' => 'Assigned successfully.']);
=======
    $orderDelivery = $order->orderDeliveries()->first();

    if ($orderDelivery) {
       
        if ($orderDelivery->user_id == $delegateId) {
            return response()->json([
                'error' => 'This delivery has already been assigned to this order.'
            ], 400);
        }

       
        $orderDelivery->update([
            'user_id' => $delegate->id
        ]);
    } else {
        
        $order->orderDeliveries()->create([
            'user_id' => $delegate->id
        ]);
    }

    return response()->json([
        'message' => 'The delivery has been updated successfully.',
        'delegate' => [
            'name' => $delegate->name,
            'address' => $delegate->address ?? 'Unknown',
            'phone' => $delegate->phone
        ]
    ]);
}

public function confirmProcessing($orderId)
{
    $order = Order::findOrFail($orderId);

    
    $order->update(['status' => 'processing']);

    return redirect()->route('employee.orders.pending')->with('success', 'تم تأكيد الطلب بنجاح.');
}

public function getDelegates($orderId)
{
   
    $order = Order::with('region')->findOrFail($orderId);

    if (!$order->region) {
        return response()->json(['error' => 'No region found for this order'], 404);
    }

   
    $delegates = User::where('role', 'delivery_man')
        ->whereHas('regions', function ($query) use ($order) {
            $query->where('region_id', $order->region->id);
        })
        ->with('regions') 
        ->get();

    
    $delegates = $delegates->map(function ($delegate) {
        return [
            'id' => $delegate->id,
            'name' => $delegate->name,
            'region' => $delegate->regions->first()->name, 
            'phone' => $delegate->phone,
        ];
    });

    
    return response()->json($delegates);
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67
}
public function rejectOrder($orderId)
{
    $order = Order::findOrFail($orderId);
    $order->status = 'rejected';
    $order->save();

<<<<<<< HEAD
    return redirect()->route('employee.orders.pending')->with('success', 'order rejected');
=======
    return redirect()->route('employee.orders.pending')->with('success', 'تم رفض الطلب.');
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        'address' => 'nullable|string',
        'phone' => 'required|string',
        'region_id' => 'required|exists:regions,id',
    ]);

    try {
        DB::beginTransaction();

        
        $delegate = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'address' => $validatedData['address'] ?? null,
            'phone' => $validatedData['phone'],
            'role' => 'delivery_man',
        ]);

        if (!$delegate) {
<<<<<<< HEAD
            throw new \Exception('Failed to create the delivery');
=======
            throw new \Exception('فشل إنشاء المندوب');
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67
        }

     
        RegionDelivery::create([
            'user_id' => $delegate->id,
            'region_id' => $validatedData['region_id'],
        ]);

       
        Region::where('id', $validatedData['region_id'])->update(['status' => 'active']);

        DB::commit();

<<<<<<< HEAD
        return redirect()->route('employee.orders.pending')->with('success', 'delivery added and linked to the region successfully');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', ' Error occurred while adding the delegate ' . $e->getMessage());
=======
        return redirect()->route('employee.orders.pending')->with('success', 'تمت إضافة المندوب وربطه بالمنطقة بنجاح');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة المندوب: ' . $e->getMessage());
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67
    }
}

public function create()
{
    $regions = Region::all();
    return view('employee.orders.create', compact('regions'));
}


}
