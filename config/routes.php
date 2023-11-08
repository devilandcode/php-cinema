<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MovieController;
use App\Controllers\RegisterController;
use App\Kernel\Middleware\GuestMiddleware;
use App\Kernel\Router\Route;
use App\Middleware\AuthMiddleware;

return [

    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movies', [MovieController::class, 'index']),
    Route::get('/admin/movies/add', [MovieController::class, 'add'], [AuthMiddleware::class]),
    Route::post('/admin/movies/add', [MovieController::class, 'store'], [AuthMiddleware::class]),
    Route::get('/register', [RegisterController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/register', [RegisterController::class, 'register'], [GuestMiddleware::class]),
    Route::get('/login', [LoginController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/login', [LoginController::class, 'login'], [GuestMiddleware::class]),
    Route::post('/logout', [LoginController::class, 'logout']),

];
