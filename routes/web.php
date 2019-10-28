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

use App\Http\Controllers\Demo\HomeController;
use App\Http\Controllers\Demo\PatientsController;
use App\Http\Controllers\Demo\AttributesController;

Route::get('/', function () {
    return redirect('/demo');
    // return view('welcome');
});

Route::prefix('/demo')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('demo.home');

    Route::get('/attributes', [AttributesController::class, 'index'])->name('demo.attributes.index');
    Route::get('/attributes/create', [AttributesController::class, 'create'])->name('demo.attributes.create');
    Route::post('/attributes/create', [AttributesController::class, 'store'])->name('demo.attributes.store');
    Route::get('/attributes/{id}', [AttributesController::class, 'edit'])->name('demo.attributes.edit');
    Route::post('/attributes/{id}', [AttributesController::class, 'update'])->name('demo.attributes.update');
    Route::get('/attributes/{id}/delete', [AttributesController::class, 'delete'])->name('demo.attributes.delete');

    Route::get('/patients', [PatientsController::class, 'index'])->name('demo.patients.index');
    Route::get('/patients/create', [PatientsController::class, 'create'])->name('demo.patients.create');
    Route::post('/patients/create', [PatientsController::class, 'store'])->name('demo.patients.store');
    Route::get('/patients/{id}', [PatientsController::class, 'edit'])->name('demo.patients.edit');
    Route::post('/patients/{id}', [PatientsController::class, 'update'])->name('demo.patients.update');
    Route::get('/patients/{id}/delete', [PatientsController::class, 'delete'])->name('demo.patients.delete');
});
