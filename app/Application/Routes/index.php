<?php

use Illuminate\Support\Facades\Route;

Route::get('/api', function () {
    return response()->json([
        'success' => true,
        'environment' => config('custom.AMBIENTE'),
        'name' => strtoupper(config('custom.PROJETO')),
        'fw' => ['type' => 'laravel', 'version' => app()->version()]
    ]);
});

Route::group(['prefix' => 'api'], function () {
    get_files_routes(__DIR__ . '/api');
});

Route::group([], function () {
    get_files_routes(__DIR__ . '/web');
});
