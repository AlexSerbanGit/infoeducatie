<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserToAllergy extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function allergy(){
        return $this->belongsTo('App\Allergy', 'allergy_id');
    }
}
