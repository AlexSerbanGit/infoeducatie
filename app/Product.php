<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'restaurant_id',
        'weight',
        'protein',
        'fat',
        'carbo',
        'kcal',
        'barcode',
        'image',
        'category',
        'type'
    ];

    protected $dates = ['deleted_at'];
    
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

    public function orders(){
        return $this->belongsToMany('App\Order', 'order_has_products', 'order_id', 'product_id');
    }
}
