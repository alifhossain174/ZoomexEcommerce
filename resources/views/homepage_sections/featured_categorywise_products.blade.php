<div class="container">
    <div class="title-link-wrapper mb-3 appear-animate">
        <h2 class="title title-deals mb-1">{{$featuredCategory->name}}</h2>
        <a href="{{ url('shop') }}?category={{$featuredCategory->slug}}" class="font-weight-bold ls-25">View All<i class="w-icon-long-arrow-right"></i></a>
    </div>
    <!-- End of .title-link-wrapper -->

    <div class="swiper-container swiper-theme product-deals-wrapper appear-animate mb-7"
        data-swiper-options="{
                'spaceBetween': 20,
                'slidesPerView': 2,
                'breakpoints': {
                    '576': {
                        'slidesPerView': 2
                    },
                    '768': {
                        'slidesPerView': 3
                    },
                    '992': {
                        'slidesPerView': 5
                    }
                }
            }">

        @php
            $categoryWiseProducts = DB::table('products')
                                ->leftJoin('categories', 'products.category_id', 'categories.id')
                                ->leftJoin('flags', 'products.flag_id', 'flags.id')
                                ->select('categories.name as category_name', 'flags.name as flag_name', 'products.*')
                                ->where('products.category_id', $featuredCategory->id)
                                ->where('products.status', 1)
                                ->inRandomOrder()
                                ->skip(0)
                                ->limit(15)
                                ->get();
        @endphp

        <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-2">

            @foreach($categoryWiseProducts as $product)
            <div class="swiper-slide product-wrap">
                @include('single_product.product')
            </div>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- End of Product Deals Warpper -->
</div>
