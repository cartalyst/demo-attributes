<?php

Route::get('/', function()
{
	return view('home');
});

Route::resource('patients', 'PatientsController');
Route::resource('attributes', 'AttributesController');
Route::get('attributes/{id}/delete', 'AttributesController@destroy');
