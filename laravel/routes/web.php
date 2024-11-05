<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerProduto;
use App\Http\Controllers\CharlieController;

Route::get('/', [CharlieController::class,'home'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('carrinho/{produto}', [ControllerProduto::class, 'addCarrinho']);
    Route::get('carrinho', [ControllerProduto::class, 'carrinho']);
});

Route::get('produto', [ControllerProduto::class, 'index']);


require __DIR__.'/auth.php';
