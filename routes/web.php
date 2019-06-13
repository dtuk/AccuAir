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

Route::get('/reports/textual', 'HomeController@getTextual');

Route::get('/search','ReadingController@index');
