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

// Route::get('events','EventController@index');

// Route::get('events/create','EventController@create');

// Route::get('events/{id}','EventController@show');

// Route::post('events','EventController@store')->name('events.store');

// Route::delete('events/{id}', 'EventController@destroy');

// Route::get('events/{id}/edit','EventController@edit')->name('events.edit');

// Route::put('/events/{id}', 'EventController@update')->name('events.update');

	Route::resource('events-ajax','EventAjaxController');