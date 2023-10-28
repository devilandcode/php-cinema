<?php

use App\Controllers\HomeController;
use App\Controllers\MovieController;
use App\Kernel\Router\Route;

return [

        Route::get('/', [HomeController::class, 'welcome']),

        Route::get('/home',[HomeController::class, 'index']),

        Route::get('/movies', [MovieController::class, 'index']),
        Route::get('/test', function() {
            echo 'test';
        }),
    ];