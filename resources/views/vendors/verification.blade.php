@extends('master')

@push('site-seo')
    @php
        $generalInfo = DB::table('general_infos')
            ->select('meta_title', 'meta_og_title', 'meta_keywords', 'meta_description', 'meta_og_description', 'meta_og_image', 'company_name', 'fav_icon')
            ->where('id', 1)
            ->first();
    @endphp
    <meta name="keywords" content="{{ $generalInfo ? $generalInfo->meta_keywords : '' }}" />
    <meta name="description" content="{{ $generalInfo ? $generalInfo->meta_description : '' }}" />
    <meta name="author" content="{{ $generalInfo ? $generalInfo->company_name : '' }}">
    <meta name="copyright" content="{{ $generalInfo ? $generalInfo->company_name : '' }}">
    <meta name="url" content="{{ env('APP_URL') }}">

    {{-- Page Title & Favicon --}}
    <title>
        @if ($generalInfo && $generalInfo->meta_title)
            {{ $generalInfo->meta_title }}
        @else
            {{ $generalInfo->company_name }}
        @endif
    </title>
    @if ($generalInfo && $generalInfo->fav_icon)
        <link rel="icon" href="{{ env('ADMIN_URL') . '/' . $generalInfo->fav_icon }}" type="image/x-icon"/>
    @endif

    {{-- open graph meta --}}
    <meta property="og:title" content="@if ($generalInfo && $generalInfo->meta_og_title) {{ $generalInfo->meta_og_title }} @else {{ $generalInfo->company_name }} @endif" />
    <meta property="og:type" content="Ecommerce" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ env('ADMIN_URL') . '/' . $generalInfo->meta_og_image }}" />
    <meta property="og:site_name" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta property="og:description" content="{{ $generalInfo->meta_og_description }}" />
@endpush

@section('content')
    <section class="auth-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                    <div class="auth-card verifyOTP-card">
                        <div class="auth-card-head">
                            <div class="auth-card-head-icon">
                                <img src="{{url('assets')}}/images/icons/edit.svg" alt="" />
                            </div>
                            <h4 class="auth-card-title">Verify OTP</h4>
                            <p class="auth-card-head-title-text">
                                A 6-digit verification code was sent to
                                <span class="otp-number">"{{session('vendor_email')}}"</span>
                                Enter the code to verify.
                            </p>
                        </div>
                        <form class="auth-card-form" action="{{ url('vendor/verify/check') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label  class="d-block">Enter code</label>
                                <div class="otp-input" id="otp-input">
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required />
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required />
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required />
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required />
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required />
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required />
                                </div>
                            </div>
                            <div class="auth-form-btn mt-20">
                                <button id="verify-btn" class="auth-card-form-btn primary__btn" type="submit">
                                    Verify
                                </button>
                                <p id="verification-result"></p>
                            </div>
                        </form>
                        <div class="auth-card-bottom">
                            <p class="OTP-send-again m-0 text-center">
                                Didn’t receive Any Code? <a href="{{ url('vendor/verification/resend') }}">Send again</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('footer_js')
    <script>
        document.addEventListener("paste", function(e) {
            // if the target is a text input
            if (e.target.type === "text") {
                var data = e.clipboardData.getData('Text');
                // split clipboard text into single characters
                data = data.split('');
                // find all other text inputs
                [].forEach.call(document.querySelectorAll("input.otp-input-field"), (node, index) => {
                    // And set input value to the relative character
                    node.value = data[index];
                    checkFilled();
                });
            }
        });

        $('input.otp-input-field').on('keyup', function() {
            if ($(this).val()) {
                $(this).next().focus();
                checkFilled();
            }
        });

        function checkFilled() {
            var interests = document.getElementsByClassName("otp-input-field");
            var emptyBoxCount = 0;
            for (var i = 0; i < interests.length; i++) {
                if (interests[i].value == '') {
                    interests[i].style.borderColor = 'red';
                } else {
                    interests[i].style.borderColor = 'green';
                    emptyBoxCount = emptyBoxCount + 1
                }
            }

            if (emptyBoxCount == 6) {
                document.getElementById("verify-btn").style.cursor = "pointer";
                document.getElementById("verify-btn").click();
            } else {
                document.getElementById("verify-btn").style.cursor = "no-drop";
            }
        }
    </script>
@endsection
