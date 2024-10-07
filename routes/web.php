<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Spatie\Honeypot\ProtectAgainstSpam;

Auth::routes();


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::post('/fetch/more/products', [FrontendController::class, 'fetchMoreProducts'])->name('FetchMoreProducts');
Route::get('/search/for/products', [FrontendController::class, 'searchForProducts'])->name('SearchForProducts');
Route::post('/product/live/search', [FrontendController::class, 'productLiveSearch'])->name('ProductLiveSearch');
Route::post('/subscribe/for/newsletter', [FrontendController::class, 'subscribeForNewsletter'])->name('SubscribeForNewsletter')->middleware(ProtectAgainstSpam::class)->middleware(['throttle:3,1']);
Route::get('/product/{slug}', [FrontendController::class, 'productDetails'])->name('ProductDetails');
Route::get('track/order/{order_no}', [FrontendController::class, 'trackOrder'])->name('TrackOrder');
Route::get('track/order', [FrontendController::class, 'trackOrderNo'])->name('TrackOrderNo');
Route::post('check/product/variant', [FrontendController::class, 'checkProductVariant'])->name('CheckProductVariant');


// cart
Route::get('add/to/cart/{id}', [CartController::class, 'addToCart'])->name('AddToCart');
Route::post('add/to/cart/with/qty', [CartController::class, 'addToCartWithQty'])->name('AddToCartWithQty');
Route::get('remove/cart/item/{id}', [CartController::class, 'removeCartTtem'])->name('RemoveCartTtem');
Route::post('update/cart/qty', [CartController::class, 'updateCartQty'])->name('UpdateCartQty');
Route::get('view/cart', [CartController::class, 'viewCart'])->name('ViewCart');
Route::get('clear/cart', [CartController::class, 'clearCart'])->name('ClearCart');


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

Route::get('/view/wishlist', [HomeController::class, 'viewWishList'])->name('ViewWishList');


Route::group(['middleware' => ['auth']], function () {

    Route::get('add/to/wishlist/{slug}', [HomeController::class, 'addToWishlist'])->name('AddToWishlist');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

});
