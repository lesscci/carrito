<?php

use App\Http\Livewire\ShowProductos;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('inicio');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   Route::get('/carrito', function () { return view('carrito'); })->name('carrito');
    Route::get('/dashboard/{type?}', function () {
        return view('dashboard', ['type' => request('type') ? request('type') : 'all']);
    })->name('dashboard');
});

Route::get('/dashboard/postres', function () {
    return view('dashboard', ['type' => 'postres']);
})->name('postres');

Route::get('/dashboard/bebidas', function () {
    return view('dashboard', ['type' => 'bebidas']);
})->name('bebidas');

Route::get('/historial', function () {
    return view('historial');
})->name('historial');

