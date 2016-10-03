<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::resource('home', 'Home\HomeController');

Route::resource('cart', 'Home\ShoppingCartController');

Route::resource('order', 'Home\OrderController');

Route::get('social/redirect/{type}', 'Auth\LoginController@redirectToProvider');

Route::get('social/callback/{driver}', 'Auth\LoginController@handleProviderCallback');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::resource('/', 'Admin\AdminController');

    Route::resource('category', 'Admin\CategoriesController');

    Route::resource('product', 'Admin\ProductController');
});
