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
// Route::group(['middleware' => ['guest']], function () {

Route::get('/', function () {
    return view('welcome');
}) -> name('welcome');

// Route::group(['middleware' => ['guest']], function () {
Route::group(['middleware' => ['guesto']], function () {
    Route::get('/user/login_register', 'UserLoginController@loginOrRegister') -> name('login_register');
});
// });

Route::get('/test', function() {
    return view('/test');
});

Route::get('/sanatate', function() {
    return view('health.home');
});

// Start user's auth routes
Route::get('/user/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/user/login', 'Auth\LoginController@login');
Route::post('/user/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/user/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/user/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/user/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/user/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/user/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/user/register', 'Auth\RegisterController@register');
// Stop user's auth routes

// Start admin's auth routes
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/admin/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
// Start admin's auth routes

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

    Route::post('/user/profile/edit', 'UserProfileController@update') -> name('user-update');

    Route::get('/restaurants', 'UserRestaurantsController@restaurants') -> name('restaurants');

    Route::get('/restaurant/{restaurant_id}/read', 'UserRestaurantsController@readRestaurant') -> name('read-restaurant');
});

Route::group(['middleware' => ['isAdmin'], 'prefix'=>'admin'], function () {

    Route::get('/admin', 'AdminController@menu');

    Route::get('/admin/allergies', 'AdminController@allergies');

    Route::post('/admin_add_allergy', 'AdminController@addAllergy');

    Route::post('/admin_edit_allergy/{allergy_id}', 'AdminController@editAllergy');

    Route::get('/admin_delete_allergy/{allergy_id}', 'AdminController@deleteAllergy');

    Route::get('/admin/products', 'AdminController@products');


    Route::post('/admin_edit_product/{id}', 'AdminController@editProduct');

    Route::get('/admin_delete_product/{id}', 'AdminController@deleteProduct');

    Route::post('/admin/add/products/csv', 'AdminController@parseCSV');

});

Route::group(['middleware' => ['auth', 'admin', 'isAdmin'], 'prefix'=>'admin'], function () {

    Route::get('/home', 'AdminController@home')->name('Panou de administrare');

    Route::get('/users', 'AdminController@users')->name('Utilizatori');

    Route::get('/doctors', 'AdminController@doctors')->name('Doctori');

    Route::get('/moderators', 'AdminController@moderators')->name('Moderatori');

    Route::get('/products', 'AdminController@products')->name('Produse');

    Route::get('/messages', 'AdminController@messages')->name('Mesaje');

    Route::get('/notifications', 'AdminController@notifications')->name('Notificari');

    Route::get('/drivers', 'AdminController@drivers')->name('Soferi');

    Route::get('/allergies', 'AdminController@allergies')->name('Alergii');

    Route::get('/restaurants', 'AdminController@restaurants')->name('Restaurante');

    Route::post('/add_restaurant', 'AdminController@addRestaurant')->name('Adauga restaurant');

    Route::post('/update_user/{user_id}', 'AdminController@updateUser')->name('Midifica utilizator - POST');

    Route::get('/ban_user/{user_id}', 'AdminController@banUser')->name('Baneaza / De-baneaza utilizatorul');

    Route::post('/answer_message/{id}', 'AdminController@answer')->name('Raspunde mesajelor utilizatorului');

    Route::get('/delete_message/{id}', 'AdminController@deleteMessage')->name('Sterge mesajul');

    Route::post('/add_allergy', 'AdminController@addAllergy');

    Route::post('/edit_allergy/{id}', 'AdminController@editAllergy');

    Route::get('/delete_allergy/{id}', 'AdminController@deleteAllergy');

    Route::get('/restaurant/active/orders', 'AdminOrdersController@activeOrders') -> name('restaruant-active-orders');

    Route::post('/add_product', 'AdminController@addProduct')->name('Adauga produs si sterge cerere');

    Route::get('/delete_product_request/{id}', 'AdminController@deleteRequest')->name('Sterge cerere de produs');

});

Route::post('/contact_us', 'AdminController@contactUs')->name('Form de contact');

Route::post('/send_request', 'PublicController@sendRequest')->name('Trimite cerere de adaugare produs');

Route::get('/lol', 'UserRestaurantsController@user');

Route::get('/restaurant', function(){
    return view('restaurant.home');
})->name('Restaurant acasa');

Route::get('/restaurant_profile', function(){
    return view('restaurant.profile');
})->name('Cica design restaurant :))');

// route::get('/lol', function(){
//     return bcrypt('password');
// });
