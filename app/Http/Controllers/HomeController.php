<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
