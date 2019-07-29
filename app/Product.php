<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function allergies(){
        return $this->belongsToMany('App\Allergy', 'product_to_allergies', 'product_id', 'allergy_id');
    }

    public function menus(){
        return $this->hasMany('App\ProductToMenu', 'product_id');
    }

    public function foodType(){
        return $this->hasMany('App\FoodType', 'product_id');
    }
    public function restaurant(){
        return $this->belongsTo('App\User', 'restaurant_id');
    }
}
