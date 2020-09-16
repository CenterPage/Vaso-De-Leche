<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/stablishments', 'ApiController@index')->name('stablishments.index');
Route::get('/stablishments/{stablishment}', 'ApiController@show')->name('stablishments.show');

Route::get('/categories', 'ApiController@getCategory')->name('categories.index');
Route::get('/categories/{category}', 'ApiController@showCategory')->name('categories.show');

Route::get('/{category}', 'ApiController@stablishmentCategory')->name('categories');