<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldOrder extends Model
{
    public function products(){
        return $this->hasMany('App\OldProduct', 'order_id');
    }
}
