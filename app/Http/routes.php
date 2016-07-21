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

/* These routes are commoon for all service providers so no need to change annything here */
Route::get('auth/{provider}', 'SocialController@getSocialAuth');
Route::get('auth/{provider}/callback', 'SocialController@getSocialAuthCallback');


Route::auth();

#Route::get('/home', 'HomeController@index');
Route::get('home', array('as' => 'home', 'uses' => function(){
  return view('home');
}));
