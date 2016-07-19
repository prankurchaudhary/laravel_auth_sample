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
/*$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\AuthController@getSocialHandle']);

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('auth/google', 'Auth\AuthController@redirectToGProvider');
Route::get('auth/google/callback', 'Auth\AuthController@handleGProviderCallback');
*/

Route::get('auth/{provider}', 'SocialController@getSocialAuth');
Route::get('auth/{provider}/callback', 'SocialController@getSocialAuthCallback');


Route::auth();

#Route::get('/home', 'HomeController@index');
Route::get('home', array('as' => 'home', 'uses' => function(){
  return view('home');
}));
