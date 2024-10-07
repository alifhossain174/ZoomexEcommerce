<div class="widget widget-collapsible">
    <h3 class="widget-title collapsed"><span>Filter Colors</span></h3>
    <ul class="widget-body filter-items search-ul pt-3">
        @foreach ($colors as $color)
            <li style="padding: 8px 8px; border: 1px solid lightgray; border-radius: 4px; margin-bottom: 5px; cursor: pointer">
                <label class="round-checkbox" for="{{$color->code}}" style="cursor: pointer; display: block; width: 100%">
                    <input type="checkbox" id="{{$color->code}}" value="{{$color->id}}" name="filter_color[]" @if(isset($colorId) && in_array($color->id, explode(",", $colorId))) checked @endif onchange="filterProducts()">
                    <span></span>
                    <div style="height: 18px; width: 18px; border-radius: 50%; float: left; margin-right: 6px; background: {{$color->code}}"></div>
                    {{ $color->name }}
                </label>
            </li>
        @endforeach
    </ul>
</div>
