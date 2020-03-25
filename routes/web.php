<?php

use Illuminate\Support\Facades\Route;


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
Route::group(['prefix' => '/menu' , 'middleware' => 'isLoggedIn'], function() {
    Route::get('/',"ProductsController@index");
    Route::any('/search',"ProductsController@search");
});

Route::group(['prefix' => '/contact' ], function() {
    Route::get('/',"ContactController@index");
    Route::post('/',"UserController@contact");
});

Route::group(['prefix' => '/login'], function() {
    Route::any('/',"UserController@index");
    Route::get('/username/{valueUsername}',"UserController@usernameCheck");
    Route::get('/password/{resetPassword}/{idUser}',"UserController@resetPassword");

});

Route::group(['prefix' => '/admin' , 'middleware' => 'adminLogIn'], function() {
    Route::get('/',"Admin\AdminController@index");
    Route::get('/product/delete/{id}',"Admin\AdminController@deleteProductAjax");
    Route::get('/user/delete/{id}',"Admin\AdminController@deleteUserAjax");
    Route::get('/contact/delete/{id}',"Admin\AdminController@deleteContactAjax");
    Route::get('/subscribe/delete/{id}',"Admin\AdminController@deleteSubscribeAjax");
    Route::get('/editProduct/{id}',"Admin\AdminController@getOneProduct");
    Route::get('/editUser/{id}',"Admin\AdminController@getOneUser");
    Route::any('/formUpdateUser',"Admin\AdminController@updateUser");
    Route::get('/dateFilter',"Admin\AdminController@activityDate");
    Route::any('/insertProduct',"Admin\AdminController@insertProduct");
    Route::any('/updateProduct',"Admin\AdminController@updateProduct");
});

Route::pattern('id', '[0-9]+');
Route::get('/',"HomeController@index");
Route::group(['middleware' => 'isLoggedIn' ], function() {
    Route::get('/logout',"UserController@logOut");
    Route::get('/reservation',"ReservationController@index");
    Route::any('/reservation/form',"ReservationController@formData");
});
Route::any('/registration',"UserController@registration");
Route::any('/home/subscribe',"UserController@subscribe");
Route::get('/author',"AuthorController@index");
Route::get('/services',"ServicesController@index");
Route::post('/sendemail/send', 'ContactController@send');


