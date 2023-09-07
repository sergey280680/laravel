<?php

use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

//Route::prefix('user')->middleware(['auth', 'active'])->group(function (){
Route::prefix('user')->middleware(['active'])->group(function (){
    Route::redirect('/', '/user/posts')->name('user');

    Route::get('posts', [PostController::class, 'index'])->name('user.posts');
    Route::get('post/create', [PostController::class, 'create'])->name('user.post.create');
    Route::post('posts', [PostController::class, 'store'])->name('user.posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('user.post.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('user.post.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('user.post.update');
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('user.post.delete');
    Route::put('posts/{post}/like', [PostController::class, 'like'])->name('user.post.like');
});
