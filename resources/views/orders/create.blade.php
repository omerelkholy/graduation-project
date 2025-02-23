<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#10b981] dark:text-[#10b981] leading-tight">
                {{ __('Add New Order') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('conclusion') }}"
                   class="bg-purple-500 hover:bg-purple-700 text-white py-2 px-4 rounded">
                    Main
                </a>
                <a href="{{ route('orders.index') }}"
                   class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
                    Back To Home
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
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
                                <x-input-label for="client_name" value="Recipient's name"/>
                                <x-text-input id="client_name" name="client_name" type="text" class="mt-1 block w-full"
                                              required/>
                                <x-input-error :messages="$errors->get('client_name')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="client_phone" value="Phone Number"/>
                                <x-text-input id="client_phone" name="client_phone" type="text"
                                              class="mt-1 block w-full" required/>
                                <x-input-error :messages="$errors->get('client_phone')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="region_id" value="Governorate"/>
                                <select id="region_id" name="region_id"
                                        class="mt-1 block w-full rounded-md border-gray-300" required>
                                    <option value="" selected disabled>Choose Governorate</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id}}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('region_id')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="client_city" value="City"/>
                                <x-text-input id="client_city" name="client_city" type="text" class="mt-1 block w-full"
                                              required/>
                                <x-input-error :messages="$errors->get('client_city')" class="mt-2"/>
                            </div>

                 

                            <div>
                                <x-input-label for="shipping_type" value="Shipping type"/>
                                <select id="shipping_type" name="shipping_type"
                                        class="mt-1 block w-full rounded-md border-gray-300" required>
                                    <option value="" selected disabled>Shipping type</option>
                                    @foreach($shippingTypes as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('shipping_type')" class="mt-2"/>
                            </div>
                            <div>
                                <x-input-label for="payment_type" value="Payment Type"/>
                                <select id="payment_type" name="payment_type"
                                        class="mt-1 block w-full rounded-md border-gray-300" required>
                                    <option value="" selected disabled>Payment Type</option>
                                    @foreach($paymentTypes as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('payment_type')" class="mt-2"/>
                            </div>
                            <div class="flex">
                                <div class="flex items-center h-5">
                                    <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox"
                                           value="1" name="village"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="ms-2 text-sm">
                                    <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Village</label>
                                    <p id="helper-checkbox-text"
                                       class="text-xs font-normal text-gray-500 dark:text-gray-300">Is this order for a village?</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900">Products</h3>
                                <button type="button" id="add-product" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    Add Products
                                </button>
                                {{-- <button type="button" id="delete-products" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 hidden">
                                    Delete All Products
                                </button> --}}
                            </div>

                        <div class="mt-6">
                            <h3 class="text-lg font-medium mb-4">Product details</h3>
                            <div class="border p-4 rounded" id="products-container">
                                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                    <div>
                                        <x-input-label value="Product Name"/>
                                        <x-text-input name="products[0][product_name]" type="text" class="mt-1 block w-full"
                                                      required/>
                                    </div>
                                    <div>
                                        <x-input-label value="Quantity"/>
                                        <x-text-input name="products[0][product_quantity]" type="number" min="1" id="product_quantity"
                                                      class="mt-1 block w-full" required/>
                                    </div>
                                    <div>
                                        <x-input-label value="Weight (kg)"/>
                                        <x-text-input name="products[0][product_weight]" type="number" step="0.01" min="0"  id="product_weight"
                                                      class="mt-1 block w-full" required/>
                                    </div>
                                    <div>
                                        <x-input-label value="Price (EGP)"/>
                                        <x-text-input name="products[0][product_price]" id="product_price" type="number" step="0.01" min="0"
                                                      class="mt-1 block w-full" required/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <x-input-label for="order_price" value="Order price"/>
                                <x-text-input id="order_price" name="order_price"   type="number" min="0" step="0.01"
                                              class="mt-1 block w-full bg-gray-100" disabled/>
                            </div>
                            <div>
                                <x-input-label for="shipping_price" value="Shipping price"/>
                                <x-text-input id="shipping_price" name="shipping_price" type="number" min="0"
                                              step="0.01" class="mt-1 block w-full bg-gray-100" disabled/>
                            </div>
                            <div>
                                <x-input-label for="total_weight" value="Total weight (kg)"/>
                                <x-text-input id="total_weight" name="total_weight" type="number" min="0" step="0.01"
                                              class="mt-1 block w-full bg-gray-100" disabled/>
                            </div>
                            <div>
                                <x-input-label for="total_price" value="Total price (EGP)"/>
                                <x-text-input id="total_price" name="total_price" type="number" min="0" step="0.01"
                                              class="mt-1 block w-full bg-gray-100" disabled />
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <x-primary-button type="submit">Confirm your order</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <script>


document.addEventListener("DOMContentLoaded", function () {
    let productCount = 1;

    // Add new product
    document.getElementById('add-product').addEventListener('click', function() {
        const container = document.getElementById('products-container');
        const newRow = document.createElement('div');
        newRow.className = 'grid grid-cols-1 md:grid-cols-5 gap-4 mt-4';

        newRow.innerHTML = `
            <div>
                <x-input-label value="Product Name"/>
                <x-text-input name="products[${productCount}][product_name]" type="text" class="mt-1 block w-full" required/>
            </div>
            <div>
                <x-input-label value="Quantity"/>
                <x-text-input name="products[${productCount}][product_quantity]" type="number" min="1" class="mt-1 block w-full" required/>
            </div>
            <div>
                <x-input-label value="Weight (kg)"/>
                <x-text-input name="products[${productCount}][product_weight]" type="number" step="0.01" min="0" class="mt-1 block w-full" required/>
            </div>
            <div>
                <x-input-label value="Price (EGP)"/>
                <x-text-input name="products[${productCount}][product_price]" type="number" step="0.01" min="0" class="mt-1 block w-full" required/>
            </div>
     <div class="flex justify-center mt-6">
    <button type="button" class="remove-product bg-red-500 text-white p-2 rounded-full flex items-center justify-center w-10 h-10">
        <x-heroicon-o-trash class="remove-product w-5 h-5 text-white" />
    </button>
</div>
        `;

        container.appendChild(newRow);
        productCount++;

        // if (productCount > 1) {
        //     document.getElementById('delete-products').classList.remove('hidden');
        // }

        updateCalculations();
    });


//     document.getElementById('delete-products').addEventListener('click', function() {
//     const container = document.getElementById('products-container');
//     const productItems = container.querySelectorAll('.grid');

//     if (productItems.length > 1) {

//         container.removeChild(productItems[productItems.length - 1]);


//         if (container.querySelectorAll('.grid').length <= 1) {
//             document.getElementById('delete-products').classList.add('hidden');
//         }

//         updateCalculations();
//     }
// });

document.getElementById('products-container').addEventListener('click', function(e) {
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



        let totalOrderPrice = 0;
        let totalWeight = 0;

        productPrices.forEach((priceInput, index) => {
            const price = parseFloat(priceInput.value) || 0;
            const quantity = parseFloat(productQuantities[index].value) || 1;
            const weight = parseFloat(productWeights[index].value) || 0;

            totalOrderPrice += price * quantity;
            totalWeight += weight * quantity;
        });

        let shippingPrice = 20;
    if (totalWeight > 5) {
        let extraWeight = totalWeight - 5;
        shippingPrice += extraWeight * 10;
    }

    if (villageCheckbox.checked) {
        shippingPrice += 20;
    }

    document.getElementById('order_price').value = totalOrderPrice.toFixed(2);
    document.getElementById('total_weight').value = totalWeight.toFixed(2);
    document.getElementById('shipping_price').value = shippingPrice.toFixed(2);
    document.getElementById('total_price').value = (totalOrderPrice + shippingPrice).toFixed(2);
}

document.addEventListener('input', function(e) {
    if (e.target.name.includes('[product_price]') || e.target.name.includes('[product_quantity]') || e.target.name.includes('[product_weight]') || e.target.name === 'village') {
        updateCalculations();
    }
    });

});
    </script>
@endpush

</x-app-layout>
