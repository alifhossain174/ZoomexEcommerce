<div class="product-wrapper-1 appear-animate mb-5">
    <div class="container">
        <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0">{{$featuredCategory->name}}</h2>
            <a href="{{ url('shop') }}?category={{$featuredCategory->slug}}" class="font-size-normal font-weight-bold ls-25 mb-0">More Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-4 mb-4">
                <div class="banner h-100 br-sm" style="background-image: url({{ url(env('ADMIN_URL') . '/' . $featuredCategory->banner_image) }}); background-color: #ebeced">
                    {{-- <div class="banner-content content-top">
                        <h5 class="banner-subtitle font-weight-normal mb-2">Weekend Sale</h5>
                        <hr class="banner-divider bg-dark mb-2" />
                        <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                            New Arrivals<br />
                            <span class="font-weight-normal text-capitalize">Collection</span>
                        </h3>
                        <a href="{{ url('/shop') }}" class="btn btn-dark btn-outline btn-rounded btn-sm">shop
                            Now</a>
                    </div> --}}
                </div>
            </div>
            <!-- End of Banner -->
            <div class="col-lg-9 col-sm-8">
                <div class="swiper-container swiper-theme"
                    data-swiper-options="{
                        'spaceBetween': 20,
                        'slidesPerView': 2,
                        'breakpoints': {
                            '992': {
                                'slidesPerView': 3
                            },
                            '1200': {
                                'slidesPerView': 4
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
                                            ->limit(12)
                                            ->get();

                        $chunks = $categoryWiseProducts->chunk(2);
                    @endphp

                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                        @foreach($chunks as $chunk)
                        <div class="swiper-slide product-col">
                            @foreach($chunk as $product)
                                @include('single_product.product')
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
