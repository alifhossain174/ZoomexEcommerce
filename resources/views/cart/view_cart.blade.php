@extends('master')


@push('site-seo')
    @php
        $generalInfo = DB::table('general_infos')
            ->select(
                'meta_title',
                'meta_og_title',
                'meta_keywords',
                'meta_description',
                'meta_og_description',
                'meta_og_image',
                'company_name',
                'fav_icon',
            )
            ->where('id', 1)
            ->first();
    @endphp

    <meta name="keywords" content="{{ $generalInfo ? $generalInfo->meta_keywords : '' }}" />
    <meta name="description" content="{{ $generalInfo ? $generalInfo->meta_description : '' }}" />
    <meta name="author" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta name="copyright" content="{{ $generalInfo ? $generalInfo->company_name : '' }}">
    <meta name="url" content="{{ env('APP_URL') }}">

    <title>
        @if ($generalInfo && $generalInfo->meta_title)
            {{ $generalInfo->meta_title }}
        @else
            {{ $generalInfo->company_name }}
        @endif
    </title>
    @if ($generalInfo && $generalInfo->fav_icon)
        <link rel="icon" href="{{ env('ADMIN_URL') . '/' . $generalInfo->fav_icon }}" type="image/x-icon" />
    @endif

    <!-- Open Graph general (Facebook, Pinterest)-->
    <meta property="og:title"
        content="@if ($generalInfo && $generalInfo->meta_og_title) {{ $generalInfo->meta_og_title }} @else {{ $generalInfo->company_name }} @endif" />
    <meta property="og:type" content="Ecommerce" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ env('ADMIN_URL') . '/' . $generalInfo->meta_og_image }}" />
    <meta property="og:site_name" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta property="og:description" content="{{ $generalInfo->meta_og_description }}" />
    <!-- End Open Graph general (Facebook, Pinterest)-->
@endpush


@section('content')
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="{{url('view/cart')}}">Shopping Cart</a></li>
                <li><a href="{{url('checkout')}}">Checkout</a></li>
                <li><a href="javascript:void(0)">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg mb-10">
                <div class="col-lg-8 pr-lg-4 mb-6">
                    <table class="shop-table cart-table">
                        <thead>
                            <tr>
                                <th class="product-name text-center"><span>Image</span></th>
                                <th class="product-name text-center"><span>Product Name</span></th>
                                <th class="product-price text-center"><span>Unit Price</span></th>
                                <th class="product-quantity text-center"><span>Quantity</span></th>
                                <th class="product-subtotal text-center"><span>Subtotal</span></th>
                            </tr>
                        </thead>
                        <tbody id="view_cart_items">
                            @include('cart.cart_items')
                        </tbody>
                    </table>

                    <div class="cart-action mb-6 mt-5">
                        <div class="row">
                            <div class="col-lg-6 pb-2">
                                <a href="{{url('/shop')}}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                            </div>
                            <div class="col-lg-6 text-right pb-2">
                                <a href="{{url('/clear/cart')}}" class="btn btn-rounded btn-default btn-clear">
                                    Clear Cart
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar">
                        <div class="cart-summary mb-4" id="view_cart_calculation">
                            @include('cart.cart_calculation')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
@endsection
