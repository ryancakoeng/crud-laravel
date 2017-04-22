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

Route::group(['prefix' => 'jurusan'], function(){

	Route::get('/', 'JurusanController@index');
	Route::get('/create', 'JurusanController@create');
	Route::post('/store', 'JurusanController@store');
	Route::get('/show/{id}', 'JurusanController@show');
	Route::post('/update/{id}', 'JurusanController@update');
	Route::delete('/destroy/{id}', 'JurusanController@destroy');

});

//Route::resource('latihan', 'JurusanController');

Route::group(['prefix' => 'mahasiswa'], function(){

	Route::get('/', 'MahasiswaController@index');
	Route::get('/create', 'MahasiswaController@create');
	Route::post('/store', 'MahasiswaController@store');
	Route::get('/show/{id}', 'MahasiswaController@show');
	Route::post('/update/{id}', 'MahasiswaController@update');
	Route::delete('/destroy/{id}', 'MahasiswaController@destroy');

});
