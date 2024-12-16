<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\routeController;
use App\Http\Controllers\PostController;

//HOJA DE RUTAS
//----------------------------------------------------------------------------------------------------------------------------------
Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/home', [routeController::class, 'home'])->name('home');
;

Route::get('/contact', [routeController::class, 'contact'])->name('contact');
;

Route::get('/add', [PostController::class, 'add'])->name('add');
;

Route::get('/update', [PostController::class, 'viewupdate'])->name('update');
;

Route::post('/songs/store', [PostController::class, 'store'])->name('songs.store');

Route::post('/songs/update/{id}', [PostController::class, 'update'])->name('songs.update');

Route::post('/songs/delete/{id}', [PostController::class, 'destroy'])->name('songs.delete');

Route::get('/stats', [routeController::class, 'stats'])->name('stats');


// Dashboard (No se por que, aunque no haya vista de dashboard, si no esta esto me daba error)
Route::get('/dashboard', function () {
    return 'dashboard';
})->name('dashboard');

