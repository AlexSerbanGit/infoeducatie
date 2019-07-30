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
        'active'
    ];

    protected $dates = ['deleted_at'];

    public function products(){
        return $this->belongsToMany('App\Product', 'order_has_products', 'product_id', 'restaurant_id');
    }
}
