<?php

use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

//Route::prefix('user')->middleware(['auth', 'active'])->group(function (){
Route::prefix('user')->group(function (){
//Route::prefix('user')->middleware(['active'])->group(function (){
    Route::redirect('/', '/user/posts')->name('user');

    Route::get('posts', [PostController::class, 'index'])->name('user.posts');
    Route::get('post/create', [PostController::class, 'create'])->name('user.post.create');
    Route::post('posts', [PostController::class, 'store'])->name('user.posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('user.posts.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('user.posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('user.posts.update');
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('user.posts.delete');
    Route::put('posts/{post}/like', [PostController::class, 'like'])->name('user.posts.like');
});
