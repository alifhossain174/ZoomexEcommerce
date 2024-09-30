<div class="container">
    <div class="title-link-wrapper mb-3 pt-4 appear-animate">
        <h2 class="title title-deals mb-1">For You</h2>
        <a href="{{url('/shop')}}" class="font-weight-bold ls-25">View All Products<i class="w-icon-long-arrow-right"></i></a>
    </div>
    <!-- End of .title-link-wrapper -->

    <div class="product-deals-wrapper appear-animate mb-7">

        <div class="row cols-lg-5 cols-md-4 cols-2 recommended_product_section">

            @foreach ($productsForYou as $product)
                @include('single_product.product')
            @endforeach

        </div>

        @if (count($productsForYou) >= 20)
            <div class="r-products-bottom text-center">
                <button class="btn btn-secondary btn-outline btn-ellipse" id="load_more_btn" onclick="loadMoreProducts()">Load More</button>
            </div>
        @endif

    </div>
</div>
