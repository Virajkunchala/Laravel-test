<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     // defining table name and table columns
     protected $table='products';
     protected $fillable=['product_name','profit_margin','shipping_cost'];
}
