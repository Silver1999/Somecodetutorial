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
Route::get('/places','PlaceController@index')->name('places');
Route::get('/places/{id}','PlaceController@show')->name('placeshow')->where('id','[0-9]+');
Route::post('places/{id}','PlaceController@addphoto')->name('addphoto')->where('id','[0-9]+');
Route::get('/places/create','PlaceController@create')->name('addplace');
Route::post('/places/create','PlaceController@createpost')->name('postcreate');

Route::get('localhost/photos/add','AnotherphotoController@show')->name('another.photo');
Route::post('localhost/photos/add','AnotherphotoController@add')->name('another.photo.create');
