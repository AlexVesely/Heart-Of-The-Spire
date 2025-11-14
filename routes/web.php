<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/secret', function () {
    return "Haha this is a secret";
})->middleware(['auth']);

Route::get('/passdata/{test?}', function($test = null) {
    return view('passdata', ['test'=>$test]);
});

Route::get('/card', function() {
    return view('card');
});

Route::get('/cards', [CardController::class, 'index'])->name('cards.index');

Route::get('/cards/create', [CardController::class, 'create'])->name('cards.create');

Route::post('/cards', [CardController::class, 'store'])->name('cards.store');

Route::get('/cards/{id}', [CardController::class, 'show'])->name('cards.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
