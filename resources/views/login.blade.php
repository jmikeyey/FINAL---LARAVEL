@extends('layouts.login')

@section('title', 'TechDepot - Login')

@section('pre-loader')
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Login</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>
                            <a href="{{ route('main.index') }}"><i class="lni lni-home"></i> Home</a>
                        </li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('forms')
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <!-- forms -->
                    <form class="card login-form">
                        <div class="card-body">
                            <div class="title">
                                <h3>Login Now</h3>
                                <p>
                                    You can login using your social media
                                    account or email address.
                                </p>
                            </div>
                            <div class="social-login">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <a class="btn facebook-btn "><i class="fab fa-facebook-square"></i>

                                            Flickr login</a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <a class="btn twitter-btn" href="javascript:void(0)"><i
                                                class="fab fa-twitter"></i>

                                            Twitter login</a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <a class="btn google-btn " data-onsuccess="onSignIn"><i
                                                class="fab fa-google"></i>

                                            Google login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="alt-option">
                                <span>Or</span>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Email</label>
                                <input class="form-control" type="email" id="reg-email" name="user" required />
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Password</label>
                                <input class="form-control" type="password" id="reg-pass" name="id"
                                    required />
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1" />
                                    <label class="form-check-label">Remember me</label>
                                </div>
                                <a class="lost-pass" href="account-password-recovery.html">Forgot password?</a>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">
                                    Login
                                </button>
                            </div>
                            <p class="outer-link">
                                Don't have an account?
                                <a href="{{ route('main.register') }}">Register here </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dependencies')
    <a href="#" class="scroll-top">
        <i class="fas fa-chevron-up"></i>
    </a>
    <script data-cfasync="false" src="js/email-decode.min.js"></script>
    <script src="js/bootstrap.min.js.pagespeed.jm.R6pdwTt0pj.js"></script>
    <script src="js/tiny-slider.js%2Bglightbox.min.js%2Bmain.js.pagespeed.jc.MCgBCVbLAV.js"></script>
    <script src="js/jquery.min.js"></script>
    <script>
        eval(mod_pagespeed_Zp_OOsHKoc);
    </script>
    <script>
        eval(mod_pagespeed_5TvwT_lz9K);
    </script>
    <script>
        eval(mod_pagespeed_uoja0BW_wo);
    </script>
    <script>
        $(document).ready(function() {
            // const logged_ser = $.cookie("name") ? "true" : 'window.location.replace("login.html"); console.log("failed");'
            const logged_ser = Cookies.get("name");
            console.log(logged_ser);

            if (!logged_ser) {
                console.log("Not logged in");
            } else {
                window.location.replace("/");
            }
        });
        function logout() {
            Cookies.remove("name");
            console.log("logout");
            window.location.replace("/login");
        }
    </script>
    <!-- cookeis -->
    <script src="js/login.js"></script>
    <script src="js/checkCookie.js"></script>   
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection