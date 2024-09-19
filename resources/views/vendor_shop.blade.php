@extends('master')

@section('content')
    <!-- Start of Main -->
    <main class="main pb-8" style="background: #fff">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/vendor-shop') }}">Vendor Shop</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Pgae Contetn -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <aside class="sidebar vendor-sidebar sticky-sidebar-wrapper left-sidebar sidebar-fixed">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar">
                                <div class="widget widget-search-form">
                                    <div class="widget-body">
                                        <form action="#" method="GET" class="input-wrapper input-wrapper-inline">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                autocomplete="off" required="" />
                                            <button class="btn btn-search">
                                                <i class="w-icon-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!-- End of Widget -->

                                <div class="widget widget-filter">
                                    <h4 class="widget-title">Filter By Category</h4>
                                    @include('vendor_shop.filter_category')
                                </div>
                                <!-- End of Widget -->

                                <div class="widget widget-filter">
                                    <h4 class="widget-title">Filter By Location</h4>
                                    @include('vendor_shop.filter_location')
                                </div>
                                <!-- End of Widget -->
                            </div>
                            <!-- End of Sticky Sidebar -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Sidebar -->

                    <div class="main-content">
                        @include('vendor_shop.filter_sort')
                        <!-- End of Toolbox -->

                        <div class="row cols-sm-2">
                            {{-- Vendor Shop loop start --}}
                            @include('vendor_shop.vendor_shop')
                            {{-- Vendor Shop loop start --}}
                        </div>
                    </div>
                    <!-- End of Main Content -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
