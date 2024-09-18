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
                                    <img src="{{url('assets')}}/images/icons/edit.svg" alt="#" />
                                </div>
                                <h4 class="auth-card-title">Change Password</h4>
                            </div>
                            <div class="auth-card-form-body">
                                <form class="auth-card-form">
                                    <div class="form-group">
                                        <div class="form-group-icon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <div class="form-group-password">
                                            <input type="password" id="password" placeholder="New password" required />
                                            <i id="showPasswordIcon" class="fa fa-eye-slash"
                                                onclick="togglePasswordVisibility()"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group-icon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <div class="form-group-password">
                                            <input type="password" id="confirmPassword" placeholder="Confirm New password"
                                                required />
                                            <i id="showConfirmPasswordIcon" class="fa fa-eye-slash"
                                                onclick="toggleConfirmPasswordVisibility()"></i>
                                        </div>
                                    </div>
                                    <button class="auth-card-form-btn primary__btn" type="submit">
                                        Update
                                    </button>
                                </form>
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
