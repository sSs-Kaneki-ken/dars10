<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#Category-Routes
Route::get('/', [CategoryController::class, 'index'])
    ->name('category.index')->middleware('auth');
Route::get('/category/create', [CategoryController::class, 'create'])
    ->name('category.create');
Route::post('/category/create', [CategoryController::class, 'store'])
    ->name('category.store');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])
    ->name('category.destroy');
Route::get('/category/{category}', [CategoryController::class, 'edit'])
    ->name('category.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])
    ->name('category.update');

#Posts-Routes
Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store'])
    ->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'edit'])
    ->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])
    ->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy');
Route::get('/posts/show/{post}', [PostController::class, 'show'])
    ->name('posts.show');

#Authorithation Routes
Route::get('/login', [AuthController::class, 'loginPage'])
    ->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])
    ->name('registerPage');
Route::post('/register', [AuthController::class, 'register'])
    ->name('register');
Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');

#User Routes
Route::get('/poster', [UserController::class, 'index'])
    ->name('poster');
