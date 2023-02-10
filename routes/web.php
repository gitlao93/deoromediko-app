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
    return view('home');
});

// Route::get('/add-prod', [ProductController::class, 'create']);

// Route::get('/add-prod', function(){
//     return view('add-prod');
// });

// USER ROUTE
Route::get('/products', [ProductController::class, 'index']);
Route::get('user/dashboard', [ProductController::class, 'dashboard']);

// Route::get('user/dashboard/{id}', function($id){
//     return view('user/single-prod'. $id);
// });

// Route::get('user/dashboard/{id}', [ProductController::class, 'singleprod']);


Route::post('user/addproduct', [ProductController::class, 'store']);
Route::get('user/addproduct', function(){
    return view('user/addproduct');
});
// Route::get('user/single-prod/{id}', [ProductController::class, 'singleprod']);
Route::get('user/single-prod/{id}', [ProductController::class, 'singleprod'])->name('single-prod');

// Route::post('user/update-prod', function(){
//     return view('user/update-prod');
// });
Route::get('user/update-prod', [ProductController::class, 'updateprod']);


Route::get('user/view-user', [ProductController::class, 'viewuser']);

// SINGLE ROUTE
// Route::get('user/single-prod/', [ProductController::class, 'singleprod']);
