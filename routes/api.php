<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/categories', CategorieController::class);
    Route::apiResource('/products/{categorieId}', ProductController::class);

    // Rutas adicionales protegidas
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Ruta pública para registro
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);




