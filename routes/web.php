<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;
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

Route::middleware(['auth', 'user.type:admin'])->group(function () {
    // ADMIN ROUTE
    Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/dashboard', [App\Http\Controllers\ProductController::class, 'showAll'])->name('admin.dashboard');
    Route::put('admin/update-prod/{product}', [ProductController::class, 'update'])->name('update');
    Route::get('admin/update-prod', [ProductController::class, 'updateprod']);
    Route::post('admin/update-prod/{id}', [ProductController::class, 'updatestock'])->name('updatestock');
    Route::get('admin/single-prod/{id}', [ProductController::class, 'singleprod'])->name('single-prod');
    Route::get('admin/view-user', [ProductController::class, 'viewuser']);
    Route::delete('admin/single-prod/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('admin/view-user', [ProductController::class, 'storeuser'])->name('users.storeuser');
    Route::put('admin/view-user/{id}', [ProductController::class, 'updateuser'])->name('users.updateuser');
    Route::delete('admin/view-user/{id}', [ProductController::class, 'deleteuser'])->name('users.deleteuser');


    // ADD NOTE
    Route::post('admin/dashboard', [NotesController::class, 'store'])->name('notes.store');
    Route::put('/admin/dashboard/{id}', [NotesController::class, 'update'])->name('notes.update');
    Route::delete('admin/dashboard/{id}', [NotesController::class, 'delete'])->name('notes.delete');


});


Route::middleware(['auth', 'user.type:user'])->group(function () {
    // USER ROUTE
    Route::get('/users/dashboard', [UserController::class, 'index'])->name('users.dashboard');
    Route::put('users/update-prod/{product}', [UserController::class, 'userupdate'])->name('userupdate');
    Route::get('users/update-prod', [UserController::class, 'userupdateprod']);
    Route::post('users/update-prod/{id}', [UserController::class, 'usersupdatestock'])->name('usersupdatestock');
    Route::get('users/single-prod/{id}', [UserController::class, 'singleprod'])->name('single-prod');
});
