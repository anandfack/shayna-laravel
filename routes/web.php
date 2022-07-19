<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', 'DashboardController@index');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Auth::routes(['register' => false]);

Route::get('/product/{id}/gallery', [ProductController::class, 'show']);
Route::resource('product', ProductController::class);
Route::resource('product-galleries', ProductGalleryController::class);
Route::get('transactions/{id}/set-status', [TransactionController::class, 'setStatus'])->name('transactions.status');
Route::resource('transactions', TransactionController::class);
Route::resource('user', UserController::class);
