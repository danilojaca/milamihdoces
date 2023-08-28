<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/pedidosdodia', [App\Http\Controllers\HomeController::class, 'pedidosdodia'])->name('pedidosdodia');
Route::patch('/pedidosdodia/{pedido}','App\Http\Controllers\PedidosController@finalizar')->name('pedidos.finalizar');
Route::resource('/clientes','App\Http\Controllers\ClientesController');
Route::resource('/produtos','App\Http\Controllers\ProdutosController');
Route::resource('/pedidos','App\Http\Controllers\PedidosController');
Route::Get('/pedido','App\Http\Controllers\PedidosController@pedido')->name('pedido.pedido');

