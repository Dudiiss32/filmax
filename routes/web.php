<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\FilmesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

// Login
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Filmes
Route::prefix('/filmes')->group(function(){
    Route::get('/', [FilmesController::class, 'index'])->name('filmes');
    Route::get('/form', [FilmesController::class, 'form'])->name('filmes.form');
    Route::post('/store', [FilmesController::class, 'store'])->name('filmes.store');
    Route::get('/edit/{id}', [FilmesController::class, 'form'])->name('filmes.edit');
    Route::delete('/delete/{id}', [FilmesController::class, 'delete'])->name('filmes.delete');
    Route::put('/update/{id}', [FilmesController::class, 'update'])->name('filmes.update');
});


// Categorias
Route::prefix('/categorias')->group(function(){
    Route::get('/', [CategoriasController::class, 'index'])->name('categorias');
    Route::get('/form', [CategoriasController::class, 'form'])->name('categorias.form');
    Route::post('/store', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('/edit/{id}', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::delete('/delete/{id}', [CategoriasController::class, 'delete'])->name('categorias.delete');
    Route::put('/update/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
});
