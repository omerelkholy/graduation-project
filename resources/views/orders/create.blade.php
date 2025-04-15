<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add New Order') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[#202022] dark:bg-[#202022] overflow-hidden shadow-sm sm:rounded-lg p-8 text-white">
            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6 shadow-sm">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="font-medium">Please correct the following errors:</p>
                    </div>
                    <ul class="list-disc ml-6 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="space-y-8">
                    <!-- Customer Information Section -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 pb-2 border-b border-gray-700">Customer Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                            <!-- Client name -->
                            <div>
                                <x-input-label for="client_name" value="Recipient's name" class="text-base mb-1.5"/>
                                <input id="client_name" name="client_name" type="text"
                                       class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       required placeholder="Enter recipient's full name"/>
                                <x-input-error :messages="$errors->get('client_name')" class="mt-2"/>
                            </div>

                            <!-- Client phone -->
                            <div>
                                <x-input-label for="client_phone" value="Phone Number" class="text-base mb-1.5"/>
                                <input id="client_phone" name="client_phone" type="text"
                                       class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       required placeholder="Enter phone number"/>
                                <x-input-error :messages="$errors->get('client_phone')" class="mt-2"/>
                            </div>

                            <!-- Region -->
                            <div>
                                <x-input-label for="region_id" value="Governorate" class="text-base mb-1.5"/>
                                <select id="region_id" name="region_id"
                                        class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                        required>
                                    <option value="" selected disabled>Choose Governorate</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id}}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('region_id')" class="mt-2"/>
                            </div>

                            <!-- City -->
                            <div>
                                <x-input-label for="client_city" value="City" class="text-base mb-1.5"/>
                                <input id="client_city" name="client_city" type="text"
                                       class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                       required placeholder="Enter city name"/>
                                <x-input-error :messages="$errors->get('client_city')" class="mt-2"/>
                            </div>

                            <!-- Shipping type -->
                            <div>
                                <x-input-label for="shipping_type" value="Shipping type" class="text-base mb-1.5"/>
                                <select id="shipping_type" name="shipping_type"
                                        class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                        required>
                                    <option value="" selected disabled>Select shipping type</option>
                                    @foreach($shippingTypes as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('shipping_type')" class="mt-2"/>
                            </div>

                            <!-- Payment type -->
                            <div>
                                <x-input-label for="payment_type" value="Payment Type" class="text-base mb-1.5"/>
                                <select id="payment_type" name="payment_type"
                                        class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                        required>
                                    <option value="" selected disabled>Select payment type</option>
                                    @foreach($paymentTypes as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('payment_type')" class="mt-2"/>
                            </div>

                            <!-- Village checkbox -->
                            <div class="flex items-start md:col-span-2 mt-2">
                                <div class="flex items-center h-5 mt-1">
                                    <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox"
                                           value="1" name="village"
                                           class="w-5 h-5 text-[#10b981] bg-gray-100 border-gray-300 rounded-sm focus:ring-[#10b981] dark:focus:ring-[#10b981] dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="ms-3">
                                    <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Village</label>
                                    <p id="helper-checkbox-text"
                                       class="text-sm font-normal text-gray-500 dark:text-gray-400">Is this order for a
                                        village?</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Section -->
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold pb-2 border-b border-gray-700 pr-4">Order Products</h3>
                            <button type="button" id="add-product"
                                    class="px-4 py-2 bg-[#10b981] hover:bg-[#0f9c7a] text-white rounded flex items-center gap-2 transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Add Product
                            </button>
                        </div>

                        <div class="bg-[#18181b] border border-gray-700 rounded-lg p-6 mb-6">
                            <div id="products-container">
                                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                    <div>
                                        <x-input-label value="Product Name" class="text-base mb-1.5"/>
                                        <input name="products[0][product_name]" type="text"
                                               class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                               required placeholder="Enter product name"/>
                                    </div>
                                    <div>
                                        <x-input-label value="Quantity" class="text-base mb-1.5"/>
                                        <input name="products[0][product_quantity]" type="number" min="1"
                                               id="product_quantity" step="1"
                                               oninput="this.value = Math.abs(this.value)"
                                               class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                               required placeholder="Enter quantity"/>
                                    </div>
                                    <div>
                                        <x-input-label value="Weight (kg)" class="text-base mb-1.5"/>
                                        <input name="products[0][product_weight]" type="number" step="0.01"
                                               min="0.1" oninput="this.value = Math.abs(this.value)"
                                               id="product_weight"
                                               class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                               required placeholder="0.00"/>
                                    </div>
                                    <div>
                                        <x-input-label value="Price (EGP)" class="text-base mb-1.5"/>
                                        <input name="products[0][product_price]"
                                               oninput="this.value = Math.abs(this.value)"
                                               id="product_price"
                                               type="number" step="0.01" min="0"
                                               class="block w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"
                                               required placeholder="0.00"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Totals Section -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 pb-2 border-b border-gray-700">Order Summary</h3>
                        <div class="bg-[#18181b] border border-gray-700 rounded-lg p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                <div>
                                    <x-input-label for="order_price" value="Order price" class="text-base mb-1.5"/>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-400">EGP</span>
                                        </div>
                                        <input id="order_price" name="order_price" type="number" min="0" step="0.01"
                                               class="block w-full pl-12 border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981] font-medium" disabled/>
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="shipping_price" value="Shipping price" class="text-base mb-1.5"/>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-400">EGP</span>
                                        </div>
                                        <input id="shipping_price" name="shipping_price" type="number" min="0"
                                               step="0.01" class="block w-full pl-12 border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981] font-medium" disabled/>
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="total_weight" value="Total weight (kg)" class="text-base mb-1.5"/>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-400">kg</span>
                                        </div>
                                        <input id="total_weight" name="total_weight" type="number" min="0"
                                               step="0.01"
                                               class="block w-full pl-12 border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981] font-medium" disabled/>
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="total_price" value="Total price (EGP)" class="text-base mb-1.5"/>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-400">EGP</span>
                                        </div>
                                        <input id="total_price" name="total_price" type="number" min="0" step="0.01"
                                               class="block w-full pl-12 border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] text-lg shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981] font-medium" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end mt-8">
                        <x-primary-button type="submit" class="bg-[#10b981] hover:bg-[#0f9c7a] text-white py-3 px-6 text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Confirm your order
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('script')
        <script>
            const shippingRates = @json($shippingRatesData) || {
                base_shipping_price: 0,
                    weight_limit: 0,
                    extra_weight_price_per_kg: 0,
                    village_fee: 0,
                    express_shipping_fee: 0
            };

            document.addEventListener("DOMContentLoaded", function () {
                let productCount = 1;

                // Add new product
                document.getElementById('add-product').addEventListener('click', function () {
                    const container = document.getElementById('products-container');
                    const newRow = document.createElement('div');
                    newRow.className = 'grid grid-cols-1 md:grid-cols-5 gap-4 mt-4';

                    newRow.innerHTML = `
            <div>
                <x-input-label value="Product Name"/>
                <input name="products[${productCount}][product_name]" type="text" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]" required placeholder="Enter product name"/>
            </div>
            <div>
                <x-input-label value="Quantity"/>
                <input name="products[${productCount}][product_quantity]" type="number" step="1" min="1" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]" required placeholder="Enter quantity"    oninput="this.value = Math.abs(this.value)"/>
            </div>
            <div>
                <x-input-label value="Weight (kg)"/>
                <input name="products[${productCount}][product_weight]" type="number" step="0.01" min="0.1" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]" required placeholder="0.00" oninput="this.value = Math.abs(this.value)"/>
            </div>
            <div>
                <x-input-label value="Price (EGP)"/>
                <input name="products[${productCount}][product_price]" type="number" step="0.01" min="0" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-white shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]"     oninput="this.value = Math.abs(this.value)" required placeholder="0.00"/>
            </div>
     <div class="flex justify-center mt-6">
    <button type="button" class="remove-product bg-red-500 text-white p-2 rounded-full flex items-center justify-center w-10 h-10">
    <span class="heroicons--trash remove-product"></span>
    </button>
</div>
        `;

                    container.appendChild(newRow);
                    productCount++;


                    updateCalculations();
                });

                document.getElementById('products-container').addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-product')) {
                        const row = e.target.closest('.grid');
                        if (row) {
                            row.remove();
                            productCount--;

                            // تحديث الحسابات
                            updateCalculations();
                        }
                    }
                });


                function updateCalculations() {
                    const productPrices = document.querySelectorAll('input[name^="products"][name$="[product_price]"]');
                    const productQuantities = document.querySelectorAll('input[name^="products"][name$="[product_quantity]"]');
                    const productWeights = document.querySelectorAll('input[name^="products"][name$="[product_weight]"]');
                    const villageCheckbox = document.querySelector('input[name="village"]');
                    const shippingType = document.querySelector('select[name="shipping_type"]').value;


                    let totalOrderPrice = 0;
                    let totalWeight = 0;

                    productPrices.forEach((priceInput, index) => {
                        const price = parseFloat(priceInput.value) || 0;
                        const quantity = parseFloat(productQuantities[index].value) || 1;
                        const weight = parseFloat(productWeights[index].value) || 0;

                        totalOrderPrice += price * quantity;
                        totalWeight += weight * quantity;
                    });


                    let shippingPrice = shippingRates.base_shipping_price;
                    let extraWeight = totalWeight > shippingRates.weight_limit ?
                        totalWeight - shippingRates.weight_limit : 0;

                    if (extraWeight > 0) {
                        shippingPrice += extraWeight * shippingRates.extra_weight_price_per_kg;
                    }

                    if (villageCheckbox && villageCheckbox.checked) {
                        shippingPrice += shippingRates.village_fee;
                    }

                    if (shippingType === "shipping_in_24_hours") {
                        shippingPrice += shippingRates.express_shipping_fee;
                    }

                    document.getElementById('order_price').value = totalOrderPrice.toFixed(2);
                    document.getElementById('total_weight').value = totalWeight.toFixed(2);
                    document.getElementById('shipping_price').value = shippingPrice.toFixed(2);
                    document.getElementById('total_price').value = (totalOrderPrice + shippingPrice).toFixed(2);
                }

                document.addEventListener('input', function (e) {
                    if (e.target.name.includes('[product_price]') ||
                        e.target.name.includes('[product_quantity]') ||
                        e.target.name.includes('[product_weight]') ||
                        e.target.name === 'village' ||
                        e.target.name === 'shipping_type') {
                        updateCalculations();
                    }
                });

            });
        </script>
    @endpush
</x-app-layout>
