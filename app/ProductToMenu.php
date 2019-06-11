<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductToMenu extends Model
{
    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function menu(){
        return $this->belongsTo('App\Menu', 'menu_id');
    }
}
