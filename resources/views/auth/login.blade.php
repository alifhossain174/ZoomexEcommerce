@extends('master')

@push('site-seo')
    @php
        $generalInfo = DB::table('general_infos')
            ->select('meta_title', 'meta_og_title', 'meta_keywords', 'meta_description', 'meta_og_description', 'meta_og_image', 'company_name', 'fav_icon')
            ->where('id', 1)
            ->first();
        $socialLogin = DB::table('social_logins')
            ->select('gmail_login_status')
            ->where('id', 1)
            ->first();
    @endphp

    <meta name="keywords" content="{{ $generalInfo ? $generalInfo->meta_keywords : '' }}" />
    <meta name="description" content="{{ $generalInfo ? $generalInfo->meta_description : '' }}" />
    <meta name="author" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta name="copyright" content="{{ $generalInfo ? $generalInfo->company_name : '' }}">
    <meta name="url" content="{{ env('APP_URL') }}">

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

    <!-- Open Graph general (Facebook, Pinterest)-->
    <meta property="og:title" content="@if ($generalInfo && $generalInfo->meta_og_title) {{ $generalInfo->meta_og_title }} @else {{ $generalInfo->company_name }} @endif" />
    <meta property="og:type" content="Ecommerce" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ env('ADMIN_URL') . '/' . $generalInfo->meta_og_image }}" />
    <meta property="og:site_name" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta property="og:description" content="{{ $generalInfo->meta_og_description }}" />
    <!-- End Open Graph general (Facebook, Pinterest)-->
@endpush

@section('content')
    <!-- Auth Page  Area -->
    <section class="auth-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                    <div class="auth-card">
                        <div class="auth-card-head">
                            <div class="auth-card-head-icon">
                                <img src="{{url('assets')}}/images/icons/lock.svg" alt="" />
                            </div>
                            <h4 class="auth-card-title">Sign in</h4>
                        </div>
                        <div class="auth-card-form-body">
                            <form method="POST" action="{{ route('login') }}" class="auth-card-form">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Email or phone number" required="" />
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $message)
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="form-group-icon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="" placeholder="Password" required="" />
                                </div>
                                <div class="auth-card-info">
                                    <div class="form-check">
                                        {{-- <input type="checkbox" name="remember" id="custom-checkbox remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }} />
                                        <label for="custom-checkbox" class="form-check-label">Remember me</label> --}}
                                    </div>
                                    <a href="{{ url('forget/password') }}">Forgotten password?</a>
                                </div>
                                <button type="submit" class="auth-card-form-btn primary__btn">
                                    Sign in
                                </button>
                            </form>
                            <div class="auth-card-bottom">

                                @if ($socialLogin->gmail_login_status)
                                    <span>or</span>
                                    <div class="auth-card-google-btn">
                                        <a href="{{ url('auth/google') }}">
                                            <img src="{{ url('assets') }}/images/icons/google.svg" alt="" />
                                            Sign in with Google
                                        </a>
                                    </div>
                                @endif

                                <p class="auth-card-bottom-link">
                                    Don’t have any account?<a href="{{ url('register') }}">Register account</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Auth Page  Area -->
@endsection
