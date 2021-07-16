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

Route::get('/', ['uses' => 'HomeController@web','as'=>'index']);
Route::get('login', ['uses' => 'HomeController@login','as'=>'login']);
Route::get('register', ['uses' => 'HomeController@Register','as'=>'register']);
Route::get('categories', ['uses' => 'HomeController@categories','as'=>'categories']);
Route::get('advertisements', ['uses' => 'HomeController@advertisements','as'=>'advertisements']);
Route::get('home', ['uses' => 'HomeController@home','as'=>'home']);
Route::get('about', ['uses' => 'HomeController@about','as'=>'about']);
Route::get('profile', ['uses' => 'HomeController@profile','as'=>'profile']);
Route::get('privacy', ['uses' => 'HomeController@privacy','as'=>'privacy']);
Route::group([
    'namespace'  => 'Advertisements',
    'middleware' => 'auth:web',
], function() {
    Route::get('my_advs', ['uses' => 'advertismentController@index','as'=>'my_advs']);
    Route::get('add_adv', ['uses' => 'advertismentController@add_adv','as'=>'add_adv']);
    Route::get('edit_adv', ['uses' => 'advertismentController@edit_adv','as'=>'edit_adv']);
    Route::get('store', ['uses' => 'advertismentController@store','as'=>'store']);
    Route::get('update', ['uses' => 'advertismentController@update','as'=>'update']);
    Route::get('destroy', ['uses' => 'advertismentController@destroy','as'=>'destroy']);
});
Route::group([
    'namespace'  => 'Profile',
    'middleware' => 'auth:web',
], function() {
    Route::get('me', ['uses' => 'authenticationController@my_profile','as'=>'my_advs']);
    Route::get('edit', ['uses' => 'authenticationController@edit_profile','as'=>'edit']);
    Route::get('update', ['uses' => 'authenticationController@update_profile','as'=>'update']);
    Route::get('signin', ['uses' => 'authenticationController@login','as'=>'signin']);
    Route::get('signup', ['uses' => 'authenticationController@register','as'=>'signup']);
    Route::get('logout', ['uses' => 'authenticationController@logout','as'=>'logout']);
});
Route::get('/', 'HomeController@index');
Route::get('/privacy', 'HomeController@privacy');
Route::get('user/verify', 'HomeController@verify');
