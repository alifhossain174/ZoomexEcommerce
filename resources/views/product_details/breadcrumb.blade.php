<nav class="breadcrumb-nav container">
    <ul class="breadcrumb bb-no">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('product')}}/{{$product->slug}}">Products</a></li>
    </ul>

    @php
        $nextProduct = DB::table('products')->where('id', '>', $product->id)->first();
        $prevProduct = DB::table('products')->where('id', '<', $product->id)->first();
    @endphp

    <ul class="product-nav list-style-none">

        @if($prevProduct)
        <li class="product-nav-prev">
            <a href="{{url('product')}}/{{$prevProduct->slug}}">
                <i class="w-icon-angle-left"></i>
            </a>
            <span class="product-nav-popup">
                <img class="lazy" src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $prevProduct->image) }}" alt="" width="110" height="110"/>
                <span class="product-name">{{$prevProduct->name}}</span>
            </span>
        </li>
        @endif

        @if($nextProduct)
        <li class="product-nav-next">
            <a href="{{url('product')}}/{{$nextProduct->slug}}">
                <i class="w-icon-angle-right"></i>
            </a>
            <span class="product-nav-popup">
                <img class="lazy" src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $nextProduct->image) }}" alt="" width="110" height="110"/>
                <span class="product-name">{{$nextProduct->name}}</span>
            </span>
        </li>
        @endif

    </ul>
</nav>
