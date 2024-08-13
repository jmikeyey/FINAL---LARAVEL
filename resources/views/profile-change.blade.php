@extends('layouts.profile-change')

@section('title', 'TechDepot - ProfileChange')
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
                        <h1 class="page-title">Profile</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>
                            <a href="{{ route('main.index') }}"><i class="lni lni-home"></i> Home</a>
                        </li>
                        <li>
                            <a href="{{ route('main.profile') }}"><i class="lni lni-user"></i> Profile</a>
                        </li>
                        <li>Change Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-section')
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Contact Us</h2>
                            <p>
                                There are many variations of passages of
                                Lorem Ipsum available, but the majority have
                                suffered alteration in some form.
                            </p>
                        </div>
                    </div>
                </div> -->
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="single-info-head">
                                <div class="profile">
                                    <div class="profile-img_holder">

                                    </div>
                                    <div class="profile-name">

                                    </div>
                                </div>
                                <hr>
                                <div class="profile-tabs">
                                    <a href="" data-toggle="collapse" data-target="#collpase-nav"
                                        aria-expanded="false">
                                        <i class="lni lni-user" style="color:#0167f3;font-size:14px"></i>
                                        My Account
                                    </a>
                                    <div class="collapse show" id="collpase-nav">
                                        <a class="profile_link" href="">Profile</a><br>
                                        <a class="add_link" href="">Address</a><br>
                                        <a class="change_link" href=""
                                            style="border-bottom: 1px solid #0167f3">Change Password</a>
                                    </div>
                                    <a class="purchase_link" href="">
                                        <i class="lni lni-agenda" style="color:#0167f3;font-size:14px"></i>
                                        My Purchase
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main" id="form-main">
                                    <form class="form form_changePass">
                                        <h5>Change Password</h5>
                                        <p>For your account's security, do not share your password with anyone else</p>
                                        <hr>
                                        <div class="row">
                                            <div class="user-info col-md-11">
                                                <div class="container">
                                                    <form>
                                                        <div class="form-group row">
                                                            <label for="current-password"
                                                                class="col-sm-3 col-form-label text-dark">Username</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    name="user-name" id="user-name" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="current-password"
                                                                class="col-sm-3 col-form-label text-dark">Current
                                                                Password</label>
                                                            <div class="col-sm-9">
                                                                <input type="hidden" id="user-id" name="user-id">
                                                                <input type="password" class="form-control"
                                                                    id="current-password" name="current-password">
                                                            </div>
                                                            <span class="col-sm-9 curMsg" style="color:red"></span>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="new-password"
                                                                class="col-sm-3 col-form-label text-dark">New
                                                                Password</label>
                                                            <div class="col-sm-9">
                                                                <input type="password" class="form-control"
                                                                    id="new-password" name="new-password">
                                                            </div>
                                                            <span class="col-sm-9 newMsg" style="color:red"></span>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="confirm-password"
                                                                class="col-sm-3 col-form-label text-dark">Confirm
                                                                Password</label>
                                                            <div class="col-sm-9">
                                                                <input type="password" class="form-control"
                                                                    id="confirm-password" name="confirm-password">
                                                            </div>
                                                            <span class="col-sm-9 confMsg" style="color:red"></span>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary submit-btn"
                                                            disabled>Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('dependencies')
    <a href="#" class="scroll-top">
        <i class="fas fa-chevron-up"></i>

    </a>

    <script data-cfasync="false" src="js/email-decode.min.js"></script>
    <script src="js/bootstrap.min.js.pagespeed.jm.R6pdwTt0pj.js"></script>
    <script src="js/tiny-slider.js%2Bglightbox.min.js%2Bmain.js.pagespeed.jc.MCgBCVbLAV.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        eval(mod_pagespeed_Zp_OOsHKoc);
    </script>
    <script>
        eval(mod_pagespeed_5TvwT_lz9K);
    </script>
    <script>
        eval(mod_pagespeed_uoja0BW_wo);
    </script>
    <script src="js/checkuser.js"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/checkuser.js"></script>
    <script src="js/profile.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/profileChange.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function previewImage() {
            var fileInput = document.getElementById('file');
            var profileImg = document.getElementById('profile-img');

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    profileImg.src = e.target.result;
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
        $(document).ready(function() {
            $(document).on('click', '.cta', function() {
                window.location.href = '/product-grids'; // Redirect to /product-grids
            });
        });
    </script>
    <script src="js/general.js"></script>
    <script src="js/checkCookie.js"></script>
@endsection