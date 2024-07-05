<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos/vista', [ProductosController::class, 'obtenerProductosVista']);
Route::get('/productos/obtener', [ProductosController::class, 'obtenerProductos']);
Route::get('/productos/obtener/{id}', [ProductosController::class, 'obtenerProducto']);
Route::get('/productos/eliminar/{id}', [ProductosController::class, 'eliminarProducto']);
Route::get('/productos/insertar/vista', [ProductosController::class, 'insertarProductoVista']);
Route::post('/productos/insertar', [ProductosController::class, 'insertarProducto']);
Route::get('/productos/actualizar/vista', [ProductosController::class, 'actualizarProductoVista']);
Route::post('/productos/actualizar', [ProductosController::class, 'actualizarProducto']);

Route::get('/categorias/vista', [CategoriasController::class, 'obtenerCategoriasVista']);
Route::get('/categorias/obtener', [CategoriasController::class, 'obtenerCategorias']);
Route::get('/categorias/obtener/{id}', [CategoriasController::class, 'obtenerCategoria']);
Route::get('/categorias/eliminar/{id}', [CategoriasController::class, 'eliminarCategoria']);
Route::get('/categorias/insertar/vista', [CategoriasController::class, 'insertarCategoriaVista']);
Route::post('/categorias/insertar', [CategoriasController::class, 'insertarCategoria']);
Route::get('/categorias/actualizar/vista', [CategoriasController::class, 'actualizarCategoriaVista']);
Route::post('/categorias/actualizar', [CategoriasController::class, 'actualizarCategoria']);