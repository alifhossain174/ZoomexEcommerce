@if(count($topSellingVendors) > 0)
<section class="info-head-section pt-8 mb-lg-7">
    <h2 class="title title-left mb-5" style="margin-top: 2px">Zommerce Mall</h2>
    <div class="show-code-action">
        <div class="row cols-lg-3 cols-sm-2 cols-1">

            @foreach($topSellingVendors as $topSellingVendor)
            @php
                $vendorProducts = DB::table('products')->where('status', 1)->where('store_id', $topSellingVendor->store_id)->inRandomOrder()->skip(0)->limit(3)->get();
            @endphp
            <div class="vendor-widget">
                <div class="vendor-widget-2">
                    <div class="vendor-details">
                        <figure class="vendor-logo">
                            <a href="{{url('shop')}}?store={{$topSellingVendor->slug}}">
                                <img src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $topSellingVendor->store_logo) }}" class="lazy" alt="" style="height: 80px; width: 80px;"/>
                            </a>
                        </figure>
                        <div class="vendor-personal">
                            <h4 class="vendor-name">
                                <a href="{{url('shop')}}?store={{$topSellingVendor->slug}}">{{$topSellingVendor->store_name}}</a>
                            </h4>
                            <span class="vendor-product-count">
                                ({{DB::table('products')->where('status', 1)->where('store_id', $topSellingVendor->store_id)->count()}} Products)</span>
                            {{-- <p class="vendor-location">Dhaka</p> --}}
                            <a href="{{url('shop')}}?store={{$topSellingVendor->slug}}" class="btn btn-primary btn-icon-right">
                                Visit Store<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="vendor-products row cols-3 gutter-sm">
                        @foreach($vendorProducts as $vendorProduct)
                        <div class="vendor-product">
                            <figure class="product-media">
                                <a href="{{ url('product') }}/{{ $vendorProduct->slug }}">
                                    <img class="lazy" src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $vendorProduct->image) }}" alt="" style="width: 100%; height: 133px" />
                                </a>
                            </figure>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
            {{-- Vendor loop End --}}

        </div>
    </div>
</section>
@endif
