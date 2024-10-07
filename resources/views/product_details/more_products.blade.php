<div class="widget widget-products">
    <div class="title-link-wrapper mb-2">
        <h4 class="title title-link font-weight-bold">
            More Products
        </h4>
    </div>

    <div class="swiper nav-top">
        <div class="swiper-container swiper-theme nav-top"
            data-swiper-options="{
                          'slidesPerView': 1,
                          'spaceBetween': 20,
                          'navigation': {
                              'prevEl': '.swiper-button-prev',
                              'nextEl': '.swiper-button-next'
                          }
                      }">
            <div class="swiper-wrapper">
                <div class="widget-col swiper-slide">

                    @php $mayLikedProductIndex = 0; @endphp
                    @foreach($mayLikedProducts as $mayLikedProduct)
                        @if($mayLikedProductIndex >=0 && $mayLikedProductIndex <=5)
                            @include('product_details.you_may_like_prod')
                        @endif
                        @php $mayLikedProductIndex++; @endphp
                    @endforeach

                </div>
                <div class="widget-col swiper-slide">

                    @php $mayLikedProductIndex = 0; @endphp
                    @foreach($mayLikedProducts as $mayLikedProduct)
                        @if($mayLikedProductIndex >=6 && $mayLikedProductIndex <=11)
                            @include('product_details.you_may_like_prod')
                        @endif
                        @php $mayLikedProductIndex++; @endphp
                    @endforeach

                </div>
                <div class="widget-col swiper-slide">

                    @php $mayLikedProductIndex = 0; @endphp
                    @foreach($mayLikedProducts as $mayLikedProduct)
                        @if($mayLikedProductIndex >=12 && $mayLikedProductIndex <=17)
                            @include('product_details.you_may_like_prod')
                        @endif
                        @php $mayLikedProductIndex++; @endphp
                    @endforeach

                </div>
            </div>
            <button class="swiper-button-next"></button>
            <button class="swiper-button-prev"></button>
        </div>
    </div>
</div>
