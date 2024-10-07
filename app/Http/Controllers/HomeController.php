<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addToWishlist($slug){

        $productInfo = DB::table('products')->where('slug', $slug)->first();

        if(DB::table('wish_lists')->where('product_id', $productInfo->id)->where('user_id', Auth::user()->id)->exists()){
            Toastr::warning('Already in Wishlist');
            return back();
        } else {
            DB::table('wish_lists')->insert([
                'product_id' => $productInfo->id,
                'user_id' => Auth::user()->id,
                'slug' => str::random(5) . time(),
                'created_at' => Carbon::now()
            ]);
            Toastr::success('Added to Wishlist');
            return back();
        }

    }

    public function viewWishList()
    {
        $products = DB::table('wish_lists')
                        ->leftJoin('products', 'wish_lists.product_id', 'products.id')
                        ->select('products.*')
                        ->where('user_id', Auth::user()->id)
                        ->get();

        return view('wishlist', compact('products'));
    }
}
