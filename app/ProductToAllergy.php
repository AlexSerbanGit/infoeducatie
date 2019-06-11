<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductToAllergy extends Model
{
    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function allergy(){
        return $this->belongsTo('App\Allergy', 'allergy_id');
    }
}
