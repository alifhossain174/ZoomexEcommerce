<div class="widget widget-collapsible">
    <h3 class="widget-title"><span>Filter Categories</span></h3>
    <ul class="widget-body filter-items search-ul pt-3">
        @foreach ($categories as $category)
            <li style="padding: 8px 8px; border: 1px solid lightgray; border-radius: 4px; margin-bottom: 5px; cursor: pointer">
                <label class="round-checkbox" for="{{$category->slug}}" style="cursor: pointer; display: block; width: 100%">
                    <input type="checkbox" id="{{$category->slug}}" value="{{$category->slug}}" name="filter_category[]" @if(isset($categorySlug) && in_array($category->slug, explode(",", $categorySlug))) checked @endif onchange="filterProducts()">
                    <span></span>
                    @if($category->icon)
                    <img class="lazy" src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $category->icon) }}" style="height: 18px; width: 18px; border-radius: 50%;" alt="" />
                    @endif
                    {{ $category->name }}
                </label>
            </li>
        @endforeach
    </ul>
</div>
