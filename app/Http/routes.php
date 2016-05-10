<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
/*Route::controllers([
    'auth'=> 'Auth\AuthController',
    'password'=> 'Auth\PasswordController',]);*/
Route::get('home', 'HomeController@index');
Route::get('auth/getLogin', ['as'=>'getLogin', 'uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as'=>'postLogin', 'uses'=>'Auth\AuthController@postLogin']);
