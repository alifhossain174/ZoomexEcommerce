<div class="widget widget-collapsible">
    <h3 class="widget-title"><span>Filter Sizes</span></h3>
    <ul class="widget-body filter-items search-ul pt-3">
        @foreach ($sizes as $size)
            <li style="padding: 8px 10px; border: 1px solid lightgray; border-radius: 4px; margin-bottom: 5px; cursor: pointer">
                <label class="round-checkbox" for="{{$size->slug}}" style="cursor: pointer; display: block; width: 100%">
                    <input type="checkbox" id="{{$size->slug}}" value="{{$size->slug}}" name="filter_size[]" @if(isset($sizeSlug) && in_array($size->slug, explode(",", $sizeSlug))) checked @endif onchange="filterProducts()">
                    <span></span>
                    {{ $size->name }}
                </label>
            </li>
        @endforeach
    </ul>
</div>
