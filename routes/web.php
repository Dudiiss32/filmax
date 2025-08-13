<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\FilmesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/teste', function () {
    return view('examples.tailwind-demo');
})->name('indexsss');

// Login
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', function () {
    return view('index');
})->name('login.index');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Cadastro
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', function () {
    return view('cadastro.index');
})->name('cadastro');


Route::middleware('auth')->group(function () {
    Route::get('/filmes', [FilmesController::class, 'index'])->name('filmes');
    Route::get('/filmes/verMais/{id}', [FilmesController::class, 'verMais'])->name('filmes.verMais');
    Route::post('/filmes/{filme}/favoritar', [FilmesController::class, 'favoritar'])->name('filmes.favoritar');
    Route::get('/favoritos', [FilmesController::class, 'favoritos'])->name('filmes.favoritos');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {

    // Filmes
    Route::prefix('/filmes')->group(function () {
        Route::get('/form', [FilmesController::class, 'form'])->name('filmes.form');
        Route::post('/store', [FilmesController::class, 'store'])->name('filmes.store');
        Route::get('/edit/{id}', [FilmesController::class, 'edit'])->name('filmes.edit');
        Route::delete('/delete/{id}', [FilmesController::class, 'delete'])->name('filmes.delete');
        Route::put('/update/{id}', [FilmesController::class, 'update'])->name('filmes.update');
    });

    // Categorias
    Route::prefix('/categorias')->group(function () {
        Route::get('/', [CategoriasController::class, 'index'])->name('categorias');
        Route::get('/form', [CategoriasController::class, 'form'])->name('categorias.form');
        Route::post('/store', [CategoriasController::class, 'store'])->name('categorias.store');
        Route::get('/edit/{id}', [CategoriasController::class, 'edit'])->name('categorias.edit');
        Route::delete('/delete/{id}', [CategoriasController::class, 'delete'])->name('categorias.delete');
        Route::put('/update/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
    });
});
