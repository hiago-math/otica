<?php

use Application\Http\Controllers\Clientes\CarregarViewListagemController;
use Application\Http\Controllers\Clientes\CriarClienteController;
use Application\Http\Controllers\Clientes\DetalhesClienteController;
use Application\Http\Controllers\Clientes\EditarClienteController;
use Application\Http\Controllers\Clientes\SearchAddressFormController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'clientes'], function () {
    Route::post('criar', CriarClienteController::class)->name('criar.cliente');
    Route::put('/editar', EditarClienteController::class)->name('editar.cliente');
    Route::get('/detalhes', DetalhesClienteController::class)->name('info.cliente');
    Route::get('/buscar-cep', SearchAddressFormController::class)->name('buscar.cep');

});
