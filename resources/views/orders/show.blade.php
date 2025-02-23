<x-app-layout>
 <x-slot name="header">
 <div class="flex justify-between items-center">
 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
 {{ __('Order Details') }} </h2>
 <div class="flex gap-2 flex-row-reverse">
 <a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
 Back to Home
 </a>
 @if(!in_array($order->status, ['on_shipping', 'shipped']))
 <a href="{{ route('orders.edit', $order) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
 Modify the request
 </a>
 <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline">
 @csrf
 @method('DELETE')
 <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded"
 onclick="return confirm('Are you sure you want to delete this request?')"> Delete the request

 </button>
 </form>
 @endif
 </div>
 </div>
 </x-slot>

 <div class="py-12">
 @if(session('success'))
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
 <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
 <span class="block sm:inline">{{ session('success') }}</span>
 </div>
 </div>
 @endif

 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
 <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 <div class="p-6 text-gray-900">
 <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
 <div>
 <h3 class="text-lg font-medium mb-4">Customer Information</h3>
 <p><strong>Name:</strong>
 {{ $order->client_name }}</p>
 <p><strong>Phone:</strong> {{ $order->client_phone }}</p>
 <p><strong>City:</strong> {{ $order->client_city }}</p>
 <p><strong>Region:</strong> {{ $order->region->name }}</p>
 </div>
 <div>
 <h3 class="text-lg font-medium mb-4">Order information</h3>
 <p><strong>Shipping Type:</strong> {{ App\Models\Order::SHIPPING_TYPES[$order->shipping_type] }}</p>
 <p><strong>Payment Type:</strong> {{ App\Models\Order::PAYMENT_TYPES[$order->payment_type] }}</p>
 <p><strong>Status:</strong> {{ App\Models\Order::STATUS[$order->status] }}</p>
 <p><strong>Total price:</strong> {{ $order->total_price }}</p>
 <p><strong>Total weight:</strong> {{ $order->total_weight }}</p>
 </div>
 </div>


 </div>
 </div>
 </div>
 </div>
</x-app-layout>
