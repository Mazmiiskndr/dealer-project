<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\LoginController,
    Backend\DashboardController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// TODO: SEHARUSNYA HOME TAMPILAN HOME DEALER BUKAN LOGIN PAGE
// Home / Login Page route
Route::get('/', [LoginController::class, 'index'])->name('login');

// Grouping routes backend
Route::middleware('auth')->name('backend.')->group(function () {
    // Route for dashboard page
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Route for logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');