<?php

namespace App;

class Cart {
    protected $items=[];
    public function insert($item){
        $this->items=array($item);
    }
    public function count(){
     return count($this->items);   
    }
    public function getitems(){
        return $this->items;
    }
    public function total(){
        $amout=0;
        foreach($this->items as $item){
            $amount=$amout+($item['price'] * $item['qty']);
        }
        return $amount;
    }

}