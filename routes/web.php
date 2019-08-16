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
    return view('welcome');
});


Route::get('/getsensor', function () {
    return view('getsensor');
});

Route::post('/sensor', 'ReadingController@report');



Route::get('/map', function () {
    return view('map');
});

Route::get('/about',function(){
    return view('  about.index');
})->name('about.index');

Route::get('/terms',function(){
    return view('  terms.index');
})->name('terms.index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reports/graphioal', 'HomeController@getGraphical');

Route::post('/reports/graphical', 'HomeController@graphical');

Route::post('/reports/textual', 'HomeController@textual');

Route::post('/store', 'OrderController@store');

Route::get('/customer', 'OrderController@post');



Route::get('/reports/textual', 'HomeController@getTextual');

Route::get('/search','ReadingController@index');

Route::get('/products', 'ProductsController@index');
 
Route::get('cart', 'ProductsController@cart');
 
Route::get('add-to-cart/{id}', 'ProductsController@addToCart');

Route::patch('update-cart', 'ProductsController@update');
 
Route::delete('remove-from-cart', 'ProductsController@remove');
    
Route::get('stripe', 'StripePaymentController@stripe')->name('stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::get('invoices', function (){
    \Stripe\Stripe::setApiKey('sk_test_cQLq5PIwrddJM7RV6drAZKLs00k57KiueJ');
    $invoices = auth()->user()->invoices();
    return view('invoices', ['invoices' => $invoices]);
});

Route::get('invoices/{id}', function ($id){
    \Stripe\Stripe::setApiKey('sk_test_cQLq5PIwrddJM7RV6drAZKLs00k57KiueJ');
    $invoices = \App\User::findOrFail($id)->invoices();
    return view('invoices', ['invoices' => $invoices]);
});

Route::get('user/invoice/{invoice}', function (\Illuminate\Http\Request $request, $invoiceId) {
    \Stripe\Stripe::setApiKey('sk_test_cQLq5PIwrddJM7RV6drAZKLs00k57KiueJ');
    return $request->user()->downloadInvoice($invoiceId, [
        'vendor'  => 'AccuAir',
        'product' => 'AccuAir - Air Quality Monitoring system',
    ]);
});

Route::post('/orderupdate/{id}', 'OrderController@orderupdate');

Route::resource('admin', 'AdminController');


Route::resource('key', 'KeyController');
