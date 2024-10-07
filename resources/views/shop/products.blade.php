<div class="product-wrapper row cols-md-4 cols-sm-2 cols-2">
    @if ($products->total() > 0)
        @foreach ($products as $product)
            @include('single_product.product')
        @endforeach
    @else
        <h5 style="padding: 15px; font-weight: 600; font-size: 18px;">Sorry! No Products Found</h5>
    @endif
</div>

<div class="toolbox toolbox-pagination justify-content-between">
    @include('shop.pagination')
</div>
