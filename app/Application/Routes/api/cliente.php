<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cliente'], function () {
    Route::post('criar', \Application\Http\Controllers\Clientes\CriarClienteController::class);
});
