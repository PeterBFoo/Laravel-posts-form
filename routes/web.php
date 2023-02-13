<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/create-post', function () {
    return view('create-post');
})->middleware(['auth', 'verified'])->name('create-post');

Route::get('/dashboard/profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('profile');

Route::get('/dashboard/profile/edit', [ProfileController::class, 'edit'])->middleware(['auth', 'verified'])->name('profile.edit');

Route::get('/dashboard/profile/edit/password', [ProfileController::class, 'editPassword'])->middleware(['auth', 'verified'])->name('profile.edit.password');

Route::get("/dashboard/posts", [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts');

Route::post('/post/store', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name("post.store");

Route::get('/dashboard/post/edit/{id}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('post.edit');

Route::get('/dashboard/post/{id}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('post');

Route::post('/dashboard/post/update/{id}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('post.update');

Route::delete('/dashboard/post/delete/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('post.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
