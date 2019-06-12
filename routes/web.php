<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/scanner', 'UserScannerController@index')->name('scanner');

Route::get('/results/{barcode}', 'UserScannerController@results');

Route::post('/update_user', 'UserController@updateUser');

Route::get('/breakfast', 'FoodController@breakfast');

Route::get('/meal', 'FoodController@meal');

Route::get('/dinner', 'FoodController@dinner');

Route::get('/snack', 'FoodController@snack');

Route::get('/search', function() {
    return view('/scanner');
});
