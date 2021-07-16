<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login','AuthController@login');
    Route::post('register','AuthController@register');
    Route::post('forget_password','AuthController@forget_password');
    Route::post('check_reset_code','AuthController@check_reset_code');
    Route::post('reset_password','AuthController@reset_password');
    Route::group([
       // 'middleware' => 'auth:api'
    ], function() {
        Route::get('me','AuthController@show');
        Route::post('refresh','AuthController@refresh');
        Route::post('update','AuthController@update');
        Route::get('resend_verify', 'AuthController@resend_verify');
        Route::post('verify', 'AuthController@verify');
        Route::post('change_password','AuthController@change_password');
        Route::post('logout','AuthController@logout');
    });
});
Route::group([
    //'middleware' => 'auth:api'
], function() {
    Route::group([
        'prefix' => 'notifications',
    ], function() {
        Route::get('/', 'NotificationController@index');
        Route::post('send', 'NotificationController@send');
        Route::post('read', 'NotificationController@read');
        Route::post('read/all', 'NotificationController@read_all');
    });
});

Route::group([
    'prefix' => 'advertisements',
], function() {
    Route::get('/','AdvertisementController@index');
    Route::get('show','AdvertisementController@show');
    Route::group([

    ], function() {
        Route::post('store','AdvertisementController@store');
        Route::post('update','AdvertisementController@update');
        Route::post('destroy','AdvertisementController@destroy');
    });
});
Route::group([
    'prefix' => 'home',
], function() {
    Route::get('install','HomeController@install');
    Route::get('faqs','HomeController@faqs');
    Route::get('advertisements','HomeController@advertisements');
    Route::get('slider','HomeController@slider');
    Route::post('add_slider','HomeController@add_slider');
    Route::get('categories','HomeController@categories');
    Route::get('get_freelancers','HomeController@get_freelancers');
    Route::get('get_freelancer','HomeController@get_freelancer');
    Route::get('get_reviews','HomeController@get_reviews');
});

