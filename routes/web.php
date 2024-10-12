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

// // Main Page Route
// Route::get('/', [HomePage::class, 'index'])->name('pages-home');
// Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');

// // locale
// Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// // pages
// Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');

// // authentication
// Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
// Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');


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