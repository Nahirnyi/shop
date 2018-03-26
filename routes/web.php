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

Route::group(['middleware' => 'auth'], function(){
	Route::get('/logout', 'AuthController@logout')->name('logout');
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::post('/profile', 'ProfileController@store')->name('profileStore');
});

Route::group(['middleware' => 'guest'], function(){
	Route::get('/superregister', 'AuthController@registerForm')->name('registerForm');
	Route::post('/superregister', 'AuthController@register')->name('register');
	Route::get('/superlogin', 'AuthController@loginForm')->name('loginForm');
	Route::post('/superlogin', 'AuthController@login')->name('login');
});


Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware' => 'admin'], function(){
	Route::get('/', 'DashboardController@index')->name('admin');
	Route::resource('/categories', 'CategoriesController');

	Route::resource('/orders', 'OrdersController');
	Route::get('/saw/orders/', 'OrdersController@sawIndex')->name('sawOrders');
	Route::put('/saw/orders/{id}', 'OrdersController@saw')->name('saw');
	Route::get('/road/orders/', 'OrdersController@roadIndex')->name('roadOrders');
	Route::put('/road/orders/{id}', 'OrdersController@road')->name('road');
	Route::get('/success/orders/', 'OrdersController@successIndex')->name('successOrders');
	Route::put('/success/orders/{id}', 'OrdersController@success')->name('successOrder');

	Route::resource('/users', 'UsersController');
	Route::resource('/mobiles', 'MobilesController');
	Route::get('/mobiles/count/{id}', 'MobilesController@count')->name('count');
	Route::put('/mobiles/count/{id}', 'MobilesController@changeCount')->name('changeCount');
	Route::get('/users/toggle/{id}', 'UsersController@toggle');
	Route::get('/users/togglestatus/{id}', 'UsersController@toggleStatus');
	Route::resource('/txt', 'TxtController');
	Route::get('/txt/success/{id}', 'TxtController@success')->name('success');
});
