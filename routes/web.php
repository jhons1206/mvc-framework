<?php

use App\Controllers\HomeController;
use Lib\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/contacts', function() {
    return 'Aquí se muestra el listado de contactos';
});

// Route::get('/about', function() {
//     return 'hola desde la <strong>página acerca de</strong>';
// });

// Route::get('/courses/:slug', function($slug) {
//     return 'El curso es: ' . $slug;
// });


Route::dispatch();