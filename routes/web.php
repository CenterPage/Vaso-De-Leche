<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('welcome');

Route::resource('stablishments', 'StablishmentController');

Route::post('/photos/store', 'PhotoController@store')->name('photos.store');
Route::post('/photos/destroy', 'PhotoController@destroy')->name('photos.destroy');

Route::get('/buscar-comite', 'search\SearchStablishment@search')->name('search.comite');

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
