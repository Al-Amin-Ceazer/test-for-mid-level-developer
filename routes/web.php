<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/second-buyer-eloquent', 'HomeController@secondBuyerEloquent');
Route::get('/second-buyer-no-eloquent', 'HomeController@secondBuyerNoEloquent');
Route::get('/purchase-list-eloquent', 'HomeController@purchaseListEloquent');
Route::get('/purchase-list-no-eloquent', 'HomeController@purchaseListNoEloquent');
Route::get('/record-transfer', 'HomeController@recordTransfer');

Route::get('/define-callback-js', function () {
    return view('callback');
});

Route::get('/sort-js', function () {
    return view('sort');
});

Route::get('/foreach-js', function () {
    return view('foreach');
});

Route::get('/filter-js', function () {
    return view('filter');
});

Route::get('/map-js', function () {
    return view('map');
});

Route::get('/reduce-js', function () {
    return view('reduce');
});
