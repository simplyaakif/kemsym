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

Route::get('/paywithcard', 'PaypalPaymentController@paywithCreditCard');
Route::get('/paywithpaypal', 'PaypalPaymentController@paywithPaypal');


Route::get('/', function () {
    return view('partials/block');
});

Route::get('/wip', function () {
    return view('pages/wip');
});


Route::get('/session', function () {
    // Session::forget('cart');
    dd(session()->get('cart'));
});


Route::get('/checkout', [
    'uses'=>'ProductsController@checkout',
    'as'=>'product.checkout'
]);


Route::get('/add-to-cart/{id}', [
    'uses'=>'ProductsController@getAddToCart',
    'as'=>'product.addToCart'
]);

Route::get('/add-to-carts/{id}/{price_id}', [
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
Route::get('/admin/products','AdminController@products');


//Shopping Cart Routes
Route::get('/product/{id}', [
    'uses'=>'ProductsController@singleProduct',
    'as'=>'product.singleProduct'
    ]);
    
    

//Products API
Route::get('/kemmet/api/products', 'ProductsController@index');
Route::post('/kemmet/api/products/image', 'ProductsController@imgupload');
Route::get('/kemmet/api/products/{product}','ProductsController@show');
Route::post('/kemmet/api/products', 'ProductsController@store');
Route::put('/kemmet/api/products', 'ProductsController@store');
Route::delete('/kemmet/api/products/{product}', 'ProductsController@destroy');