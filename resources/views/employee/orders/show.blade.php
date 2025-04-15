<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Order Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Order Info --}}
        <div class="bg-white dark:bg-[#1f1f22] shadow-xl rounded-2xl mb-6 border border-gray-200 dark:border-gray-700/60 backdrop-blur-md">
            <div class="bg-gray-100 dark:bg-[#2a2a2e] p-4 rounded-t-2xl border-b border-gray-300 dark:border-gray-700/50">
                <h5 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                    </svg>
                    Order Details
                </h5>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                            <div class="py-3 flex justify-between">
                                <dt class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Client Name</dt>
                                <dd class="text-sm font-medium text-gray-900 dark:text-gray-100 ml-4 text-right">{{ $order->client_name }}</dd>
                            </div>
                            <div class="py-3 flex justify-between">
                                <dt class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Client City</dt>
                                <dd class="text-sm text-gray-700 dark:text-gray-300 ml-4 text-right">{{ $order->client_city }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div>
                        <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                            <div class="py-3 flex justify-between">
                                <dt class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Total Weight</dt>
                                <dd class="text-sm text-gray-700 dark:text-gray-300 ml-4 text-right">{{ $order->total_weight }} KG</dd>
                            </div>
                            <div class="py-3 flex justify-between">
                                <dt class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Total Price</dt>
                                <dd class="text-sm text-gray-700 dark:text-gray-300 ml-4 text-right">{{ $order->total_price }} EGP</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Status</span>
                        <div>
                            @if($order->status == 'pending')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-800 dark:bg-yellow-500/10 dark:text-yellow-300">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                        Pending
                                    </span>
                                </span>
                            @elseif($order->status == 'processing')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-200 text-blue-800 dark:bg-blue-400/10 dark:text-blue-300">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                                        Processing
                                    </span>
                                </span>
                            @elseif($order->status == 'on_shipping')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-200 text-blue-800 dark:bg-blue-400/10 dark:text-blue-300">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path><path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"></path></svg>
                                        On Shipping
                                    </span>
                                </span>
                            @elseif($order->status == 'rejected')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-red-100 dark:bg-red-800 dark:text-red-100">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                        Rejected
                                    </span>
                                </span>
                            @elseif($order->status == 'shipped')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800 dark:bg-[#10b981]/10 dark:text-[#10b981]">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                        Shipped
                                    </span>
                                </span>
                            @else
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-800 dark:bg-gray-600/40 dark:text-gray-200">{{ ucfirst($order->status) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delivery Info --}}
        @if($order->orderDelivery->isNotEmpty())
            <div class="bg-white dark:bg-[#1f1f22] shadow-xl rounded-2xl mb-6 border border-gray-200 dark:border-gray-700/60 backdrop-blur-md">
                <div class="bg-gray-100 dark:bg-[#2a2a2e] p-4 rounded-t-2xl border-b border-gray-300 dark:border-gray-700/50">
                    <h5 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        Delivery Info
                    </h5>
                </div>
                <div class="p-6">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="bg-gray-50 dark:bg-[#252529] p-4 rounded-xl border border-gray-200 dark:border-gray-700/40 flex-grow">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="h-12 w-12 rounded-full bg-[#10b981]/10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#10b981]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Delivery Man</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100" id="delegate-name">{{ $order->orderDelivery->first()->user->name ?? 'Not assigned yet' }}</p>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Address</p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300" id="delegate-address">{{ $order->orderDelivery->first()->user->address ?? 'Unknown' }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Phone</p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300" id="delegate-phone">{{ $order->orderDelivery->first()->user->phone ?? 'Not available' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-[#1f1f22] text-gray-200 p-5 rounded-xl mb-6 text-center border border-dashed border-[#10b981]/40 shadow-inner flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#10b981]/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>No Delivery man has been assigned to this order yet.</span>
            </div>
        @endif

        {{-- Actions --}}
        @php
            $backURL = session("previous_page") ?? route('employee.orders.pending');
        @endphp

        <div class="flex justify-between mt-6">
            <a href="{{ $backURL }}"
               class="bg-[#202022] hover:bg-[#2a2a2c] text-white border border-[#10b981] hover:text-white px-5 py-2 rounded-lg transition duration-200 shadow-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back
            </a>

            @if($order->status == 'pending' && $order->orderDelivery->isNotEmpty())
                <form action="{{ route('employee.orders.confirm.processing', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="bg-[#10b981] hover:bg-[#0e9e6f] text-white px-5 py-2 rounded-lg transition duration-200 shadow flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Confirm Order (Send it)
                    </button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
