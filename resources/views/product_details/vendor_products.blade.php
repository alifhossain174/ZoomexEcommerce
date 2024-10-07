@if($product->store_id)
    @if(count($vendorProducts))

        @php
            $storeInfo = DB::table('stores')->where('id', $product->store_id)->first();
        @endphp

        <section class="vendor-product-section">
            <div class="title-link-wrapper mb-4">
                <h4 class="title text-left">
                    More Products From This Vendor
                </h4>
                <a href="{{url('shop')}}?store={{$storeInfo->slug}}" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More Products<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="swiper-container swiper-theme"
                data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 4
                                },
                                '992': {
                                    'slidesPerView': 4
                                }
                            }
                        }">
                <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">

                    @foreach($vendorProducts as $product)
                    <div class="swiper-slide">
                        @include('single_product.product')
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
@endif
