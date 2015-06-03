<?php

Route::get('/', function()
{
	return View::make('home');
});

Route::resource('patients', 'PatientsController');
Route::resource('attributes', 'AttributesController');
Route::get('attributes/{id}/delete', 'AttributesController@destroy');
