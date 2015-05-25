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

Route::get('/', 'front\FrontController@index');
Route::resource('kanri/post', 'kanri\PostController@index');
Route::post('tess/ajax',  'front\FrontController@pregunta');

//
 Route::get ('login',  'Auth\AuthController@getLogin');
 Route::post('login',  'Auth\AuthController@postLogin');
 Route::get('register',  'Auth\AuthController@getRegister');
 Route::post('register',  'Auth\AuthController@postRegister');
 Route::get('logout',  'Auth\AuthController@getLogout');
 Route::group(['before' => 'auth'], function()
{
    if (!Auth::guest()) { return Redirect::to('/'); };
});