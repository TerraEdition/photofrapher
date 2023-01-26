<?php

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
    Route::get('/cart/{slug}', [HomeController::class, 'cart']);
});

Route::middleware(['guest'])->group(function () {
    Route::prefix('/login')->group(function () {
        Route::get('/', [HomeController::class, 'login'])->name('login');
        Route::put('/', [HomeController::class, 'store_login']);
    });
    Route::prefix('/register')->group(function () {
        Route::get('/', [HomeController::class, 'register']);
        Route::post('/', [HomeController::class, 'store_register']);
    });
});


Route::get('/logout', [HomeController::class, 'logout'])->middleware('auth');

Route::middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Backend.Dashboard');
    });
    Route::prefix('/booking')->group(function () {
        Route::get('/', [BookingController::class, 'index']);
        Route::get('/create', [BookingController::class, 'create']);
        Route::post('/create', [BookingController::class, 'store']);
        Route::get('/edit/{slug}', [BookingController::class, 'edit']);
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
