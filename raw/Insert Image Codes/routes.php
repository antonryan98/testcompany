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

Route::get('demo-dashboard', function () {
    return view('demo_dashboard');
});
Route::get('demo-add-image', function () {
    return view('add_image');
});
Route::post('insert-image', 'RegisterController@addImage');
Route::get('view-images', function () {
    return view('view_images');
});
Route::get('get-image2', 'RegisterController@getImage2');
Route::post('view-get-user-byID-2', 'RegisterController@getUserById2');