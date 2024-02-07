<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tests\TestCase;
use App\Models\Product;
use Faker\Factory as FakerFactory;//faker factory import

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    use HasFactory;
    protected $faker;

    #setup faker function
    public function setUp():void
    {
        parent::setUp();
        $this->faker=FakerFactory::create();

    }

    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    #test case function for loading Products  data
    public function loading_product_details()
    {
        
        $response=$this->get('/products');
        $response->assertStatus(200);
    }

    #test case for saving Product data used Faker
    public function test_product_details_save_data()
    {
        $previousProducts = Product::factory()->create();
        $previousProductCount = Product::count();

        $productData = [
            'product_name' => $this->faker->word(),
            'profit_margin' => $this->faker->randomFloat(2, 1, 100), 
            'shipping_cost' => $this->faker->numberBetween(1, 20),
        ];
        $response = $this->post('/products', $productData);

        // Redirect status 302 because we are redirecting to the same page to display previous sales
        $response->assertStatus(302);

        
        //calculating before and after insertion count so that we can check for our test case
        $newProductCount = Product::count();

        $expectedProductCount = $previousProductCount + 1;


        $this->assertEquals($expectedProductCount, $newProductCount);

    }

    
}
