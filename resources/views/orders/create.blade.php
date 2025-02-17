<x-app-layout>
<x-slot name="header">
<div class="flex justify-between items-center">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Add New Order') }}
</h2>
<div class="flex gap-2">
<a href="{{ route('dashboard') }}" class="bg-purple-500 hover:bg-purple-700 text-white py-2 px-4 rounded">
Main
</a>
<a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
Back To Home
</a>
</div>
</div>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 text-gray-900">
@if($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('orders.store') }}" method="POST">
@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<x-input-label for="client_name" value="Recipient's name" />
<x-text-input id="client_name" name="client_name" type="text" class="mt-1 block w-full" required />
<x-input-error :messages="$errors->get('client_name')" class="mt-2" />
</div>

<div>
<x-input-label for="client_phone" value="Phone Number" />
<x-text-input id="client_phone" name="client_phone" type="text" class="mt-1 block w-full" required />
<x-input-error :messages="$errors->get('client_phone')" class="mt-2" />
</div>

<div>
<x-input-label for="region_id" value="Governorate" />
<select id="region_id" name="region_id" class="mt-1 block w-full rounded-md border-gray-300" required>
<option value="">Choose Governorate</option>
@foreach($regions as $region)
<option value="{{ $region->id }}">{{ $region->name }}</option>
@endforeach
</select>
<x-input-error :messages="$errors->get('region_id')" class="mt-2" />
</div>

<div>
<x-input-label for="client_city" value="City" />
<x-text-input id="client_city" name="client_city" type="text" class="mt-1 block w-full" required />
<x-input-error :messages="$errors->get('client_city')" class="mt-2" />
</div>

<div>
<x-input-label for="shipping_type" value="Shipping type" />
<select id="shipping_type" name="shipping_type" class="mt-1 block w-full rounded-md border-gray-300" required>
<option value="">Shipping type</option>
@foreach($shippingTypes as $key => $value)
<option value="{{ $key }}">{{ $value }}</option>
@endforeach
</select>
<x-input-error :messages="$errors->get('shipping_type')" class="mt-2" />
</div>

<div>
<x-input-label for="payment_type" value="Payment Type" />
<select id="payment_type" name="payment_type" class="mt-1 block w-full rounded-md border-gray-300" required>
<option value="">Payment Type</option>
@foreach($paymentTypes as $key => $value)
<option value="{{ $key }}">{{ $value }}</option>
@endforeach
</select>
<x-input-error :messages="$errors->get('payment_type')" class="mt-2" />
</div>
</div>

<div class="mt-6">
<h3 class="text-lg font-medium mb-4">Product details</h3>
<div class="border p-4 rounded">
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<div>
<x-input-label value="Product Name" />
<x-text-input name="products[0][name]" type="text" class="mt-1 block w-full" required />
</div>
<div>
<x-input-label value="Quantity" />
<x-text-input name="products[0][quantity]" type="number" min="1" class="mt-1 block w-full" required />
</div>
<div>
<x-input-label value="Weight (kg)" />
<x-text-input name="products[0][weight]" type="number" step="0.01" min="0" class="mt-1 block w-full" required />
</div>
</div>
</div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
<div>
<x-input-label for="order_price" value="Order price" />
<x-text-input id="order_price" name="order_price" type="number" min="0" step="0.01" class="mt-1 block w-full" required />
</div>
<div>
<x-input-label for="shipping_price" value="Shipping price" />
<x-text-input id="shipping_price" name="shipping_price" type="number" min="0" step="0.01" class="mt-1 block w-full" required />
</div>
<div>
<x-input-label for="total_weight" value="Total weight (kg)" />
<x-text-input id="total_weight" name="total_weight" type="number" min="0" step="0.01" class="mt-1 block w-full" required />
</div>
</div>

<div class="flex justify-end mt-6">
<x-primary-button type="submit">Save request</x-primary-button>
</div>
</form>
</div>
</div>
</div>
    </div>
</x-app-layout>
