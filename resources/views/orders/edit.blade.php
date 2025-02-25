<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modify order') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('orders.show', $order) }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    View details
                </a>
                <a href="{{ route('orders.index') }}"
                   class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
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
                                <x-input-label for="client_name" value="Client Name"/>
                                <x-text-input id="client_name"
                                              name="client_name" type="text" class="mt-1 block w-full"
                                              value="{{ old('client_name', $order->client_name) }}" required/>
                                <x-input-error :messages="$errors->get('client_name')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="client_phone" value="Phone number"/>
                                <x-text-input id="client_phone"
                                              name="client_phone" type="text" class="mt-1 block w-full"
                                              value="{{ old('client_phone', $order->client_phone) }}" required/>
                                <x-input-error :messages="$errors->get('client_phone')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="client_city" value="City"/>
                                <x-text-input id="client_city"
                                              name="client_city" type="text" class="mt-1 block w-full"
                                              value="{{ old('client_city', $order->client_city) }}" required/>
                                <x-input-error :messages="$errors->get('client_city')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="region_id" value="Region"/>
                                <select id="region_id" name="region_id"
                                        class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}"
                                            {{ $order->region_id == $region->id ? 'selected' : '' }}>
                                            {{ $region->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('region_id')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="shipping_type" value="Shipping type"/>
                                <select id="shipping_type"
                                        name="shipping_type" class="mt-1 block w-full rounded-md border-gray-300"
                                        required>
                                    @foreach ($shippingTypes as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $order->shipping_type === $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('shipping_type')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="payment_type" value="Payment type"/>
                                <select id="payment_type"
                                        name="payment_type" class="mt-1 block w-full rounded-md border-gray-300"
                                        required>
                                    @foreach ($paymentTypes as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $order->payment_type === $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('payment_type')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex items-center h-5">
                                <input id="village-checkbox" type="checkbox" value="1" name="village"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{ old('village', $order->village) ? 'checked' : '' }}>
                            </div>
                            <div class="ms-2 text-sm">
                                <label for="village-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Village</label>
                                <p class="text-xs font-normal text-gray-500 dark:text-gray-300">Is this order for a
                                    village?</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium mb-4">Products</h3>
                            <div class="flex justify-end mt-6">
                                <button type="button" id="add-product"
                                        class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Product
                                </button>
                            </div>
                            <div id="products-container">
                                @foreach ($order->products as $index => $product)
                                    <div class="border p-4 rounded mb-4">
                                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

                                            {{-- <h4 class="font-medium mb-2">Product {{ $index + 1 }}</h4> --}}
                                            <div>
                                                <x-input-label value="Product Name"/>
                                                <x-text-input name="products[{{ $index }}][product_name]"
                                                              type="text" class="mt-1 block w-full"
                                                              value="{{ $product['product_name'] }}" required/>
                                            </div>
                                            <div>
                                                <x-input-label value="Quantity"/>
                                                <x-text-input name="products[{{ $index }}][product_quantity]"
                                                              type="number" min="1" class="mt-1 block w-full"
                                                              value="{{ $product['product_quantity'] }}" required/>
                                            </div>
                                            <div>
                                                <x-input-label value="Weight (kg)"/>
                                                <x-text-input name="products[{{ $index }}][product_weight]"
                                                              type="number" step="0.01" min="0"
                                                              class="mt-1 block w-full"
                                                              value="{{ $product['product_weight'] }}"
                                                              required/>
                                            </div>
                                            <div>
                                                <x-input-label value="Price (EGP)"/>
                                                <x-text-input name="products[{{ $index }}][product_price]"
                                                              type="number" step="0.01" min="0"
                                                              class="mt-1 block w-full"
                                                              value="{{ $product['product_price'] }}"
                                                              required/>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="order_price" value="order price"/>
                                <x-text-input id="order_price" name="order_price" type="number" step="0.01"
                                              class="mt-1 block w-full"
                                              value="{{ old('order_price', $order->order_price) }}"
                                              disabled/>
                            </div>
                            <div>
                                <x-input-label for="shipping_price" value="shipping price"/>
                                <x-text-input id="shipping_price" name="shipping_price" type="number"
                                              step="0.01" class="mt-1 block w-full"
                                              value="{{ old('shipping_price', $order->shipping_price) }}" disabled/>
                            </div>
                            <div>
                                <x-input-label for="total_weight" value="Total Weight"/>
                                <x-text-input id="total_weight" name="total_weight" type="number" step="0.01"
                                              class="mt-1 block w-full"
                                              value="{{ old('total_weight', $order->total_weight) }}"
                                              disabled/>
                            </div>
                            <div>
                                <x-input-label for="total_price" value="Total price"/>
                                <x-text-input id="total_price" name="total_price" type="number" min="0"
                                              step="0.01" class="mt-1 block w-full"
                                              value="{{ old('total_price', $order->total_price) }}" disabled/>
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
    @push('script')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let productCount = document.querySelectorAll('.border').length || 1;

                document.getElementById('add-product').addEventListener('click', function () {
                    const container = document.getElementById('products-container');
                    const index = productCount;
                    const newRow = document.createElement('div');
                    newRow.className = 'border p-4 rounded mb-4 product-row';

                    newRow.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Product Name</label>
                        <input name="products[${index}][product_name]" type="text" class="mt-1 block w-full rounded-md border-gray-300" required/>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Quantity</label>
                        <input name="products[${index}][product_quantity]" type="number" min="1" class="mt-1 block w-full rounded-md border-gray-300" required/>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Weight (kg)</label>
                        <input name="products[${index}][product_weight]" type="number" step="0.01" min="0" class="mt-1 block w-full rounded-md border-gray-300" required/>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Price (EGP)</label>
                        <input name="products[${index}][product_price]" type="number" step="0.01" min="0" class="mt-1 block w-full rounded-md border-gray-300" required/>
                    </div>
                    <div class="flex justify-center items-center">
                        <button type="button" class="remove-product bg-red-500 text-white p-2 rounded-full flex items-center justify-center w-10 h-10">
                         <x-heroicon-o-trash class="remove-product w-5 h-5 text-white" />
                        </button>
                    </div>
                </div>
            `;

                    container.appendChild(newRow);
                    productCount++;
                    updateCalculations();
                });

                document.getElementById('products-container').addEventListener('click', function (e) {
                    if (e.target.closest('.remove-product')) {
                        const row = e.target.closest('.product-row, .border');
                        if (row) {
                            row.remove();
                            updateCalculations();
                        }
                    }
                });

                document.addEventListener('input', function (e) {
                    if (e.target.name && (e.target.name.includes('[product_price]') ||
                            e.target.name.includes('[product_quantity]') ||
                            e.target.name.includes('[product_weight]')) ||
                        e.target.name === 'village') {
                        updateCalculations();
                    }
                });

                function updateCalculations() {
                    const productPrices = document.querySelectorAll('input[name^="products"][name$="[product_price]"]');
                    const productQuantities = document.querySelectorAll('input[name^="products"][name$="[product_quantity]"]');
                    const productWeights = document.querySelectorAll('input[name^="products"][name$="[product_weight]"]');
                    const villageCheckbox = document.getElementById('village-checkbox');

                    let totalOrderPrice = 0;
                    let totalWeight = 0;

                    for (let i = 0; i < productPrices.length; i++) {
                        const price = parseFloat(productPrices[i].value) || 0;
                        const quantity = parseFloat(productQuantities[i].value) || 1;
                        const weight = parseFloat(productWeights[i].value) || 0;

                        totalOrderPrice += price * quantity;
                        totalWeight += weight * quantity;
                    }

                    let shippingPrice = 20;
                    if (totalWeight > 5) {
                        let extraWeight = totalWeight - 5;
                        shippingPrice += extraWeight * 10;
                    }

                    if (villageCheckbox && villageCheckbox.checked) {
                        shippingPrice += 20;
                    }

                    document.getElementById('order_price').value = totalOrderPrice.toFixed(2);
                    document.getElementById('total_weight').value = totalWeight.toFixed(2);
                    document.getElementById('shipping_price').value = shippingPrice.toFixed(2);
                    document.getElementById('total_price').value = (totalOrderPrice + shippingPrice).toFixed(2);
                }

                updateCalculations();
            });

        </script>
    @endpush
</x-app-layout>
