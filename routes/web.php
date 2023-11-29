<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisterController;

// use App\Http\Controllers\OrganizeStockController;

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

// Login Controller
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate')->middleware('guest');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Register Route
Route::get('/sign-up', [RegisterController::class, 'index'])->name('register')->middleware('guest');

// Forgot Password Route
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password')->middleware('guest');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordPost'])->name('forgot-password-post')->middleware('guest');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset-password')->middleware('guest');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset-password-post')->middleware('guest');

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Chart Route
Route::get('/sales-purchases/chart-data', [HomeController::class, 'salesPurchasesChart'])->name('sales-purchases.chart');
Route::get('/current-month/chart-data', [HomeController::class, 'currentMonthChart'])->name('current-month.chart');

// Products Route
Route::resource('products', ProductController::class)->names([
  'index' => 'product.index',
  'create' => 'product.create',
  'store' => 'product.store',
  'show' => 'product.show',
  'edit' => 'product.edit',
  'update' => 'product.update',
  'destroy' => 'product.destroy',
])->middleware('auth');

// Categories Route
Route::resource('product-categories', CategoriesController::class)->except('show', 'create')->names([
  'index' => 'product-categories.index',
  'store' => 'product-categories.store',
  'edit' => 'product-categories.edit',
  'update' => 'product-categories.update',
  'destroy' => 'product-categories.destroy',
])->middleware('auth');

// Purchases Route
Route::resource('purchases', PurchaseController::class)->names([
  'index' => 'purchases.index',
  'create' => 'purchases.create',
  'store' => 'purchases.store',
  'show' => 'purchases.show',
  'edit' => 'purchases.edit',
  'update' => 'purchases.update',
  'destroy' => 'purchases.destroy',
])->middleware('auth');

// Sales Route
Route::resource('sales', SaleController::class)->names([
  'index' => 'sale.index',
  'create' => 'sale.create',
  'store' => 'sale.store',
  'show' => 'sale.show',
  'edit' => 'sale.edit',
  'update' => 'sale.update',
  'destroy' => 'sale.destroy',
])->middleware('auth');

// Suppliers Route
Route::resource('suppliers', SupplierController::class)->names([
  'index' => 'suppliers.index',
  'create' => 'suppliers.create',
  'store' => 'suppliers.store',
  'show' => 'suppliers.show',
  'edit' => 'suppliers.edit',
  'update' => 'suppliers.update',
  'destroy' => 'suppliers.destroy',
])->middleware('auth');

// Reports Route
Route::get('/profit-loss-report', [ReportController::class, 'profitLossReport'])->name('profit-loss-report')->middleware('auth');

// Users Route
Route::resource('users', UserController::class)->except('show')->names([
  'index' => 'user.index',
  'create' => 'user.create',
  'store' => 'user.store',
  'edit' => 'user.edit',
  'update' => 'user.update',
  'destroy' => 'user.destroy',
])->middleware('owner');


// User Profile Route
Route::get('user-profile', [ProfileController::class, 'editProfile'])->name('profile.index')->middleware('auth');
Route::patch('user-profile/{id}', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile')->middleware('auth');
