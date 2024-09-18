<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/index', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about'])->name('about');
Route::get('/blogs', [App\Http\Controllers\FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blog/details', [App\Http\Controllers\FrontendController::class, 'blogDetails'])->name('blog.details');
Route::get('/become/a/vendor', [App\Http\Controllers\FrontendController::class, 'becomeaVendor'])->name('becomeaVendor');
Route::get('/cart', [App\Http\Controllers\FrontendController::class, 'cart'])->name('cart');
Route::get('/category', [App\Http\Controllers\FrontendController::class, 'category'])->name('category');

