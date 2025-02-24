<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Order Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg mb-6">
            <div class="bg-gray-900 text-white p-4 rounded-t-lg">
                <h5 class="text-lg font-medium">Details Order</h5>
            </div>
            <div class="p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client name</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $order->client_name }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client City</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $order->client_city }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Weight</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $order->total_weight }} KG</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Price</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $order->total_price }} EGP</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            @if($order->status == 'pending')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-800">Pending</span>
                            @elseif($order->status == 'processing')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-200 text-blue-800">Processing</span>
                            @elseif($order->status == 'completed')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">Completed</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-800">{{ ucfirst($order->status) }}</span>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if($order->orderDelivery->isNotEmpty())
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg mb-6">
                <div class="bg-gray-900 text-white p-4 rounded-t-lg">
                    <h5 class="text-lg font-medium">Data Delivery</h5>
                </div>
                <div class="p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delivery Man's name</th>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300" id="delegate-name">{{ $order->orderDelivery->first()->user->name ?? 'Not assigned yet' }}</td>
                        </tr>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300" id="delegate-address">{{ $order->orderDelivery->first()->user->address ?? 'Unknown' }}</td>
                        </tr>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300" id="delegate-phone">{{ $order->orderDelivery->first()->user->phone ?? 'Not available' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6 text-center">
                No delegate has been assigned to this order yet
            </div>
        @endif

        <div class="flex justify-between mt-4">
            <a href="{{ route('employee.orders.pending') }}" class="btn bg-gray-700 text-white px-4 py-2 rounded-lg">Back</a>

            @if($order->status == 'pending')
                <form action="{{ route('employee.orders.confirm.processing', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">Confirm Order (Processing)</button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
