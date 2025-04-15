<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders Report') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center mt-6">
            <a href="{{ route('orders.create') }}"
               class="bg-[#10b981] hover:bg-[#059669] text-white py-2 px-6 rounded-md font-medium transition duration-150 ease-in-out flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add a new order
            </a>
        </div>

        @if(session('success'))
            <div class="my-6 px-4 sm:px-0">
                <div id="alert-border-3"
                     class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800 rounded-md shadow-sm"
                     role="alert">
                    <svg class="shrink-0 w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div class="ms-1 text-sm font-medium">
                        {{session('success')}}
                    </div>
                    <button type="button" onclick="dismissAlert()"
                            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 transition duration-150 ease-in-out"
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

        <div class="my-8">
            <div class="bg-[#18181b] dark:bg-[#18181b] overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white bg-[#202022]">
                    <!-- Filter Form -->
                    <form action="{{ route('orders.report') }}" method="GET"
                          class="mb-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="space-y-2">
                            <x-input-label for="from_date" value="From date" class="text-lg font-medium"/>
                            <input id="from_date" name="from_date" type="date" value="{{ request('from_date') }}"
                                   class="w-full border-[#10b981] dark:bg-[#18181b] dark:text-white dark:border-[#10b981] dark:focus:ring-[#10b981] dark:focus:border-[#10b981] rounded-md shadow-sm"/>
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="to_date" value="To date" class="text-lg font-medium"/>
                            <input id="to_date" name="to_date" type="date" value="{{ request('to_date') }}"
                                   class="w-full border-[#10b981] dark:bg-[#18181b] dark:text-white dark:border-[#10b981] dark:focus:ring-[#10b981] dark:focus:border-[#10b981] rounded-md shadow-sm"/>
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="status" value="Status" class="text-lg font-medium"/>
                            <select id="status" name="status"
                                    class="w-full rounded-md border-[#10b981] dark:bg-[#18181b] dark:text-white dark:border-[#10b981] shadow-sm">
                                <option value="">All cases</option>
                                @foreach(App\Models\Order::STATUS as $key => $value)
                                    <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-end">
                            <x-primary-button class="bg-[#10b981] hover:bg-[#0f9c7a] py-2.5 px-6 w-full text-center justify-center font-medium transition duration-150 ease-in-out shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                                Search
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Orders Table -->
                    <div class="overflow-x-auto shadow-sm rounded-lg border border-[#333333]">
                        <table class="min-w-full divide-y divide-[#333333] dark:bg-[#18181b]">
                            <thead class="bg-[#18181b] text-gray-500 dark:text-white">
                            <tr>
                                <th class="px-6 py-3.5 font-semibold text-sm text-left">Date</th>
                                <th class="px-6 py-3.5 font-semibold text-sm text-left">Client Name</th>
                                <th class="px-6 py-3.5 font-semibold text-sm text-left">Area</th>
                                <th class="px-6 py-3.5 font-semibold text-sm text-right">Total price</th>
                                <th class="px-6 py-3.5 font-semibold text-sm text-center">Village</th>
                                <th class="px-6 py-3.5 font-semibold text-sm text-center">Shipping Type</th>
                                <th class="px-6 py-3.5 font-semibold text-sm text-center">Status</th>
                                <th class="px-6 py-3.5 font-semibold text-sm text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="bg-[#18181b] text-white divide-y divide-[#333333]">
                            @forelse($orders as $order)
                                <tr class="hover:bg-[#222224] transition duration-150 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $order->client_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $order->region->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium">{{ $order->total_price }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($order->village == "1")
                                            <x-heroicon-m-check-circle class="w-6 h-6 text-[#10b981] mx-auto"/>
                                        @else
                                            <x-heroicon-s-x-circle class="w-6 h-6 text-red-600 mx-auto"/>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span class="px-3 py-1 inline-flex text-sm font-medium rounded-full
                                                {{ $order->shipping_type == 'normal' ? 'bg-[#10b981] bg-opacity-20 text-[#10b981]' : 'bg-red-500 bg-opacity-20 text-red-500' }}">
                                                {{ $order->shipping_type == 'normal' ? 'Normal' : 'Express (24h)' }}
                                            </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $order->status === 'on_shipping' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $order->status === 'shipped' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $order->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                                {{ App\Models\Order::STATUS[$order->status] }}
                                            </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('orders.show', $order) }}"
                                               class="bg-[#10b981] hover:bg-[#0f9c7a] text-white py-1.5 px-3 rounded text-sm font-medium transition duration-150 ease-in-out">
                                                View
                                            </a>

                                            @if(in_array($order->status, ['pending']))
                                                <a href="{{ route('orders.edit', $order) }}"
                                                   class="bg-[#10b981] hover:bg-[#0f9c7a] text-white py-1.5 px-3 rounded text-sm font-medium transition duration-150 ease-in-out">
                                                    Edit
                                                </a>

                                                <form action="{{ route('orders.destroy', $order) }}" method="POST"
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                            class="bg-[#10b981] hover:bg-[#0f9c7a] text-white py-1.5 px-3 rounded text-sm font-medium transition duration-150 ease-in-out"
                                                            id="delete-button-{{ $order->id }}" data-order-id="{{ $order->id }}">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-8 text-center text-sm text-gray-400">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <p class="font-medium">No orders found</p>
                                            <p class="mt-1">Try adjusting your search filters</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[id^="delete-button-"]').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const orderId = this.getAttribute('data-order-id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#10b981',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel',
                        heightAuto: false,
                        customClass: {
                            confirmButton: 'py-2 px-4 mx-2',
                            cancelButton: 'py-2 px-4 mx-2'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
