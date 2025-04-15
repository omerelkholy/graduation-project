<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit your order') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#202022] dark:bg-[#202022] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <form action="{{ route('orders.update', $order) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <h3 class="text-lg font-semibold mb-4 pb-2 border-b border-gray-700">Customer Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="client_name" value="Recipient's name"/>
                                <input id="client_name"
                                       name="client_name" type="text"
                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       value="{{ old('client_name', $order->client_name) }}" required/>
                                <x-input-error :messages="$errors->get('client_name')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="client_phone" value="Phone number"/>
                                <input id="client_phone"
                                       name="client_phone" type="text"
                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       value="{{ old('client_phone', $order->client_phone) }}" required/>
                                <x-input-error :messages="$errors->get('client_phone')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="client_city" value="Governorate"/>
                                <input id="client_city"
                                       name="client_city" type="text"
                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       value="{{ old('client_city', $order->client_city) }}" required/>
                                <x-input-error :messages="$errors->get('client_city')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="region_id" value="City"/>
                                <select id="region_id" name="region_id"
                                        class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                        required>
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
                                        name="shipping_type"
                                        class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
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
                                        name="payment_type"
                                        class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
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
                                       class="w-5 h-5 text-[#10b981] bg-gray-100 border-gray-300 rounded-sm focus:ring-[#10b981] dark:focus:ring-[#10b981] dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{ old('village', $order->village) ? 'checked' : '' }}>
                            </div>
                            <div class="ms-2 text-sm">
                                <label for="village-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Village</label>
                                <p class="text-xs font-normal text-gray-500 dark:text-gray-300">Is this order for a
                                    village?</p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-semibold pb-2 border-b border-gray-700 pr-4">Order Products</h3>
                                <button type="button" id="add-product"
                                        class="px-4 py-2 bg-[#10b981] hover:bg-[#0f9c7a] text-white rounded flex items-center gap-2 transition duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg> Add Product
                                </button>
                            </div>
                            <div id="products-container">
                                @foreach ($order->products as $index => $product)

                                    <div class=" p-4 rounded mb-4">
                                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                            <div>
                                                <x-input-label value="Product Name"/>
                                                <input name="products[{{ $index }}][product_name]"
                                                       type="text"
                                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                                       value="{{ $product['product_name'] }}" required/>
                                            </div>
                                            <div>
                                                <x-input-label value="Quantity"/>
                                                <input name="products[{{ $index }}][product_quantity]"
                                                       oninput="this.value = Math.abs(this.value)" step="1"
                                                       type="number" min="1"
                                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                                       value="{{ $product['product_quantity'] }}" required/>
                                            </div>
                                            <div>
                                                <x-input-label value="Weight (kg)"/>
                                                <input name="products[{{ $index }}][product_weight]"
                                                       oninput="this.value = Math.abs(this.value)"
                                                       type="number" step="0.01" min="0.1"
                                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                                       value="{{ $product['product_weight'] }}"
                                                       required/>
                                            </div>
                                            <div>
                                                <x-input-label value="Price (EGP)"/>
                                                <input name="products[{{ $index }}][product_price]"
                                                       oninput="this.value = Math.abs(this.value)"
                                                       type="number" step="0.01" min="0"
                                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                                       value="{{ $product['product_price'] }}"
                                                       required/>
                                            </div>


                                            <div class="flex justify-center items-center "
                                                 style="display: {{ count($order->products) > 1 ? 'flex' : 'none' }};">

                                                <button type="button"
                                                        class="remove-product bg-red-500 text-white p-2 rounded-full flex items-center justify-center w-10 h-10 ">
                                                    <span class="heroicons--trash"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold mb-4 pb-2 border-b border-gray-700">Order Summary</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="order_price" value="order price"/>
                                <input id="order_price" name="order_price" type="number" step="0.01"
                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       value="{{ old('order_price', $order->order_price) }}"
                                       disabled/>
                            </div>
                            <div>
                                <x-input-label for="shipping_price" value="shipping price"/>
                                <input id="shipping_price" name="shipping_price" type="number"
                                       step="0.01"
                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       value="{{ old('shipping_price', $order->shipping_price) }}" disabled/>
                            </div>
                            <div>
                                <x-input-label for="total_weight" value="Total Weight"/>
                                <input id="total_weight" name="total_weight" type="number" step="0.01"
                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       value="{{ old('total_weight', $order->total_weight) }}"
                                       disabled/>
                            </div>
                            <div>
                                <x-input-label for="total_price" value="Total price"/>
                                <input id="total_price" name="total_price" type="number" min="0"
                                       step="0.01"
                                       class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       value="{{ old('total_price', $order->total_price) }}" disabled/>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <x-primary-button>Finish Editing</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            const shippingRates = @json($shippingRatesData) ||
            {
                base_shipping_price: 0,
                    weight_limit
            :
                0,
                    extra_weight_price_per_kg
            :
                0,
                    village_fee
            :
                0,
                    express_shipping_fee
            :
                0
            }
            ;
            document.addEventListener("DOMContentLoaded", function () {
                // First, add the product-row class to all existing product rows
                const existingRows = document.querySelectorAll('#products-container > div');
                existingRows.forEach(row => row.classList.add('product-row'));

                let productCount = existingRows.length;

                function updateDeleteButtons() {
                    const productRows = document.querySelectorAll('.product-row');
                    const removeProductButtons = document.querySelectorAll('.remove-product');

                    // Only hide/show delete buttons if we need to
                    if (productRows.length <= 1) {
                        removeProductButtons.forEach(button => button.style.display = 'none');
                    } else {
                        removeProductButtons.forEach(button => button.style.display = 'flex');
                    }
                }

                function reindexProducts() {
                    // Get all product rows
                    const productRows = document.querySelectorAll('.product-row');

                    // Reindex all product inputs
                    productRows.forEach((row, index) => {
                        // Update all input names in this row to use the new index
                        const inputs = row.querySelectorAll('input[name^="products["]');
                        inputs.forEach(input => {
                            // Replace the old index with the new one
                            const name = input.name;
                            // Extract field name (product_name, product_quantity, etc.)
                            const fieldMatch = name.match(/\]\[(.*?)\]$/);
                            if (fieldMatch && fieldMatch[1]) {
                                const fieldName = fieldMatch[1];
                                input.name = `products[${index}][${fieldName}]`;
                            }
                        });
                    });
                }

                // Initialize the delete buttons state
                updateDeleteButtons();

                document.getElementById('add-product').addEventListener('click', function () {
                    const container = document.getElementById('products-container');
                    const index = document.querySelectorAll('.product-row').length; // Use current count
                    const newRow = document.createElement('div');
                    newRow.className = 'p-4 rounded mb-4 product-row';

                    newRow.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div>
                        <x-input-label value="Product Name"/>
                        <input name="products[${index}][product_name]" type="text" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]" required/>
                    </div>
                    <div>
                        <x-input-label value="Quantity"/>
                        <input name="products[${index}][product_quantity]" type="number" step="1" oninput="this.value = Math.abs(this.value)"  min="1" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]" required/>
                    </div>
                    <div>
                        <x-input-label value="Weight (kg)"/>
                        <input name="products[${index}][product_weight]" type="number" oninput="this.value = Math.abs(this.value)" step="0.01" min="0.1" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]" required/>
                    </div>
                    <div>
                        <x-input-label value="Price (EGP)"/>
                        <input name="products[${index}][product_price]" oninput="this.value = Math.abs(this.value)" type="number" step="0.01" min="0" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]" required/>
                    </div>
                    <div class="flex justify-center items-center">
                        <button type="button" class="remove-product bg-red-500 text-white p-2 rounded-full flex items-center justify-center w-10 h-10">
                            <span class="heroicons--trash"></span>
                        </button>
                    </div>
                </div>
            `;

                    container.appendChild(newRow);
                    productCount++;
                    updateCalculations();
                    updateDeleteButtons();
                });

                // Delegate event handling for product removal
                document.getElementById('products-container').addEventListener('click', function (e) {
                    const removeButton = e.target.closest('.remove-product');
                    if (removeButton) {
                        const row = removeButton.closest('.product-row');
                        if (row) {
                            row.remove();
                            reindexProducts(); // Reindex after removing a product
                            updateCalculations();
                            updateDeleteButtons();
                        }
                    }
                });

                document.addEventListener('input', function (e) {
                    if (e.target.name && (e.target.name.includes('[product_price]') ||
                        e.target.name.includes('[product_quantity]') ||
                        e.target.name.includes('[product_weight]') ||
                        e.target.name === 'village' ||
                        e.target.name === 'shipping_type')) {
                        updateCalculations();
                    }
                });


                // Add event listener to the form to ensure products are properly indexed before submission
                document.querySelector('form').addEventListener('submit', function (e) {
                    // Reindex all products before submission to ensure no gaps in indexes
                    reindexProducts();
                });

                function updateCalculations() {
                    const productPrices = document.querySelectorAll('input[name^="products"][name$="[product_price]"]');
                    const productQuantities = document.querySelectorAll('input[name^="products"][name$="[product_quantity]"]');
                    const productWeights = document.querySelectorAll('input[name^="products"][name$="[product_weight]"]');
                    const villageCheckbox = document.getElementById('village-checkbox');
                    const shippingType = document.querySelector('select[name="shipping_type"]').value;

                    let totalOrderPrice = 0;
                    let totalWeight = 0;

                    productPrices.forEach((priceInput, index) => {
                        if (index < productQuantities.length && index < productWeights.length) {
                            const price = parseFloat(priceInput.value) || 0;
                            const quantity = parseInt(productQuantities[index].value) || 0;
                            const weight = parseFloat(productWeights[index].value) || 0;

                            totalOrderPrice += price * quantity;
                            totalWeight += weight * quantity;
                        }
                    });

                    // Ensure shipping rates are numeric values
                    const baseShippingPrice = parseFloat(shippingRates.base_shipping_price) || 0;
                    const weightLimit = parseFloat(shippingRates.weight_limit) || 0;
                    const extraWeightPricePerKg = parseFloat(shippingRates.extra_weight_price_per_kg) || 0;
                    const villageFee = parseFloat(shippingRates.village_fee) || 0;
                    const expressShippingFee = parseFloat(shippingRates.express_shipping_fee) || 0;

                    // Start with base shipping price
                    let shippingPrice = baseShippingPrice;

                    // Add extra weight charges if applicable
                    if (totalWeight > weightLimit) {
                        const extraWeight = totalWeight - weightLimit;
                        const extraWeightCharge = extraWeight * extraWeightPricePerKg;
                        shippingPrice += extraWeightCharge;
                    }

                    // Add village fee if applicable
                    if (villageCheckbox && villageCheckbox.checked) {
                        shippingPrice += villageFee;
                    }

                    // Add express shipping fee if applicable
                    if (shippingType === "shipping_in_24_hours") {
                        shippingPrice += expressShippingFee;
                    }


                    // Update form fields
                    document.getElementById('order_price').value = totalOrderPrice.toFixed(2);
                    document.getElementById('shipping_price').value = shippingPrice.toFixed(2);
                    document.getElementById('total_weight').value = totalWeight.toFixed(2);
                    document.getElementById('total_price').value = (totalOrderPrice + shippingPrice).toFixed(2);

                    document.getElementById('order_price').value = totalOrderPrice.toFixed(2);
                    document.getElementById('total_weight').value = totalWeight.toFixed(2);
                    document.getElementById('shipping_price').value = shippingPrice.toFixed(2);
                    document.getElementById('total_price').value = (totalOrderPrice + shippingPrice).toFixed(2);
                }

                // Handle changes for shipping type dropdown
                document.querySelector('select[name="shipping_type"]').addEventListener('change', updateCalculations);

                // Handle changes for village checkbox
                document.getElementById('village-checkbox').addEventListener('change', updateCalculations);

                // Monitor all product inputs for changes
                document.getElementById('products-container').addEventListener('input', function (e) {
                    if (e.target.name && (
                        e.target.name.includes('[product_price]') ||
                        e.target.name.includes('[product_quantity]') ||
                        e.target.name.includes('[product_weight]')
                    )) {
                        updateCalculations();
                    }
                });


                // Initial calculation
                updateCalculations();
            });
        </script>
    @endpush
</x-app-layout>
