<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('supplier', App\Http\Controllers\SupplierController::class);
Route::resource('customer', App\Http\Controllers\CustomerController::class);
Route::resource('product', App\Http\Controllers\ProductController::class);
Route::resource('purchase', App\Http\Controllers\PurchaseTransactionController::class);

// Route untuk admin
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Tambahkan route lainnya yang hanya bisa diakses oleh admin
});

// Route untuk cashier
Route::group(['middleware' => ['auth', 'cashier']], function() {
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.dashboard');
    // Tambahkan route lainnya yang hanya bisa diakses oleh cashier
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
