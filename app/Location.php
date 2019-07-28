<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function restaurant(){
        return $this->belongsTo('App\User', 'restaurant_id');
    }

    public function city(){
        return $this->belongsTo('App\City', 'city_id');
    }
}
