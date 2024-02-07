<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\ProductController;
use App\Models\CoffeeSale;
use App\Models\Product;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::redirect('/dashboard', '/sales');

#Router for load sales view
Route::get('/sales', function () {
    $salesData=CoffeeSale::orderBy('created_at', 'desc')->get();// Records from Coffeesales_tables
    $productData=Product::all();// Records from Products table

    return view('coffee_sales',['salesData'=>$salesData,'productData'=>$productData]);
})->middleware(['auth'])->name('coffee.sales');

#Route for store the sale
Route::post('/sales',[CoffeeController::class,'store'])->name('coffee.sales');

#Router for load sales view
Route::get('/products', function () {
    $productData=Product::all();// Records from Products table
    return view('products',['productData'=>$productData]);
})->middleware(['auth'])->name('products');

#Route for store the sale
Route::post('/products',[ProductController::class,'store'])->name('products');

Route::get('/shipping-partners', function () {
    return view('shipping_partners');
})->middleware(['auth'])->name('shipping.partners');

require __DIR__.'/auth.php';
