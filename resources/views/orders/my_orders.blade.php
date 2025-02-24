<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Orders') }}
            </h2>
        </div>
    </x-slot>

    <div class="container m-10">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Client Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        City
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Shipping Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Payment Method
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Weight
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->client_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $order->client_phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->client_city }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="badge bg-{{ $order->shipping_type == 'normal' ? 'primary' : 'danger' }}">
                                {{ $order->shipping_type == 'normal' ? 'Normal' : 'Express (24 Hours)' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            {{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}
                        </td>
                        <td class="px-6 py-4">
                        <span>
                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                        </span>
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->total_weight }} Kg
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->total_price }} EGP
                        </td>
                        <td>
                            <a href="{{ route('orders.view', $order->id) }}" class="btn btn-info btn-sm">View Details</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
