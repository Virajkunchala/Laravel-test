<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;//using product model

class ProductController extends Controller
{
     #function for store sales value 
     public function store(Request $request)
     {
         #Validations for input fileds
         $formData=$request->validate([
             'product_name'=>'required',
             'profit_margin'=>'required|numeric|min:0',
             'shipping_cost'=>'required|numeric|min:0',
         ]);
 
         //using the Product model to store the values into table
         $sale=new Product();
         $sale->product_name=$formData['product_name'];
         $sale->profit_margin=$formData['profit_margin']/100;//converting into percentage eg:25% to 0.25
         $sale->shipping_cost=$formData['shipping_cost'];
         $sale->save();
 
 
         //return to sale view 
         return redirect()->route('products');
 
         
     }
     
}
