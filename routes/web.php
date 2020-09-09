<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('stablishments', 'StablishmentController');

Route::post('/photos/store', 'PhotoController@store')->name('photos.store');
Route::post('/photos/destroy', 'PhotoController@destroy')->name('photos.destroy');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
