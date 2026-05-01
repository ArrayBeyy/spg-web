<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ======================
// CONTROLLERS
// ======================
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Prefix: /api
| Contoh: http://127.0.0.1:8000/api/products
|--------------------------------------------------------------------------
*/

// ======================
// TEST API
// ======================
Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working'
    ]);
});


// ======================
// 🔐 AUTH (ANDROID)
// ======================
Route::post('/login', [AuthController::class, 'login']);


// ======================
// AUTH CHECK
// ======================
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// ======================
// 🔒 PROTECTED ROUTES
// ======================
Route::middleware('auth:sanctum')->group(function () {

    // ======================
    // RESOURCE API
    // ======================
    Route::apiResource('branches', BranchController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('sales', SaleController::class);

    // ======================
    // TAMBAHAN ANDROID
    // ======================

    // REPORT
    Route::get('/report', [SaleController::class, 'report']);

    // PROFILE LOGIN USER
    Route::get('/profile', [ProfileController::class, 'index']);

    // OPTIONAL: LOGOUT
    Route::post('/logout', [AuthController::class, 'logout']);
});