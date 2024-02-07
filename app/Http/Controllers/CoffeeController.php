<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeSale;

class CoffeeController extends Controller
{
    #function for store sales value 
    public function store(Request $request)
    {
        #Validations for input fileds
        $formData=$request->validate([
            'quantity'=>'required|integer|min:1',
            'unit_price'=>'required|numeric|min:0',
        ]);

        // Calculating the Selling Price (already done in the view by using JS but still doing it here)
        //25 percent profit margin plus 10 pounds shipping cost
        $selling_price=($formData['quantity']*$formData['unit_price'])/(1 - 0.25)+10;

        //using the coffeesale model to store the values into table
        $sale=new CoffeeSale();
        $sale->quantity=$formData['quantity'];
        $sale->unit_price=$formData['unit_price'];
        $sale->selling_price=$selling_price;
        $sale->save();


        //return to sale view 
        return redirect()->route('coffee.sales');

        
    }
}
