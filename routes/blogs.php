<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Backend\BlogController
};

/*
|--------------------------------------------------------------------------
| Blogs Routes
|--------------------------------------------------------------------------
|
| Here is where you can register blogs routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "blogs" middleware group. Make something great!
|
*/

Route::middleware('auth')->name('backend.')->group(function () {
    // Route for blogs page
    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('categories', [BlogController::class, 'categories'])->name('categories.index');
    Route::get('tags', [BlogController::class, 'tags'])->name('tags.index');
});
