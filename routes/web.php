<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;

Auth::routes();

@include('anonna.php');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::post('/fetch/more/products', [FrontendController::class, 'fetchMoreProducts'])->name('FetchMoreProducts');
Route::get('/search/for/products', [FrontendController::class, 'searchForProducts'])->name('SearchForProducts');
Route::post('/product/live/search', [FrontendController::class, 'productLiveSearch'])->name('ProductLiveSearch');
Route::get('/product/{slug}', [FrontendController::class, 'productDetails'])->name('ProductDetails');
Route::get('track/order/{order_no}', [FrontendController::class, 'trackOrder'])->name('TrackOrder');
Route::get('track/order', [FrontendController::class, 'trackOrderNo'])->name('TrackOrderNo');



Route::get('/login', [FrontendController::class, 'login'])->name('login');
Route::get('/register', [FrontendController::class, 'register'])->name('register');
Route::get('/set-password', [FrontendController::class, 'setPassword'])->name('SetPassword');
Route::get('/forget-password', [FrontendController::class, 'forgetPassword'])->name('ForgetPassword');
Route::get('/verify-success', [FrontendController::class, 'verifySuccess'])->name('VerifySuccess');
Route::get('/verify-otp', [FrontendController::class, 'verifyOtp'])->name('verifyOtp');

Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blog/details', [FrontendController::class, 'blogDetails'])->name('BlogDetails');

Route::get('/order', [FrontendController::class, 'order'])->name('order');
Route::get('/order-successful', [FrontendController::class, 'orderSuccessful'])->name('OrderSuccessful');
Route::get('/order-view', [FrontendController::class, 'orderView'])->name('OrderView');

Route::get('/vendor-register', [FrontendController::class, 'vendorRegister'])->name('VendorRegister');
Route::get('/vendor-shop', [FrontendController::class, 'vendorShop'])->name('VendorShop');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');

Route::get('/category', [FrontendController::class, 'category'])->name('Category');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('Checkout');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('ContactUs');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');

Route::get('/error-404', [FrontendController::class, 'error_404'])->name('error-404');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/view/wishlist', [HomeController::class, 'viewWishList'])->name('ViewWishList');
