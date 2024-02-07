<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class CoffeeSale extends Model
{
    use HasFactory;
    // defining table name and table columns
    protected $table='coffee_sales';
    protected $fillable=['product_id','quantity','unit_price','selling_price'];

    //relation b/w product table and coffee sales table
    public function product()
    {
        return $this->belongsTo(Product::class);
        $productName = $coffeeSale->product->product_name;

    }
}

