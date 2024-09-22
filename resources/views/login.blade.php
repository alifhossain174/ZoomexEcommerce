@extends('master')

@section('content')
    <!-- Start of Main -->
    <main class="main login-page">
        <!-- Auth Page  Area -->
        <section class="auth-page-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                        <div class="auth-card">
                            <div class="auth-card-head">
                                <div class="auth-card-head-icon">
                                    <img src="{{ url('assets') }}/images/icons/lock.svg" alt="#" />
                                </div>
                                <h4 class="auth-card-title">Sign in</h4>
                            </div>
                            <div class="auth-card-form-body">
                                <form class="auth-card-form" action="#" method="post">
                                    <div class="form-group">
                                        <div class="form-group-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input name="email" placeholder="Email or phone number" required=""
                                            type="email" id="email" class="form-control" value="" />
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group-icon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <input name="password" placeholder="Password" required="" type="password"
                                            id="password" class="form-control" value="" />
                                    </div>
                                    <div class="auth-card-info">
                                        <div class="form-check"><input type="checkbox" id="custom-checkbox"
                                                class="form-check-input" /><label title="" for="custom-checkbox"
                                                class="form-check-label">Remember me</label></div>
                                        <a href="forget-password.html">Forgotten password?</a>
                                    </div>
                                    <a type="submit" href="./user-dashboard/dashboard.html"
                                        class="auth-card-form-btn primary__btn"> Sign in </a>
                                </form>
                                <div class="auth-card-bottom">
                                    <span>or</span>
                                    <div class="auth-card-google-btn">
                                        <a target="_blank" href="#"><img
                                                src="{{ url('assets') }}/images/icons/google.svg" alt="#" />Sign in
                                            with Google</a>
                                    </div>
                                    <p class="auth-card-bottom-link">Don’t have any account?<a href="register.html">Register
                                            account</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Auth Page  Area -->
    </main>
    <!-- End of Main -->
@endsection
