<div class="widget widget-collapsible">
    <h3 class="widget-title"><span>Product Flags</span></h3>
    <ul class="widget-body filter-items search-ul pt-3">
        @foreach ($flags as $flags)
            <li style="padding: 8px 10px; border: 1px solid lightgray; border-radius: 4px; margin-bottom: 5px; cursor: pointer">
                <label class="round-checkbox" for="{{$flags->slug}}" style="cursor: pointer; display: block; width: 100%">
                    <input type="checkbox" id="{{$flags->slug}}" value="{{$flags->slug}}" name="filter_flag[]" @if(isset($flagSlug) && in_array($flags->slug, explode(",", $flagSlug))) checked @endif onchange="filterProducts()">
                    <span></span>
                    {{ $flags->name }}
                </label>
            </li>
        @endforeach
    </ul>
</div>
