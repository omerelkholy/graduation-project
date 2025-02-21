<x-app-layout>
 <x-slot name="header">
 <div class="flex justify-between items-center">
 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
 {{ __('Orders Report') }} </h2>
 <div class="flex gap-2">
 <a href="{{ route('dashboard') }}" class="bg-purple-500 hover:bg-purple-700 text-white py-2 px-4 rounded">
 Home </a>
 <a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
 Back to list
 </a>
 <a href="{{ route('orders.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
 Add a new request
 </a>
 </div>
 </div>
 </x-slot>

 <div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
 <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 <div class="p-6 text-gray-900">
 <form action="{{ route('orders.report') }}" method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">
 <div>
 <x-input-label for="from_date" value="From date" /> <x-text-input id="from_date" name="from_date" type="date" class="mt-1 block w-full" value="{{ request('from_date') }}" />
 </div>

 <div>
 <x-input-label for="to_date" value="To date" /> <x-text-input id="to_date" name="to_date" type="date" class="mt-1 block w-full" value="{{ request('to_date') }}" />
 </div>

 <div>
 <x-input-label for="status" value="Status" /> <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300">
 <option value="">All cases</option> @foreach(App\Models\Order::STATUS as $key => $value)
 <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
 {{ $value }}
 </option>
 @endforeach
 </select>
 </div>

 <div class="flex items-end">
 <x-primary-button>Search</x-primary-button>
 </div>
 </form>

 <div class="overflow-x-auto">
 <table class="min-w-full divide-y divide-gray-200">
 <thead class="bg-gray-50">
 <tr>
 <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
 Serial number
 </th>
 <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
 The Date
 </th>
 <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
 Client </th>
 <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
 Area </th>
 <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
 Total price
 </th>
 <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
 The Condition
 </th>
 </tr>
 </thead>
 <tbody class="bg-white divide-y divide-gray-200">
 @forelse($orders as $order)
 <tr>
 <td class="px-6 py-4 whitespace-nowrap">{{ $order->id }}</td>
 <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('Y-m-d') }}</td>
 <td class="px-6 py-4 whitespace-nowrap">{{ $order->client_name }}</td>
 <td class="px-6 py-4 whitespace-nowrap">{{ $order->region->name }}</td>
 <td class="px-6 py-4 whitespace-nowrap">{{ $order->total_price }}</td>
 <td class="px-6 py-4 whitespace-nowrap">
 <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
 {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
 {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
 {{ $order->status === 'shipped' ? 'bg-green-100 text-green-800' : '' }}
 {{ $order->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
 {{ App\Models\Order::STATUS[$order->status] }}
 </span>
 </td>
 </tr>
 @empty
 <tr>
 <td colspan="6" class="px-6 py-4 text-center">No requests</td> </tr>
 @endforelse
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
    </div>
</x-app-layout>
