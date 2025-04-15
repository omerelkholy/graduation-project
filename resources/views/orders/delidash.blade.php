<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Your Delivery Dashboard') }}
            </h2>
            <div class="text-sm text-gray-400">
                <span class="mr-2">Last updated: <span class="font-medium text-gray-200">{{ now()->format('F j, H:i') }}</span></span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#18181b]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-white ml-2">Delivery Status</h3>
                <p class="text-gray-400 ml-2">Track your current delivery assignments</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Delivered -->
                <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden border border-white/10 hover:border-emerald-500/40 transition-all duration-300 group">
                    <div class="p-6 relative">
                        <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-24 h-24 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col items-center justify-center text-center relative z-10">
                            <div class="p-3 bg-green-100 rounded-xl shadow-md mb-3">
                                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Delivered</h3>
                            <p class="text-3xl font-bold text-[#10b981] mt-2 mb-1">{{ $statistics['delivered'] }}</p>
                            <span class="text-xs font-medium px-2 py-1 rounded-full bg-emerald-500/20 text-emerald-300">Completed</span>
                        </div>
                    </div>
                    <div class="h-1 w-full bg-gradient-to-r from-emerald-500/40 to-emerald-500/10"></div>
                </div>

                <!-- On its way -->
                <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden border border-white/10 hover:border-purple-500/40 transition-all duration-300 group">
                    <div class="p-6 relative">
                        <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-24 h-24 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col items-center justify-center text-center relative z-10">
                            <div class="p-3 bg-purple-100 rounded-xl shadow-md mb-3">
                                <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">On My Way</h3>
                            <p class="text-3xl font-bold text-[#10b981] mt-2 mb-1">{{ $statistics['On_its_way'] }}</p>
                            <span class="text-xs font-medium px-2 py-1 rounded-full bg-purple-500/20 text-purple-300">In Progress</span>
                        </div>
                    </div>
                    <div class="h-1 w-full bg-gradient-to-r from-purple-500/40 to-purple-500/10"></div>
                </div>

                <!-- Needed to be delivered -->
                <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden border border-white/10 hover:border-blue-500/40 transition-all duration-300 group">
                    <div class="p-6 relative">
                        <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-24 h-24 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col items-center justify-center text-center relative z-10">
                            <div class="p-3 bg-blue-100 rounded-xl shadow-md mb-3">
                                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Need To Deliver</h3>
                            <p class="text-3xl font-bold text-[#10b981] mt-2 mb-1">{{ $statistics['Accepted_and_waiting'] }}</p>
                            <span class="text-xs font-medium px-2 py-1 rounded-full bg-blue-500/20 text-blue-300">Pending for you</span>
                        </div>
                    </div>
                    <div class="h-1 w-full bg-gradient-to-r from-blue-500/40 to-blue-500/10"></div>
                </div>
            </div>

            <!-- Progress bar -->
            <div class="mt-8 bg-gradient-to-br from-white/5 to-transparent backdrop-blur-sm rounded-2xl p-6 border border-white/5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-white">Your Progress</h3>
                    <div class="flex items-center">
                        <span class="flex items-center text-xs font-medium mr-3">
                            <span class="w-2 h-2 rounded-full bg-[#10b981] mr-1"></span>
                            <span class="text-gray-400">{{ round(($statistics['delivered'] / max(1, $statistics['delivered'] + $statistics['On_its_way'] + $statistics['Accepted_and_waiting'])) * 100) }}% Complete</span>
                        </span>
                    </div>
                </div>
                <div class="w-full bg-white/5 h-3 rounded-full overflow-hidden">
                    <div class="bg-gradient-to-r from-[#10b981] to-emerald-400 h-full rounded-full" style="width: {{ ($statistics['delivered'] / max(1, $statistics['delivered'] + $statistics['On_its_way'] + $statistics['Accepted_and_waiting'])) * 100 }}%"></div>
                </div>
                <div class="flex justify-between mt-2 text-xs text-gray-400">
                    <span>0</span>
                    <span>{{ $statistics['delivered'] + $statistics['On_its_way'] + $statistics['Accepted_and_waiting'] }}</span>
                </div>
            </div>

            <!-- Regions section -->
            <div class="mt-8 bg-gradient-to-br from-white/5 to-transparent backdrop-blur-sm rounded-2xl p-6 border border-white/5">
                <div class="flex items-center mb-6">
                    <div class="p-2 bg-[#10b981]/20 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white">Your Assigned Regions</h3>
                </div>

                <div class="space-y-3 pl-4">
                    @forelse ($regions as $region)
                        <div class="flex items-center py-2 px-4 bg-white/5 rounded-lg border border-white/10 hover:border-[#10b981]/30 transition-all duration-300">
                            <div class="mr-3 text-[#10b981]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                </svg>
                            </div>
                            <span class="text-lg text-gray-200">{{ $region->region->name }}</span>
                        </div>
                    @empty
                        <div class="bg-white/5 rounded-lg border border-white/10 p-8 text-center">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-amber-100/10 rounded-full">
                                    <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-lg text-gray-300 font-medium">No Regions Assigned Yet</p>
                            <p class="text-gray-400 mt-2">You haven't been assigned to any delivery regions.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick tips -->
            <div class="mt-8 bg-gradient-to-br from-white/5 to-transparent backdrop-blur-sm rounded-2xl overflow-hidden border border-white/5">
                <div class="p-4 bg-[#10b981]/10 border-b border-[#10b981]/20">
                    <h3 class="text-lg font-medium text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Delivery Tips
                    </h3>
                </div>
                <div class="p-5">
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 pt-0.5">
                                <svg class="w-4 h-4 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="ml-2 text-sm text-gray-300">Update package status promptly after delivery</p>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 pt-0.5">
                                <svg class="w-4 h-4 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="ml-2 text-sm text-gray-300">Prioritize packages based on delivery time windows</p>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 pt-0.5">
                                <svg class="w-4 h-4 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="ml-2 text-sm text-gray-300">Contact support if you encounter delivery issues</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
