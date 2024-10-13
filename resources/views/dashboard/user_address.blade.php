@extends('master')

@section('header_css')
    <link rel="stylesheet" href="{{url('assets')}}/css/plugins/bootstrap.min.css" />
    {{-- <link rel="stylesheet" href="./assets/css/plugins/animate.min.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets') }}/css/plugins/fancybox.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/plugins/icofont.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/plugins/uicons.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/user-pannel.css" />

    <style>
        .select2-container{
            display: block;
        }

        .select2-selection {
            height: 34px !important;
            border: 1px solid #ced4da !important;
        }

        .select2 {
            width: 100% !important;
        }

        .select2 .selection {
            width: 100%;
        }

        .select2-selection {
            height: 42px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 22px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 6px !important;
        }

        .select-style-2 .nice-select .list {
            max-height: 240px;
            overflow: scroll;
        }

        .select2-results__option {
            font-size: 16px;
        }

        .select2-selection__rendered{
            font-size: 15px
        }
    </style>
@endsection

@push('site-seo')
    @php
        $generalInfo = DB::table('general_infos')
            ->select('meta_title', 'company_name', 'fav_icon')
            ->where('id', 1)
            ->first();
    @endphp
    <title>
        @if ($generalInfo && $generalInfo->meta_title)
            {{ $generalInfo->meta_title }}
        @else
            {{ $generalInfo->company_name }}
        @endif
    </title>
    @if ($generalInfo && $generalInfo->fav_icon)
        <link rel="icon" href="{{ env('ADMIN_URL') . '/' . $generalInfo->fav_icon }}" type="image/x-icon" />
    @endif
@endpush

@section('content')

    <div class="ud-full-body">

        @include('dashboard.mobile_menu_offcanvus')

        <section class="getcom-user-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="getcom-user-body-bg">
                            <img alt="" src="{{ url('assets') }}/img/user-hero-bg.png" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        @include('dashboard.menu')
                    </div>
                    <div class="col-lg-12 col-xl-9 col-12">
                        <div class="dashboard-address mgTop24">


                            <div class="dashboard-head-widget style-2" style="margin: 0">
                                <h5 class="dashboard-head-widget-title">Address</h5>
                                <div class="dashboard-head-widget-btn">
                                    <button type="button" class="widget-show-btn theme-btn secondary-btn icon-right btn btn-primary">
                                        <i class="fi-rr-plus"></i> Add new address
                                    </button>
                                </div>
                                <div class="add-new-address-widget">
                                    <form action="{{url('save/user/address')}}" method="post" class="add-new-address-form">
                                        @csrf
                                        <i class="close-icon fa fa-cross" style="right: 12px; top: 12px; cursor: pointer; position: absolute; height: 25px; width: 25px;"></i>
                                        <div class="form-group select-form">
                                            <label class="form-label" for="address_type">Address type</label>
                                            <select name="address_type" style="font-size: 14px; padding: 10px 10px; display: block; width: 100%;" id="address_type" class="form-select" required>
                                                <option value="">Select</option>
                                                <option value="Home">Home</option>
                                                <option value="Office">Office</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Address line</label>
                                            <input name="adress_line" placeholder="Address" style="font-weight: 500;" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group select-form">
                                            @php
                                                $districts = DB::table('districts')->orderBy('name', 'asc')->get();
                                            @endphp
                                            <label class="form-label" for="city">Select District</label>
                                            <select name="shipping_district_id" id="shipping_district_id" data-toggle="select2" class="form-select" required>
                                                <option value="">Select</option>
                                                @foreach ($districts as $district)
                                                <option value="{{$district->id}}">{{$district->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group select-form">
                                            <label class="form-label" for="state">Select Thana/Upazila</label>
                                            <select name="shipping_thana_id" id="shipping_thana_id" data-toggle="select2" class="form-select" required>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Postal code</label>
                                            <input name="postal_code" placeholder="ex: 1000" style="font-weight: 500;" type="text" class="form-control" required>
                                        </div>
                                        <button type="submit" class="add-new-address-form-btn theme-btn btn btn-primary">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="dashboard-address-widget">

                                @foreach ($addresses as $address)

                                {{-- for update purpose --}}
                                <input type="hidden" id="update_address_type_{{$address->slug}}" value="{{$address->address_type}}">
                                <input type="hidden" id="update_address_line_{{$address->slug}}" value="{{$address->address}}">
                                <input type="hidden" id="update_city_{{$address->slug}}" value="{{$address->city}}">
                                @php
                                    $districtInfo = DB::table('districts')->where('name', $address->city)->first();
                                @endphp
                                <input type="hidden" id="update_city_id_{{$address->slug}}" value="{{$districtInfo ? $districtInfo->id : ''}}">
                                <input type="hidden" id="update_state_{{$address->slug}}" value="{{$address->state}}">
                                <input type="hidden" id="update_post_code_{{$address->slug}}" value="{{$address->post_code}}">

                                <div class="address-card">
                                    <div class="address-card-head">
                                        <div class="address-card-head-title">
                                            <div class="address-card-head-icon">
                                                @if($address->address_type == 'Home')
                                                <img alt="#" src="{{ url('assets') }}/img/icons/home.svg">
                                                @else
                                                <img alt="#" src="{{ url('assets') }}/img/icons/briefcase.svg">
                                                @endif
                                            </div>
                                            <h4>{{$address->address_type}} Address</h4>
                                        </div>

                                        <div class="address-card-head-menu dropdown">
                                            {{-- <button type="button" id="dropdownMenuButton{{$address->id}}" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fi-rs-menu-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$address->id}}">
                                                <a class="dropdown-item editAddress" href="javascript:void(0)" data-toggle="tooltip" data-id="{{$address->slug}}" title="Edit" data-original-title="Edit">Edit Address</a>
                                                <a class="dropdown-item" href="{{url('remove/user/address')}}/{{$address->slug}}">Remove address</a>
                                            </div> --}}
                                            <style>
                                                .dropdown > a::after{
                                                    display: none
                                                }
                                            </style>
                                            <a class="dropdown-item" href="{{url('remove/user/address')}}/{{$address->slug}}">Remove address</a>
                                        </div>
                                    </div>
                                    <ul class="address-card-content-list">
                                        <li>
                                            <span>Address line</span><strong>{{$address->address}}</strong>
                                        </li>
                                        <li><span>District/City</span><strong>{{$address->city}}</strong></li>
                                        <li><span>Thana/Upazila</span><strong>{{$address->state}}</strong></li>
                                        <li><span>Postal code</span><strong>{{$address->post_code}}</strong></li>
                                    </ul>
                                </div>
                                @endforeach

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection


@section('footer_js')

    <script src="{{ url('assets') }}/js/plugins/jquery-migrate.js"></script>
    <script src="{{ url('assets') }}/js/plugins/modernizer.min.js"></script>
    <script src="{{ url('assets') }}/js/plugins/popper.js"></script>
    <script src="{{ url('assets') }}/js/plugins/bootstrap.min.js"></script>
    <script src="{{ url('assets') }}/js/plugins/jquery-fancybox.min.js"></script>
    {{-- <script src="{{ url('assets') }}/js/plugins/nice-select.js"></script> --}}
    <script src="{{ url('assets') }}/js/active.js"></script>

    <script src="{{url('assets')}}/js/select2.min.js"></script>
    <script>
        $('[data-toggle="select2"]').select2();

        $('#shipping_district_id').on('change', function () {
            var district_id = this.value;
            $("#shipping_thana_id").html('');
            $.ajax({
                url: "{{url('/district/wise/thana')}}",
                type: "POST",
                data: {
                    district_id: district_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#shipping_thana_id').html('<option data-display="Select One" value="">Select Thana</option>');
                    $.each(result.data, function (key, value) {
                        $("#shipping_thana_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        $('#edit_district_id').on('change', function () {
            var district_id = this.value;
            $("#edit_shipping_thana_id").html('');
            $.ajax({
                url: "{{url('/district/wise/thana')}}",
                type: "POST",
                data: {
                    district_id: district_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#edit_shipping_thana_id').html('<option data-display="Select One" value="">Select Thana</option>');
                    $.each(result.data, function (key, value) {
                        $("#edit_shipping_thana_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });


        $('body').on('click', '.editAddress', function () {
            var slug = $(this).data('id');
            $('#staticBackdrop').modal('show');
            $('#address_slug').val(slug);
            // $('#edit_address_type').val($("#update_address_type_"+slug).val());
            $('#edit_address_line').val($("#update_address_line_"+slug).val());
            $('#edit_postal_Code').val($("#update_post_code_"+slug).val());
            $("#edit_district_id option:contains('" + $("#update_city_"+slug).val() + "')").prop("selected", true);
            var district_id = $("#update_city_id_"+slug).val();
            $("#edit_shipping_thana_id").html('');
            $.ajax({
                url: "{{url('/district/wise/thana')}}",
                type: "POST",
                data: {
                    district_id: district_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#edit_shipping_thana_id').html('<option data-display="Select One" value="">Select Thana</option>');
                    $.each(result.data, function (key, value) {
                        $("#edit_shipping_thana_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $("#edit_shipping_thana_id option:contains('" + $("#update_state_"+slug).val() + "')").prop("selected", true);
                }
            });

        });


        $('#updateBtn').click(function (e) {

            toastr.options.positionClass = 'toast-bottom-right';
            toastr.options.timeOut = 1500;

            if($('#edit_address_type').val() == ''){
                toastr.error("Address Type is Missing");
                return false;
            }
            if($('#edit_address_line').val() == ''){
                toastr.error("Address Line is Missing");
                return false;
            }
            if($('#edit_district_id').val() == ''){
                toastr.error("District is Missing");
                return false;
            }
            if($('#edit_shipping_thana_id').val() == ''){
                toastr.error("Thana/Upazila is Missing");
                return false;
            }
            if($('#edit_postal_Code').val() == ''){
                toastr.error("Post Code is Missing");
                return false;
            }

            e.preventDefault();
            $(this).html('Saving..');
            $.ajax({
                data: $('#productForm2').serialize(),
                url: "{{ url('update/user/address') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#updateBtn').html('Save');
                    $('#productForm2').trigger("reset");
                    $('#staticBackdrop').modal('hide');
                    toastr.success("Address Updated Successfully");
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                },
                error: function (data) {
                    console.log('Error:', data);
                    toastr.warning("Something Went Wrong");
                    $('#saveBtn').html('Save');
                }
            });
        });


        $(document).ready(function() {
            $(".widget-show-btn").click(function() {
                $(".add-new-address-widget").toggleClass("active");
            });

            // Adding functionality to the close icon
            $(".add-new-address-widget .close-icon").click(function() {
                $(".add-new-address-widget").removeClass("active");
            });
        });
    </script>
@endsection
