<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'description',
        'address'
    ];

    protected $dates = ['deleted_at'];

    public function products(){
        return $this -> belongsToMany('App\Product', 'order_has_products', 'order_id', 'product_id');
    }

    public function user(){
        return $this -> belongsTo('App\User', 'user_id');
    }
}
