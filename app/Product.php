<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function allergies(){
        return $this->hasMany('App\ProductToAllergy', 'product_id');
    }

    public function menus(){
        return $this->hasMany('App\ProductToMenu', 'product_id');
    }

    public function foodType(){
        return $this->hasMany('App\FoodType', 'product_id');
    }
}
