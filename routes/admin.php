<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

//Route::prefix('admin')->middleware(['active', 'admin'])->group(function (){
Route::prefix('admin')->group(function (){
    Route::redirect('/', '/admin/posts')->name('admin');

    Route::get('posts', [PostController::class, 'index'])->name('admin.posts');
    Route::get('post/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('admin.post.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('admin.post.update');
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('admin.post.delete');
    Route::put('posts/{post}/like', [PostController::class, 'like'])->name('admin.post.like');
});
