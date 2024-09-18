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
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                style="background-image: url({{ url('assets') }}/images/demos/demo1/sliders/slide-1.jpg); background-color: #ebeef2">
                <div class="container">
                    <figure class="slide-image skrollable slide-animate">
                        <img src="{{ url('assets') }}/images/demos/demo1/sliders/shoes.png" alt="Banner"
                            data-bottom-top="transform: translateY(10vh);"
                            data-top-bottom="transform: translateY(-10vh);" width="474" height="397" />
                    </figure>
                </div>
                <!-- End of .container -->
            </div>
            <!-- End of .intro-slide1 -->

            <div class="swiper-slide banner banner-fixed intro-slide intro-slide2"
                style="background-image: url({{ url('assets') }}/images/demos/demo1/sliders/slide-2.jpg); background-color: #ebeef2">
                <div class="container">
                    <figure class="slide-image skrollable slide-animate"
                        data-animation-options="{
                            'name': 'fadeInUpShorter',
                            'duration': '1s'
                        }">
                        <img src="{{ url('assets') }}/images/demos/demo1/sliders/men.png" alt="Banner"
                            data-bottom-top="transform: translateX(10vh);"
                            data-top-bottom="transform: translateX(-10vh);" width="480" height="633" />
                    </figure>
                </div>
                <!-- End of .container -->
            </div>
            <!-- End of .intro-slide2 -->

            <div class="swiper-slide banner banner-fixed intro-slide intro-slide3"
                style="background-image: url({{ url('assets') }}/images/demos/demo1/sliders/slide-3.jpg); background-color: #f0f1f2">
                <div class="container">
                    <figure class="slide-image skrollable slide-animate"
                        data-animation-options="{
                            'name': 'fadeInDownShorter',
                            'duration': '1s'
                        }">
                        <img src="{{ url('assets') }}/images/demos/demo1/sliders/skate.png" alt="Banner"
                            data-bottom-top="transform: translateY(10vh);"
                            data-top-bottom="transform: translateY(-10vh);" width="310" height="444" />
                    </figure>

                    <!-- End of .container -->
                </div>
            </div>
            <!-- End of .intro-slide3 -->
        </div>
        <div class="swiper-pagination"></div>
        <button class="swiper-button-next"></button>
        <button class="swiper-button-prev"></button>
    </div>
    <!-- End of .swiper-container -->
</section>
