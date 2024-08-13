@extends('layouts.register')

@section('title', 'TechDepot - Register')
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
                    <h1 class="page-title">Registration</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li>
                        <a href="{{ route('main.index') }}"><i class="lni lni-home"></i> Home</a>
                    </li>
                    <li>Registration</li>
                </ul>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('main-section')
  <div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <div class="register-form">
                    <div class="title">
                        <h3>No Account? Register</h3>
                        <p>
                            Registration takes less than a minute but
                            gives you full control over your orders.
                        </p>
                    </div>
                    <form class="row" id="reg-form" method="post">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="reg-fn">Profile Picture</label>
                                <input class="form-control" type="file" id="reg-fn" name="profile_pic" />
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="reg-fn">First Name</label>
                                <input class="form-control" type="text" id="reg-fn" name="firstname"
                                    required />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="reg-ln">Last Name</label>
                                <input class="form-control" type="text" id="reg-ln" name="lastname"
                                    required />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="reg-ln">Middle</label>
                                <input class="form-control" type="text" id="reg-ln" name="mi" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-email">E-mail Address</label>
                                <input class="form-control" type="email" id="reg-email" name="email"
                                    required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-phone">Phone Number</label>
                                <input class="form-control" type="number" id="reg-phone" name="number"
                                    required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-pass">Password</label>
                                <input class="form-control" type="password" id="reg-pass" name="password"
                                    required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-pass-confirm">Confirm Password</label>
                                <input class="form-control" type="password" id="reg-pass-confirm" required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-pass">Gender</label>
                                <select class="form-control" id="reg-gender" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Rather not to say">Rather not to say</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-pass-confirm">Birdthdate</label>
                                <input class="form-control" type="date" id="reg-pass-confirm" name="bod"
                                    required />
                            </div>
                        </div>
                        <div class="button">
                            <button class="btn" type="submit">
                                Register
                            </button>
                        </div>
                        <p class="outer-link">
                            Already have an account?
                            <a href="login.html">Login Now</a>
                        </p>
                    </form>
                </div>
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
            console.log("not logged in")
        }else {
          window.location.replace("/");
        }
    });
    
  </script>

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/cookie.js"></script>
  <script src="js/register.js"></script>
  <script src="js/cart.js"></script>
  <script src="js/general.js"></script>
  <script src="js/checkCookie.js"></script>
@endsection