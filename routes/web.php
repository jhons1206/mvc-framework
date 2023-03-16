<?php

use App\Controllers\HomeController;
use Lib\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/contact', function() {
    return 'hola desde la <strong>página de contacto</strong>';
});

Route::get('/about', function() {
    return 'hola desde la <strong>página acerca de</strong>';
});

Route::get('/courses/:slug', function($slug) {
    return 'El curso es: ' . $slug;
});


Route::dispatch();