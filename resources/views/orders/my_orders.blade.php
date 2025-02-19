@extends('layouts.delivery-layout')

@section('content')

<div class="container">
<h2 class="text-primary text-dark fw-bold mb-4"> My Orders</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Client Name</th>
                <th>Phone Number</th>
                <th>City</th>
                <th>Shipping Type</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->client_name }}</td>
                    <td>{{ $order->client_phone }}</td>
                    <td>{{ $order->client_city }}</td>
                    <td>
                        <span class="badge bg-{{ $order->shipping_type == 'normal' ? 'primary' : 'danger' }}">
                            {{ $order->shipping_type == 'normal' ? 'Normal' : 'Express (24 Hours)' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-{{ $order->payment_type == 'on_delivery' ? 'warning' : ($order->payment_type == 'online_payment' ? 'success' : 'info') }}">
                            {{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'processing' ? 'warning' : ($order->status == 'on_shipping' ? 'info' : 'success') }}">
                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('orders.view', $order->id) }}" class="btn btn-info btn-sm">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
