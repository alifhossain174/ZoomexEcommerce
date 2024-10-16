<div class="policies-area">
    <h3 class="title">Terms & Condition</h3>
    {!! substr($policies->terms, 0, 600) !!}..
    <br>
    <a href="{{url('terms/of/services')}}" target="_blank" class="btn btn-sm btn-rounded d-inline-block mb-3 mt-3 policy_read_more_btn">Read More</a>
</div>
<div class="policies-area">
    <h3 class="title">Privacy Policy</h3>
    {!! substr($policies->privacy_policy, 0, 600) !!}..
    <br>
    <a href="{{url('privacy/policy')}}" target="_blank" class="btn btn-sm btn-rounded d-inline-block mb-3 mt-3 policy_read_more_btn">Read More</a>
</div>
<div class="policies-area">
    <h3 class="title">Shipping Policy</h3>
    {!! substr($policies->shipping_policy, 0, 600) !!}..
    <br>
    <a href="{{url('shipping/policy')}}" target="_blank" class="btn btn-sm btn-rounded d-inline-block mb-3 mt-3 policy_read_more_btn">Read More</a>
</div>
<div class="policies-area">
    <h3 class="title">Return Policy</h3>
    {!! substr($policies->return_policy, 0, 600) !!}..
    <br>
    <a href="{{url('return/policy')}}" target="_blank" class="btn btn-sm btn-rounded d-inline-block mb-3 mt-3 policy_read_more_btn">Read More</a>
</div>
