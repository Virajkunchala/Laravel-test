<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class Prodcutseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            'product_name' => 'Gold Coffee',
            'profit_margin' => 25,
            'shipping_cost' => 10,
        ]);

        Product::create([
            'product_name' => 'Arabic Coffee',
            'profit_margin' => 15,
            'shipping_cost' => 10,
        ]);

    }

}
