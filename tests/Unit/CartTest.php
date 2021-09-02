<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Cart;
class CartTest extends TestCase
{
    public $cart;
    public function setUp():void{
        $cart= new Cart;
        $item = array(
            'id'      => 'sku_123ABC',
            'qty'     => 1,
            'price'   => 39.95,
            'name'    => 'T-Shirt',
            'coupon'         => 'XMAS-50OFF'
            );
        $cart->insert($item);
        $this->cart=$cart;
    }
    public function createcart(){
        $cart= new Cart;
        $item = array(
            'id'      => 'sku_123ABC',
            'qty'     => 1,
            'price'   => 39.95,
            'name'    => 'T-Shirt',
            'coupon'         => 'XMAS-50OFF'
            );
        $cart->insert($item);
        return $this->cart=$cart;

    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function we_can_add_item_to_the_cart()
    {
        $this->assertCount(1,$this->cart->getitems());
    }
    /** @test */
    public function we_can_count_items()
    {
        $this->assertEquals(1,$this->cart->count());
    }
    public function we_can_calculate_the_total_amount(){
        $cart=$this->createcart();
        $this->assertEquals(39.95,$cart->total());
    }
}
