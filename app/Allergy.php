<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    public function products(){
        return $this->hasMany('App\ProductToAllergy', 'allergy_id');
    }
}
