<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/descargar-plantilla-componentes', function () {
    $path = storage_path('app/plantillas/componentes.xlsx');

    return response()->download($path, 'plantilla_componentes.xlsx');
})->name('componentes.plantilla');