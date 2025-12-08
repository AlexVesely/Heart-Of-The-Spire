<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth','verified')->group(function () {

    Route::get('/cards', [CardController::class, 'index'])->name('cards.index');
    Route::get('/cards/create', [CardController::class, 'create'])->name('cards.create');
    Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
    Route::get('/cards/{id}', [CardController::class, 'show'])->name('cards.show');
    Route::delete('/cards/{id}', [CardController::class, 'destroy'])->name('cards.destroy');

});

Route::middleware('auth','verified')->group(function () {

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Show the edit form
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Handle the form submission to update the post
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
});

Route::middleware('auth','verified')->group(function () {
    Route::get('/profiles/{id}', [ProfileController::class, 'show'])->name('profiles.show');
});


Route::middleware('auth','verified')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Show the edit form
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');

    // Handle the form submission to update the post
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
