<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\almacenesController;
use App\Http\Controllers\AlmacenMaquinaController;
use App\Http\Controllers\almacenMaquinasController;
use App\Http\Controllers\AlmacenStockController;
use App\Http\Controllers\almacenStocksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\insumosController;
use App\Http\Controllers\medidasController;
use App\Http\Controllers\produccionController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\productosMedidasController;
use App\Http\Controllers\salidaController;
use App\Http\Controllers\stockgeneralController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//crud usuario
Route::post('/users', [UserController::class, 'create']); // Crear
Route::get('/users', [UserController::class, 'index']); // Obtener
Route::get('/users/{id}', [UserController::class, 'show']); // Obtener
Route::put('/users/{id}', [UserController::class, 'update']); // Actualizar
Route::delete('/users/{id}', [UserController::class, 'destroy']); // Eliminar
//crud productos
Route::get('/productos', [productosController::class, 'index']); // Listar
Route::post('/productos', [productosController::class, 'create']); // Crear
Route::get('/productos/{id}', [productosController::class, 'show']); // Obtener
Route::put('/productos/{id}', [productosController::class, 'update']); // Actualizar
Route::delete('/productos/{id}', [productosController::class, 'destroy']); // Eliminar
//crud Medidas
Route::get('/medidas', [medidasController::class, 'index']); // Listar
Route::post('/medidas', [medidasController::class, 'create']); // Crear
Route::get('/medidas/{id}', [medidasController::class, 'show']); // Obtener
Route::put('/medidas/{id}', [medidasController::class, 'update']); // Actualizar
Route::delete('/medidas/{id}', [medidasController::class, 'destroy']); // Eliminar
//Crud ProductosMedidas
Route::get('/productos-medidas', [productosMedidasController::class, 'index']); // Listar
Route::post('/productos-medidas', [productosMedidasController::class, 'create']); // Crear
Route::get('/productos-medidas/{id}', [productosMedidasController::class, 'show']); // Obtener
Route::put('/productos-medidas/{id}', [productosMedidasController::class, 'update']); // Actualizar
Route::delete('/productos-medidas/{id}', [productosMedidasController::class, 'destroy']); // Eliminar
//Crud Insumos
Route::get('insumos', [insumosController::class, 'index']); // Listar
Route::post('insumos', [insumosController::class, 'create']); // Crear
Route::get('insumos/{id}', [insumosController::class, 'show']); // Mostrar
Route::put('insumos/{id}', [insumosController::class, 'update']); // Actualizar
Route::delete('insumos/{id}', [insumosController::class, 'destroy']); // Eliminar
//Crud StockGeneral
Route::get('stock-general', [stockgeneralController::class, 'index']);
Route::post('stock-general/agregar', [StockGeneralController::class, 'agregarStock']);
Route::post('stock-general/restar', [StockGeneralController::class, 'restarStock']);
Route::get('stock-general/{id}', [StockGeneralController::class, 'show']);
Route::put('stock-general/{id}', [StockGeneralController::class, 'update']);
Route::delete('stock-general/{id}', [StockGeneralController::class, 'destroy']);
//Salidas
Route::post('salidas', [salidaController::class, 'registrarSalida']);
Route::get('salidas', [SalidaController::class, 'index']);
Route::get('/salidas/{id}', [SalidaController::class, 'show']); // Mostrar salida específica
Route::put('/salidas/{id}', [SalidaController::class, 'update']); // Actualizar salida
Route::delete('/salidas/{id}', [SalidaController::class, 'destroy']); // Eliminar salida

//Autenticacion
Route::post('login', [AuthController::class, 'login']);   // Ruta para iniciar sesión
Route::get('me', [AuthController::class, 'me'])->middleware('auth:api'); // Ruta para obtener el usuario autenticado
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api'); // Ruta para cerrar sesión

// Rutas para AlmacenStockController
Route::get('almacen-stock', [AlmacenStockController::class, 'index']);  // Obtener todos los insumos en stock
Route::post('almacen-stock', [AlmacenStockController::class, 'store']); // Agregar insumos al stock

// Rutas para AlmacenMaquinaController
Route::get('almacen-maquina', [AlmacenMaquinaController::class, 'index']); // Obtener todos los insumos en la máquina
Route::post('almacen-maquina/traspasar', [AlmacenMaquinaController::class, 'traspasar']); // Transferir insumos a la máquina

Route::get('/almacen_stock/{insumoId}', [AlmacenStockController::class, 'getCantidadDisponible']);