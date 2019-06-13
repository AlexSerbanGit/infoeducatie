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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/scanner', 'UserScannerController@index')->name('scanner');

    Route::get('/results/{barcode}', 'UserScannerController@results');

    Route::post('/update_user', 'UserController@updateUser');

    Route::get('/breakfast', 'FoodController@breakfast');

    Route::get('/meal', 'FoodController@meal');

    Route::get('/dinner', 'FoodController@dinner');

    Route::get('/snack', 'FoodController@snack');

    Route::post('/add_target', 'UserController@addTarget');

    Route::get('/your_targets', 'UserController@yourTargets');

    Route::get('/seacrch/results/{item_id}', 'UserController@search');

    Route::get('/all_allergies', 'UserController@allAllergies');

    Route::get('/add_remove_allergy/{id}', 'UserController@addRemoveAllergy');

    Route::get('/add_to_your_target/{id}', 'UserController@addToYourTarget');

});

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/admin', 'AdminController@menu');

    Route::get('/admin/allergies', 'AdminController@allergies');

    Route::post('/admin_add_allergy', 'AdminController@addAllergy');

    Route::post('/admin_edit_allergy/{allergy_id}', 'AdminController@editAllergy');

    Route::get('/admin_delete_allergy/{allergy_id}', 'AdminController@deleteAllergy');

    Route::get('/admin/products', 'AdminController@products');

    Route::post('/admin_add_product', 'AdminController@addProduct');

    Route::post('/admin_edit_product/{id}', 'AdminController@editProduct');

    Route::get('/admin_delete_product/{id}', 'AdminController@deleteProduct');

});
