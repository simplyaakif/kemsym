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


Route::get('/session', function () {
    // Session::forget('cart');
    dd(session()->has('cart'));
});



Route::get('/add-to-cart/{id}', [
    'uses'=>'ProductsController@getAddToCart',
    'as'=>'product.addToCart'
]);

Route::get('/add-to-carts/{id,quantity}', [
    'uses'=>'ProductsController@getAddToCarts',
    'as'=>'product.addToCarts'
]);

Route::get('/shopping-cart', [
    'uses'=>'ProductsController@getCart',
    'as'=>'product.shoppingCart'
]);

Route::get('/remove/{id}', [
    'uses'=>'ProductsController@getRemoveItem',
    'as'=>'product.remove'
]);

Route::get('/goals', 'SiteController@goals');
Route::get('/mission', 'SiteController@mission');
Route::get('/vision', 'SiteController@vision');
Route::get('/contact', 'SiteController@contact');
Route::get('/subs', 'SiteController@subs');
Route::get('/statement', 'SiteController@statement');
Route::get('/register-pending', 'SiteController@pending');
Route::get('/visitor/dashboard', 'SiteController@visitor');

Auth::routes();

//Contact Section
Route::get('/api/contacts', 'ContactController@index');
Route::get('/api/contacts/{contact}','ContactController@show');
Route::post('/api/contacts', 'ContactController@store');
Route::put('/api/contacts', 'ContactController@store');
Route::delete('/api/contacts/{contact}', 'ContactController@destroy');
//Users Section
Route::get('/api/users', 'UsersController@index');
Route::get('/api/users/{user}','UsersController@show');
Route::post('/api/users', 'UsersController@store');
Route::put('/api/users', 'UsersController@store');
Route::delete('/api/users/{user}', 'UsersController@destroy');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dashboard','AdminController@index');
Route::get('/admin/contact','AdminController@contact');
Route::get('/admin/users','AdminController@users');
Route::get('/admin/subscription','AdminController@subscription');
Route::get('/admin/profile','AdminController@profile');
Route::get('/admin/products','AdminController@products');




//Shopping Cart Routes
Route::get('/product/{id}', [
    'uses'=>'ProductsController@singleProduct',
    'as'=>'product.singleProduct'
    ]);
    
    

//Products API
Route::get('/api/products', 'ProductsController@index');
Route::get('/api/products/{product}','ProductsController@show');
Route::post('/api/products', 'ProductsController@store');
Route::put('/api/products', 'ProductsController@store');
Route::delete('/api/products/{product}', 'ProductsController@destroy');