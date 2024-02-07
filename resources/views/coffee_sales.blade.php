<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('coffee.sales') }}">
            @csrf


             <!-- Product details fetching from products table -->
             <div class="flex items-center justify-start mt-4" style="margin-right: 20px">
            <div>
                <x-label for="product" :value="__('Product')" />

                <select id="product" class="block mt-6" name="product_name" autofocus>
                <option value="">Select a product</option>
                @foreach($productData as $product)
                    <option value="{{ $product->id }}" data-profit-margin="{{ $product->profit_margin }}" data-shipping-cost="{{ $product->shipping_cost}}">{{ $product->product_name }}</option>
                @endforeach
            </select>
            </div>
            <br/>
            <!-- assign values to fetch below using JS and ajax -->
            <div>
               
                <input id="profitMargin" type="hidden" disabled>
            </div>

            <div>
                
                <input id="shippingCost" type="hidden" disabled>
            </div>

             <!-- Quantity -->
            <div class="flex items-center justify-start mt-4" style="padding-left: 20px;">
            <div>
                <x-label for="quantity" :value="__('Quantity')" />

                <x-input id="quantity" class="block mt-1" type="number" name="quantity" :value="old('quantity')"  />
            </div>

            <!-- unit price -->
            <div class="ml-4">
                <x-label for="unit_price" :value="__('Unit Cost')" />

                <x-input id="unit_price" class="block mt-1"
                                type="number"
                                name="unit_price"
                                step="0.01" min="0" />
            </div>

    

              <!-- Selling Price -->
              <div class="ml-4">
                <x-label for="selling_price" :value="__('Selling Price')" />
                <!-- Selling price displayed here by using JS -->
                <span id="selling_price"> £ 0.00</span>
            </div>




                <x-button class="ml-4">
                    {{ __('Record sale') }}
                </x-button>
            </div>
        </form>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Previous Sales</p>
                <table class="table-fixed">
                    <thead>
                        <tr class="text-left font-bold bg-gray-100 border">
                        <th class="border px-2 py-4">S.no</th>
                        <th class="border px-2 py-4">Product name</th>
                        <th class="border px-6 py-4">Quantity</th>
                        <th class="border px-6 py-4">Unit cost</th>
                        <th class="border px-6 py-4">Selling price</th>
                        <th class="border px-6 py-4">Sold time</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php $counter = 1; @endphp
                        @foreach($salesData as $sale)
                        <tr class="text-left border">
                        <td class="border px-6 py-4">{{$counter}}</td>
                        <td class="border px-6 py-4">{{ optional($sale->product)->product_name }}</td>
                        <td class="border px-6 py-4">{{$sale->quantity}}</td>
                        <td class="border px-6 py-4">{{$sale->unit_price}}</td>
                        <td class="border px-6 py-4">{{$sale->selling_price}}</td>
                        <td class="border px-6 py-4">{{$sale->created_at}}</td>
                        </tr>
                        @php $counter++; @endphp
                        @endforeach
                    </tbody>
                </table>
              
            </div>
            </div>
        </div>
    
    </div>
    <script>
    //Calculating the selling price base unit_price and and quantity values

    document.getElementById('product').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var profitMargin = selectedOption.getAttribute('data-profit-margin');
        var shippingCost = selectedOption.getAttribute('data-shipping-cost');

        // Update hidden input fields with the retrieved values
        document.getElementById('profitMargin').value = profitMargin;
        document.getElementById('shippingCost').value = shippingCost;

        //onload recursive function
        updateSellingPrice();

    });

    function updateSellingPrice(){
        var quantity = parseFloat(document.getElementById('quantity').value);
        var unitPrice = parseFloat(document.getElementById('unit_price').value);
        var profitMargin = parseFloat(document.getElementById('profitMargin').value);
        var shippingCost = parseFloat(document.getElementById('shippingCost').value);

        if (!isNaN(quantity) && !isNaN(unitPrice) && !isNaN(profitMargin) && !isNaN(shippingCost)) {
            var cost = quantity * unitPrice;
            var sellingPrice = (cost / (1 - profitMargin)) + shippingCost;
            document.getElementById('selling_price').textContent = '£' + sellingPrice.toFixed(2);
        } else {
            document.getElementById('selling_price').textContent = '£0.00';
        }
    }
    // Update selling price based on quantity and unit_price
    document.getElementById('quantity').addEventListener('input', updateSellingPrice);
    document.getElementById('unit_price').addEventListener('input', updateSellingPrice);

</script>
</x-app-layout>
