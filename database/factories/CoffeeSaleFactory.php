<?php

namespace Database\Factories;

use App\Models\CoffeeSale;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoffeeSale>
 */
class CoffeeSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=CoffeeSale::class;



    public function definition(): array
    {
        $quantity=$this->faker->numberBetween(1, 15);
        $unit_price=$this->faker->randomFloat(2, 1, 100);
        $selling_price=($quantity*$unit_price)/(1 - 0.25)+10;
        return [
            //
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'selling_price' => $selling_price,
        ];
    }
}
