<div class="ratings-container">
    @if($totalReviews > 0)
        @for ($i=1;$i<=round($averageRating);$i++)
        <i class="fas fa-star" style="color: var(--secondary-color);"></i>
        @endfor

        @for ($i=1;$i<=5-round($averageRating);$i++)
        <i class="far fa-star" style="color: gray"></i>
        @endfor
    @else
        <i class="far fa-star" style="color: gray"></i>
        <i class="far fa-star" style="color: gray"></i>
        <i class="far fa-star" style="color: gray"></i>
        <i class="far fa-star" style="color: gray"></i>
        <i class="far fa-star" style="color: gray"></i>
    @endif

    &nbsp;&nbsp;
    <a href="javascript:void(0)" class="rating-reviews">({{$totalReviews}} Reviews)</a>
</div>

<div class="product-link-wrapper pd-wishlist-btn d-flex">
    <a href="{{ url('add/to/wishlist') }}/{{$product->slug}}" class="btn-product-icon w-icon-heart"><span></span></a>
</div>

<div class="product-short-desc">
    {{$product->short_description}}
</div>








