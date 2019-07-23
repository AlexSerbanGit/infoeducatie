<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search', 'UserAPISearchbarController@search');

Route::post('/find_user_by_phone_number', 'UserLoginController@find_user_by_phone_number');

Route::post('/user/register', 'UserRegisterController@register');

Route::post('/user/register/sms/confirm', 'UserRegisterController@confirm');

Route::post('/user/{user_id}/login', 'UserLoginController@login');

Route::post('/user/login/sms/confirm', 'UserloginController@confirm');
