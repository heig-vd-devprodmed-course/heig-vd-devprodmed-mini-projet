<?php

use App\Http\Controllers\Api\v1\ApiPaintingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('v1/paintings', ApiPaintingController::class)
    ->middlewareFor(['index', 'show'], ['auth:sanctum', 'abilities:paintings:read'])
    ->middlewareFor(['store'], ['auth:sanctum', 'abilities:paintings:create'])
    ->middlewareFor(['update'], ['auth:sanctum', 'abilities:paintings:update'])
    ->middlewareFor(['destroy'], ['auth:sanctum', 'abilities:paintings:delete']);
