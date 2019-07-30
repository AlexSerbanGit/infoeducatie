<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderHasProduct extends Model
{
    use SoftDeletes;

    protected $table = 'order_has_products';

    protected $fillable = [
        'order_id',
        'product_id'
    ];

    protected $dates = ['deleted_at'];
}
