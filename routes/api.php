<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// route yang terbuka bagi umum tanpa perlu login terlebih dahulu
Route::post('/login', [AuthController::class, 'login']) -> name('login');

// route yang dapat diakses oleh seluruh pengguna yang sudah login
Route::middleware(['auth:sanctum']) -> group(function () {
    Route::post('/logout', [AuthController::class, 'logout']) -> name('logout');
    // Route::post('/register', [AuthController::class, 'register']) -> name('register');
});

// route yang hanya dapat diakses oleh pengguna yang sudah login dengan role admin
Route::middleware(['auth:sanctum','admin']) -> group(function () {
    Route::post('/register', [AuthController::class, 'register']) -> name('register');
});

// route yang hanya dapat diakses oleh pengguna yang sudah login dengan role cashier
Route::middleware(['auth:sanctum', 'cashier']) -> group(function () {

});

Route::post('/create-supplier', [SupplierController::class, 'create']) -> name('create-supplier');
Route::patch('/update-supplier/{id}', [SupplierController::class, 'update']) -> name('update-supplier');
Route::delete('/delete-supplier/{id}', [SupplierController::class, 'delete']) -> name('delete-supplier');
Route::get('/search-supplier', [SupplierController::class, 'search']) -> name('search-supplier');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// use App\Http\Controllers\Api\AuthController;
// use App\Http\Controllers\Api\UserController;

// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', [UserController::class, 'getUserDetails']);
//     Route::post('/logout', [AuthController::class, 'logout']);
// });
