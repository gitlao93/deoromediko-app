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

Route::get('/products', [ProductController::class, 'index']);
Route::get('/add-prod', function(){
    return view('add-prod');
});
Route::post('/add-prod', [ProductController::class, 'store']);
// Route::post('/products', 'ProductController@store')->name('store');
// Route::get('/products', [ProductController::class, 'showAll']);
// Route::get('/products/search', [ProductController::class, 'search']);
