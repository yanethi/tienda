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

/*middleware auth y guard api ('auth:api')*/
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::resource('compradores','Comprador\CompradorController',
                ['only' => ['index','show']]);
Route::resource('compradores.transacciones','Comprador\CompradorTransaccionController',
                ['only' => ['index']]);
Route::resource('compradores.productos','Comprador\CompradorProductoController',
                ['only' => ['index']]);
Route::resource('compradores.vendedores','Comprador\CompradorVendedorController',
                ['only' => ['index']]);
Route::resource('compradores.categorias','Comprador\CompradorCategoriaController',
                ['only' => ['index']]);

Route::resource('categorias','Categoria\CategoriaController',
                ['except' => ['create','edit']]);
Route::resource('categorias.productos','Categoria\CategoriaProductoController',
                ['only' => ['index']]);
Route::resource('categorias.vendedores','Categoria\CategoriaVendedorController',
                ['only' => ['index']]);
Route::resource('categorias.transacciones','Categoria\CategoriaTransaccionController',
                ['only' => ['index']]);

Route::resource('productos','Producto\ProductoController',
                ['only' => ['index','show']]);

Route::resource('transacciones','Transaccion\TransaccionController',
                ['only' => ['index','show']]);
Route::resource('transacciones.categorias','Transaccion\TransaccionCategoriaController',
                ['only' => ['index']]);
Route::resource('transacciones.vendedores','Transaccion\TransaccionVendedorController',
                ['only' => ['index']]);

Route::resource('vendedores','Vendedor\VendedorController',
                ['only' => ['index','show']]);

Route::resource('users','User\UserController',
                ['except' => ['create','edit']]);