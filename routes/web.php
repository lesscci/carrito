<?php

use Spatie\Permission\Models\Role;
use App\Http\Livewire\ShowProductos;
use App\Http\Livewire\ProductosAdmin;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;



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

Route::get('/historial', function () {
    return view('historial');
})->name('historial');


Route::middleware([
    'auth:sanctum', 
    config('jetstream.auth_session'), 
    'verified', RoleMiddleware::class . ':admin'])->group(function () {
        Route::get('/panel-control', function () {
            return view('panelControl');
        })->name('panelControl');

        Route::get('/productosAdmin', function () {
            return view('productosAdmin');
        })->name('productosAdmin');
        Route::delete('/productos/{producto}', [ProductosAdmin::class, 'delete'])->name('productos.delete');

     
});