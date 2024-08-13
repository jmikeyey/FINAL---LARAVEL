@extends('layouts.profile')

@section('title', 'TechDepot - Profile')
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
                        <li>Profile</li>
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
                                        <!-- dynamically adding the image -->
                                    </div>
                                    <div class="profile-name">

                                    </div>
                                </div>
                                <hr>
                                <div class="profile-tabs">
                                    <a href="#" data-toggle="collapse" data-target="#collpase-nav"
                                        aria-expanded="false">
                                        <i class="lni lni-user" style="color:#0167f3;font-size:14px"></i>
                                        My Account
                                    </a>
                                    <div class="collapse show" id="collpase-nav">
                                        <a class="profile_link" href=""
                                            style="border-bottom: 1px solid #0167f3">Profile</a><br>
                                        <a class="add_link" href="">Address</a><br>
                                        <a class="change_link" href="">Change Password</a>
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
                                    <form id="form_info">
                                        <h5>My Profile</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="user-info col-md-8 "style="border-right:1px solid black">
                                                <table>
                                                    <tr>
                                                        <td>Firstname:</td>
                                                        <td>
                                                            <input type="hidden" name="user_id"
                                                                class="inputTag user_id">
                                                            <input type="text" name="fname"
                                                                class="uFname inputTag">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lastname:</td>
                                                        <td><input type="text" name="lname"
                                                                class="uLname inputTag"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Middle Initial:</td>
                                                        <td><input type="text" name="mi"
                                                                class="uMi inputTag"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td><input type="email" name="email"
                                                                class="uEmail inputTag"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone Number:</td>
                                                        <td>
                                                            <input type="text" name="number"
                                                                class="uNumber inputTag" placeholder="Phone Number">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender:</td>
                                                        <td>
                                                            <div class="containers">
                                                                <label>
                                                                    <input type="radio" name="radio"
                                                                        value="Male">
                                                                    <span>Male</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="radio"
                                                                        value="Female">
                                                                    <span>Female</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="radio"
                                                                        value="Rather not to say">
                                                                    <span>Rather not to say</span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth:</td>
                                                        <td><input type="date" name="bod"
                                                                class="uDob inputTag"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><button type="submit"
                                                                class="btn btn-primary saveInfo">Save</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-3 image_holder">
                                                <center>
                                                    <span style="margin-bottom: 20px">Change Profile Picture</span>
                                                </center>
                                                <div class="profile-change">
                                                    <img id="profile-img" class="profile-img-display"
                                                        src="img-prod/default.jpg"" height="90px"
                                                        width="90px"><br>
                                                </div>
                                                <div class="custom-file profile_button">
                                                    <input type="file" class="custom-file-input" id="file"
                                                        name="file" accept=".jpg, .jpeg, .png">
                                                    <label class="custom-file-label btn btn-outline-primary"
                                                        for="file">Choose file</label>
                                                </div>
                                                <center>
                                                    <p style="margin-top: 10px;">File size: 1mb</p>
                                                    <p>File type: all type</p>
                                                </center>
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
    <script>
        eval(mod_pagespeed_Zp_OOsHKoc);
    </script>
    <script>
        eval(mod_pagespeed_5TvwT_lz9K);
    </script>
    <script>
        eval(mod_pagespeed_uoja0BW_wo);
    </script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/checkuser.js"></script>
    <script src="js/profile.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/profileSingle.js"></script>
    <script src="js/general.js"></script>
    <script src="js/checkCookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        // Event listener for file input change
        $('#file').on('change', function(e) {
            // Trigger image preview
            previewImage(this);
        });
        // Function to preview selected image
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile-img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $(document).on('click', '.cta', function() {
                window.location.href = '/product-grids'; // Redirect to /product-grids
            });
        });
    </script>
@endsection