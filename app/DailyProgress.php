<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyProgress extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
