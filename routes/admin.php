<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

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

// routes/admin.php

// Define your admin routes here
    Route::get('login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');


// routes/web.php



Route::middleware('auth')->group(function () {
   // Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    // Add other admin routes here
});
