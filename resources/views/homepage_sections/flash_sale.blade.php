@if(count($flashSales) > 0)
<div class="title-link-wrapper mb-3 appear-animate">
    <h2 class="title title-deals mb-1">Flash Sale</h2>
</div>
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
    <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-2">
        @foreach($flashSales as $product)
        <div class="swiper-slide product-wrap">
            @include('single_product.product')
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
@endif
