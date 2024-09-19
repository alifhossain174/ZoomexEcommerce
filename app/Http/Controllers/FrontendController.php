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

    public function searchForProducts(Request $request){
        $searchKeyword = $request->search_keyword;
        return redirect('shop?search_keyword='.$searchKeyword);
    }

    public function productLiveSearch(Request $request){
        $searchProducts = DB::table('products')
                        ->select('id', 'slug', 'image', 'name', 'price', 'discount_price')
                        ->where('name', 'LIKE', '%'.$request->search_keyword.'%')
                        ->where('status', 1)
                        ->orderBy('name', 'asc')
                        ->skip(0)
                        ->limit(5)
                        ->get();

        $searchResults = view('live_search_products', compact('searchProducts'))->render();
        return response()->json(['searchResults' => $searchResults]);
    }

    public function trackOrder($orderNo){
        $orderInfo = DB::table('orders')->where('order_no', $orderNo)->first();

        $orderdItems = '';
        $orderProgress = '';

        if($orderInfo){
            $orderdItems = DB::table('order_details')
                        ->join('orders', 'order_details.order_id', 'orders.id')
                        ->join('products', 'order_details.product_id', 'products.id')
                        ->leftJoin('colors', 'order_details.color_id', 'colors.id')
                        ->leftJoin('product_sizes', 'order_details.size_id', 'product_sizes.id')
                        ->select('products.name as product_name', 'products.image as product_image', 'colors.name as color_name', 'product_sizes.name as size_name', 'order_details.product_id', 'order_details.total_price', 'order_details.qty')
                        ->where('orders.id', $orderInfo->id)
                        ->get();
            $orderProgress = DB::table('order_progress')->where('order_id', $orderInfo->id)->orderBy('order_status', 'asc')->get();
        }

        return view('track_order', compact('orderInfo', 'orderdItems', 'orderProgress'));
    }

    public function trackOrderNo(Request $request){
        $orderInfo = DB::table('orders')->where('order_no', $request->order_no)->first();

        $orderdItems = '';
        $orderProgress = '';

        if($orderInfo){
            $orderdItems = DB::table('order_details')
                            ->join('orders', 'order_details.order_id', 'orders.id')
                            ->join('products', 'order_details.product_id', 'products.id')
                            ->leftJoin('colors', 'order_details.color_id', 'colors.id')
                            ->leftJoin('product_sizes', 'order_details.size_id', 'product_sizes.id')
                            ->select('products.name as product_name', 'products.image as product_image', 'colors.name as color_name', 'product_sizes.name as size_name', 'order_details.product_id', 'order_details.total_price', 'order_details.qty')
                            ->where('orders.id', $orderInfo->id)
                            ->get();
            $orderProgress = DB::table('order_progress')->where('order_id', $orderInfo->id)->orderBy('order_status', 'asc')->get();
        }

        return view('track_order', compact('orderInfo', 'orderdItems', 'orderProgress'));
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

    public function productDetails($slug)
    {
        $product = DB::table('products')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', 'brands.id')
            ->leftJoin('product_models', 'products.model_id', 'product_models.id')
            ->select('products.*', 'categories.name as category_name', 'categories.slug as category_slug', 'brands.name as brand_name', 'brands.logo as brand_logo', 'product_models.name as model_name')
            ->where('products.slug', $slug)
            ->first();

        if($product->store_id){
            $vendorProducts = DB::table('products')
                        ->select('products.image', 'products.name', 'price', 'discount_price', 'products.id', 'products.slug', 'stock', 'has_variant')
                        ->where('store_id', $product->store_id)
                        ->where('id', '!=', $product->id)
                        ->inRandomOrder()
                        ->skip(0)
                        ->limit(12)
                        ->get();
        } else{
            $vendorProducts = array();
        }

        $relatedProducts = DB::table('products')
                            ->select('products.image', 'products.name', 'price', 'discount_price', 'products.id', 'products.slug', 'stock', 'has_variant')
                            ->where('category_id', $product->category_id)
                            ->where('id', '!=', $product->id)
                            ->inRandomOrder()
                            ->skip(0)
                            ->limit(12)
                            ->get();

        $mayLikedProducts = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('flags', 'products.flag_id', 'flags.id')
            ->select('products.image', 'products.name', 'price', 'discount_price', 'products.id', 'products.slug', 'stock', 'has_variant', 'flags.name as flag_name', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->where('products.id', '!=', $product->id)
            ->inRandomOrder()
            ->skip(0)
            ->limit(18)
            ->get();

        $productReviews = DB::table('product_reviews')
            ->leftJoin('users', 'product_reviews.user_id', 'users.id')
            ->select('product_reviews.rating', 'product_reviews.review', 'product_reviews.reply', 'product_reviews.created_at', 'product_reviews.updated_at', 'product_reviews.status', 'users.name as username', 'users.image as user_image')
            ->where('product_reviews.product_id', $product->id)
            ->where('product_reviews.status', 1)
            ->orderBy('product_reviews.id', 'desc')
            ->paginate(10);

        $totalReviews = $productReviews->total();
        $totalRating = DB::table('product_reviews')->where('product_reviews.product_id', $product->id)->where('product_reviews.status', 1)->sum('rating');
        $averageRating = $totalReviews > 0 ? $totalRating/$totalReviews : 0;

        $productMultipleImages = DB::table('product_images')->select('image')->where('product_id', $product->id)->get();
        $variants = DB::table('product_variants')
            ->leftJoin('colors', 'product_variants.color_id', 'colors.id')
            ->leftJoin('product_sizes', 'product_variants.size_id', 'product_sizes.id')
            ->select('product_variants.*', 'colors.id as color_id', 'colors.name as color_name', 'colors.code as color_code', 'product_sizes.name as size_name')
            ->where('product_variants.product_id', $product->id)
            ->get();

        $configSetup = DB::table('config_setups')->get();

        return view('product_details', compact('vendorProducts', 'relatedProducts', 'mayLikedProducts', 'product', 'averageRating', 'totalReviews', 'productReviews', 'productMultipleImages', 'variants', 'configSetup'));
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

    public function error_404()
    {
        return view('error_404');
    }

}
