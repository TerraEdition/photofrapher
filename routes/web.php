<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'is.user'])->group(function () {
    Route::get('/account', [HomeController::class, 'account']);
    Route::get('/account/delete/{slug}', [HomeController::class, 'cancel_cart']);
    Route::get('/cart/{slug}', [HomeController::class, 'cart']);
    Route::post('/cart/{slug}', [HomeController::class, 'store_cart']);
});

Route::middleware(['guest'])->group(function () {
    Route::prefix('/login')->group(function () {
        Route::get('/', [AuthController::class, 'login'])->name('login');
        Route::put('/', [AuthController::class, 'store_login']);
    });
    Route::prefix('/register')->group(function () {
        Route::get('/', [AuthController::class, 'register']);
        Route::post('/', [AuthController::class, 'store_register']);
    });
});


Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/change-password', [UserController::class, 'update_password'])->middleware('auth');

Route::middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Backend.Dashboard');
    });
    Route::get('/change-password', [UserController::class, 'edit_password']);
    Route::prefix('/booking')->group(function () {
        Route::get('/', [BookingController::class, 'index']);
        Route::get('/create', [BookingController::class, 'create']);
        Route::post('/create', [BookingController::class, 'store']);
        Route::get('/{slug}', [BookingController::class, 'detail']);
        Route::post('/{slug}/{status}', [BookingController::class, 'update']);
        Route::delete('/delete/{slug}', [BookingController::class, 'destroy']);
    });
    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/create', [UserController::class, 'store']);
        Route::get('/edit/{slug}', [UserController::class, 'edit']);
        Route::put('/edit/{slug}', [UserController::class, 'update']);
        Route::delete('/delete/{slug}', [UserController::class, 'destroy']);
    });
    Route::prefix('/packages')->group(function () {
        Route::get('/', [PackageController::class, 'index']);
        Route::get('/create', [PackageController::class, 'create']);
        Route::post('/create', [PackageController::class, 'store']);
        Route::get('/edit/{slug}', [PackageController::class, 'edit']);
        Route::put('/edit/{slug}', [PackageController::class, 'update']);
        Route::delete('/delete/{slug}', [PackageController::class, 'destroy']);
    });
});
