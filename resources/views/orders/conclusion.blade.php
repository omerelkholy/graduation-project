<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Merchant Home Screen') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('orders.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                Add a new request
                </a>
                <a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
                View all orders
                </a>
                <a href="{{ route('orders.report') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
                Reports                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">New</h3>
                                    <p class="text-2xl font-bold">{{ $statistics['new'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                <h3 class="text-lg font-semibold">Delivered</h3>                                    <p class="text-2xl font-bold">{{ $statistics['delivered'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                <h3 class="text-lg font-semibold">Pending</h3>                                    <p class="text-2xl font-bold">{{ $statistics['waiting'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Delivered to the representative</h3>
                                    <p class="text-2xl font-bold">{{ $statistics['delivered_to_delegate'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                                <div>
                                <h3 class="text-lg font-semibold">Canceled by recipient</h3>
                                    <p class="text-2xl font-bold">{{ $statistics['canceled_by_client'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                <h3 class="text-lg font-semibold">Partially delivered</h3>
                                    <p class="text-2xl font-bold">{{ $statistics['partially_delivered'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                    </svg>
                                </div>
                                <div>
                                <h3 class="text-lg font-semibold">Unable to access</h3>                                    <p class="text-2xl font-bold">{{ $statistics['cannot_reach'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                <h3 class="text-lg font-semibold">Rejected with payment</h3>
                                    <p class="text-2xl font-bold">{{ $statistics['rejected_with_payment'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                <h3 class="text-lg font-semibold">Rejection with partial payment</h3>
                                    <p class="text-2xl font-bold">{{ $statistics['rejected_with_partial_payment'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                    </svg>
                                </div>
                                <div>
                                <h3 class="text-lg font-semibold">Rejected and payment not made</h3>
                                    <p class="text-2xl font-bold">{{ $statistics['rejected_without_payment'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
