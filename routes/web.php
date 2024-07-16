<?php

use App\Http\Controllers\Auth\DriverLoginController;
use App\Http\Controllers\VehicleDashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('home');

Route::get('login', [DriverLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [DriverLoginController::class, 'login']);
Route::post('logout', [DriverLoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [VehicleDashboardController::class, 'show'])->name('dashboard');
    Route::post('/select_vehicle', [VehicleDashboardController::class, 'selectVehicle'])->name('select_vehicle');
    Route::post('/deactivate_vehicle', [VehicleDashboardController::class, 'deactivateVehicle'])->name('deactivate_vehicle');
});

Route::post('/create_order', [OrderController::class, 'createOrder'])->name('create_order');
