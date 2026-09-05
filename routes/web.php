<?php

use App\Http\Controllers\MinisteriosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.dashboards');
})->name('welcome');



Route::prefix('publico')->name('publico.')->group(function () {

    Route::get('/eventos', function () {
        return view('publico.evento.index');
    })->name('eventos.index');

    Route::get('/programa', function () {
        return view('publico.programa.index');
    })->name('programa.index');
});



Route::prefix('admin')->middleware(['auth', 'verified', 'verificacion-estado', "verificacion-rol:Pastor,Admin"])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('home.dashboards');
    })->name('dashboard');

    Route::resource('user', UserController::class)->except('edit');
    Route::resource('ministerios', MinisteriosController::class)->except('edit');
});


Route::middleware('auth', 'verificacion-estado')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
