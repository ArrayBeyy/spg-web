<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// ======================
// PUBLIC (BELUM LOGIN)
// ======================
Route::get('/', function () {
    return view('welcome');
});

// ======================
// AUTH ROUTES
// ======================
require __DIR__.'/auth.php';


// ======================
// AUTHENTICATED ROUTES
// ======================
Route::middleware(['auth'])->group(function () {

    // ======================
    // DASHBOARD
    // ======================
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // ======================
    // SWITCH BRANCH
    // ======================
    Route::post('/switch-branch', function (Request $request) {
        session(['branch_id' => $request->branch_id]);
        return back();
    })->name('switch.branch');


    // ======================
    // PROFILE
    // ======================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // ======================
    // ADMIN ONLY
    // ======================
    Route::middleware(['role:admin'])->group(function () {

        Route::resource('branches', BranchController::class);

        // PRODUCTS
        Route::resource('products', ProductController::class);
    });


    // ======================
    // ADMIN + BRANCH ADMIN
    // ======================
    Route::middleware(['role:admin,branch_admin'])->group(function () {

        Route::resource('users', UserController::class);

    });


    // ======================
    // SALES (SEMUA LOGIN)
    // ======================
    Route::resource('sales', SaleController::class);

});