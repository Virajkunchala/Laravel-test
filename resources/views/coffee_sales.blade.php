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

             <!-- Quantity -->
            <div class="flex items-center justify-start mt-4">
            <div>
                <x-label for="quantity" :value="__('Quantity')" />

                <x-input id="quantity" class="block mt-1" type="number" name="quantity" :value="old('quantity')" required autofocus />
            </div>

            <!-- unit price -->
            <div class="ml-4">
                <x-label for="unit_price" :value="__('Unit Cost')" />

                <x-input id="unit_price" class="block mt-1"
                                type="number"
                                name="unit_price"
                                step="0.01" min="0" required/>
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
                <table class="table-fixed">
                    <thead>
                        <tr class="text-left font-bold bg-gray-100 border">
                        <th class="border px-2 py-4">S.no</th>
                        <th class="border px-6 py-4">Quantity</th>
                        <th class="border px-6 py-4">Unit cost</th>
                        <th class="border px-6 py-4">Selling price</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php $counter = 1; @endphp
                        @foreach($salesData as $sale)
                        <tr class="text-left border">
                        <td class="border px-6 py-4">{{$counter}}</td>
                        <td class="border px-6 py-4">{{$sale->quantity}}</td>
                        <td class="border px-6 py-4">{{$sale->unit_price}}</td>
                        <td class="border px-6 py-4">{{$sale->selling_price}}</td>
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
    document.getElementById('unit_price').addEventListener('input',function(){
        var quantity=parseFloat(document.getElementById('quantity').value);
        var unit_price=parseFloat(document.getElementById('unit_price').value);

        if(!isNaN(quantity) && !isNaN(unit_price)){
            var selling_price=(quantity * unit_price)/(1-0.25) + 10; //Assuming profit margin is fixed at 25% and shipping cost 10 pounds

            // Assigning the selling_price value to P tag
             document.getElementById('selling_price').textContent='£' +selling_price.toFixed(2);
        }else{
            document.getElementById('selling_price').textContent='£ 0.00';
        }
        


        
    });

</script>
</x-app-layout>
