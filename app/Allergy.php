<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    public function products(){
        return $this->hasMany('App\ProductToAllergy', 'allergy_id');
    }

    public function users(){
        return $this->hasMany('App\UserToAllergy', 'allergy_id');
    }
}
