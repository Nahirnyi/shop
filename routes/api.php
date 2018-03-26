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

Route::get('/mobiles','Api\MobileController@getMobiles');
Route::get('/users/{identifier}','Api\MobileController@checkEmail');

Route::get('/max','Api\MobileController@getMaxPrice');
Route::get('/min','Api\MobileController@getMinPrice');
Route::post('/order','Api\MobileController@getOrderMobiles');
Route::post('/register','Api\MobileController@registerUsers');
Route::post('/login','Api\MobileController@loginUsers');
Route::get('/more/mobile/{number}','Api\MobileController@moreMobile');
Route::get('/mobile/{id}','Api\MobileController@getMobile');
Route::get('/categories','Api\MobileController@getCategories');
Route::get('/all/mobiles','Api\MobileController@getAllMobiles');