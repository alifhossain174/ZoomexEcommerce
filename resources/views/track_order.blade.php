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
                'email',
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
    <meta property="og:title" content="@if ($generalInfo && $generalInfo->meta_og_title) {{ $generalInfo->meta_og_title }} @else {{ $generalInfo->company_name }} @endif" />
    <meta property="og:type" content="Ecommerce" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ env('ADMIN_URL') . '/' . $generalInfo->meta_og_image }}" />
    <meta property="og:site_name" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta property="og:description" content="{{ $generalInfo->meta_og_description }}" />
    <!-- End Open Graph general (Facebook, Pinterest)-->
@endpush

@section('header_css')
    <link rel="stylesheet" href="{{url('assets')}}/css/plugins/icofont.css" />
    <link rel="stylesheet" href="{{url('assets')}}/css/plugins/uicons.css" />
    <link rel="stylesheet" href="{{url('assets')}}/css/user-pannel.css" />
@endsection

@section('content')

    <div class="ud-full-body">
        <!-- Dashboard Area -->
        <section class="getcom-user-body">

            <!-- Guest Order Tracking Hero -->
            <div class="guest-order-tracking-hero" style="background-image: url('{{url('assets')}}/img/order-tracking/guest-order-tracking-hero-bg.png');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-8 col-12">
                            <div class="guest-order-tracking-hero-info">
                                <h2>Track your order</h2>
                                <form action="#" method="post">
                                    <input type="text" name="order-id" placeholder="Input order id" required />
                                    <button type="submit" class="theme-btn">
                                        Track order
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-8 col-12">
                        <div class="guest-order-tracking-area">
                            <div class="order-tracking-card-group">
                                <div class="single-order-tracking-card card-1">
                                    <div class="order-tracking-card-icon">
                                        <img alt="" src="{{url('assets')}}/img/order-tracking/card-icon-1.svg" />
                                    </div>
                                    <div class="order-tracking-card-info">
                                        <h6>#0002523352</h6>
                                        <p>Order number</p>
                                    </div>
                                </div>
                                <div class="single-order-tracking-card card-2">
                                    <div class="order-tracking-card-icon">
                                        <img alt="" src="{{url('assets')}}/img/order-tracking/card-icon-2.svg" />
                                    </div>
                                    <div class="order-tracking-card-info">
                                        <h6>August 9, 2023</h6>
                                        <p>Estimated delivery date</p>
                                    </div>
                                </div>
                                <div class="single-order-tracking-card card-3">
                                    <div class="order-tracking-card-icon">
                                        <img alt="" src="{{url('assets')}}/img/order-tracking/card-icon-3.svg" />
                                    </div>
                                    <div class="order-tracking-card-info">
                                        <h6>4 items</h6>
                                        <p>Total products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-12">
                                    <div class="product-summary order-summary">
                                        <div class="product-summary-head order-summary-head">
                                            <h4 class="order-summary-head-title">
                                                <img alt="" src="{{url('assets')}}/img/icons/humberger.svg" />Product summary
                                            </h4>
                                            <div class="product-summary-subtotal">
                                                <span>Subtotal: <strong>42,000 BDT</strong></span>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="recent-order-table-data order-summary-table-data table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img alt="" src="{{url('assets')}}/img/my-order-product/product-1.png" /><span
                                                                class="product-name">Ready made cape</span>
                                                        </td>
                                                        <td>
                                                            <span class="product-color">Color: <strong>White</strong></span>
                                                        </td>
                                                        <td>
                                                            <span class="product-size">Size: <strong>Large</strong></span>
                                                        </td>
                                                        <td>
                                                            <span class="product-qty">Qty: <strong>1 pcs</strong></span>
                                                        </td>
                                                        <td>
                                                            <span class="product-total-price">Price: <strong>5,000
                                                                    BDT</strong></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img alt=""
                                                                src="{{url('assets')}}/img/my-order-product/product-2.png" /><span
                                                                class="product-name">Ready made t-shirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="product-color">Color: <strong>Blue</strong></span>
                                                        </td>
                                                        <td>
                                                            <span class="product-size">Storage:
                                                                <strong>6/128</strong></span>
                                                        </td>
                                                        <td>
                                                            <span class="product-qty">Qty: <strong>1 pcs</strong></span>
                                                        </td>
                                                        <td>
                                                            <span class="product-total-price">Price: <strong>35,000
                                                                    BDT</strong></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img alt=""
                                                                src="{{url('assets')}}/img/my-order-product/product-3.png" /><span
                                                                class="product-name">Design mug</span>
                                                        </td>
                                                        <td>
                                                            <span class="product-color">Color: <strong>Blue</strong></span>
                                                        </td>
                                                        <td>
                                                            <span class="product-size">Storage:
                                                                <strong>6/128</strong></span>
                                                        </td>
                                                        <td>
                                                            <span class="product-qty">Qty: <strong>1 pcs</strong></span>
                                                        </td>
                                                        <td>
                                                            <span class="product-total-price">Price: <strong>2,000
                                                                    BDT</strong></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-status-area">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 col-12">
                                        <div class="order-status-section-head">
                                            <h4 class="order-status-s-head-title">
                                                Order timeline
                                            </h4>
                                            <div class="seperator-group">
                                                <span class="seperator seperator-1"></span><span
                                                    class="seperator seperator-2"></span><span
                                                    class="seperator seperator-3"></span>
                                            </div>
                                            <div class="seperator-group">
                                                <span class="seperator-sm"></span><span class="seperator-big"></span><span
                                                    class="seperator-sm"></span>
                                            </div>
                                        </div>
                                        <div class="order-status-card-group">
                                            <div class="single-order-status-card card-1">
                                                <div class="order-status-card-icon">
                                                    <i class="fi-br-check"></i>
                                                </div>
                                                <div class="order-status-card-info">
                                                    <h6>Order placed</h6>
                                                    <p>We have received your order</p>
                                                    <ul>
                                                        <li>05 Feb, 23</li>
                                                        <li>05:30 PM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="single-order-status-card card-2">
                                                <div class="order-status-card-icon">
                                                    <i class="fi-br-check"></i>
                                                </div>
                                                <div class="order-status-card-info">
                                                    <h6>Order confirmed</h6>
                                                    <p>Your order has been confirmed</p>
                                                    <ul>
                                                        <li>05 Feb, 23</li>
                                                        <li>05:30 PM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="single-order-status-card card-3">
                                                <div class="order-status-card-icon">
                                                    <i class="fi-br-check"></i>
                                                </div>
                                                <div class="order-status-card-info">
                                                    <h6>Order processed</h6>
                                                    <p>We are preparing your order</p>
                                                    <ul>
                                                        <li>05 Feb, 23</li>
                                                        <li>05:30 PM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="single-order-status-card card-4">
                                                <div class="order-status-card-icon">
                                                    <i class="fi-br-check"></i>
                                                </div>
                                                <div class="order-status-card-info">
                                                    <h6>On the way</h6>
                                                    <p>We are on the way to your destination</p>
                                                    <ul>
                                                        <li>05 Feb, 23</li>
                                                        <li>05:30 PM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="single-order-status-card card-5">
                                                <div class="order-status-card-icon-cross">
                                                    <i class="fi-br-cross"></i>
                                                </div>
                                                <div class="order-status-card-info">
                                                    <h6>Ready to pickup</h6>
                                                    <p>Your order is ready to pickup</p>
                                                    <ul>
                                                        <li>05 Feb, 23</li>
                                                        <li>05:30 PM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Dashboard Area -->
    </div>

@endsection
