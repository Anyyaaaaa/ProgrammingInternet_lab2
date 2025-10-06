<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // Цей рядок у вас є, це добре
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

 // Переконайтесь, що цей use є нагорі файлу

// Маршрут для збереження коментаря до конкретного поста
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
    ->name('posts.comments.store')
    ->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// -------------------------------------------------------------------
// ОСЬ ЦЕЙ БЛОК ПОТРІБНО ДОДАТИ
// Він створює маршрути posts.index, posts.create, posts.store і т.д.
Route::resource('posts', PostController::class)
    ->middleware(['auth', 'verified']);
// -------------------------------------------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
