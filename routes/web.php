<?php

use App\Http\Controllers\AlumniController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('alumni')->group(function () {
    Route::get('/', [AlumniController::class, 'index'])->name('alumni.index');
    Route::post('/', [AlumniController::class, 'store'])->name('alumni.store');
    Route::get('/create', [AlumniController::class, 'create'])->name('alumni.create');
    Route::get('/{alumni}', [AlumniController::class, 'show'])->name('alumni.show');
    Route::get('/{alumni}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
    Route::patch('/{alumni}/edit', [AlumniController::class, 'update'])->name('alumni.update');
    Route::delete('/{alumni}', [AlumniController::class, 'destroy'])->name('alumni.destroy');
});