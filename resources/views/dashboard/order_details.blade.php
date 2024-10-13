@extends('master')

@section('header_css')
    <link rel="stylesheet" href="{{ url('assets') }}/css/plugins/bootstrap.min.css" />
    {{-- <link rel="stylesheet" href="./assets/css/plugins/animate.min.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets') }}/css/plugins/fancybox.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/plugins/icofont.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/plugins/uicons.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/user-pannel.css" />
    <style>
        .pagination {
            justify-content: center;
            align-items: center;
        }

        .order-d-info-single-card-data-list li span {
            width: 20%;
        }
    </style>
@endsection

@push('site-seo')
    @php
        $generalInfo = DB::table('general_infos')
            ->select('meta_title', 'company_name', 'fav_icon')
            ->where('id', 1)
            ->first();
    @endphp
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
@endpush

@section('content')
    <div class="ud-full-body">
        @include('dashboard.mobile_menu_offcanvus')

        {{-- <section class="getcom-user-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-9 col-12">

                    <div class="order-details-area mgTop24">
                        <div class="order-summary">
                            <div class="order-summary-head">
                                <h4 class="order-summary-head-title">
                                    <img alt="#" src="{{ url('assets') }}/img/icons/humberger.svg" />Order
                                    summary
                                </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="recent-order-table-data order-summary-table-data table">
                                    <thead>
                                        <tr>
                                            <th>Product name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $item)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('/product') }}/{{ $item->product_slug }}"
                                                        target="_blank" class="d-block">
                                                        <img alt=""
                                                            src="{{ env('ADMIN_URL') . '/' . $item->product_image }}"
                                                            style="height: 30px; width: 30px; object-fit: contain;" />
                                                        <span class="product-name">{{ $item->name }}</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="product-price">{{ number_format($item->product_price) }}
                                                        BDT @if ($item->unit_name)
                                                            / {{ $item->unit_name }}
                                                        @endif
                                                    </span>
                                                </td>
                                                <td><span class="product-quantity">{{ $item->qty }}</span></td>
                                                <td>
                                                    <span
                                                        class="product-total-price">{{ number_format($item->product_price * $item->qty) }}
                                                        BDT</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="product-total-price">{{ $item->reward_points }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <div class="order-summary multivendor-order-summery">
                                <div class="ors-paid">
                                </div>

                                <div class="order-summary-total">
                                    <h4>Total Summary</h4>
                                    <ul class="order-summary-total-list">
                                        <li class="mb-2">Subtotal<strong>{{ number_format($order->sub_total) }} TK</strong></li>
                                        <li class="mb-2">Delivery fee<strong>{{ number_format($order->delivery_fee) }} TK</strong></li>
                                        <li class="mb-2">Discount<strong>{{ number_format($order->discount) }} TK</strong></li>
                                        <li class="mb-4">Reward Points Used<strong>{{ number_format($order->reward_points_used) }}</strong></li>
                                        <li class="total-price">
                                            Total<strong>{{ number_format($order->total) }} TK</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}

        <section class="getcom-user-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="getcom-user-body-bg">
                            <img alt="" src="{{ url('assets') }}/img/user-hero-bg.png" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        @include('dashboard.menu')
                    </div>
                    <div class="col-lg-12 col-xl-9 col-12">
                        <div class="order-details-area mgTop24">
                            <div class="order-details-inner">
                                <div class="dashboard-head-widget style-2">
                                    <h5 class="dashboard-head-widget-title">
                                        Order details
                                    </h5>
                                    <div class="dashboard-head-widget-btn">
                                        <a class="theme-btn secondary-btn icon-right" href="{{ url('my/orders') }}"><i class="fi-rr-arrow-left"></i>Back to orders</a>
                                    </div>
                                </div>
                                <div class="order-details-inner">
                                    <div class="order-details-information">

                                        <div class="order-details-info-head">
                                            <div class="order-details-info-order-id">
                                                <h4 class="order-details-info-order-id-parent">
                                                    Order id<span>#{{ $order->order_no }}</span>
                                                    @if ($order->order_status == 0)
                                                        <div class="order-details-info-status"
                                                            style="background: var(--warning-color) !important;">pending</div>
                                                    @elseif($order->order_status == 1)
                                                        <div class="order-details-info-status"
                                                            style="background: var(--primary-color) !important;">Approved</div>
                                                    @elseif($order->order_status == 2)
                                                        <div class="order-details-info-status"
                                                            style="background: var(--hints-color) !important;">Intransit</div>
                                                    @elseif($order->order_status == 3)
                                                        <div class="order-details-info-status"
                                                            style="background: var(--success-color) !important;">Delivered</div>
                                                    @else
                                                        <div class="order-details-info-status"
                                                            style="background: var(--alert-color) !important;">Cancelled</div>
                                                    @endif
                                                </h4>
                                                <div class="order-details-info-date-time">
                                                    <strong>Placed on:</strong>
                                                    <span>{{ date('F d, Y h:i a', strtotime($order->order_date)) }}</span>
                                                </div>
                                            </div>
                                            <div class="od-info-head-duration">
                                                <ul>
                                                    <li>Total amount:<span>{{number_format($order->total)}} TK</span></li>
                                                    <li>
                                                        Delivery: <span>Standard Delivery (3-7 days)</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="order-details-info-card-group">

                                            <!-- Single Card -->
                                            <div class="order-d-info-single-card">
                                                <div class="order-d-info-single-card-head">
                                                    <div class="order-d-info-single-card-head-icon">
                                                        <img alt="" src="{{url('assets')}}/img/icons/shipping-box.svg" />
                                                    </div>
                                                    <h6 class="order-d-info-single-card-title">
                                                        Shipping information
                                                    </h6>
                                                </div>
                                                <ul class="order-d-info-single-card-data-list">
                                                    <li><span>Address</span><strong>{{ $order->shipping_address }}</strong></li>
                                                    <li>
                                                        <span>District</span>
                                                        <strong>{{ $order->shipping_city }}
                                                            @if ($order->shipping_post_code)
                                                                - {{ $order->shipping_post_code }}
                                                            @endif
                                                        </strong>
                                                    </li>
                                                    <li><span>Thana</span><strong>{{ $order->shipping_thana }}</strong></li>
                                                </ul>
                                            </div>
                                            <!-- Single Card -->
                                            <div class="order-d-info-single-card">
                                                <div class="order-d-info-single-card-head">
                                                    <div class="order-d-info-single-card-head-icon">
                                                        <img alt="" src="{{url('assets')}}/img/icons/shipping-box.svg" />
                                                    </div>
                                                    <h6 class="order-d-info-single-card-title">
                                                        User information
                                                    </h6>
                                                </div>
                                                <ul class="order-d-info-single-card-data-list">
                                                    <li><span>Name</span><strong>{{ $order->username }}</strong></li>
                                                    <li><span>Email</span><strong>{{ $order->user_email }}</strong></li>
                                                    <li><span>Phone</span><strong>{{ $order->phone }}</strong></li>
                                                </ul>
                                            </div>
                                            <!-- Order Tracking Card -->
                                            <div class="order-d-info-tracking-card">
                                                <div class="order-d-info-tracking-card-img">
                                                    <img alt="" src="{{url('assets')}}/img/track-image.svg" />
                                                </div>
                                                <div class="order-d-info-tracking-card-content">
                                                    <h6>Track your order instantly!</h6>
                                                    <a class="theme-btn" href="{{ url('track/my/order') }}/{{ $order->order_no }}">Track parcel<i
                                                            class="fi-rs-arrow-right"></i></a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="od-package-wrapper">

                                            <!-- Single Package -->
                                            @foreach ($orderItems as $item)
                                            <div class="single-od-package">
                                                <div class="od-package-head">
                                                    <div class="od-package-head-left">
                                                        <img src="{{url('assets')}}/img/icons/package.svg" alt="" />
                                                        <div class="od-package-head-left-info">
                                                            <h5>Package- 1</h5>
                                                            <p>
                                                                Sold by:<span>{{$item->store_name}}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                @php
                                                    $orderItemsStoreWise = DB::table('order_details')
                                                            ->join('products', 'order_details.product_id', 'products.id')
                                                            ->leftJoin('units', 'products.unit_id', 'units.id')
                                                            ->leftJoin('stores', 'order_details.store_id', 'stores.id')
                                                            ->select('products.name', 'stores.store_name', 'order_details.color_id', 'order_details.size_id', 'order_details.reward_points', 'order_details.unit_price as product_price', 'order_details.total_price', 'order_details.qty', 'units.name as unit_name', 'products.image as product_image', 'products.slug as product_slug')
                                                            ->where('order_id', $order->id)
                                                            ->where('order_details.store_id', $item->store_id)
                                                            ->get();
                                                @endphp

                                                @foreach($orderItemsStoreWise as $orderItemStoreWise)
                                                <div class="od-package-item">
                                                    <div class="od-package-info">
                                                        <img src="{{ url(env('ADMIN_URL') . '/' . $orderItemStoreWise->product_image) }}" alt="" />
                                                        <a href="{{ url('product') }}/{{ $orderItemStoreWise->product_slug }}">
                                                            {{$orderItemStoreWise->name}}<br>

                                                            @if ($orderItemStoreWise->color_id)
                                                                @php
                                                                    $colorInfo = DB::table('colors')
                                                                        ->where('id', $orderItemStoreWise->color_id)
                                                                        ->first();
                                                                @endphp
                                                                @if ($colorInfo)
                                                                    <span>Color: <strong>{{ $colorInfo ? $colorInfo->name : '' }} </strong></span>
                                                                @endif
                                                            @endif

                                                            @if ($orderItemStoreWise->size_id)
                                                                @php
                                                                    $sizeInfo = DB::table('product_sizes')
                                                                        ->where('id', $orderItemStoreWise->size_id)
                                                                        ->first();
                                                                @endphp
                                                                @if ($sizeInfo)
                                                                    <span> Size: <strong>{{ $sizeInfo ? $sizeInfo->name : '' }}</strong></span>
                                                                @endif
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="od-package-item-list">
                                                        <div class="single-od-package-item price">
                                                            <p>৳<span>{{number_format($orderItemStoreWise->product_price)}} TK</span></p>
                                                        </div>
                                                        <div class="single-od-package-item quantity">
                                                            <p>Qty: <span>{{$orderItemStoreWise->qty}}</span></p>
                                                        </div>
                                                        <div class="single-od-package-item total">
                                                            <p>Total: <span>{{number_format($orderItemStoreWise->total_price)}} TK</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="order-summary multivendor-order-summery">
                                <div class="ors-paid">
                                    <img src="{{url('assets')}}/img/icons/payment.svg" alt="" />
                                    <ul class="ors-paid-list">
                                        <li>
                                            Paid by:
                                            <span>
                                                @if($order->payment_method == 1)
                                                Cash On Delivery
                                                @elseif($order->payment_method == 2)
                                                bKash Online Payment
                                                @elseif($order->payment_method == 3)
                                                Nagad Online Payment
                                                @else
                                                Card Online Payment
                                                @endif
                                            </span>
                                        </li>
                                        <li>TRXN ID:<span>{{$order->trx_id}}</span></li>
                                    </ul>
                                </div>

                                <div class="order-summary-total">
                                    <h4>Total Summary</h4>
                                    <ul class="order-summary-total-list">
                                        <li class="mb-2">Subtotal<strong>{{ number_format($order->sub_total) }} TK</strong></li>
                                        <li class="mb-2">Delivery fee<strong>{{ number_format($order->delivery_fee) }} TK</strong></li>
                                        <li class="mb-2">Discount<strong>{{ number_format($order->discount) }} TK</strong></li>
                                        <li class="mb-4">Reward Points Used<strong>{{ number_format($order->reward_points_used) }}</strong></li>
                                        <li class="total-price">
                                            Total<strong>{{ number_format($order->total) }} TK</strong>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('footer_js')
    <script src="{{ url('assets') }}/js/plugins/jquery-migrate.js"></script>
    <script src="{{ url('assets') }}/js/plugins/modernizer.min.js"></script>
    <script src="{{ url('assets') }}/js/plugins/popper.js"></script>
    <script src="{{ url('assets') }}/js/plugins/bootstrap.min.js"></script>
    <script src="{{ url('assets') }}/js/plugins/jquery-fancybox.min.js"></script>
    <script src="{{ url('assets') }}/js/plugins/nice-select.js"></script>
    <script src="{{ url('assets') }}/js/active.js"></script>
@endsection
