@extends('layouts.index')

@section('title', 'TechDepot')

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
@section('hero-container')
<section class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 custom-padding-right">
                <div class="slider-head">
                    <div class="hero-slider">
                        <div class="single-slider"
                            style="
                                    background: url(images/slider-bg1.png) no-repeat center center/cover;
                                ">
                            <div class="content">
                                <h2>
                                    <span>No restocking fee ($35
                                        savings)</span>
                                    Limited Stocks!
                                </h2>
                                <p>
                                    Asus Rog Strix B550-E Gaming AMD Ryzen <br> Am4 Atx Motherboard
                                </p>
                                <h3><span>Now Only</span> $320.99</h3>
                                <div class="button">
                                    <a href="product-details?id=2755726" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="single-slider"
                            style="
                                    background: url(images/slider-bg2.png) no-repeat center center/cover;
                                ">
                            <div class="content">
                                <h2>
                                    <span>Big Sale Offer</span>
                                    Get the Best Deal on Keyboards!
                                </h2>
                                <p>
                                    Royal Kludge Wired Round Keys White LED Usb Ergonomic Gaming Keyboard Multimedia
                                    Keyboard Games
                                </p>
                                <h3>
                                    <span>Combo Only:</span> $78.00
                                </h3>
                                <div class="button">
                                    <a href="product-details?id=2755647" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                        <div class="hero-small-banner"
                            style="
                                    background-image: url(images/xslider-bnr.jpg.pagespeed.ic.71c5Z3kdJp.jpg);
                                ">
                            <div class="content">
                                <h2>
                                    <span>New line required</span>
                                    iPhone 12 Pro Max
                                </h2>
                                <h3>$259.99</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="hero-small-banner style2">
                            <div class="content">
                                <h2>Weekly Sale!</h2>
                                <p>
                                    Saving up to 50% off all online
                                    store items this week.
                                </p>
                                <div class="button">
                                    <a class="btn" href="{{ route('main.product_grids') }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('trending-product')
    {{-- {{ $account_id = request()->cookie('usertype')}} --}}
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Product</h2>
                        <p>
                            There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered
                            alteration in some form.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row product_row">

            </div>
        </div>
    </section>
@endsection

@section('home-product-list')
    <section class="home-product-list section">
        <div class="container">
            <div class="row">
                <!-- best seller -->
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin best_seller">
                    <h4 class="list-title">Best Sellers</h4>

                </div>
                <!-- new arrival -->
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin new_arrival">
                    <h4 class="list-title">New Arrivals</h4>

                </div>
                <!-- top rated -->
                <div class="col-lg-4 col-md-4 col-12 top_rated">
                    <h4 class="list-title">Top Rated</h4>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('brands')
    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class="title">Popular Brands</h2>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                    <div class="brand-logo">
                        <img src="images/logo-rog.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/logo-intel.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/logo-ryzen.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/logo-kingston.jpg" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/logo-apple.jpg" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/logo-rk.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/logo-logitech.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/logo-hyperx.png" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('shipping-info')
    <section class="shipping-info">
        <center>
            <div class="container d-flex">
                <ul>
                    <li>
                        <div class="media-icon">
                            <i class="fas fa-life-ring"></i>

                        </div>
                        <div class="media-body">
                            <h5>24/7 Support.</h5>
                            <span>Live Chat Or Call.</span>
                        </div>
                    </li>

                    <li>
                        <div class="media-icon">
                            <i class="fas fa-credit-card"></i>

                        </div>
                        <div class="media-body">
                            <h5>Online Payment.</h5>
                            <span>Secure Payment Services.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </center>

    </section>
@endsection

@section('dependencies')
    <a href="#" class="scroll-top">
        <i class="fas fa-chevron-up"></i>

    </a>
    <!-- dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha256/0.9.0/sha256.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spark-md5/3.0.2/spark-md5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <!-- =========================== -->
    <script data-cfasync="false" src="js/email-decode.min.js"></script>
    <script src="js/bootstrap.min.js.pagespeed.jm.R6pdwTt0pj.js"></script>
    <script src="js/tiny-slider.js%2Bglightbox.min.js%2Bmain.js.pagespeed.jc.MCgBCVbLAV.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/checkCookie.js"></script>
    <script src="js/indexAPI.js"></script>
    <script src="js/cart.js"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        eval(mod_pagespeed_Zp_OOsHKoc);
    </script>
    <script>
        eval(mod_pagespeed_5TvwT_lz9K);
    </script>
    <script>
        eval(mod_pagespeed_uoja0BW_wo);
    </script>
    <script type="text/javascript">
        tns({
            container: ".hero-slider",
            slideBy: "page",
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: [
                '<i class="lni lni-chevron-left"></i>',
                '<i class="lni lni-chevron-right"></i>',
            ],
        });
        tns({
            container: ".brands-logo-carousel",
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1
                },
                540: {
                    items: 3
                },
                768: {
                    items: 5
                },
                992: {
                    items: 6
                },
            },
        });

        $(document).ready(function() {
            $(document).on('click', '.cta', function() {
                window.location.href = '/product-grids'; // Redirect to /product-grids
            });
        });
    </script>
    <!-- promo timer -->
    <script src="js/general.js"></script>
@endsection