<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;



Route::get('/login', [LoginController::class, 'login'])->name('login')
->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])
->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])
->middleware('guest');

Route::controller(BeritaController::class)->group(function () {
    Route::get('/olah-berita', 'index');
    Route::get('/olah-berita/create', 'create');
    Route::post('/olah-berita', 'store');
    Route::get('/olah-berita/{id}', 'show');
    Route::get('/olah-berita/edit/{id}', 'edit');
    Route::put('/olah-berita/{id}', 'update');
    Route::delete('/olah-berita/{id}', 'destroy');
});

Route::get('/', function () {
    return view('beranda');
});

Route::get('/berita', function () {
    return view('berita');
});
Route::get('/beranda', function () {
    return view('beranda');
});
Route::get('/profil', function () {
    return view('profil');
});

