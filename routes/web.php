<?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Foundation\Application;
// use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;
use App\Http\Controllers\Auth\DriverLoginController;
use App\Http\Controllers\VehicleDashboardController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [VehicleDashboardController::class, 'show'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/select_vehicle', [VehicleDashboardController::class, 'selectVehicle'])->name('select_vehicle');

Route::middleware(['auth'])->group(function () {
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
    Route::post('/vehicles/{vehicle}/select', [VehicleController::class, 'select'])->name('vehicles.select');
});






// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
