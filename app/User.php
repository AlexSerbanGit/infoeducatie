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

    public function tokens()
    {
        return $this->hasMany('App\UserLoginToken', 'user_id', 'id');
    }

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
    public function getAuthCode()
    {
        return $this->code;
    }
}
