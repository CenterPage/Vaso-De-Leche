<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', 'ApiController@getCategory')->name('categories.index');
Route::get('/categories/{category}', 'ApiController@showCategory')->name('categories.show');