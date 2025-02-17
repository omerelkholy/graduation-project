

@extends('layouts.delivery-layout')

@section('content')
<div class="container">
    <h2 class="text-primary">Order Details</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <tr>
            <th>Order ID:</th>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Client Name:</th>
            <td>{{ $order->client_name }}</td>
        </tr>
        <tr>
            <th>Phone Number:</th>
            <td>{{ $order->client_phone }}</td>
        </tr>
        <tr>
            <th>City:</th>
            <td>{{ $order->client_city }}</td>
        </tr>
        <tr>
            <th>Shipping Type:</th>
            <td>{{ ucfirst(str_replace('_', ' ', $order->shipping_type)) }}</td>
        </tr>
        <tr>
            <th>Payment Type:</th>
            <td>{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</td>
        </tr>
        <tr>
            <th>Total Price:</th>
            <td>{{ number_format($order->total_price, 2) }} EGP</td>
        </tr>
        <tr>
            <th>Total Weight:</th>
            <td>{{ $order->total_weight }} kg</td>
        </tr>
        <tr>
            <th>Products:</th>
            <td>
                <ul>
                    @foreach($order->products as $product)
                        {{ $product['product_name'] ?? 'Unknown Product' }} - Quantity: {{ $product['product_quantity'] ?? 0 }} - Weight {{ $product['product_weight'] }} <br>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>
                <form method="POST" action="{{ route('orders.updateStatus', $order->id) }}">
                    @csrf
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="on_shipping" {{ $order->status == 'on_shipping' ? 'selected' : '' }}>On Shipping</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    </select>
                </form>
            </td>
        </tr>
    </table>

    <a href="{{ route('orders.myOrders') }}" class="btn btn-primary mt-3">Back to Orders</a>
</div>
@endsection
