<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeSale;
use App\Models\Product;

class CoffeeController extends Controller
{
    #function for store sales value 
    public function store(Request $request)
    {
        #Validations for input fileds
        $formData=$request->validate([
            'product_name'=>'required',
            'quantity'=>'required|integer|min:1',
            'unit_price'=>'required|numeric|min:0',
        ]);

        // Calculating the Selling Price (already done in the view by using JS but still doing it here)
        //fetching product profit margin and shipping cost from  Product table
        $product_data=Product::find($formData['product_name']);
        $profit_margin=$product_data->profit_margin;
        $shipping_cost=$product_data->shipping_cost;
        $selling_price=($formData['quantity']*$formData['unit_price'])/(1 - $profit_margin)+$shipping_cost;

        //using the coffeesale model to store the values into table
        $sale=new CoffeeSale();
        $sale->product_id=$formData['product_name'];
        $sale->quantity=$formData['quantity'];
        $sale->unit_price=$formData['unit_price'];
        $sale->selling_price=$selling_price;
        $sale->save();

        //return to sale view 
        return redirect()->route('coffee.sales');

        
    }
}
