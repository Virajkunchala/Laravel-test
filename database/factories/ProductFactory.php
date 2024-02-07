<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        //factory function to run test case Product Test Factory
        return [
            'product_name' => $this->faker->word,
            'profit_margin' => $this->faker->randomFloat(2, 0, 1),
            'shipping_cost' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
