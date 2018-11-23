<?php

namespace App;


class Cart
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addpro($item,$id,$price,$pricetype,$product_prices_id,$quantity){
        $storedItem = ['qty'=>0,'price'=>$price,'singleprice'=>$price,'pricetype'=>$pricetype,'product_prices_id'=>$product_prices_id,'item'=>$item];
        if($this->items){
            if(array_key_exists($product_prices_id, $this->items)){
                $storedItem = $this->items[$product_prices_id];
            }
        }
        // dd($quantity);
        $storedItem['qty'] += $quantity;
        $storedItem['price']= $price * $storedItem['qty'];
        $this->items[$product_prices_id]=$storedItem;


        $this->totalQty +=$quantity;
        $this->totalPrice += $storedItem['price'];
    }

    public function oldaddpro($item,$id,$price,$pricetype,$product_prices_id,$quantity){
        $storedItem = ['qty'=>0,'price'=>$price,'singleprice'=>$price,'pricetype'=>$pricetype,'product_prices_id'=>$product_prices_id,'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        // dd($quantity);
        $storedItem['qty'] + $quantity;
        $storedItem['price']= $price * $storedItem['qty'];
        $this->items[$id]=$storedItem;
        $this->totalQty + $quantity;
        $this->totalPrice += $price;
    }

    public function add($item,$id){
        $storedItem = ['qty'=>0,'price'=>$item->price,'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price']= $item->price * $storedItem['qty'];
        $this->items[$id]=$storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function reduceByOne($id){
        $this->items['$id']['qty']--;
        $this->items['$id']['price']-=$this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice-=$this->items[$id]['item']['price'];

    }
    public function removeItem($id){
        $this->totalQty-=$this->items[$id]['qty'];
        $this->totalPrice-=$this->items[$id]['price'];
        unset($this->items[$id]);
    }

    public function updateItem($item_id,$qty){
        // $this->totalQty-=$this->items[$id]['qty'];
        // $this->totalPrice-=$this->items[$id]['price'];

        $this->items[$item_id]['qty'] = $qty;
        $this->items[$item_id]['price'] = $this->items[$item_id]['singleprice'] * $qty;

        $toQ = 0;
        $vtoQt = 0;
        $vitems = $this->items;

        foreach($vitems as $vitem){
            $tots  = $vitem['qty'] * $vitem['singleprice']; 
            $vtoQt  += $vitem['qty']; 
            $toQ += $tots;
        }
        // $this->totalPrice-=$this->items[$item_id]['price'];
        $this->totalQty = $vtoQt;
        $this->totalPrice = $toQ;
        // dd($this->items);
        // $this->items[$item_id]['price']= $price * $storedItem['qty'];
        // unset($this->items[$id]);
    }
}
