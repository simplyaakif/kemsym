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

Auth::routes();

Route::post('api/contacts', 'ContactController@store');

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/dashboard','AdminController@index');