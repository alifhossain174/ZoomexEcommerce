<div class="tab-pane" id="product-tab-vendor">
    @php
        $storeInfo = DB::table('stores')->where('id', $product->store_id)->first();
        $vendorInfo = DB::table('vendors')->where('id', $storeInfo->vendor_id)->first();

        $vendorProductsReviews = DB::table('product_reviews')
                            ->join('products', 'product_reviews.product_id', 'products.id')
                            ->where('products.store_id', $storeInfo->id)
                            ->get();

        $vendorProductsRating = DB::table('product_reviews')
                            ->join('products', 'product_reviews.product_id', 'products.id')
                            ->where('products.store_id', $storeInfo->id)
                            ->sum('rating');
    @endphp

    @if($storeInfo)
        <div class="row mb-3">

            @if($storeInfo->store_banner)
            <div class="col-md-6 mb-4">
                <figure class="vendor-banner br-sm">
                    <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$storeInfo->store_banner)}}" alt="" style="width: 100%; max-height: 300px; background-color: #353b55"/>
                </figure>
            </div>
            @endif

            <div class="col-md-6 pl-2 pl-md-6 mb-4">
                <div class="vendor-user">

                    @if($storeInfo->store_logo)
                    <figure class="vendor-logo mr-4">
                        <a href="{{url('shop')}}?store={{$storeInfo->slug}}">
                            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$storeInfo->store_logo)}}" alt="" style=""/>
                        </a>
                    </figure>
                    @endif

                    <div>
                        <div class="vendor-name">
                            <a href="{{url('shop')}}?store={{$storeInfo->slug}}">@if($vendorInfo){{$vendorInfo->business_name}}@endif</a>
                        </div>
                        <div class="ratings-container">
                            @if(count($vendorProductsReviews) > 0)
                                @for ($i=1;$i<=round($vendorProductsRating/count($vendorProductsReviews));$i++)
                                <i class="fas fa-star"  style="color: var(--secondary-color);"></i>
                                @endfor

                                @for ($i=1;$i<=5-round($vendorProductsRating/count($vendorProductsReviews));$i++)
                                <i class="far fa-star" style="color: gray"></i>
                                @endfor
                            @else
                                <i class="far fa-star" style="color: gray"></i>
                                <i class="far fa-star" style="color: gray"></i>
                                <i class="far fa-star" style="color: gray"></i>
                                <i class="far fa-star" style="color: gray"></i>
                                <i class="far fa-star" style="color: gray"></i>
                            @endif
                            &nbsp;&nbsp;<a href="{{url('shop')}}?store={{$storeInfo->slug}}" class="rating-reviews">({{count($vendorProductsReviews)}} Reviews)</a>
                        </div>
                    </div>
                </div>
                <ul class="vendor-info list-style-none mb-1">
                    <li class="store-name">
                        <label>Store Name:</label>
                        <span class="detail">{{$storeInfo->store_name}}</span>
                    </li>
                </ul>
                <p class="mb-4">
                    {{$storeInfo->store_description}}
                </p>
                <a href="{{url('shop')}}?store={{$storeInfo->slug}}" class="btn btn-dark btn-link btn-underline btn-icon-right">Visit Store<i class="w-icon-long-arrow-right"></i></a>
            </div>
        </div>
    @endif
</div>
