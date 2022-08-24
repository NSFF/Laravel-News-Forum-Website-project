<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;


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
Route::group(['middleware' => \App\Http\Middleware\AdminMiddleware::class], function(){
    // All admin Routes
    Route::get('/news/{id}/edit', [NewsController::class, 'edit']);
    Route::get('/news/create', [NewsController::class, 'create']);
    Route::get('/users/usersList', [UserController::class, 'usersList']);
    Route::get('/faq/{id}/edit', [FaqController::class, 'edit']);
    Route::get('/faq/create', [FaqController::class, 'create']);
    Route::resource('/news', NewsController::class);
    Route::resource('/faq', FaqController::class);
});

Route::get('/', [NewsController::class, 'index']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}/{title}', [NewsController::class, 'show']);

Route::resource('/posts', PostController::class);
Route::get('/posts/{id}/{title}', [PostController::class, 'show']);

Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::put('/users/{id}/updateProfile', [UserController::class, 'updateProfile'])->name('users.updateProfile');
Route::get('/users/{id}/{name}', [UserController::class, 'show']);

Route::resource('/users', UserController::class);

Route::resource('/about', AboutController::class);

Route::resource('/contact', ContactController::class);

Route::get('/faq', [FaqController::class,'index']);

Route::post('/comments/{id}',[CommentController::class, 'store'])->name('comments.post.store');
Route::get('/comments/{id}/create', [CommentController::class,'create'])->name('comments.post.create');
Route::resource('/comments', CommentController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
