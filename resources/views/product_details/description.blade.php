<div class="tab tab-nav-boxed tab-nav-underline product-tabs">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a href="#product-tab-description" class="nav-link active">Description</a>
        </li>

        @if($product->specification)
        <li class="nav-item">
            <a href="#product-tab-specification" class="nav-link">Specification</a>
        </li>
        @endif

        @if($product->warrenty_policy)
        <li class="nav-item">
            <a href="#product-tab-warrenty" class="nav-link">Warrenty Policy</a>
        </li>
        @endif

        @if($product->store_id)
        <li class="nav-item">
            <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
        </li>
        @endif

        <li class="nav-item">
            <a href="#product-tab-reviews" class="nav-link">Customer Reviews ({{$totalReviews}})</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="product-tab-description">
            {!! $product->description !!}
        </div>

        @if($product->specification)
        <div class="tab-pane" id="product-tab-specification">
            {!! $product->specification !!}
        </div>
        @endif

        @if($product->warrenty_policy)
        <div class="tab-pane" id="product-tab-warrenty">
            {!! $product->warrenty_policy !!}
        </div>
        @endif

        @if($product->store_id)
            @include('product_details.vendor_info')
        @endif

        <div class="tab-pane" id="product-tab-reviews">
            @include('product_details.review')
        </div>
    </div>
</div>
