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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

// Units Table
Route::get('/units', 'UnitsController@index');

Route::get('/units/{id}', 'UnitsController@view');

//To Do Create Route

Route::put('/units/{id}', 'UnitsController@update');