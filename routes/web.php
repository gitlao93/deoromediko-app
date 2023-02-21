<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route::post('/addProduct', [ProductController::class, 'store']);
Route::post('admin/add-prod', [ProductController::class, 'store']);
Route::get('admin/add-prod', function () {
    return view('admin/add-prod');
});

Auth::routes();

Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('admin/dashboard', [App\Http\Controllers\ProductController::class, 'showAll'])->name('dashboard');
Route::put('admin/update-prod/{product}', [ProductController::class, 'update'])->name('update');
Route::get('admin/update-prod', [ProductController::class, 'updateprod']);
Route::post('/admin/update-prod/{id}', [ProductController::class, 'updatestock'])->name('updatestock');
Route::get('admin/single-prod/{id}', [ProductController::class, 'singleprod'])->name('single-prod');
Route::get('admin/view-user', [ProductController::class, 'viewuser']);

