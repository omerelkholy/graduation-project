<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Order Details') }}
            </h2>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="container m-auto mt-4">
            <div id="alert-border-3"
                 class="flex items-center p-4 mb-4 text-[#10b981] border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-[#10b981] rounded"
                 role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{session('success')}}
                </div>
                <button type="button" onclick="dismissAlert()"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        </div>
        @push('script')
            <script>
                function dismissAlert() {
                    let alertBox = document.getElementById('alert-border-3');
                    if (alertBox) {
                        alertBox.style.display = 'none';
                    }
                }
            </script>
        @endpush
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Order Status Banner -->
            <div class="w-full p-4 mb-4
                @if($order->status == 'processing') bg-blue-600
                @elseif($order->status == 'on_shipping') bg-purple-600
                @elseif($order->status == 'shipped') bg-green-600
                @else bg-yellow-600
                @endif text-white rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            @if($order->status == 'processing')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            @elseif($order->status == 'on_shipping')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                            @elseif($order->status == 'shipped')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            @endif
                        </svg>
                        <span class="font-medium text-lg">
                            Status: {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                        </span>
                    </div>
                    <div class="text-sm">
                        <span class="font-bold">Order ID:</span> #{{ $order->id }}
                    </div>
                </div>
            </div>

            <div class="bg-[#202022] shadow-lg rounded-lg overflow-hidden">
                <!-- Main content grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
                    <!-- Customer Information Card -->
                    <div class="bg-[#18181b] rounded-lg p-5 border-l-4 border-[#10b981]">
                        <h3 class="text-lg font-medium mb-4 text-[#10b981] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Customer Information
                        </h3>
                        <div class="space-y-3 text-gray-300">
                            <div class="flex border-b border-gray-700 pb-2">
                                <span class="w-1/3 text-gray-400">Name:</span>
                                <span class="w-2/3 font-medium">{{ $order->client_name }}</span>
                            </div>
                            <div class="flex border-b border-gray-700 pb-2">
                                <span class="w-1/3 text-gray-400">Phone:</span>
                                <span class="w-2/3 font-medium">{{ $order->client_phone }}</span>
                            </div>
                            <div class="flex border-b border-gray-700 pb-2">
                                <span class="w-1/3 text-gray-400">City:</span>
                                <span class="w-2/3 font-medium">{{ $order->client_city }}</span>
                            </div>
                            <div class="flex items-center border-b border-gray-700 pb-2">
                                <span class="w-1/3 text-gray-400">Village:</span>
                                <span class="w-2/3 font-medium flex items-center">
                                    @if($order->village == "1")
                                        <span class="inline-flex items-center">
                                            <svg class="w-5 h-5 text-[#10b981] mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Yes
                                        </span>
                                    @else
                                        <span class="inline-flex items-center">
                                            <svg class="w-5 h-5 text-red-600 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                            </svg>
                                            No
                                        </span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Information Card -->
                    <div class="bg-[#18181b] rounded-lg p-5 border-l-4 border-[#10b981]">
                        <h3 class="text-lg font-medium mb-4 text-[#10b981] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Order Information
                        </h3>
                        <div class="space-y-3 text-gray-300">
                            <div class="flex border-b border-gray-700 pb-2">
                                <span class="w-1/2 text-gray-400">Shipping Type:</span>
                                <span class="w-1/2 font-medium">{{ ucfirst(str_replace('_', ' ', $order->shipping_type)) }}</span>
                            </div>
                            <div class="flex border-b border-gray-700 pb-2">
                                <span class="w-1/2 text-gray-400">Payment Type:</span>
                                <span class="w-1/2 font-medium">{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</span>
                            </div>
                            <div class="flex border-b border-gray-700 pb-2">
                                <span class="w-1/2 text-gray-400">Total Weight:</span>
                                <span class="w-1/2 font-medium">{{ $order->total_weight }} Kg</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Table -->
                <div class="px-6 pb-6">
                    <div class="bg-[#18181b] rounded-lg p-5 border-l-4 border-[#10b981]">
                        <h3 class="text-lg font-medium mb-4 text-[#10b981] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Products
                        </h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-[#202022] rounded-lg overflow-hidden">
                                <thead>
                                <tr class="bg-gray-800 text-left">
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">#</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">Product</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">Quantity</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">Weight</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">Price</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-300">
                                @foreach($order->products as $index => $product)
                                    <tr class="border-b border-gray-700">
                                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                                        <td class="py-3 px-4 font-medium">{{ $product['product_name'] ?? 'Unknown Product' }}</td>
                                        <td class="py-3 px-4">{{ $product['product_quantity'] ?? 0 }}</td>
                                        <td class="py-3 px-4">{{ $product['product_weight'] }} Kg</td>
                                        <td class="py-3 px-4">{{ $product['product_price'] }} EGP</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Price Summary Card -->
                <div class="px-6 pb-6">
                    <div class="bg-[#18181b] rounded-lg p-5 border-l-4 border-[#10b981]">
                        <h3 class="text-lg font-medium mb-4 text-[#10b981] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Price Summary
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-300">
                            <div class="bg-[#202022] p-4 rounded-lg border border-gray-700">
                                <div class="text-center">
                                    <span class="block text-gray-400 text-sm">Order Price</span>
                                    <span class="text-xl font-bold">{{ number_format($order->order_price, 2) }} EGP</span>
                                </div>
                            </div>
                            <div class="bg-[#202022] p-4 rounded-lg border border-gray-700">
                                <div class="text-center">
                                    <span class="block text-gray-400 text-sm">Shipping Price</span>
                                    <span class="text-xl font-bold">{{ number_format($order->shipping_price, 2) }} EGP</span>
                                </div>
                            </div>
                            <div class="bg-[#202022] p-4 rounded-lg border border-[#10b981]">
                                <div class="text-center">
                                    <span class="block text-[#10b981] text-sm">Total Price</span>
                                    <span class="text-2xl font-bold text-[#10b981]">{{ number_format($order->total_price, 2) }} EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Update -->
                <div class="px-6 pb-6">
                    <div class="bg-[#18181b] rounded-lg p-5 border-l-4 border-[#10b981]">
                        <h3 class="text-lg font-medium mb-4 text-[#10b981] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            Update Status
                        </h3>
                        <form method="POST" action="{{ route('orders.updateStatus', $order->id) }}" class="text-center">
                            @csrf
                            <div class="inline-block relative w-64">
                                <select name="status" class="block w-full py-3 px-4 text-center rounded-lg cursor-pointer bg-[#202022] border border-[#10b981] text-white shadow-sm focus:ring-[#10b981] focus:border-[#10b981] appearance-none" onchange="this.form.submit()">
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="on_shipping" {{ $order->status == 'on_shipping' ? 'selected' : '' }}>On Shipping</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="px-6 pb-6 flex justify-center">
                    <a href="{{ route('orders.myOrders') }}" class="bg-[#10b981] hover:bg-emerald-700 text-white font-semibold py-3 px-8 rounded-lg shadow-md transition duration-200 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
