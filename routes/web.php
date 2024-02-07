<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Models\CoffeeSale;


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
    $salesData=CoffeeSale::all();// Records from Coffeesales_tables
    return view('coffee_sales',['salesData'=>$salesData]);
})->middleware(['auth'])->name('coffee.sales');

#Route for store the sale
Route::post('/sales',[CoffeeController::class,'store'])->name('coffee.sales');

Route::get('/shipping-partners', function () {
    return view('shipping_partners');
})->middleware(['auth'])->name('shipping.partners');

require __DIR__.'/auth.php';
