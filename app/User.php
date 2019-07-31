<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'role_id',
        'target',
        'language',
        'city',
        'country',
        'gender',
        'age',
        'weight',
        'height',
        'lifestyle',
        'password',
        'code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    public function stats(){
        return $this->hasOne('App\UserStats', 'user_id');
    }

    public function targets(){
        return $this->hasMany('App\Target', 'user_id');
    }

    public function dailyProgresses(){
        return $this->hasMany('App\DailyProgress');
    }

    public function allergies(){
        return $this->hasMany('App\UserToAllergy', 'user_id');
    }
    public function getAuthCode(){
        return $this->code;
    }
    public function products(){
        return $this->hasMany('App\Product', 'restaurant_id');
    }
    // Restaurant locations
    public function locations(){
        return $this->hasMany('App\Location', 'restaurant_id');
    }

    // The city of the user/restaurant
    public function city(){
        return $this->belongsTo('App\City', 'city_id');
    }
    // Get the user/'s cart
    public function cart(){
        return $this->belongsToMany('App\CartProduct', 'user_id');
    }
}
