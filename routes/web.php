<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SubController;
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

Route::get('/', [DashboardController::class, 'index']);

Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('sub', SubController::class);
Route::resource('provider', ProviderController::class);

Route::get('search', [DashboardController::class, 'search'])->name('product.search');
Route::post('product/{product}/upload', [DashboardController::class, 'upload'])->name('product.upload');
Route::delete('image/{image}', [DashboardController::class, 'deleteImage']);

Route::get('import', [ImportController::class, 'web']);
