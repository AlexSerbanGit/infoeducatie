<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldProduct extends Model
{
    public function order(){
        return $this->belongsTo('App\OldOrder', 'order_id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }
}
