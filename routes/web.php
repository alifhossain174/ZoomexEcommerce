<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CheckoutController;
use Spatie\Honeypot\ProtectAgainstSpam;

Auth::routes();


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::post('/fetch/more/products', [FrontendController::class, 'fetchMoreProducts'])->name('FetchMoreProducts');
Route::get('/search/for/products', [FrontendController::class, 'searchForProducts'])->name('SearchForProducts');
Route::post('/product/live/search', [FrontendController::class, 'productLiveSearch'])->name('ProductLiveSearch');
Route::post('/subscribe/for/newsletter', [FrontendController::class, 'subscribeForNewsletter'])->name('SubscribeForNewsletter')->middleware(ProtectAgainstSpam::class)->middleware(['throttle:3,1']);
Route::get('/product/{slug}', [FrontendController::class, 'productDetails'])->name('ProductDetails');
Route::post('check/product/variant', [FrontendController::class, 'checkProductVariant'])->name('CheckProductVariant');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::post('/filter/products', [FilterController::class, 'filterProducts'])->name('FilterProducts');


Route::get('track/order/{order_no}', [FrontendController::class, 'trackOrder'])->name('TrackOrder');
Route::get('track/order', [FrontendController::class, 'trackOrderNo'])->name('TrackOrderNo');


Route::get('/about', [FrontendController::class, 'about'])->name('About');
Route::get('/contact', [FrontendController::class, 'contact'])->name('Contact');
Route::post('/submit/contact/request', [FrontendController::class, 'submitContactRequest'])->name('SubmitContactRequest')->middleware(ProtectAgainstSpam::class)->middleware(['throttle:3,1']);


// policy pages
Route::get('privacy/policy', [FrontendController::class, 'privacyPolicy'])->name('PrivacyPolicy');
Route::get('terms/of/services', [FrontendController::class, 'termsOfServices'])->name('TermsOfServices');
Route::get('return/policy', [FrontendController::class, 'returnPolicy'])->name('ReturnPolicy');
Route::get('shipping/policy', [FrontendController::class, 'shippingPolicy'])->name('ShippingPolicy');


// vendor
Route::get('/vendor/shops', [VendorController::class, 'vendorShops'])->name('VendorShops');
Route::get('/vendor/registration', [VendorController::class, 'vendorRegistration'])->name('VendorRegistration');
Route::post('/submit/vendor/registration/request', [VendorController::class, 'submitVendorRegistration'])->name('SubmitVendorRegistration');
Route::get('/vendor/verification', [VendorController::class, 'vendorVerification'])->name('VendorVerification');
Route::get('/vendor/verification/resend', [VendorController::class, 'vendorVerificationResend'])->name('vendorVerificationResend');
Route::post('/vendor/verify/check', [VendorController::class, 'vendorVerificationCheck'])->name('VendorVerificationCheck');


// social login
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('RedirectToGoogle');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('HandleGoogleCallback');


// cart
Route::get('add/to/cart/{id}', [CartController::class, 'addToCart'])->name('AddToCart');
Route::post('add/to/cart/with/qty', [CartController::class, 'addToCartWithQty'])->name('AddToCartWithQty');
Route::get('remove/cart/item/{id}', [CartController::class, 'removeCartTtem'])->name('RemoveCartTtem');
Route::post('update/cart/qty', [CartController::class, 'updateCartQty'])->name('UpdateCartQty');
Route::get('view/cart', [CartController::class, 'viewCart'])->name('ViewCart');
Route::get('clear/cart', [CartController::class, 'clearCart'])->name('ClearCart');


// blog routes
Route::get('/blogs', [BlogController::class, 'blogs'])->name('Blogs');
Route::get('/blog/category/{slug}', [BlogController::class, 'blogCategory'])->name('BlogCategory');
Route::get('/blog/details/{slug}', [BlogController::class, 'blogDetails'])->name('BlogDetails');



Route::group(['middleware' => ['auth']], function () {

    Route::get('/user/verification', [HomeController::class, 'userVerification'])->name('UserVerification');
    Route::post('/user/verify/check', [HomeController::class, 'userVerifyCheck'])->name('UserVerifyCheck');
    Route::get('/user/verification/resend', [HomeController::class, 'userVerificationResend'])->name('UserVerificationResend');

    Route::group(['middleware' => ['CheckUserVerification']], function () {

        // place order related routes
        Route::get('checkout', [CheckoutController::class, 'checkout'])->name('Checkout')->middleware(['throttle:5,1']);
        Route::post('apply/coupon', [CheckoutController::class, 'applyCoupon'])->name('ApplyCoupon');
        Route::get('remove/applied/coupon', [CheckoutController::class, 'removeAppliedCoupon'])->name('RemoveAppliedCoupon');
        Route::post('district/wise/thana', [CheckoutController::class, 'districtWiseThana'])->name('DistrictWiseThana');
        Route::post('change/delivery/method', [CheckoutController::class, 'changeDeliveryMethod'])->name('ChangeDeliveryMethod');
        Route::post('place/order', [CheckoutController::class, 'placeOrder'])->name('PlaceOrder');
        Route::get('order/{slug}', [CheckoutController::class, 'orderPreview'])->name('OrderPreview');


        Route::post('submit/product/review', [HomeController::class, 'submitProductReview'])->name('SubmitProductReview');
        Route::get('add/to/wishlist/{slug}', [HomeController::class, 'addToWishlist'])->name('AddToWishlist');
        Route::get('/home', [HomeController::class, 'index'])->name('home');

    });

});
