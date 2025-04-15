<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                {{ __('Your Dashboard') }}
            </h2>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                <span class="bg-[#202022] px-3 py-1 rounded-full border border-gray-700 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Last updated: {{ now()->format('M d, H:i') }}</span>
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-[#18181b] to-[#27272a] overflow-hidden shadow-xl sm:rounded-xl border border-gray-800">
                <div class="p-6 text-gray-900 dark:text-white">
                    <!-- Summary Row -->
                    <div class="flex flex-wrap md:flex-nowrap gap-4 mb-8">
                        <div class="w-full bg-[#202022]/70 backdrop-blur-xl rounded-xl shadow-lg border border-gray-800/50 p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-white">Order Summary</h3>
                                <span class="text-xs font-medium px-2 py-1 bg-[#10b981]/10 text-[#10b981] rounded-full">Today</span>
                            </div>
                            <div class="mt-4 grid grid-cols-2 md:grid-cols-5 gap-4">
                                <div class="flex flex-col items-center p-3 bg-white/5 rounded-lg border border-gray-700/30">
                                    <span class="text-xs font-medium text-gray-400">Total</span>
                                    <span class="text-2xl font-bold text-white">{{ $statistics['Waiting'] + $statistics['delivered'] + $statistics['On_its_way'] + $statistics['Accepted_and_waiting'] + $statistics['Rejected'] }}</span>
                                </div>
                                <div class="flex flex-col items-center p-3 bg-white/5 rounded-lg border border-gray-700/30">
                                    <span class="text-xs font-medium text-gray-400">Pending</span>
                                    <span class="text-2xl font-bold text-amber-500">{{ $statistics['Waiting'] }}</span>
                                </div>
                                <div class="flex flex-col items-center p-3 bg-white/5 rounded-lg border border-gray-700/30">
                                    <span class="text-xs font-medium text-gray-400">Processing</span>
                                    <span class="text-2xl font-bold text-blue-500">{{ $statistics['Accepted_and_waiting'] }}</span>
                                </div>
                                <div class="flex flex-col items-center p-3 bg-white/5 rounded-lg border border-gray-700/30">
                                    <span class="text-xs font-medium text-gray-400">Shipping</span>
                                    <span class="text-2xl font-bold text-purple-500">{{ $statistics['On_its_way'] }}</span>
                                </div>
                                <div class="flex flex-col items-center p-3 bg-white/5 rounded-lg border border-gray-700/30">
                                    <span class="text-xs font-medium text-gray-400">Completed</span>
                                    <span class="text-2xl font-bold text-[#10b981]">{{ $statistics['delivered'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <!-- Pending Orders -->
                        <div class="bg-gradient-to-br from-amber-900/20 to-amber-600/5 backdrop-blur-xl rounded-xl shadow-lg border border-amber-900/20 p-6 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-amber-600/5 transform group-hover:scale-95 transition-all duration-300 rounded-xl"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="p-3 bg-amber-100/10 rounded-xl border border-amber-900/20">
                                        <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        <p class="text-3xl font-bold text-amber-500">{{ $statistics['Waiting'] }}</p>
                                        <div class="text-xs text-amber-300/70 mt-1 flex items-center">
                                            <span>Needs attention</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-1">Pending Orders</h3>
                                    <p class="text-xs text-gray-400">Orders awaiting initial processing</p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-gray-700/30">
                                    <a href="{{route('employee.orders.pending')}}" class="text-xs text-amber-400 flex items-center hover:text-amber-300 transition">
                                        <span>View pending orders</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Shipped -->
                        <div class="bg-gradient-to-br from-emerald-900/20 to-emerald-600/5 backdrop-blur-xl rounded-xl shadow-lg border border-emerald-900/20 p-6 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-emerald-600/5 transform group-hover:scale-95 transition-all duration-300 rounded-xl"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="p-3 bg-emerald-100/10 rounded-xl border border-emerald-900/20">
                                        <svg class="w-7 h-7 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        <p class="text-3xl font-bold text-[#10b981]">{{ $statistics['delivered'] }}</p>
                                        <div class="text-xs text-emerald-300/70 mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>+3 today</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-1">Shipped</h3>
                                    <p class="text-xs text-gray-400">Successfully delivered orders</p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-gray-700/30">
                                    <a href="{{route('employee.orders.shipped')}}" class="text-xs text-emerald-400 flex items-center hover:text-emerald-300 transition">
                                        <span>View shipped orders</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- On its way -->
                        <div class="bg-gradient-to-br from-purple-900/20 to-purple-600/5 backdrop-blur-xl rounded-xl shadow-lg border border-purple-900/20 p-6 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-purple-600/5 transform group-hover:scale-95 transition-all duration-300 rounded-xl"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="p-3 bg-purple-100/10 rounded-xl border border-purple-900/20">
                                        <svg class="w-7 h-7 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        <p class="text-3xl font-bold text-purple-500">{{ $statistics['On_its_way'] }}</p>
                                        <div class="text-xs text-purple-300/70 mt-1 flex items-center">
                                            <span>In transit</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-1">On Its Way</h3>
                                    <p class="text-xs text-gray-400">Orders currently in transit</p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-gray-700/30">
                                    <a href="{{route('employee.orders.shipping')}}" class="text-xs text-purple-400 flex items-center hover:text-purple-300 transition">
                                        <span>Track shipments</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Accepted and Waiting -->
                        <div class="bg-gradient-to-br from-blue-900/20 to-blue-600/5 backdrop-blur-xl rounded-xl shadow-lg border border-blue-900/20 p-6 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-blue-600/5 transform group-hover:scale-95 transition-all duration-300 rounded-xl"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="p-3 bg-blue-100/10 rounded-xl border border-blue-900/20">
                                        <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        <p class="text-3xl font-bold text-blue-500">{{ $statistics['Accepted_and_waiting'] }}</p>
                                        <div class="text-xs text-blue-300/70 mt-1 flex items-center">
                                            <span>Ready for pickup</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-1">With Delivery</h3>
                                    <p class="text-xs text-gray-400">Orders sent to delivery personnel</p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-gray-700/30">
                                    <a href="{{route('employee.orders.processing')}}" class="text-xs text-blue-400 flex items-center hover:text-blue-300 transition">
                                        <span>View assigned orders</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rejected Orders -->
                    <div class="mt-6">
                        <div class="bg-gradient-to-br from-red-900/20 to-red-600/5 backdrop-blur-xl rounded-xl shadow-lg border border-red-900/20 p-6 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-red-600/5 transform group-hover:scale-95 transition-all duration-300 rounded-xl"></div>
                            <div class="relative z-10">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                    <div class="flex items-center gap-4">
                                        <div class="p-3 bg-red-100/10 rounded-xl border border-red-900/20">
                                            <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-white mb-1">Rejected Orders</h3>
                                            <p class="text-xs text-gray-400">Orders that have been rejected or canceled</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-6">
                                        <div class="flex flex-col">
                                            <p class="text-3xl font-bold text-red-500">{{ $statistics['Rejected'] }}</p>
                                            <div class="text-xs text-red-300/70 mt-1">
                                                <span>Total rejected</span>
                                            </div>
                                        </div>

                                        <a href="{{route('employee.orders.rejected')}}" class="text-xs text-red-400 flex items-center hover:text-red-300 transition">
                                            <span>View rejected orders</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
