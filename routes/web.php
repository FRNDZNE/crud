<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ShowController;

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

Route::prefix('film')->group(function(){
    Route::get('/',[FilmController::class,'index'])->name('film.index');
    Route::get('/create',[FilmController::class,'create'])->name('film.create');
    Route::get('/edit/{id}',[FilmController::class,'edit'])->name('film.edit');
    Route::get('/show/{id}',[FilmController::class,'show'])->name('film.show');
    Route::get('/show-deletes',[FilmController::class,'showDeletes'])->name('film.show.delete');
    Route::post('/store',[FilmController::class,'store'])->name('film.store');
    Route::put('/update/{id}',[FilmController::class,'update'])->name('film.update');
    Route::delete('/destroy/{id}',[FilmController::class,'destroy'])->name('film.destroy');
    Route::post('/restore/{id}',[FilmController::class,'restore'])->name('film.restore');
    Route::post('/force/{id}',[FilmController::class,'forceDelete'])->name('film.force');
});

Route::get('showing-data',[ShowController::class,'index'])->name('show');

Route::get('/template',function(){
    return view('layouts.template');
});

require __DIR__.'/auth.php';
