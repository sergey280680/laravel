<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home.index')->name('home');

Route::redirect('/home', '/')->name('home.redirect');

//Route::get('/test', TestController::class)->name('test')->middleware('token:secret');
Route::get('/test', TestController::class)->name('test');

// применяем middleware('guest') к группе роутов
Route::middleware('guest')->group(function (){
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

//  применяем middleware('guest') к группе роутов  кроме withoutMiddleware('guest')
//    Route::get('login', [LoginController::class, 'index'])->name('login')->withoutMiddleware('guest');
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::post('blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');

Route::resource('posts/{post}/comments', CommentController::class);

//Route::fallback(function () {
//   return 'Fallback Error 404';
//});
