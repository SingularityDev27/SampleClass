<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\ExcelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/vista', [UsuariosController::class, 'vistaLogin']);
Route::post('/login', [UsuariosController::class, 'logear']);
Route::get('/logout', [UsuariosController::class, 'logout']);

Route::get('/registro/vista', [UsuariosController::class, 'vistaRegistro']);
Route::post('/registro', [UsuariosController::class, 'registrar']);

Route::get('/perfil/vista', [UsuariosController::class, 'vistaPerfil']);

Route::get('/enviar_correo/{destinatario}', [CorreoController::class, 'enviarCorreo']);

Route::get('/excel/productos', [ExcelController::class, 'exportarProductos']);

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