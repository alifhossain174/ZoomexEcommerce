<section class="intro-section">
    <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
        data-swiper-options="{
            'slidesPerView': 1,
            'autoplay': {
                'delay': 8000,
                'disableOnInteraction': false
            }
        }">
        <div class="swiper-wrapper">

            @foreach ($sliders as $slider)
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide1" style="background-image: url({{ url(env('ADMIN_URL') . '/' . $slider->image) }}); background-color: #ebedec;">
                <div class="container">
                    {{-- <figure class="slide-image skrollable slide-animate">
                        <img src="{{ url('assets') }}/images/demos/demo1/sliders/shoes.png" alt="Banner" data-bottom-top="transform: translateY(10vh);"
                            data-top-bottom="transform: translateY(-10vh);" width="474" height="397" />
                    </figure> --}}
                </div>
            </div>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
        <button class="swiper-button-next"></button>
        <button class="swiper-button-prev"></button>
    </div>
    <!-- End of .swiper-container -->
</section>
