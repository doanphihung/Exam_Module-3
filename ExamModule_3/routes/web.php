<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\AgencyController::class, 'index'])->name('agency.index');
Route::get('/create', [\App\Http\Controllers\AgencyController::class, 'create'])->name('agency.create');
Route::post('/create', [\App\Http\Controllers\AgencyController::class, 'store'])->name('agency.store');
Route::get('/{id}/destroy', [\App\Http\Controllers\AgencyController::class, 'destroy'])->name('agency.destroy');
Route::get('/{id}/edit', [\App\Http\Controllers\AgencyController::class, 'edit'])->name('agency.edit');
Route::post('/{id}/edit', [\App\Http\Controllers\AgencyController::class, 'update'])->name('agency.update');
Route::post('/search', [\App\Http\Controllers\AgencyController::class, 'search'])->name('agency.search');
