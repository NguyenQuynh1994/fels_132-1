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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('authen/getLogin', [
    'as' => 'getLogin',
    'uses' => 'Auth\AuthController@getLogin'
]);
Route::post('authen/login', [
    'as' => 'postLogin',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::resource('profiles', 'UserController', ['only' => ['show', 'edit', 'update']]);
    Route::get('/profiles/getChangePass/{id}', ['as' => 'user.profiles.getChangePass', 'uses' => 'UserController@getChangePass']);
    Route::post('/profiles/postChangePass/{id}', ['as' => 'user.profiles.postChangePass', 'uses' => 'UserController@postChangePass']);
});

Route::get('word/', [
    'middleware' => 'auth',
    'as' => 'wordList',
    'uses' => 'WordController@index'
]);

