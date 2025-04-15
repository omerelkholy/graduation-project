<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="bg-green-600 border border-green-400 text-white px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#18181b] overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Order Status Banner -->
                <div class="w-full p-4
                    @if($order->status == 'pending') bg-yellow-600
                    @elseif($order->status == 'processing') bg-blue-600
                    @elseif($order->status == 'on_shipping') bg-purple-600
                    @elseif($order->status == 'shipped') bg-green-600
                    @else bg-red-600
                    @endif text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                @if($order->status == 'pending')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                @elseif($order->status == 'processing')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                @elseif($order->status == 'on_shipping')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                @elseif($order->status == 'shipped')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                @endif
                            </svg>
                            <span class="font-medium">Status: {{ App\Models\Order::STATUS[$order->status] }}</span>
                        </div>
                        <div class="text-sm">
                            <span class="font-bold">Order ID:</span> #{{ $order->id }}
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="p-6 text-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Customer Information Card -->
                        <div class="bg-[#222226] rounded-lg p-5 border-l-4 border-[#10b981]">
                            <h3 class="text-lg font-medium mb-4 text-[#10b981] flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Customer Information
                            </h3>
                            <div class="space-y-3">
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
                                <div class="flex">
                                    <span class="w-1/3 text-gray-400">Region:</span>
                                    <span class="w-2/3 font-medium">{{ $order->region->name }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Order Information Card -->
                        <div class="bg-[#222226] rounded-lg p-5 border-l-4 border-[#10b981]">
                            <h3 class="text-lg font-medium mb-4 text-[#10b981] flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Order Information
                            </h3>
                            <div class="space-y-3">
                                <div class="flex border-b border-gray-700 pb-2">
                                    <span class="w-1/2 text-gray-400">Shipping Type:</span>
                                    <span class="w-1/2 font-medium">{{ App\Models\Order::SHIPPING_TYPES[$order->shipping_type] }}</span>
                                </div>
                                <div class="flex border-b border-gray-700 pb-2">
                                    <span class="w-1/2 text-gray-400">Payment Type:</span>
                                    <span class="w-1/2 font-medium">{{ App\Models\Order::PAYMENT_TYPES[$order->payment_type] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products List -->
                    <div class="mt-8 bg-[#222226] rounded-lg p-5 border-l-4 border-[#10b981]">
                        <h3 class="text-lg font-medium mb-4 text-[#10b981] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Products
                        </h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-[#18181b] rounded-lg overflow-hidden">
                                <thead>
                                <tr class="bg-gray-800 text-left">
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">#</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">Product</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">Quantity</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">Weight</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-gray-300">Price</th>
                                </tr>
                                </thead>
                                <tbody>
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

                    <!-- Order Summary -->
                    <div class="mt-8 flex flex-col md:flex-row gap-6">
                        <div class="bg-[#222226] rounded-lg p-5 border-l-4 border-[#10b981] flex-1">
                            <h3 class="text-lg font-medium mb-4 text-[#10b981] flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                Order Summary
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between border-b border-gray-700 pb-2">
                                    <span class="text-gray-400">Order Price:</span>
                                    <span class="font-medium">{{ $order->order_price }} EGP</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-700 pb-2">
                                    <span class="text-gray-400">Shipping Price:</span>
                                    <span class="font-medium">{{ $order->shipping_price }} EGP</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-700 pb-2">
                                    <span class="text-gray-400">Total Weight:</span>
                                    <span class="font-medium">{{ $order->total_weight }} Kg</span>
                                </div>
                                <div class="flex justify-between pt-2">
                                    <span class="text-lg font-bold text-[#10b981]">Total Price:</span>
                                    <span class="text-lg font-bold text-[#10b981]">{{ $order->total_price }} EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ route('orders.report') }}" class="bg-transparent border border-[#10b981] hover:bg-[#10b981] transition duration-300 text-white py-2 px-4 rounded-lg shadow-md flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Home
                        </a>
                        @if(!in_array($order->status, ['on_shipping', 'shipped']))
                            <a href="{{ route('orders.edit', $order) }}" class="bg-[#10b981] hover:bg-[#0e9e73] transition duration-300 text-white py-2 px-4 rounded-lg shadow-md flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Update my order
                            </a>
                            <form id="delete-form" action="{{ route('orders.destroy', $order) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" id="delete-button" class="bg-[#6b7280] hover:bg-[#374151] transition duration-300 text-white py-2 px-4 rounded-lg shadow-md flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete my order
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('delete-button').addEventListener('click', function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#10b981',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            });
        });
    </script>
</x-app-layout>
