<?php

use App\Controllers\AdminController;
use App\Controllers\CategoryController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MovieController;
use App\Controllers\RegisterController;
use App\Kernel\Router\Route;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

return [

    Route::get('/', [HomeController::class, 'index']),
    Route::get('/register', [RegisterController::class, 'index']),
    Route::post('/register-index', [RegisterController::class, 'index']),
    Route::post('/register', [RegisterController::class, 'register']),
    Route::get('/login', [LoginController::class, 'index']),
    Route::post('/login-index', [LoginController::class, 'index']),
    Route::post('/login', [LoginController::class, 'login']),
    Route::post('/logout', [LoginController::class, 'logout']),
    Route::get('/admin', [AdminController::class, 'index']),
    Route::get('/admin/categories/add', [CategoryController::class, 'create']),
    Route::post('/admin/categories/add', [CategoryController::class, 'store']),
    Route::post('/admin/categories/destroy', [CategoryController::class, 'destroy']),
    Route::post('/admin/categories/edit', [CategoryController::class, 'edit']),
    Route::post('/admin/categories/update', [CategoryController::class, 'update']),
    Route::get('/admin/movies/add', [MovieController::class, 'create']),
    Route::post('/admin/movies/add', [MovieController::class, 'store']),
];
