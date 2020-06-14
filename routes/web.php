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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/flims', 'FlimController@index')->name('flim.index');
    Route::get('/flims/get', 'FlimController@get')->name('flim.get');
    Route::get('flims/create', 'FlimController@create')->name('flim.create');
    Route::post('flims', 'FlimController@store')->name('flim.store');
    Route::get('flims/{slug}', 'FlimController@show')->name('flim.show');
});
