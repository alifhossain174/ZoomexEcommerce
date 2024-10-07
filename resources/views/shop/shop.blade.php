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
    <meta property="og:title" content="@if ($generalInfo && $generalInfo->meta_og_title) {{ $generalInfo->meta_og_title }} @else {{ $generalInfo->company_name }} @endif" />
    <meta property="og:type" content="Ecommerce" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ env('ADMIN_URL') . '/' . $generalInfo->meta_og_image }}" />
    <meta property="og:site_name" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta property="og:description" content="{{ $generalInfo->meta_og_description }}" />
    <!-- End Open Graph general (Facebook, Pinterest)-->
@endpush

@section('header_css')
    <style>
        /* Hide the default checkbox */
        .round-checkbox input[type="checkbox"] {
            display: none;
        }

        /* Create a custom checkbox */
        .round-checkbox span {
            display: inline-block;
            width: 18px;
            height: 18px;
            border: 2px solid var(--primary-color);
            position: relative;
            vertical-align: middle;
            margin-right: 10px;
            border-radius: 4px;
            transition: all .1s linear;
        }

        /* Create the checked state with a check mark */
        .round-checkbox input[type="checkbox"]:checked+span {
            background-color: var(--primary-color);
            transition: all .1s linear;
        }

        .round-checkbox input[type="checkbox"]:checked+span::after {
            content: '✔';
            color: #fff;
            font-size: 14px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: all .1s linear;
        }

        /* Mobile responsive design */
        @media (max-width: 600px) {
            .round-checkbox span {
                width: 18px;
                height: 18px;
                margin-right: 28px;
            }

            .round-checkbox input[type="checkbox"]:checked+span::after {
                font-size: 16px;
            }
        }
        a.policy_read_more_btn{
            font-size: 12px !important;
            background: var(--primary-color) !important;
            color: var(--border-color) !important;
            border-color: var(--dark-color) !important;
            text-shadow: 1px 1px 2px black !important;
            padding: 8px 14px !important;
        }

        .store-wcfm-banner .store-content{
            background: transparent;
        }
        .address-info{
            display: none;
        }
    </style>
@endsection

@section('content')
    <main class="main">

        @include('shop.breadcrumb')

        <div class="page-content">
            <div class="container">

                <input type="hidden" id="filter_store_slug" @if ($storeInfo) value="{{ $storeInfo->slug }}" @endif>

                @if ($storeInfo)
                <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                    style="background-image: url({{ url(env('ADMIN_URL') . '/' . $storeInfo->store_banner) }}); background-color: #ffc74e;">
                    <div class="banner-content">
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">
                            {{ $storeInfo->store_name }}
                        </h3>
                        <a href="javascript:void(0)" class="btn btn-dark btn-rounded btn-icon-right">Shop Now<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                @endif

                <div class="shop-content row gutter-lg mb-10">
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label>Filter :</label>
                                    <a href="{{ url('/shop') }}" class="btn btn-dark btn-link"
                                    style="font-weight: 400; text-transform: capitalize;">Clean All</a>
                                </div>

                                @include('shop.filter_category')
                                @include('shop.filter_flag')
                                @include('shop.filter_price')
                                @include('shop.filter_size')
                                @include('shop.filter_brand')
                                @include('shop.filter_color')

                                <input type="hidden" id="filter_subcategory_slug" @if (isset($subcategorySlug)) value="{{ $subcategorySlug }}" @endif>
                                <input type="hidden" id="filter_childcategory_slug" @if (isset($childcategorySlug)) value="{{ $childcategorySlug }}" @endif>

                            </div>
                        </div>
                    </aside>

                    <div class="main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            @include('shop.filter_sorting')
                        </nav>

                        <div class="row">
                            <div class="col-lg-12" id="product_wrapper">
                                @include('shop.products')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer_js')
    <script>
        function filterProducts() {

            // fetching filter values
            let category_array = [];
            let flag_array = [];
            let brand_array = [];
            let size_array = [];
            let color_array = [];

            $("input[name='filter_category[]']").each(function() {
                if ($(this).is(':checked')) {
                    if (!category_array.includes($(this).val())) {
                        category_array.push($(this).val());
                    }
                }
            });
            $("input[name='filter_flag[]']").each(function() {
                if ($(this).is(':checked')) {
                    if (!flag_array.includes($(this).val())) {
                        flag_array.push($(this).val());
                    }
                }
            });
            $("input[name='filter_brand[]']").each(function() {
                if ($(this).is(':checked')) {
                    if (!brand_array.includes($(this).val())) {
                        brand_array.push($(this).val());
                    }
                }
            });
            $("input[name='filter_size[]']").each(function() {
                if ($(this).is(':checked')) {
                    if (!size_array.includes($(this).val())) {
                        size_array.push($(this).val());
                    }
                }
            });
            $("input[name='filter_color[]']").each(function() {
                if ($(this).is(':checked')) {
                    if (!color_array.includes($(this).val())) {
                        color_array.push($(this).val());
                    }
                }
            });

            let category_slugs = String(category_array);
            let subcategory_slug = $("#filter_subcategory_slug").val();
            let childcategory_slug = $("#filter_childcategory_slug").val();
            let flag_slugs = String(flag_array);
            let brand_slugs = String(brand_array);
            let size_slugs = String(size_array);
            let color_ids = String(color_array);
            var sort_by = Number($("#filter_sort_by").val());
            var min_price_range = Number($("#filter_min_price").val());
            var max_price_range = Number($("#filter_max_price").val());
            var search_keyword = $("#search_keyword").val();
            var store_slug = $("#filter_store_slug").val();


            // setting up get url with filter parameters
            var baseUrl = window.location.pathname;

            if (store_slug) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&store=' + store_slug : baseUrl += '?store=' + store_slug;
            }
            if (category_slugs) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&category=' + category_slugs : baseUrl += '?category=' +
                    category_slugs;
            }
            if (subcategory_slug) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&subcategory=' + subcategory_slug : baseUrl += '?subcategory=' +
                    subcategory_slug;
            }
            if (childcategory_slug) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&childcategory=' + childcategory_slug : baseUrl +=
                    '?childcategory=' + childcategory_slug;
            }
            if (flag_slugs) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&flag=' + flag_slugs : baseUrl += '?flag=' + flag_slugs;
            }
            if (brand_slugs) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&brand=' + brand_slugs : baseUrl += '?brand=' + brand_slugs;
            }
            if (size_slugs) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&size=' + size_slugs : baseUrl += '?size=' + size_slugs;
            }
            if (color_ids) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&color=' + color_ids : baseUrl += '?color=' + color_ids;
            }
            if (sort_by && sort_by > 0) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&sort_by=' + sort_by : baseUrl += '?sort_by=' + sort_by;
            }
            if (min_price_range && min_price_range > 0) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&min_price=' + min_price_range : baseUrl += '?min_price=' +
                    min_price_range;
            }
            if (max_price_range && max_price_range > 0) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&max_price=' + max_price_range : baseUrl += '?max_price=' +
                    max_price_range;
            }
            if (search_keyword) {
                baseUrl.indexOf('?') !== -1 ? baseUrl += '&search_keyword=' + search_keyword : baseUrl +=
                    '?search_keyword=' + search_keyword;
            }
            history.pushState(null, null, baseUrl);


            // sending request
            var formData = new FormData();
            formData.append("category", category_slugs);
            formData.append("subcategory", subcategory_slug);
            formData.append("childcategory", childcategory_slug);
            formData.append("flag", flag_slugs);
            formData.append("brand", brand_slugs);
            formData.append("size", size_slugs);
            formData.append("color", color_ids);
            formData.append("sort_by", sort_by);
            formData.append("min_price", min_price_range);
            formData.append("max_price", max_price_range);
            formData.append("search_keyword", search_keyword);
            formData.append("store", store_slug);
            formData.append("path_name", window.location.pathname);


            $.ajax({
                data: formData,
                url: "{{ url('filter/products') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#product_wrapper').fadeOut(function() {
                        $(this).html(data.rendered_view);
                        $(this).fadeIn();
                        renderLazyImage()
                    });
                },
                error: function(data) {
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.options.timeOut = 1000;
                    toastr.error("Something Went Wrong");
                }
            });
        }
    </script>
@endsection
