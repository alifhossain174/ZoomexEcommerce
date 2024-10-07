@extends('master')

@push('site-seo')
    @php
        $generalInfo = DB::table('general_infos')
            ->select('fav_icon', 'company_name', 'google_tag_manager_status', 'google_tag_manager_id')
            ->where('id', 1)
            ->first();
    @endphp

    <meta name="keywords" content="{{ $product ? $product->meta_keywords : '' }}" />
    <meta name="description" content="{{ $product ? $product->meta_description : '' }}" />
    <meta name="author" content="{{ $generalInfo ? $generalInfo->company_name : '' }}">
    <meta name="copyright" content="{{ $generalInfo ? $generalInfo->company_name : '' }}">
    <meta name="url" content="{{ env('APP_URL') . '/product/details/' . $product->slug }}">

    <title>
        @if ($product->meta_title)
            {{ $product->meta_title }}
        @else
            {{ $product->name }}
        @endif
    </title>
    @if ($generalInfo && $generalInfo->fav_icon)
        <link rel="icon" href="{{ env('ADMIN_URL') . '/' . $generalInfo->fav_icon }}" type="image/x-icon" />
    @endif

    <!-- Open Graph general (Facebook, Pinterest)-->
    <meta property="og:title"
        content="@if ($product->meta_title) {{ $product->meta_title }}@else{{ $product->name }} @endif" />
    <meta property="og:type" content="{{ $product->category_name }}" />
    <meta property="og:url" content="{{ env('APP_URL') . '/product/details/' . $product->slug }}" />
    <meta property="og:image" content="{{ env('ADMIN_URL') . '/' . $product->image }}" />
    <meta property="og:site_name" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta property="og:description" content="{{ $product->short_description }}" />

    <meta property="product:brand" content="Fejmo">
    <meta property="product:availability" content="in stock">
    <meta property="product:condition" content="new">
    <meta property="product:price:amount" content="{{ $product->discount_price }}">
    <meta property="product:price:currency" content="BDT">
    <meta property="product:item_group_id" content="{{ $product->category_name ?? '' }}">
    <!-- End Open Graph general (Facebook, Pinterest)-->
@endpush

@section('header_css')
    <style>
        .product-variation-form input[type="radio"] {
            clip: rect(0, 0, 0, 0);
            overflow: hidden;
            position: absolute;
            height: 1px;
            width: 1px;
        }

        .product-variation-form input[type="radio"]:checked+label {
            border: 3px solid var(--white-color) !important;
            box-shadow: none !important;
            outline: 2px solid var(--primary-color);
        }

        .product-variation-form .variant__color--value {
            max-width: 2.5rem !important;
            height: 2.5rem;
            padding: 2px;
            display: inline-block;
            border-radius: 50%;
            margin-right: 7px;
            line-height: 1;
            cursor: pointer;
            overflow: hidden;
        }

        .product-size-swatch label.variant__size--value {
            background: transparent;
            width: 20px !important;
            max-width: 55px;
            margin-right: 5px;
            border: 1px solid #b5b5b5;
            color: #4f4f4f;
            font-weight: 400;
            border-radius: 2px;
            padding: 4px 5px;
        }

        button.stock_out_btn {
            background: transparent;
            color: red;
            border-color: red;
            cursor: not-allowed;
            transition: all .1s linear;
        }

        button.stock_out_btn:hover {
            background: #ec3636;
            color: white;
            border-color: red;
            cursor: not-allowed;
        }

        .removeFromCartQty {
            background: #ef4141;
            border-color: #ef4141;
        }

        .removeFromCartQty:hover {
            background: #ef4141;
            border-color: #ef4141;
        }
    </style>
@endsection

@section('content')
    <!-- Start of Main -->
    <main class="main mb-10 pb-1">

        @include('product_details.breadcrumb')

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="pd-details-gallery product-gallery product-gallery-sticky">

                                    @include('product_details.gallery')

                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">

                                    @php
                                        $totalStockAllVariants = $product->stock; // jekonon variant er at least ekta stock e thakleo stock in dekhabe
                                        if ($variants && count($variants) > 0) {
                                            $totalStockAllVariants = 0;
                                            $variantMinDiscountPrice = 0;
                                            $variantMinPrice = 0;
                                            $variantMinDiscountPriceArray = [];
                                            $variantMinPriceArray = [];

                                            foreach ($variants as $variant) {
                                                $variantMinDiscountPriceArray[] = $variant->discounted_price;
                                                $variantMinPriceArray[] = $variant->price;
                                                $totalStockAllVariants = $totalStockAllVariants + (int) $variant->stock;
                                            }

                                            $variantMinDiscountPrice = min($variantMinDiscountPriceArray);
                                            $variantMinPrice = min($variantMinPriceArray);
                                        }
                                    @endphp

                                    @include('product_details.title_category_brand')


                                    <div class="pd-details-info-top">

                                        @include('product_details.price')
                                        @include('product_details.rating_short_description')

                                    </div>

                                    <hr class="product-divider" />

                                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">

                                    @if ($variants && count($variants) > 0)

                                        @php
                                            $colorCheckArray = [];
                                            $colorChecked = [];
                                            $colorArray = [];
                                            foreach ($variants as $variant) {
                                                if ($variant->color_id) {
                                                    $colorCheckArray[] = $variant->color_id;
                                                }
                                                if (
                                                    $variant->color_id &&
                                                    !in_array($variant->color_id, $colorChecked)
                                                ) {
                                                    $colorChecked[] = $variant->color_id;
                                                }
                                            }
                                        @endphp

                                        @if (count($colorCheckArray) > 0)
                                            <div class="product-form product-variation-form product-color-swatch">
                                                <label>Color:</label>
                                                @foreach ($variants as $variant)
                                                    @if ($variant->color_code && !in_array($variant->color_code, $colorArray))
                                                        @php $colorArray[] = $variant->color_code; @endphp
                                                        <input id="option_color_{{ $variant->color_id }}" name="color_id[]"
                                                            value="{{ $variant->color_id }}" type="radio"
                                                            onchange="checkVariantStock()" class="btn-check"
                                                            @if (count($colorChecked) == 1) checked="checked" @endif />
                                                        <label class="variant__color--value btn"
                                                            style="background: {{ $variant->color_code }};"
                                                            for="option_color_{{ $variant->color_id }}"
                                                            title="{{ $variant->color_name }}"></label>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif

                                        @if ($configSetup[0]->status == 1)
                                            @php
                                                $sizeCheckArray = [];
                                                $sizeChecked = [];
                                                $sizeArray = [];
                                                foreach ($variants as $variant) {
                                                    if ($variant->size_id) {
                                                        $sizeCheckArray[] = $variant->size_id;
                                                    }
                                                    if (
                                                        $variant->size_id &&
                                                        !in_array($variant->size_id, $sizeChecked)
                                                    ) {
                                                        $sizeChecked[] = $variant->size_id;
                                                    }
                                                }
                                            @endphp

                                            @if (count($sizeCheckArray) > 0)
                                                <div class="product-form product-variation-form product-size-swatch">
                                                    <label class="mb-1">Size:</label>
                                                    @foreach ($variants as $variant)
                                                        @if ($variant->size_id && !in_array($variant->size_id, $sizeArray))
                                                            @php $sizeArray[] = $variant->size_id; @endphp
                                                            <input id="option_size_{{ $variant->size_id }}"
                                                                onchange="checkVariantStock()"
                                                                value="{{ $variant->size_id }}" name="size_id[]"
                                                                type="radio"
                                                                @if (count($sizeChecked) == 1) checked @endif
                                                                class="btn-check" autocomplete="off" />
                                                            <label class="variant__size--value red btn btn-secondary"
                                                                for="option_size_{{ $variant->size_id }}">
                                                                {{ $variant->size_name }}</label>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endif

                                    @endif

                                    <div class="product-form" id="product_details_add_to_cart_section">
                                        @if ($variants && count($variants) > 0)
                                            @if ($totalStockAllVariants && $totalStockAllVariants > 0)
                                                @include('product_details.cart_buy_button')
                                            @else
                                                <button class="btn btn-primary stock_out_btn"
                                                    style="width: 100%;"><span>Stock Out</span></button>
                                            @endif
                                        @else
                                            @if ($product->stock && $product->stock > 0)
                                                @include('product_details.cart_buy_button')
                                            @else
                                                <button class="btn btn-primary stock_out_btn"
                                                    style="width: 100%;"><span>Stock Out</span></button>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="social-links-wrapper">
                                        @include('product_details.social_share')
                                    </div>

                                </div>
                            </div>
                        </div>

                        @include('product_details.description')
                        @include('product_details.vendor_products')
                        @include('product_details.related_products')

                    </div>
                    <!-- End of Main Content -->

                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>

                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">

                                @include('product_details.features')
                                @include('product_details.more_products')

                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection


@section('footer_js')
    <script>
        function checkVariantStock() {

            let color_id = null;
            let size_id = null;

            // color
            let colorFields = document.getElementsByName("color_id[]");
            for (let i = 0; i < colorFields.length; i++) {
                if (colorFields[i].checked) {
                    const swiper3 = document.querySelector('.swiper-container').swiper;
                    swiper3.slideTo(i);
                    color_id = colorFields[i].value;
                }
            }

            // size
            let sizeFields = document.getElementsByName("size_id[]");
            for (let i = 0; i < sizeFields.length; i++) {
                if (sizeFields[i].checked) {
                    size_id = sizeFields[i].value;
                }
            }

            // sending request
            var formData = new FormData();
            formData.append("product_id", $("#product_id").val());
            formData.append("color_id", color_id);
            formData.append("size_id", size_id);

            $.ajax({
                data: formData,
                url: "{{ url('check/product/variant') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {

                    if (Number(data.discounted_price) > 0) {
                        $("small.old-price-filter del").html('৳' + data.price);
                        $("small.old-price-filter").removeClass("mr-0");
                        $("ins.new-price-filter").html('৳' + data.discounted_price);
                        $("#product_price").val(Number(data.discounted_price));
                    } else {
                        $("small.old-price-filter del").html("");
                        $("small.old-price-filter").addClass("mr-0");
                        $("ins.new-price-filter").html('৳' + data.price);
                        $("#product_price").val(Number(data.price));
                    }

                    if (data.stock > 0) {
                        $("#product_details_add_to_cart_section").html(data.rendered_button)
                    } else {
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.options.timeOut = 1000;
                        toastr.error("Stock Out");
                        $("#product_details_add_to_cart_section").html(
                            "<button class='btn btn-primary stock_out_btn' style='width: 100%;'><span>Stock Out</span></button>"
                        )
                    }

                },
                error: function(data) {
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.options.timeOut = 1000;
                    toastr.error("Something Went Wrong");
                }
            });

        }

        $('body').on('click', '.addToCartWithQty', function() {
            var id = $(this).data('id');

            let color_id = null;
            let size_id = null;
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.options.timeOut = 1000;

            // color
            let colorFields = document.getElementsByName("color_id[]");
            for (let i = 0; i < colorFields.length; i++) {
                if (colorFields[i].checked) {
                    color_id = colorFields[i].value;
                }
            }
            if (colorFields.length > 0 && color_id == null) {
                toastr.error("Please Select Color");
                return false;
            }

            // size
            let sizeFields = document.getElementsByName("size_id[]");
            for (let i = 0; i < sizeFields.length; i++) {
                if (sizeFields[i].checked) {
                    size_id = sizeFields[i].value;
                }
            }
            if (sizeFields.length > 0 && size_id == null) {
                toastr.error("Please Select Size");
                return false;
            }


            // sending request
            var formData = new FormData();
            formData.append("product_id", Number($("#product_id").val()));
            formData.append("qty", Number($("#product_details_cart_qty").val()));
            formData.append("price", Number($("#product_price").val()));
            formData.append("discount_price", Number($("#product_discount_price").val()));
            formData.append("color_id", color_id);
            formData.append("size_id", size_id);


            $.ajax({
                data: formData,
                url: "{{ url('add/to/cart/with/qty') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {

                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.options.timeOut = 1000;
                    toastr.success("Added to Cart");
                    $("#dropdown_box_sidebar_cart").html(data.rendered_cart);
                    $("span.cart-count").html(data.cartTotalQty);

                },
                error: function(data) {
                    toastr.error("Something Went Wrong");
                }
            });

            $(this).html("<i class='w-icon-cart'></i><span> Remove from Cart</span>");
            $(this).removeClass("addToCartWithQty");
            $(this).removeClass("btn-cart");
            $(this).addClass("removeFromCartQty");
            $(this).blur();
        });

        $('body').on('click', '.removeFromCartQty', function() {
            var id = $(this).data('id');
            $.get("{{ url('remove/cart/item') }}" + '/' + id, function(data) {

                toastr.options.positionClass = 'toast-bottom-right';
                toastr.options.timeOut = 1000;
                toastr.error("Removed from cart");
                $("#dropdown_box_sidebar_cart").html(data.rendered_cart);
                $("span.cart-count").html(data.cartTotalQty);

            })

            $("#product_details_cart_qty").val(1);
            $(this).html("<i class='w-icon-cart'></i><span> Add to cart</span>");
            $(this).removeClass("removeFromCartQty");
            $(this).addClass("addToCartWithQty");
            $(this).addClass("btn-cart");
            $(this).blur();
        });
    </script>
@endsection
