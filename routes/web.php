<?php

use App\Http\Controllers\LivrosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/create', 'create')->name('series.create');
    Route::post('/series/store', 'store')->name('series.store');
    Route::delete('/series/destroy/{serie}', 'destroy')->whereNumber('series')->name('series.destroy');
    Route::get('series/edit/{serie}', 'edit')->name('series.edit');
    Route::put('series/update/{serie}', 'update')->name('series.update');
});

Route::controller(LivrosController::class)->group(function () {
    Route::get('/livros', 'index')->name('livros.index');
    Route::get('/livros/create', 'create')->name('livros.create');
    Route::post('/livros/store', 'store')->name('livros.store');
    Route::delete('/livros/destroy/{livro}', 'destroy')->whereNumber('livros')->name('livros.destroy');
    Route::get('livros/edit/{livro}', 'edit')->name('livros.edit');
    Route::put('livros/update/{livro}', 'update')->name('livros.update');
});
require __DIR__.'/auth.php';
