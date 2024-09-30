@if(count($featuredCategories) > 0)
<section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
    <div class="container pb-2">
        <h2 class="title justify-content-center pt-1 ls-normal mb-2">Featured Categories</h2>
        <div class="row cols-lg-6 cols-md-5 cols-sm-3 cols-2">

            @foreach($featuredCategories as $featuredCategory)
            <div class="category category-classic category-absolute overlay-zoom br-xs">
                <a href="{{ url('shop') }}?category={{$featuredCategory->slug}}" class="category-media">
                    <img class="lazy" src="{{ url('assets') }}/img/product-load.gif"
                    data-src="{{ url(env('ADMIN_URL') . '/' . $featuredCategory->icon) }}" alt="" style="width: 130px; height: 130px" />
                </a>
                <div class="category-content">
                    <h4 class="category-name">{{$featuredCategory->name}}</h4>
                    <a href="{{ url('shop') }}?category={{$featuredCategory->slug}}" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif
