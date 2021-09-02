<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    protected $product;
    public function setUp():void{
        parent::setUp();
        $this->product=Product::create(
            [
                'name'=>'Car',
                'price'=>100,
            ]
        );
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_user_can_list_products()
    {
        $response = $this->get('/products');
        $response->assertStatus(200)->assertSee('Car');
    }
    public function test_user_can_product_detail()
    {
        $response = $this->get('/products/'.$this->product['id']);
        $response->assertStatus(200)->assertSee('Car')->assertSee('100');
    }
}
