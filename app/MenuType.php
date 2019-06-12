<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    public function menu(){
        return $this->belongsTo('App\Menu', 'menu_id');
    }
}
