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
        .page-link{
            padding: 8px !important ;
            font-size: 18px !important ;
        }

        .pagination {
            justify-content: center;
            align-items: center;
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

                        {{-- <div class="dashboard-my-order mgTop24">
                            <div class="dashboard-head-widget style-2">
                                <h5 class="dashboard-head-widget-title">My orders</h5>
                                <div class="dashboard-head-widget-select">
                                    <span>Sort by:</span>
                                    <form action="{{url('my/orders')}}" method="GET">
                                        <select aria-label="Show All Orders" class="form-select" name="order_status" onchange='this.form.submit()'>
                                            <option value="">Show All Orders</option>
                                            <option value="1" @if (isset($order_status) && $order_status == 1) selected @endif>Pending</option>
                                            <option value="2" @if (isset($order_status) && $order_status == 2) selected @endif>Approve</option>
                                            <option value="3" @if (isset($order_status) && $order_status == 3) selected @endif>Intransit</option>
                                            <option value="4" @if (isset($order_status) && $order_status == 4) selected @endif>Delivered</option>
                                            <option value="5" @if (isset($order_status) && $order_status == 5) selected @endif>Cancelled</option>
                                        </select>
                                    <form>
                                </div>
                            </div>
                            <div class="dashboard-my-order-table">
                                <div class="table-responsive">
                                    <table class="recent-order-table-data table">
                                        <tbody>

                                            @if (count($orders) > 0)
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    <img alt="" src="{{url('assets')}}/img/dashboard-data-card-images/icon-1.svg" style="height: 30px; width: 30px"/>
                                                </td>
                                                <td>
                                                    <span class="product-name" style="font-size: 15px; font-weight: 600; color: var(--ud-primary-color);">
                                                        Order No #{{$order->order_no}}
                                                    </span>
                                                    <strong class="product-date" style="font-size: 15px; font-style: normal; font-weight: 600;">{{ date('jS M, Y h:i A', strtotime($order->order_date)) }}</strong>
                                                </td>
                                                <td>

                                                    @if ($order->order_status == 0)
                                                        <span class="product-status-btn in-progress" style="font-size: 14px;">Pending</span>
                                                    @elseif($order->order_status == 1)
                                                        <span class="product-status-btn pending" style="font-size: 14px;">Approved</span>
                                                    @elseif($order->order_status == 2)
                                                        <span class="product-status-btn on-hold" style="font-size: 14px;">Intransit</span>
                                                    @elseif($order->order_status == 3)
                                                        <span class="product-status-btn complete" style="font-size: 14px;">Delivered</span>
                                                    @else
                                                        <span class="product-status-btn cancelled" style="font-size: 14px;">Cancelled</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    <span class="product-quantity">
                                                        Qty: {{DB::table('order_details')->where('order_id', $order->id)->sum('qty')}}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="product-price">Amount: {{number_format($order->total)}} BDT</span>
                                                </td>
                                                <td>
                                                    <a class="view-order-btn" href="{{url('order/details')}}/{{$order->slug}}" style="background: var(--ud-primary-color); color: var(--ud-white-color) !important; margin-top: 2px; margin-bottom: 2px;">View order</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="6" class="text-center" style="padding: 10px 0px; background: transparent;">
                                                    <span class="product-price" style="font-size: 20px;">No Orders Found</span>
                                                </td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                <div class="dashboard-my-order-bottom">
                                    {{$orders->links()}}
                                </div>
                            </div>
                        </div> --}}

                        <div class="dashboard-my-order mgTop24">
                            <div class="dashboard-head-widget style-2">
                                <h5 class="dashboard-head-widget-title">My orders</h5>
                            </div>
                            <div class="dashboard-my-order-table">

                                @if (count($orders) > 0)
                                    @foreach ($orders as $order)
                                    <div class="table-responsive order-group">
                                        <table class="recent-order-table-data table">
                                            <tbody>
                                                <div class="order-group-head">
                                                    <ul class="order-group-info">
                                                        <li>Order ID: <span>#{{$order->order_no}}</span></li>
                                                        <li>
                                                            Placed On: <span>{{ date('jS M, Y h:i A', strtotime($order->order_date)) }}</span>
                                                        </li>
                                                    </ul>
                                                    <div class="order-group-btn">
                                                        <a class="view-order-btn" href="{{url('order/details')}}/{{$order->slug}}">View order</a>
                                                    </div>
                                                </div>
                                                <div class="order-group-body">
                                                    @php
                                                        $orderedItems = DB::table('order_details')
                                                                        ->leftJoin('products', 'order_details.product_id', 'products.id')
                                                                        ->leftJoin('units', 'order_details.unit_id', 'units.id')
                                                                        ->leftJoin('stores', 'order_details.store_id', 'stores.id')
                                                                        ->select('order_details.*', 'products.image', 'products.name as product_name', 'units.name as unit_name', 'stores.store_name')
                                                                        ->where('order_details.order_id', $order->id)
                                                                        ->get();
                                                    @endphp

                                                    @foreach($orderedItems as $orderedItem)
                                                    <tr>
                                                        <td>
                                                            <img alt="" src="{{ url(env('ADMIN_URL') . '/' . $orderedItem->image) }}" />
                                                            <span class="product-name">{{$orderedItem->product_name}}</span>
                                                        </td>
                                                        <td>
                                                            Store:<span class="product-price">{{$orderedItem->store_name}}</span>
                                                        </td>
                                                        <td>
                                                            Amount:<span class="product-price">{{number_format($orderedItem->total_price)}} BDT</span>
                                                        </td>
                                                        <td>
                                                            Qty:<span class="product-quantity">{{$orderedItem->qty}} {{$orderedItem->unit_name}}</span>
                                                        </td>

                                                        <td>
                                                            <span class="product-status-btn pending">
                                                                @if ($order->order_status == 0)
                                                                    <span class="product-status-btn in-progress" style="font-size: 14px;">Pending</span>
                                                                @elseif($order->order_status == 1)
                                                                    <span class="product-status-btn pending" style="font-size: 14px;">Approved</span>
                                                                @elseif($order->order_status == 2)
                                                                    <span class="product-status-btn on-hold" style="font-size: 14px;">Intransit</span>
                                                                @elseif($order->order_status == 3)
                                                                    <span class="product-status-btn complete" style="font-size: 14px;">Delivered</span>
                                                                @else
                                                                    <span class="product-status-btn cancelled" style="font-size: 14px;">Cancelled</span>
                                                                @endif
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                    @endforeach
                                @else
                                <div class="table-responsive order-group">
                                    <table class="recent-order-table-data table">
                                        <tbody>
                                            <tr>
                                                <td colspan="6" class="text-center" style="padding: 10px 0px; background: transparent;">
                                                    <span class="product-price" style="font-size: 20px;">No Orders Found</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @endif

                                <div class="pagination-area">
                                    {{$orders->links()}}
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
