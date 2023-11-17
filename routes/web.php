<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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
// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products Route
Route::resource('products', ProductController::class)->names([
  'index' => 'product.index',
  'create' => 'product.create',
  'store' => 'product.store',
  'show' => 'product.show',
  'edit' => 'product.edit',
  'update' => 'product.update',
  'destroy' => 'product.destroy',
]);

// Categories Route
Route::resource('product-categories', CategoriesController::class)->except('show', 'create', 'store', 'update', 'destroy')->names([
  'index' => 'product-categories.index',
  'edit' => 'product-categories.edit',
]);
