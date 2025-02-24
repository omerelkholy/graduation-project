<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Order Details') }}
            </h2>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="bg-emerald-100 text-emerald-800 px-4 py-2 rounded-md mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-4xl bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6">
            <table class="w-full text-base text-left text-gray-700 dark:text-gray-300 border-collapse">
                <tbody class="text-center">
                @php
                    $fields = [
                        'Client Name' => $order->client_name,
                        'Phone Number' => $order->client_phone,
                        'City' => $order->client_city,
                        'Shipping Type' => ucfirst(str_replace('_', ' ', $order->shipping_type)),
                        'Payment Type' => ucfirst(str_replace('_', ' ', $order->payment_type)),
                        'Total Weight' => $order->total_weight . ' Kg',
                        'Order Price' => number_format($order->order_price, 2) . ' EGP',
                        'Shipping Price' => number_format($order->shipping_price, 2) . ' EGP',
                        'Total Price' => number_format($order->total_price, 2) . ' EGP'
                    ];
                @endphp

                @foreach($fields as $label => $value)
                    <tr class="border-b dark:border-gray-700">
                        <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $label }}:</th>
                        <td class="px-6 py-4">{{ $value }}</td>
                    </tr>
                @endforeach

                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">Village:</th>
                    <td class="px-6 py-4 flex justify-center">
                        @if($order->village == "1")
                            <x-heroicon-m-check-circle class="w-6 h-6 text-[#10b981]"/>
                        @else
                            <x-heroicon-s-x-circle class="w-6 h-6 text-red-600"/>
                        @endif
                    </td>
                </tr>

                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">Products:</th>
                    <td class="px-6 py-4">
                        <ol class="pl-5">
                            @foreach($order->products as $product)
                                <li class="py-2">
                                    {{ $product['product_name'] ?? 'Unknown Product' }} -
                                    Quantity: {{ $product['product_quantity'] ?? 0 }} -
                                    Weight: {{ $product['product_weight'] }} Kg -
                                    Price: {{$product['product_price']}} EGP
                                </li>
                            @endforeach
                        </ol>
                    </td>
                </tr>

                <tr>
                    <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">Status:</th>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{ route('orders.updateStatus', $order->id) }}">
                            @csrf
                            <select name="status" class="block w-full p-2 border rounded-md text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-800" onchange="this.form.submit()">
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="on_shipping" {{ $order->status == 'on_shipping' ? 'selected' : '' }}>On Shipping</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            </select>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="flex justify-center mt-6">
                <a href="{{ route('orders.myOrders') }}" class="bg-[#10b981] hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-md shadow-md transition duration-200">
                    Back to Orders
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
