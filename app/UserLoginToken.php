<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLoginToken extends Model
{
    use SoftDeletes;

    protected $table = 'user_login_tokens';

    protected $fillable = [
        'user_id',
        'token',
        'ip',
        'expire_date',
        'latitude',
        'longitude',
        'confirmed',
        'sms_code'
    ];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this -> belongsTo('App\User','user_id','id');
    }
}
