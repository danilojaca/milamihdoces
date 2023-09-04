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
Route::patch('/pedidosdodia/{pedido}',[App\Http\Controllers\PedidosController::class,'finalizar'])->name('pedidos.finalizar');
Route::resource('/clientes','App\Http\Controllers\ClientesController');

Route::resource('/produtos','App\Http\Controllers\ProdutosController');
Route::resource('/pedidos','App\Http\Controllers\PedidosController');
Route::get('/pedido','App\Http\Controllers\PedidosController@pedidocalcular')->name('pedido.pedidocalcular');
Route::get('/pedido/{produtos}/{desconto}',[App\Http\Controllers\PedidosController::class,'pedido'])->name('pedido.pedido');

Route::prefix('/financas')->group(function(){
Route::resource('/financeiro','App\Http\Controllers\FinanceiroController');
Route::get('/produtos',[App\Http\Controllers\FinanceiroController::class,'produtos'])->name('financeiro.produtos');
});
