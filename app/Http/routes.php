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

// Display the landing page
Route::get('/', function () {
    return view('landing');
});

// Authentication routes
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Social authentication routes
Route::get(
    'login/{provider}',
    'Auth\AuthController@redirectToProvider'
);
Route::get(
    'login/{provider}/callback',
    'Auth\AuthController@handleProviderCallback'
);

Route::get('dashboard', 'UserProfileController@show');

// User profile routes
Route::get('user/{id}/edit', 'UserProfileController@edit');
Route::post('user/{id}/update', 'UserProfileController@update');
