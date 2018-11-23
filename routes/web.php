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


Route::get('/clearC',function(){
    Session::forget('cart');
    echo 'Cart Cleard';
});

Route::get('/showC',function(){
    dd(session()->get('cart'));
});

Route::get('/test', function(){
    $user = Auth::user();
    $userDetails = $user->userdata;
    printf($user) ;
    printf($userDetails) ;
});



Route::get('/qty-update/{item_id}/{qty}','ProductsController@qtyUpdate');


Route::get('/paywithcard', 'PaypalPaymentController@paywithCreditCard');
Route::get('/paywithpaypal', 'PaypalPaymentController@paywithPaypal');


Route::post('/paypalpaymentshow/{payment_id}', 'PaypalPaymentController@show');


Route::get('/paypalpayments', 'PaypalPaymentController@index');


Route::get('/payments/success', 'ProductsController@paymentApproved');

Route::post('pays/paywithpaypallive', 'PaypalPaymentController@paywithPaypal_live');
Route::post('pays/paywithcardlive', 'PaypalPaymentController@paywithCreditCard_live');



Route::get('create_paypal_plan', 'BillPlanController@create_plan');
Route::get('subscribe/paypal/', 'BillPlanController@paypalRedirect')->name('paypal.redirect');

Route::get('subscribe/paypal/return', 'BillPlanController@paypalReturn')->name('paypal.return');

Route::get('/get-agreement/', 'BillPlanController@agreementDetails');

Route::post('/api/get-agreements/', 'BillPlanController@agDetails');

Route::get('/monthly-plan-checkout/{id}/{price_id}', [
    'uses'=>'ProductsController@getMonthlyCheckout',
    'as'=>'product.getMonthlyCheckout'
])->middleware('auth');



Route::get('/', function () {
    return view('partials/block');
});

Route::get('/wip', function () {
    return view('pages/wip');
});


Route::get('/session', function () {
    Session::forget('cart');
    dd(session()->get('cart'));
});


Route::get('/checkout', [
    'uses'=>'ProductsController@checkout',
    'as'=>'product.checkout'
])->middleware('auth');


Route::get('/add-to-cart/{id}', [
    'uses'=>'ProductsController@getAddToCart',
    'as'=>'product.addToCart'
]);

Route::get('/add-to-carts/{id}/{price_id}/{quantity}', [
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
Route::get('/visitor/dashboard', 'SiteController@visitor')->name('profile');
Route::get('/pricing-structure', 'SiteController@pStructure');

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
Route::get('/admin/orders','AdminController@orders');
Route::get('/admin/subscriptions','AdminController@subscriptions');
Route::get('/admin/profile','AdminController@profile')->name('admin.profile');
Route::get('/admin/products','AdminController@products');


//Shopping Cart Routes
Route::get('/product/{id}', [
    'uses'=>'ProductsController@singleProduct',
    'as'=>'product.singleProduct'
    ]);
    
    

//Products API
Route::get('/api/products', 'ProductsController@index');
Route::post('/api/products/image', 'ProductsController@imgupload');
Route::get('/api/products/{product}','ProductsController@show');
Route::post('/api/products', 'ProductsController@store');
Route::put('/api/products', 'ProductsController@store');
Route::delete('/api/products/{product}', 'ProductsController@destroy');




//Products&Services

Route::get('/products/consulting', 'SiteController@consulting');
Route::get('/products/company-screening', 'SiteController@company_screening');
Route::get('/products/applicants-employees', 'SiteController@applicants_employees');
Route::get('/products/verification-validation', 'SiteController@verifciation_validation');
Route::get('/products/document-authentication', 'SiteController@document_authentication');
Route::get('/products/credit-rating', 'SiteController@credit_rating');