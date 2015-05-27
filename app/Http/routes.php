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
 Route::get ('/auth/login',  'Auth\AuthController@getLogin');
 Route::post('/auth/login',  'Auth\AuthController@postLogin');
 Route::get('/auth/register',  'Auth\AuthController@getRegister');
 Route::post('/auth/register',  'Auth\AuthController@postRegister');
 Route::get('/auth/logout',  'Auth\AuthController@getLogout');
 Route::get('user/profile', 'User\UserController@showProfile');
 #login social
// Redirect to github to authenticate
Route::get('github', 'Account\AccountController@github_redirect');

Route::get('account/github', 'Account\AccountController@github');
 Route::group(['before' => 'auth'], function()
{
    if (!Auth::guest()) { return Redirect::to('/hh'); };
});

#router username
Route::get('{username}/boards', 'User\UserController@show')->where('username', '[A-Za-z]+');
// Admin area
Route::get('kanri', function () {
  return redirect('/kanri/post');
});

/*Route::filter('kanri', function()
{
	// Login check (Default)
    if (Auth::guest()) return Redirect::guest('login');

    if(Auth::user()->role != 'su_admin') {
        return Redirect::to('/'); // Redirect home page
    }
});
 */
//Route::when('kanri/*', 'kanri');
Route::group([
  'prefix' => 'kanri',
  'middleware' => 'auth',
], function () {
	Route::get ('post',  'kanri\PostController@index');
	Route::get ('test',  'kanri\PostController@test');
	//Route::resource('kanri/post', 'kanri\PostController@index');
  
});
//tesst router 
Route::get('user/profile', [
    'as' => 'profile', 'uses' => 'UserController@showProfile'
]);