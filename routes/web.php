<?php

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


Route::get('/', function () {
    return view('partials/block');
});

Route::get('/goals', 'SiteController@goals');
Route::get('/mission', 'SiteController@mission');
Route::get('/vision', 'SiteController@vision');
Route::get('/contact', 'SiteController@contact');
Route::get('/statement', 'SiteController@statement');
Route::get('/register-pending', 'SiteController@pending');
Route::get('/visitor/dashboard', 'SiteController@visitor');

Auth::routes();

//Contact Section
Route::get('/kemmet/api/contacts', 'ContactController@index');
Route::get('/kemmet/api/contacts/{contact}','ContactController@show');
Route::post('/kemmet/api/contacts', 'ContactController@store');
Route::put('/kemmet/api/contacts', 'ContactController@store');
Route::delete('/kemmet/api/contacts/{contact}', 'ContactController@destroy');
//Users Section
Route::get('/kemmet/api/users', 'UsersController@index');
Route::get('/kemmet/api/users/{user}','UsersController@show');
Route::post('/kemmet/api/users', 'UsersController@store');
Route::put('/kemmet/api/users', 'UsersController@store');
Route::delete('/kemmet/api/users/{user}', 'UsersController@destroy');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dashboard','AdminController@index');
Route::get('/admin/contact','AdminController@contact');
Route::get('/admin/users','AdminController@users');
Route::get('/admin/subscription','AdminController@subscription');
Route::get('/admin/profile','AdminController@profile');