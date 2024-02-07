<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeSale extends Model
{
    use HasFactory;
    // defining table name and table columns
    protected $table='coffee_sales';
    protected $fillable=['quantity','unit_price','selling_price'];
}

