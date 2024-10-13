@php
    $productReviews = DB::table('product_reviews')->where('product_id', $product->id)->get();
    $productRating = DB::table('product_reviews')->where('product_id', $product->id)->sum('rating');
@endphp

@if(count($productReviews) > 0)
    @for ($i=1;$i<=round($productRating/count($productReviews));$i++)
    <i class="fas fa-star" style="color: #f93"></i>
    @endfor

    @for ($i=1;$i<=5-round($productRating/count($productReviews));$i++)
    <i class="far fa-star" style="color: var(--border-color)"></i>
    @endfor
@else
    <i class="far fa-star" style="color: var(--border-color)"></i>
    <i class="far fa-star" style="color: var(--border-color)"></i>
    <i class="far fa-star" style="color: var(--border-color)"></i>
    <i class="far fa-star" style="color: var(--border-color)"></i>
    <i class="far fa-star" style="color: var(--border-color)"></i>
@endif

&nbsp;&nbsp;
<a href="{{url('product')}}/{{$product->slug}}" class="rating-reviews">({{count($productReviews)}} Reviews)</a>

@php
    $totalSold = DB::table('order_details')->where('product_id', $product->id)->count();
@endphp

@if($totalSold > 0)
<span class="sold-item">Sold ({{$totalSold}})</span>
@endif
