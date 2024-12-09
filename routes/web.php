<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/sucursal', function () {
        return view('sucursal');
    })->name('sucursal');
    Route::get('/horario', function () {
        return view('horario');
    })->name('horario');
    Route::get('/cita', function () {
        return view('cita');
    })->name('cita');
});
