<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', 'Auth\AuthController@login');
Route::post('/refresh', 'Auth\AuthController@refresh');

Route::middleware('auth:api')->group(function () {

    Route::post('/logout', 'Api\AuthController@logout');
});

Route::resource('/proveedores','ProveedorController')->except('show');
Route::resource('/productos','ProductoController')->except('show');
Route::resource('/inventario','InventarioController')->except('show');
Route::resource('/detallePedido','DetallesPedidoController')->except('show');
Route::resource('/pedidos','PedidoController')->except('show');
