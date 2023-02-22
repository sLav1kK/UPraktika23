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

Route::get('/home/deleteorder/{id}', [App\Http\Controllers\HomeController::class, 'deleteorder'])->name('deleteorder');

Route::match(['get', 'post'], '/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');

Route::post('/admin/addcategory', [App\Http\Controllers\AdminController::class, 'addcategory'])->name('addcategory');

Route::get('/admin/confirmorder/{id}', [App\Http\Controllers\AdminController::class, 'confirmorder'])->name('confirmorder');

Route::get('/admin/cancelorder/{id}', [App\Http\Controllers\AdminController::class, 'cancelorder'])->name('cancelorder');

Route::post('/admin/cancelorder/{id}', [App\Http\Controllers\AdminController::class, 'cancelSubmitorder'])->name('cancelSubmitorder');

Route::get('/admin/deletecategory/{id}', [App\Http\Controllers\AdminController::class, 'deletecategory'])->name('deletecategory');

Route::get('/admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');

Route::get('/admin/edit/{id}/updateproduct', [App\Http\Controllers\AdminController::class, 'update'])->name('updateproduct');

Route::post('/admin/edit/{id}/updateproduct', [App\Http\Controllers\AdminController::class, 'updateSubmit'])->name('updateSubmitproduct');

Route::get('/admin/edit/{id}/deleteproduct', [App\Http\Controllers\AdminController::class, 'delete'])->name('deleteproduct');

Route::get('/catalog', [App\Http\Controllers\ProductController::class, 'show'])->name('catalog');

Route::get('/catalog/{id}', [App\Http\Controllers\ProductController::class, 'onepageprod'])->name('onepageprod');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

Route::get('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('add');

Route::get('/cart/plus/{id}', [App\Http\Controllers\CartController::class, 'plus'])->name('plus');

Route::get('/cart/minus/{id}', [App\Http\Controllers\CartController::class, 'minus'])->name('minus');

Route::get('/cart/pay/{id}', [App\Http\Controllers\CartController::class, 'pay'])->name('pay');

Route::match(['get', 'post'], '/cart/saveorder', [App\Http\Controllers\CartController::class, 'saveorder'])->name('saveorder');

Route::get('/geo', function () {
    return view('geo');
})->name('geo');

Route::get('/test', [App\Http\Controllers\AdminController::class, 'abrakadabra']);