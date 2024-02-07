<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('products') }}">
            @csrf

             <!-- Product name -->
            <div class="flex items-center justify-start mt-4">
            <div>
                <x-label for="product_name" :value="__('Product name')" />

                <x-input id="product_name" class="block mt-1" type="text" name="product_name" :value="old('product_name')" autofocus />
            </div>

            <!-- Profit margin -->
            <div class="ml-4">
                <x-label for="profit_margin" :value="__('Profit margin')" />

                <x-input id="profit_margin" class="block mt-1"
                                type="number"
                                name="profit_margin"
                                step="0.01" min="0" />
            </div>

              <!-- Shipping cost -->
              <div class="ml-4">
                <x-label for="shipping_cost" :value="__('Shipping cost')" />
                <x-input id="shipping_cost" class="block mt-1"
                                type="number"
                                name="shipping_cost"
                                step="0.01" min="0"/>
            </div>




                <x-button class="ml-4">
                    {{ __('Record product') }}
                </x-button>
            </div>
        </form>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Products data<p>
                <table class="table-fixed">
                    <thead>
                        <tr class="text-left font-bold bg-gray-100 border">
                        <th class="border px-2 py-4">S.no</th>
                        <th class="border px-6 py-4">Product name</th>
                        <th class="border px-6 py-4">Profit margin</th>
                        <th class="border px-6 py-4">Shipping cost</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php $counter = 1; @endphp
                        @foreach($productData as $product)
                        <tr class="text-left border">
                        <td class="border px-6 py-4">{{$counter}}</td>
                        <td class="border px-6 py-4">{{$product->product_name}}</td>
                        <td class="border px-6 py-4">{{$product->profit_margin}}</td>
                        <td class="border px-6 py-4">{{$product->shipping_cost}}</td>
                        </tr>
                        @php $counter++; @endphp
                        @endforeach
                    </tbody>
                </table>
              
            </div>
            </div>
        </div>
    
    </div>
   
</x-app-layout>
