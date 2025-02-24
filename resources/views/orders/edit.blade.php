<x-app-layout>
    <x-slot name="header">
<div class="flex justify-between items-center">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Modify order') }}
    </h2>
    <div class="flex gap-2">
<a href="{{ route('orders.show', $order) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
    View details
</a>
<a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
    Back to Home
</a>
    </div>
</div>
    </x-slot>

    <div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 text-gray-900">
    <form action="{{ route('orders.update', $order) }}" method="POST" class="space-y-6">
@csrf
@method('PUT')

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
<x-input-label for="client_name" value="Client Name" /><x-text-input id="client_name" name="client_name" type="text" class="mt-1 block w-full"
    value="{{ old('client_name', $order->client_name) }}" required />
<x-input-error :messages="$errors->get('client_name')" class="mt-2" />
    </div>

    <div>
<x-input-label for="client_phone" value="Phone number" /><x-text-input id="client_phone" name="client_phone" type="text" class="mt-1 block w-full"
    value="{{ old('client_phone', $order->client_phone) }}" required />
<x-input-error :messages="$errors->get('client_phone')" class="mt-2" />
    </div>

    <div>
<x-input-label for="client_city" value="City" /><x-text-input id="client_city" name="client_city" type="text" class="mt-1 block w-full"
    value="{{ old('client_city', $order->client_city) }}" required />
<x-input-error :messages="$errors->get('client_city')" class="mt-2" />
    </div>

    <div>
<x-input-label for="region_id" value="Region" /><select id="region_id" name="region_id" class="mt-1 block w-full rounded-md border-gray-300" required>
    @foreach($regions as $region)
<option value="{{ $region->id }}" {{ $order->region_id == $region->id ? 'selected' : '' }}>
    {{ $region->name }}
</option>
    @endforeach
</select>
<x-input-error :messages="$errors->get('region_id')" class="mt-2" />
    </div>

    <div>
<x-input-label for="shipping_type" value="Shipping type" /><select id="shipping_type" name="shipping_type" class="mt-1 block w-full rounded-md border-gray-300" required>
    @foreach($shippingTypes as $key => $value)
<option value="{{ $key }}" {{ $order->shipping_type === $key ? 'selected' : '' }}>
    {{ $value }}
</option>
    @endforeach
</select>
<x-input-error :messages="$errors->get('shipping_type')" class="mt-2" />
    </div>

    <div>
<x-input-label for="payment_type" value="Payment type" /><select id="payment_type" name="payment_type" class="mt-1 block w-full rounded-md border-gray-300" required>
    @foreach($paymentTypes as $key => $value)
<option value="{{ $key }}" {{ $order->payment_type === $key ? 'selected' : '' }}>
    {{ $value }}
</option>
    @endforeach
</select>
<x-input-error :messages="$errors->get('payment_type')" class="mt-2" />
    </div>
</div>

<div class="mt-6">
    <h3 class="text-lg font-medium mb-4">Products</h3>
    @foreach($order->products as $index => $product)
<div class="border p-4 rounded mb-4">
    <h4 class="font-medium mb-2">Product {{ $index + 1 }}</h4>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<div>
    <x-input-label value="Product Name" />
    <x-text-input
name="products[{{$index}}][product_name]"
type="text"
class="mt-1 block w-full"
value="{{ $product['product_name'] }}"
required
    />
</div>
<div>
    <x-input-label value="Quantity" />
    <x-text-input
name="products[{{$index}}][product_quantity]"
type="number"
min="1"
class="mt-1 block w-full"
value="{{ $product['product_quantity'] }}"
required
    />
</div>
<div>
    <x-input-label value="Weight (kg)" />
    <x-text-input
name="products[{{$index}}][product_weight]"
type="number"
step="0.01"
min="0"
class="mt-1 block w-full"
value="{{ $product['product_weight'] }}"
required
    />
</div>
        <div>
            <x-input-label value="Price (EGP)" />
            <x-text-input
                name="products[{{$index}}][product_price]"
                type="number"
                step="0.01"
                min="0"
                class="mt-1 block w-full"
                value="{{ $product['product_price'] }}"
                required
            />
        </div>
    </div>
</div>
    @endforeach
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
<x-input-label for="total_price" value="Total price" />
<x-text-input
    id="total_price"
    name="total_price"
    type="number"
    min="0"
    step="0.01"
    class="mt-1 block w-full"
    value="{{ old('total_price', $order->total_price) }}"
    required
/>
    </div>
    <div>
<x-input-label for="total_weight" value="Total Weight" />
<x-text-input
    id="total_weight"
    name="total_weight"
    type="number"
    step="0.01"
    class="mt-1 block w-full"
    value="{{ old('total_weight', $order->total_weight) }}"
    readonly
/>
    </div>
</div>

<div class="flex justify-end mt-6">
    <x-primary-button>Save modifications</x-primary-button>
</div>
    </form>
</div>
    </div>
</div>
    </div>
</x-app-layout>
