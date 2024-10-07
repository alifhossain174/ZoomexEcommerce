<div class="widget widget-collapsible">
    <h3 class="widget-title"><span>Filter Brands</span></h3>
    <ul class="widget-body filter-items search-ul pt-3">
        @foreach ($brands as $brand)
            <li style="padding: 8px 8px; border: 1px solid lightgray; border-radius: 4px; margin-bottom: 5px; cursor: pointer">
                <label class="round-checkbox" for="{{$brand->slug}}" style="cursor: pointer; display: block; width: 100%">
                    <input type="checkbox" id="{{$brand->slug}}" value="{{$brand->slug}}" name="filter_brand[]" @if(isset($brandSlug) && in_array($brand->slug, explode(",", $brandSlug))) checked @endif onchange="filterProducts()">
                    <span></span>
                    @if($brand->logo)
                    <img class="lazy" src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $brand->logo) }}" style="height: 18px; width: 18px; border-radius: 50%;" alt="" />
                    @endif
                    {{ $brand->name }}
                </label>
            </li>
        @endforeach
    </ul>
</div>
