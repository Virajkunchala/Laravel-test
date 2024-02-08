<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tests\TestCase;
use App\Models\CoffeeSale;
use App\Models\Product;
use Faker\Factory as FakerFactory;//faker factory import

class CoffeeSaleTest extends TestCase
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

    

    #test case function for loading previous sales data
    public function loading_previous_sales()
    {
        
        $response=$this->get('/sales');
        $response->assertStatus(200);
    }
    
    #test case for saving sales data 
    public function test_save_coffee_sales_data()
    {
        $previousSales=CoffeeSale::factory()->create();
        $previousSalesCount = CoffeeSale::count();
        //getting product id from product table for test case
        $product = Product::inRandomOrder()->first();
        $product_id = $product ? $product->id : null;
        $quantity=$this->faker->numberBetween(1, 15);
        $unit_price=$this->faker->randomFloat(2, 1, 100);
        $selling_price=($quantity * $unit_price)/(1-0.25) + 10;
        $response=$this->post('/sales',[
            'product_id'=>$product_id,//testcase
            'quantity'=>$quantity,
            'unit_price'=>$unit_price,
            'selling_price'=>$selling_price
        ]);
        // redirect status 302 becuase we are redirecting to same page to display previous sales
        $response->assertStatus(302);
        //calculating before and after insertion count so that we can check for our test case
        $newProductCount = Product::count();

        $expectedSalesCount = $previousSalesCount + 1;
        $this->assertEquals($expectedSalesCount, $newProductCount);

    }
}
