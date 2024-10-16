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
        $sliders = DB::table('banners')->where('type', 1)->where('status', 1)->orderBy('serial', 'asc')->get();

        $flashSales = DB::table('products')
                        ->leftJoin('categories', 'products.category_id', 'categories.id')
                        ->leftJoin('flags', 'products.flag_id', 'flags.id')
                        ->select('categories.name as category_name', 'flags.name as flag_name', 'products.*')
                        ->where('special_offer', 1)
                        ->where('offer_end_time', '>', date("Y-m-d H:i:s"))
                        ->where('products.status', 1)
                        ->inRandomOrder()
                        ->skip(0)
                        ->limit(20)
                        ->get();

        $featuredFlags = DB::table('flags')->where('featured', 1)->where('status', 1)->orderBy('serial', 'asc')->get();
        $topBanners = DB::table('banners')->where('type', 2)->where('position', 'top')->where('status', 1)->orderBy('serial', 'asc')->get();
        $featuredCategories = DB::table('categories')->where('featured', 1)->where('status', 1)->orderBy('serial', 'asc')->get();

        $topSellingVendors = DB::table('stores')
                                ->leftJoin('order_details', 'order_details.store_id', 'stores.id')
                                ->select('stores.store_name', 'stores.store_logo', 'stores.store_banner', 'stores.slug', 'order_details.store_id', DB::raw('SUM(order_details.qty) as total_sold'))
                                ->where('stores.status', 1)
                                ->groupBy('order_details.store_id')
                                ->orderByDesc('total_sold')
                                ->skip(0)
                                ->limit(6)
                                ->get();

        $middleBanners = DB::table('banners')->where('type', 2)->where('position', 'middle')->where('status', 1)->orderBy('serial', 'asc')->get();
        $bottomBanners = DB::table('banners')->where('type', 2)->where('position', 'bottom')->where('status', 1)->orderBy('serial', 'asc')->get();
        $productsForYou = $this->productsForYou();

        return view('index', compact('sliders', 'flashSales', 'featuredFlags', 'topBanners', 'featuredCategories', 'topSellingVendors', 'middleBanners', 'bottomBanners', 'productsForYou'));
    }

    public function productsForYou($productSkip = 0){

        $alreadyOrdered = array();
        $similarCategories = array();
        $similarSubCategories = array();
        // $similarChildCategories = array();

        if(Auth::user()){

            // calculating already ordered products category start
            $similarOrderedProducts = DB::table('order_details')
                ->leftJoin('products', 'order_details.product_id', '=', 'products.id')
                ->leftJoin('orders', 'order_details.order_id', '=', 'orders.id')
                ->where('orders.user_id', Auth::user()->id)
                ->select('products.category_id', 'products.subcategory_id', 'products.childcategory_id', 'products.id as product_id')
                ->groupBy('order_details.product_id')
                ->get();

            foreach($similarOrderedProducts as $item){
                array_push($alreadyOrdered, $item->product_id);
                array_push($similarCategories, $item->category_id);
                array_push($similarSubCategories, $item->subcategory_id);
                // array_push($similarChildCategories, $item->childcategory_id);
            }

            $query = DB::table('products')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
                ->leftJoin('flags', 'products.flag_id', 'flags.id')
                ->select('products.*', 'flags.name as flag_name', 'categories.name as category_name', 'subcategories.name as subcategory_name')
                ->where('products.status', 1);

            // custom lagic for products you may like start
            if(count($alreadyOrdered) > 0){
                $query->whereNotIn('products.id', $alreadyOrdered);
            }
            if(count($similarCategories) > 0){
                $query->whereIn('products.category_id', $similarCategories);
            }
            if(count($similarSubCategories) > 0){
                $query->whereIn('products.subcategory_id', $similarSubCategories);
            }
            // if(count($similarChildCategories) > 0){
            //     $query->whereIn('products.childcategory_id', $similarChildCategories);
            // }
            // custom lagic for products you may like end

            $productsForYou = $query->orderBy('products.id', 'desc')->skip($productSkip)->limit(20)->get();

        } else {
            $productsForYou = DB::table('products')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
                ->leftJoin('flags', 'products.flag_id', 'flags.id')
                ->select('products.*', 'flags.name as flag_name', 'categories.name as category_name', 'subcategories.name as subcategory_name')
                ->where('products.status', 1)
                ->orderBy('products.id', 'desc')
                ->skip($productSkip)
                ->limit(20)
                ->get();
        }

        return $productsForYou;
    }

    public function fetchMoreProducts(Request $request){
        $product_fetch_skip = $request->product_fetch_skip;
        $totalProducts = DB::table('products')->where('products.status', 1)->count();

        if($product_fetch_skip < $totalProducts){

            $products = $this->productsForYou($product_fetch_skip);

            $countFetchedProducts = count($products);
            $returnHTML = view('homepage_sections.more_products', compact('products'))->render();
            return response()->json(['more_products' => $returnHTML, 'fetched_products' => $countFetchedProducts, 'total_products' => $totalProducts]);

        } else {
            $countFetchedProducts = 0;
            return response()->json(['fetched_products' => $countFetchedProducts, 'total_products' => $totalProducts]);
        }
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

    public function subscribeForNewsletter(Request $request){

        $data = DB::table('subscribed_users')->where('email', trim($request->email))->first();
        if($data){
            Toastr::warning('Already Subscribed', 'Success');
            return back();
        } else {
            DB::table('subscribed_users')->insert([
                'email' => $request->email,
                'created_at' => Carbon::now()
            ]);
            Toastr::success('Successfully Subscribed', 'Success');
            return back();
        }
    }

    public function checkProductVariant(Request $request){

        $query = DB::table('product_variants')->where('product_id', $request->product_id);
        if($request->color_id != 'null'){
            $query->where('color_id', $request->color_id);
        }
        if($request->size_id != 'null'){
            $query->where('size_id', $request->size_id);
        }

        $data = $query->where('stock', '>', 0)->orderBy('discounted_price', 'asc')->orderBy('price', 'asc')->first();
        if($data){

            $product = DB::table('products')->where('id', $request->product_id)->first();
            $returnHTML = view('product_details.cart_buy_button', compact('product'))->render();
            return response()->json([
                'rendered_button' => $returnHTML,
                'price' => $data->price,
                'discounted_price' => $data->discounted_price,
                'stock' => $data->stock
            ]);

        }else {
            return response()->json(['price' => 0, 'discounted_price' => 0, 'save' => 0, 'stock' => 0]);
        }

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

    public function about(){
        $data = DB::table('about_us')->where('id', 1)->first();
        $testimonials = DB::table('testimonials')->orderBy('id', 'desc')->get();
        $brands = DB::table('brands')->where('logo', '!=', null)->where('logo', '!=', '')->orderBy('serial', 'asc')->get();
        $stores = DB::table('stores')->inRandomOrder()->get();
        return view('about', compact('data', 'testimonials', 'brands', 'stores'));
    }

    public function contact(){
        $contactInfo = DB::table('general_infos')
                                        ->select('email', 'address', 'contact', 'trade_license_no', 'google_map_link')
                                        ->where('id', 1)
                                        ->first();
        $data = DB::table('faqs')->orderBy('id', 'desc')->get();
        return view('contact', compact('data', 'contactInfo'));
    }

    public function submitContactRequest(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);

        DB::table('contact_requests')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => null,
            'message' => $request->message,
            'status' => 0,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Request is Submitted', 'Success');
        return back();
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
                        ->leftJoin('categories', 'products.category_id', 'categories.id')
                        ->leftJoin('flags', 'products.flag_id', 'flags.id')
                        ->select('categories.name as category_name', 'flags.name as flag_name', 'products.*')
                        ->where('products.store_id', $product->store_id)
                        ->where('products.id', '!=', $product->id)
                        ->inRandomOrder()
                        ->skip(0)
                        ->limit(12)
                        ->get();
        } else{
            $vendorProducts = array();
        }

        $relatedProducts = DB::table('products')
                            ->leftJoin('categories', 'products.category_id', 'categories.id')
                            ->leftJoin('flags', 'products.flag_id', 'flags.id')
                            ->select('categories.name as category_name', 'flags.name as flag_name', 'products.*')
                            ->where('products.category_id', $product->category_id)
                            ->where('products.id', '!=', $product->id)
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

        return view('product_details.details', compact('vendorProducts', 'relatedProducts', 'mayLikedProducts', 'product', 'averageRating', 'totalReviews', 'productReviews', 'productMultipleImages', 'variants', 'configSetup'));
    }

    public function shop(Request $request)
    {
        $categories = DB::table('categories')->where('status', 1)->orderBy('serial', 'asc')->get();
        $flags = DB::table('flags')->where('status', 1)->orderBy('id', 'desc')->get();
        $brands = DB::table('brands')->where('status', 1)->orderBy('serial', 'asc')->get();
        $sizes = DB::table('product_sizes')->where('status', 1)->orderBy('serial', 'asc')->get();
        $shopBanner = DB::table('banners')->where('type', 2)->where('position', 'shop')->orderBy('id', 'desc')->first();
        $colors = DB::table('product_variants')
                    ->join('colors', 'product_variants.color_id', 'colors.id')
                    ->select('colors.*')
                    ->groupBy('product_variants.color_id')
                    ->orderBy('colors.name', 'asc')
                    ->get();
        $policies = DB::table('terms_and_policies')->where('id', 1)->first();

        $query = DB::table('products')
            ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('child_categories', 'products.childcategory_id', '=', 'child_categories.id')
            ->leftJoin('flags', 'products.flag_id', 'flags.id')
            ->leftJoin('brands', 'products.brand_id', 'brands.id')
            ->leftJoin('product_variants', 'products.id', 'product_variants.product_id')
            ->leftJoin('product_sizes', 'product_variants.size_id', 'product_sizes.id')
            ->leftJoin('colors', 'product_variants.color_id', 'colors.id')
            ->select('products.*', 'flags.name as flag_name', 'categories.name as category_name')
            ->groupBy('products.id')
            ->where('products.status', 1)
            ->where('stores.status', 1);


        // ============== applying filters from url parameter start ================
        $parameters = '';
        $categorySlug = isset($request->category) ? $request->category : '';
        $subcategorySlug = isset($request->subcategory) ? $request->subcategory : '';
        $childcategorySlug = isset($request->childcategory) ? $request->childcategory : '';
        $flagSlug = isset($request->flag) ? $request->flag : '';
        $brandSlug = isset($request->brand) ? $request->brand : '';
        $sizeSlug = isset($request->size) ? $request->size : '';
        $colorId = isset($request->color) ? $request->color : '';
        $sort_by = isset($request->sort_by) ? $request->sort_by : '';
        $min_price = isset($request->min_price) ? $request->min_price : '';
        $max_price = isset($request->max_price) ? $request->max_price : '';
        $search_keyword = isset($request->search_keyword) ? $request->search_keyword : '';
        $storeSlug = isset($request->store) ? $request->store : '';
        $parameters = '';

        if($categorySlug){
            $query->whereIn('categories.slug', explode(",", $categorySlug));
            $parameters == '' ? $parameters .= '?category=' . $categorySlug : $parameters .= '&category=' . $categorySlug;
        }
        if($subcategorySlug){
            $query->where('subcategories.slug', $subcategorySlug);
            $parameters == '' ? $parameters .= '?subcategory=' . $subcategorySlug : $parameters .= '&subcategory=' . $subcategorySlug;
        }
        if($childcategorySlug){
            $query->where('child_categories.slug', $childcategorySlug);
            $parameters == '' ? $parameters .= '?childcategory=' . $childcategorySlug : $parameters .= '&childcategory=' . $childcategorySlug;
        }
        if($flagSlug){
            $query->whereIn('flags.slug', explode(",",$flagSlug));
            $parameters == '' ? $parameters .= '?flag=' . $flagSlug : $parameters .= '&flag=' . $flagSlug;
        }
        if($brandSlug){
            $query->whereIn('brands.slug', explode(",",$brandSlug));
            $parameters == '' ? $parameters .= '?brand=' . $brandSlug : $parameters .= '&brand=' . $brandSlug;
        }
        if($sizeSlug){
            $query->whereIn('product_sizes.slug', explode(",",$sizeSlug));
            $parameters == '' ? $parameters .= '?size=' . $sizeSlug : $parameters .= '&size=' . $sizeSlug;
        }
        if($colorId){
            $query->whereIn('colors.id', explode(",",$colorId));
            $parameters == '' ? $parameters .= '?color=' . $colorId : $parameters .= '&color=' . $colorId;
        }

        // sorting
        if($sort_by && $sort_by > 0){
            if($sort_by == 1){
                $query->orderBy('products.id', 'desc');
            }
            if($sort_by == 2){
                $query->orderBy('products.discount_price', 'asc')->orderBy('products.price', 'asc');
            }
            if($sort_by == 3){
                $query->orderBy('products.discount_price', 'desc')->orderBy('products.price', 'desc');
            }
            $parameters == '' ? $parameters .= '?sort_by=' . $sort_by : $parameters .= '&sort_by=' . $sort_by;
        } else {
            $query->orderBy('products.id', 'desc');
        }

        // min price
        if($min_price && $min_price > 0){
            $query->where(function($query) use ($min_price) {
                $query->where('products.discount_price', '>=', $min_price)->orWhere('products.price', '>=', $min_price);
            });
            $parameters == '' ? $parameters .= '?min_price=' . $min_price : $parameters .= '&min_price=' . $min_price;
        }
        // max price
        if($max_price && $max_price > 0){
            $query->where(function($query) use ($max_price) {
                $query->where([['products.discount_price', '<=', $max_price], ['products.discount_price', '>', 0]])->orWhere([['products.price', '<=', $max_price], ['products.price', '>', 0]]);
            });
            $parameters == '' ? $parameters .= '?max_price=' . $max_price : $parameters .= '&max_price=' . $max_price;
        }

        // search keyword
        if($search_keyword){
            $query->where('products.name', 'LIKE', '%'.$search_keyword.'%');
            $parameters == '' ? $parameters .= '?search_keyword=' . $search_keyword : $parameters .= '&search_keyword=' . $search_keyword;
        }

        // store
        $storeInfo = null;
        $productReviewsOfStore = null;
        if($storeSlug){
            $storeInfo = DB::table('stores')->where('slug', $storeSlug)->first();
            $query->where('stores.slug', $storeSlug);
            $parameters == '' ? $parameters .= '?store=' . $storeSlug : $parameters .= '&store=' . $storeSlug;

            $productReviewsOfStore = DB::table('product_reviews')
                                    ->leftJoin('products', 'product_reviews.product_id', 'products.id')
                                    ->leftJoin('users', 'product_reviews.user_id', 'users.id')
                                    ->select('product_reviews.*', 'products.name', 'products.image', 'users.image as customer_image', 'users.name as customer_name')
                                    ->where('products.store_id', $storeInfo->id)
                                    ->paginate(10);
        }

        // setting pagination with custom path and parameters

        $products = $query->paginate(16);
        $products->withPath('/shop'.$parameters);
        $showingResults = "Showing ".(($products->currentpage()-1)*$products->perpage()+1)." - ".$products->currentpage()*$products->perpage()." of ".$products->total()." results";
        return view('shop.shop', compact('policies', 'productReviewsOfStore', 'shopBanner', 'sizes', 'showingResults', 'products', 'categories', 'flags', 'brands', 'colors',  'categorySlug', 'subcategorySlug', 'childcategorySlug', 'flagSlug', 'brandSlug', 'sizeSlug', 'colorId', 'sort_by', 'min_price', 'max_price', 'search_keyword', 'storeInfo'));
    }

    public function privacyPolicy(){
        $pageTitle = "Privacy Policy";
        $pageUrl = url('/privacy/policy');
        $policy = DB::table('terms_and_policies')->select('privacy_policy as policy')->first();
        return view('policy', compact('pageTitle', 'pageUrl', 'policy'));
    }

    public function termsOfServices(){
        $pageTitle = "Terms of Services";
        $pageUrl = url('/terms/of/services');
        $policy = DB::table('terms_and_policies')->select('terms as policy')->first();
        return view('policy', compact('pageTitle', 'pageUrl', 'policy'));
    }

    public function returnPolicy(){
        $pageTitle = "Return Policy";
        $pageUrl = url('/return/policy');
        $policy = DB::table('terms_and_policies')->select('return_policy as policy')->first();
        return view('policy', compact('pageTitle', 'pageUrl', 'policy'));
    }

    public function shippingPolicy(){
        $pageTitle = "Shipping Policy";
        $pageUrl = url('/shipping/policy');
        $policy = DB::table('terms_and_policies')->select('shipping_policy as policy')->first();
        return view('policy', compact('pageTitle', 'pageUrl', 'policy'));
    }

}
