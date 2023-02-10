<?php

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

Route::get('/', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

Route::get('/catalog', [App\Http\Controllers\ProductController::class, 'show'])->name('catalog');

Route::get('/catalog/{id}', [App\Http\Controllers\ProductController::class, 'onepageprod'])->name('onepageprod');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

Route::get('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('add');

Route::get('/geo', function () {
    return view('geo');
})->name('geo');