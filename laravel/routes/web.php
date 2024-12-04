<?php

use App\Http\Controllers\ControllerPedido;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerProduto;
use App\Http\Controllers\CharlieController;

Route::get('/', [CharlieController::class,'home'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('carrinho/{produto}', [ControllerProduto::class, 'addCarrinho'])->name('add.carrinho');
    Route::get('carrinho', [ControllerProduto::class, 'carrinho'])->name('carrinho');
    Route::get('carrinho/excluir/{produto}', [ControllerProduto::class, 'excluiCarrinho'])->name('exclui.carrinho');

// Rota para atualizar a quantidade de um item no carrinho
    Route::put('/carrinho/aumenta/{produto}', [ControllerProduto::class, 'aumentaQuantidade'])->name('aumenta.quantidade');
    Route::put('/carrinho/diminui/{produto}', [ControllerProduto::class, 'diminuiQuantidade'])->name('diminui.quantidade');

    Route::get('revisao',[ControllerPedido::class, 'pedidos'])->name('revisa.pedido');

 Route::post('pedido/finalizar', [ControllerPedido::class, 'criaPedido'])->name('pedido.finalizar');
Route::get('meus-pedidos', [ControllerPedido::class, 'meusPedidos'])->name('meus.pedidos');

});

Route::get('produtos', [ControllerProduto::class, 'produtos'])->name('produtos');
Route::get('/produtos/{produto}', [ControllerProduto::class, 'show'])->name('show.produto');


require __DIR__.'/auth.php';
