<?php

use Application\Http\Controllers\Clientes\CarregarViewCadastroController;
use Application\Http\Controllers\Clientes\CarregarViewEditarClienteController;
use Application\Http\Controllers\Clientes\CarregarViewListagemController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'clientes'], function () {
    Route::get('/view/cadastrar', CarregarViewCadastroController::class)->name('view.cadastrar');
    Route::get('/view/editar', CarregarViewEditarClienteController::class)->name('view.editar');
    Route::get('/listagem', CarregarViewListagemController::class)->name('view.listagem');

});
