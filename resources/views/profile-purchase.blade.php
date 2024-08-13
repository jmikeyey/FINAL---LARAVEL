@extends('layouts.profile-purchases')

@section('title', 'TechDepot - ProfilePurchases')
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
                        <li>Purchases</li>
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
                                    <a href="#" data-toggle="collapse" data-target="#collpase-nav"
                                        aria-expanded="false">
                                        <i class="lni lni-user" style="color:#0167f3;font-size:14px"></i>
                                        My Account
                                    </a>
                                    <div class="collapse show" id="collpase-nav">
                                        <a class="profile_link" href="">Profile</a><br>
                                        <a class="add_link" href="">Address</a><br>
                                        <a class="change_link" href="">Change Password</a>
                                    </div>
                                    <a class="purchase_link" href="">
                                        <span style="border-bottom: 1px solid #0167f3;">
                                            <i class="lni lni-agenda" style="color:#0167f3;font-size:14px"></i>
                                            My Purchase
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main" id="form-main">
                                    <div class="purchase-main">
                                        <div class="headers d-flex">
                                            <h5>My Purchase</h5>
                                        </div>
                                        <hr>
                                        <div class="order-container">
                                            <a href="#" class="active" data-target="all">All</a>
                                            <a href="#" data-target="pending">Pending</a>
                                            <a href="#" data-target="ship">To Ship</a>
                                            <a href="#" data-target="receive">To Receive</a>
                                            <a href="#" data-target="completed">Completed</a>
                                        </div>
                                        <div class="all_products contents">
                                            <div class="order-mother-container">
                                                
                                            </div>
                                        </div>
                                        <div class="ship_products contents">
                                            <div class="centered-content">
                                                <span class="icon">
                                                    <i class="fa fa-file-invoice"></i>
                                                </span>
                                                <span class="text">No Orders Yet</span>
                                                <a href="{{ route('main.product_grids') }}">Shop Now!</a>
                                            </div>
                                        </div>
                                        <div class="receive_products contents">
                                            <div class="centered-content">
                                                <span class="icon">
                                                    <i class="fa fa-file-invoice"></i>
                                                </span>
                                                <span class="text">No Orders Yet</span>
                                                <a href="{{ route('main.product_grids') }}">Shop Now!</a>
                                            </div>
                                        </div>
                                        <div class="pending_products contents">
                                            <div class="centered-content">
                                                <span class="icon">
                                                    <i class="fas fa-box-open"></i>
                                                </span>
                                                <span class="text">No Orders Yet</span>
                                                <a href="{{ route('main.product_grids') }}">Shop Now!</a>
                                            </div>
                                        </div>
                                        <div class="completed_products contents">
                                            <div class="centered-content">
                                                <span class="icon">
                                                    <i class="fa fa-file-invoice"></i>
                                                </span>
                                                <span class="text">No Orders Yet</span>
                                                <a href="{{ route('main.product_grids') }}">Shop Now!</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="details-main d-none">
                                        <div class="details-header">
                                            <a href="#" class="goBack_""><i class=" fas fa-angle-left"></i>
                                                Back</a>
                                            <span>ORDER ID: <span class="sample_id"></span></span>
                                        </div>
                                        <section class="root">
                                            <!-- <div class="container px-1 px-md-4 py-5 mx-auto">
                                                <div class="card">
                                                    <div class="row d-flex justify-content-between px-3 top">
                                                        <div class="d-flex">
                                                            <h5>ORDER <span
                                                                    class="text-primary font-weight-bold">#Y34XDHR</span>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-12">
                                                            <ul id="progressbar" class="text-center">
                                                                <li class="active step0"></li>
                                                                <li class=" step0"></li>
                                                                <li class=" step0"></li>
                                                                <li class="step0"></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="order-icon-text order-icon">
                                                        <div class="icon-content d-flex">
                                                            <i class="fas fa-file-alt"></i>
                                                            <p class="font-weight-bold">Order<br>Processed</p>
                                                        </div>
                                                        <div class="icon-content d-flex">
                                                            <i class="fas fa-box"></i>
                                                            <p class="font-weight-bold">Order<br>Shipped</p>
                                                        </div>
                                                        <div class=" d-flex icon-content">
                                                            <i class="fas fa-truck"></i>
                                                            <p class="font-weight-bold">Order<br>En Route</p>
                                                        </div>
                                                        <div class="d-flex icon-content">
                                                            <i class="fas fa-home"></i>
                                                            <p class="font-weight-bold">Order<br>Arrived</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-address">
                                                    <div class="top_level">
                                                        <i class="fa-solid fa-location-dot"></i> <span>Delivery Address</span>

                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <div class="user_info">
                                                                    <span class="user_name" style="font-weight: 700; font-size: 1.2rem">John Micky Butnande (63) 9386834879</span> <br>
                                                                    <span class="address_dets">
                                                                        <span> Region X | Misamis Occidental | Ozamiz City | Labo </span> <br>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card">

                                                    <div class="row order-content">
                                                        <div class="order-holder">
                                                            <div class="order-details-holder row d-flex">
                                                                <div class="product_img col-md-2">
                                                                    <img src="img-prod/prod_img_646b92a8b20a9_mx500.jpg">
                                                                </div>
                                                                <div class="product_info col-md-9 py-1">
                                                                    <div class="product_names">
                                                                        <span style="color:black"><a href="product-details.html?id=${order.product_id}">Crucial MX500 SATA SS</a></span>
                                                                        <span style="color:rgb(85, 81, 81)">CPU</span>
                                                                        <span style="color:rgb(85, 81, 81);">Price: ₱ 2849</span>
                                                                    </div>
                                                                    <div class="order_stats">
                                                                        <span>Quantity: x3</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="order-summary">
                                                    <div class="summary_holder">
                                                        <div class="name_holder">
                                                            <span class="subtotal">Subtotal </span>
                                                            <span class="shipping">Shipping</span>
                                                            <span class="coupons">Discount</span>
                                                        </div>
                                                        <div class="value_holder">
                                                            <span class="subtotal">₱  8547 </span>
                                                            <span class="shipping">₱ 200</span>
                                                            <span class="coupons"> ₱ 687</span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="total_holder">
                                                        <span class="total">Total</span>
                                                        <span class="total">₱  7660</span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('.all_products').show();
                                $('.order-container a').click(function(e) {
                                    e.preventDefault();
                                    var target = $(this).data('target');
                                    $('.contents').hide();
                                    $('.' + target + '_products').show();
                                    $('.order-container a').removeClass('active');
                                    $(this).addClass('active');
                                });
                            });
                        </script>
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
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script data-cfasync="false" src="js/email-decode.min.js"></script>
    <script src="js/bootstrap.min.js.pagespeed.jm.R6pdwTt0pj.js"></script>
    <script src="js/tiny-slider.js%2Bglightbox.min.js%2Bmain.js.pagespeed.jc.MCgBCVbLAV.js"></script>
    <script src="js/jquery.min.js"></script>

    <script src="js/profile.js"></script>
    <script src="js/profilePurchase.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/general.js"></script>
    <script src="js/checkCookie.js"></script>
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
        $(document).on('click', ".show-btn", function() {
            var orderContent = $(this).closest(".actions").nextUntil(".actions");

            if (orderContent.is(":visible")) {
                orderContent.hide();
                $(this).text("show");
            } else {
                orderContent.show();
                $(this).text("hide");
            }
        });
        $(document).ready(function() {
            $(document).on('click', '.cta', function() {
                window.location.href = '/product-grids'; // Redirect to /product-grids
            });
        });
    </script>
@endsection