<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('location', 'LocationController@index');
// Route::get('location/{id}', 'LocationController@show');
// Route::post('location', 'LocationController@store');
// Route::put('location/{id}', 'LocationController@update');
// Route::delete('location/{id}', 'LocationController@delete');
Route::resource('location', 'LocationController');
