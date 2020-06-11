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
Route::get('/places','PlaceController@index');
Route::get('/places/{id}','PlaceController@show');
Route::get('places/{id}/photos/add','PlaceController@addphoto');
Route::get('/places/create','PlaceController@create')->name('addplace');
Route::post('/places/create/data','PlaceController@createpost')->name('postcreate');
