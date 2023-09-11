<?php

use Application\Http\Controllers\Clientes\CarregarViewCadastroController;
use Application\Http\Controllers\Clientes\CarregarViewListagemController;
use Application\Http\Controllers\Clientes\DetalhesClienteController;
use Application\Http\Controllers\Clientes\SearchAddressFormController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'clientes'], function () {
    Route::get('/view/cadastrar', CarregarViewCadastroController::class)->name('view.cadastrar');
    Route::get('/detalhes', DetalhesClienteController::class)->name('info.cliente');
    Route::get('/buscar-cep', SearchAddressFormController::class)->name('buscar.cep');
    Route::get('/listagem', CarregarViewListagemController::class)->name('listagem.clientes');
});
