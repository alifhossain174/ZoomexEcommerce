<div class="widget widget-collapsible">
    <h3 class="widget-title"><span>Filter Price</span></h3>
    <div class="widget-body">
        <div class="price-range">
            <input type="number" name="filter_min_price" id="filter_min_price" type="number" @if(isset($min_price)) value="{{$min_price}}" @endif class="min_price text-center" placeholder="min" />
            <span class="delimiter">-</span>
            <input type="number" name="filter_max_price" id="filter_max_price" @if(isset($max_price)) value="{{$max_price}}" @endif class="max_price text-center" placeholder="max" />
            <button class="btn btn-primary btn-rounded" onclick="filterProducts()">Go</button>
        </div>
    </div>
</div>
