<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('supplier', App\Http\Controllers\SupplierController::class);
Route::resource('customer', App\Http\Controllers\CustomerController::class);
Route::resource('product', App\Http\Controllers\ProductController::class);
