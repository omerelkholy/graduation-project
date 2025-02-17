

@extends('layouts.employee')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Order Delivery#{{ $order->id }}</h1>

   
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Details Order</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Client name</th>
                        <td>{{ $order->client_name }}</td>
                    </tr>
                    <tr>
                        <th>Client_city</th>
                        <td>{{ $order->client_city }}</td>
                    </tr>
                    <tr>
                        <th>Total Weight</th>
                        <td>{{ $order->total_weight }} KG</td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td>{{ $order->total_price }} EGP</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($order->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($order->status == 'processing')
                                <span class="badge bg-info">Processing</span>
                            @elseif($order->status == 'completed')
                                <span class="badge bg-success">Completed</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    
    @if($order->orderDeliveries->isNotEmpty())
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Data Delivery</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    
                    <tr>
                        <th>Delivery_name</th>
                        <td id="delegate-name">{{ $order->orderDeliveries->first()->user->name ?? 'Not assigned yet' }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td id="delegate-address">{{ $order->orderDeliveries->first()->user->address ?? 'Unknown' }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td id="delegate-phone">{{ $order->orderDeliveries->first()->user->phone ?? 'Not available' }}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="alert alert-danger text-center">
        No delegate has been assigned to this order yet
    </div>
    @endif

    
    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('employee.orders.pending') }}" class="btn btn-secondary">Back</a>

        @if($order->status == 'pending')
        <form action="{{ route('employee.orders.confirm.processing', $order->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-dark">Confirm Order(Processing)</button>
        </form>
        @endif
    </div>
</div>
@endsection
