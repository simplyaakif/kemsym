<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function productprice(){
        return $this->hasMany('App\ProductsPrice','product_id');
    }
}
