<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function setPassword()
    {
        return view('set_password');
    }

    public function forgetPassword(){
        return view('forget_password');
    }

    public function verifySuccess()
    {
        return view('verify_success');
    }

    public function verifyOtp()
    {
        return view('verify_otp');
    }

    public function about(){
        return view('about');
    }

    public function blogs(){
        return view('blogs');
    }

    public function blogDetails(){
        return view('blog_details');
    }

    public function productDetails()
    {
        return view('product_details');
    }

    public function order()
    {
        return view('order');
    }

    public function orderSuccessful()
    {
        return view('order_successful');
    }

    public function orderView()
    {
        return view('order_view');
    }

    public function becomeaVendor(){
        return view('become-a-vendor');
    }

    public function vendorShopDetails()
    {
        return view('vendor_shop_details');
    }

    public function vendorShop()
    {
        return view('vendor_shop');
    }

    public function vendorRegister()
    {
        return view('vendor_register');
    }

    public function shop()
    {
        return view('shop');
    }

    public function cart(){
        return view('cart');
    }

    public function category(){
        return view('category');
    }

    public function checkout(){
        return view('checkout');
    }

    public function contactUs(){
        return view('contact_us');
    }

    public function faq(){
        return view('faq');
    }

    public function wishlist()
    {
        return view('wishlist');
    }

    public function error_404()
    {
        return view('error_404');
    }














}
