<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'language','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
}
