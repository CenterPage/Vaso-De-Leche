<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('stablishments', 'StablishmentController');

Route::post('/images/store', 'ImageController@store')->name('images.store');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
