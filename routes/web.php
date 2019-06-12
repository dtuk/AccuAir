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

Route::get('/search','ReadingController@index');
