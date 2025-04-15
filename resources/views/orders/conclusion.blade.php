<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Your Dashboard') }}
            </h2>
            <div class="text-sm text-gray-400">
                <span class="mr-2">Last updated: <span class="font-medium text-gray-200">Today at {{ now()->format('H:i') }}</span></span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#18181b]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-white ml-2">Delivery Statistics</h3>
                <p class="text-gray-400 ml-2">Overview of your current delivery status</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Waiting -->
                <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden border border-white/10 hover:border-amber-500/40 transition-all duration-300 group">
                    <div class="p-6 relative">
                        <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-20 h-20 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="p-3 bg-amber-100 rounded-xl shadow-md">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-gray-400 font-medium">Waiting</h3>
                                <div class="flex items-baseline">
                                    <p class="text-3xl font-bold text-white mt-1">{{ $statistics['Waiting'] }}</p>
                                    <span class="ml-2 text-xs font-medium px-2 py-1 rounded-full bg-amber-500/20 text-amber-300">Packages</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 w-full bg-gradient-to-r from-amber-500/40 to-amber-500/10"></div>
                </div>

                <!-- Delivered -->
                <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden border border-white/10 hover:border-emerald-500/40 transition-all duration-300 group">
                    <div class="p-6 relative">
                        <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-20 h-20 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="p-3 bg-green-100 rounded-xl shadow-md">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-gray-400 font-medium">Delivered</h3>
                                <div class="flex items-baseline">
                                    <p class="text-3xl font-bold text-white mt-1">{{ $statistics['delivered'] }}</p>
                                    <span class="ml-2 text-xs font-medium px-2 py-1 rounded-full bg-emerald-500/20 text-emerald-300">Packages</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 w-full bg-gradient-to-r from-emerald-500/40 to-emerald-500/10"></div>
                </div>

                <!-- On its way -->
                <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden border border-white/10 hover:border-purple-500/40 transition-all duration-300 group">
                    <div class="p-6 relative">
                        <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-20 h-20 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="p-3 bg-purple-100 rounded-xl shadow-md">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-gray-400 font-medium">On its way</h3>
                                <div class="flex items-baseline">
                                    <p class="text-3xl font-bold text-white mt-1">{{ $statistics['On_its_way'] }}</p>
                                    <span class="ml-2 text-xs font-medium px-2 py-1 rounded-full bg-purple-500/20 text-purple-300">Packages</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 w-full bg-gradient-to-r from-purple-500/40 to-purple-500/10"></div>
                </div>

                <!-- Accepted and Waiting -->
                <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden border border-white/10 hover:border-blue-500/40 transition-all duration-300 group">
                    <div class="p-6 relative">
                        <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-20 h-20 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="p-3 bg-blue-100 rounded-xl shadow-md">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-gray-400 font-medium">Accepted</h3>
                                <div class="flex items-baseline">
                                    <p class="text-3xl font-bold text-white mt-1">{{ $statistics['Accepted_and_waiting'] }}</p>
                                    <span class="ml-2 text-xs font-medium px-2 py-1 rounded-full bg-blue-500/20 text-blue-300">Packages</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 w-full bg-gradient-to-r from-blue-500/40 to-blue-500/10"></div>
                </div>
            </div>

            <!-- Rejected (Highlighted) -->
            <div class="mt-8">
                <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden border border-white/10 hover:border-red-500/40 transition-all duration-300 group max-w-md mx-auto">
                    <div class="p-6 relative">
                        <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-20 h-20 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-red-100 rounded-xl shadow-md">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-gray-400 font-medium">Rejected</h3>
                                <div class="flex items-baseline">
                                    <p class="text-3xl font-bold text-red-500 mt-1">{{ $statistics['Rejected'] }}</p>
                                    <span class="ml-2 text-xs font-medium px-2 py-1 rounded-full bg-red-500/20 text-red-300">Packages</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 w-full bg-gradient-to-r from-red-500/40 to-red-500/10"></div>
                </div>
            </div>

            <!-- Summary section -->
            <div class="mt-10 bg-gradient-to-br from-white/5 to-transparent backdrop-blur-sm rounded-2xl p-6 border border-white/5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-white">Delivery Summary</h3>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-[#10b981]/20 text-[#10b981]">summarization</span>
                </div>
                <div class="flex items-center justify-center">
                    <div class="w-full bg-white/5 h-2 rounded-full overflow-hidden">
                        <div class="flex h-full">
                            <div class="bg-emerald-500 h-full" style="width: {{ ($statistics['delivered'] / max(1, $statistics['delivered'] + $statistics['Waiting'] + $statistics['On_its_way'] + $statistics['Accepted_and_waiting'] + $statistics['Rejected'])) * 100 }}%"></div>
                            <div class="bg-blue-500 h-full" style="width: {{ ($statistics['Accepted_and_waiting'] / max(1, $statistics['delivered'] + $statistics['Waiting'] + $statistics['On_its_way'] + $statistics['Accepted_and_waiting'] + $statistics['Rejected'])) * 100 }}%"></div>
                            <div class="bg-purple-500 h-full" style="width: {{ ($statistics['On_its_way'] / max(1, $statistics['delivered'] + $statistics['Waiting'] + $statistics['On_its_way'] + $statistics['Accepted_and_waiting'] + $statistics['Rejected'])) * 100 }}%"></div>
                            <div class="bg-amber-500 h-full" style="width: {{ ($statistics['Waiting'] / max(1, $statistics['delivered'] + $statistics['Waiting'] + $statistics['On_its_way'] + $statistics['Accepted_and_waiting'] + $statistics['Rejected'])) * 100 }}%"></div>
                            <div class="bg-red-500 h-full" style="width: {{ ($statistics['Rejected'] / max(1, $statistics['delivered'] + $statistics['Waiting'] + $statistics['On_its_way'] + $statistics['Accepted_and_waiting'] + $statistics['Rejected'])) * 100 }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-5 gap-2 mt-2 text-xs text-center">
                    <div class="text-emerald-400">Delivered</div>
                    <div class="text-blue-400">Accepted</div>
                    <div class="text-purple-400">On Way</div>
                    <div class="text-amber-400">Waiting</div>
                    <div class="text-red-400">Rejected</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
