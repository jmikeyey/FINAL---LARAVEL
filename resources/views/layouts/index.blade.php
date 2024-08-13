<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="fonts/favicon.svg" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet"
        href="css/A.bootstrap.min.css%2BLineIcons.3.0.css%2Btiny-slider.css%2Bglightbox.min.css%2CMcc.OzR7N5fb_Y.css.pagespeed.cf.svKjl5Nf5n.css" />
    <link rel="stylesheet" href="css/A.main.css.pagespeed.cf.wZnWV-GMUP.css" />
    <script src="https://kit.fontawesome.com/d1c03249e2.js" crossorigin="anonymous"></script>
    <!-- cookie -->
    <script src="js/cookie.js"></script>
    <style>
        .colored-toast {
            background-color: #a5dc86 !important;
        }

        .user_profile:hover {
            color: #0167f3;
        }
    </style>
    <link rel="stylesheet" href="css/general-style.css">
    <link rel="stylesheet" href="css/general.css">
</head>

<body>
    @yield('pre-loader')
    @include('partials.header')
    @yield('hero-container')
    <!-- <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Categories</h2>
                        <p>
                            There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered
                            alteration in some form.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-category">
                        <h3 class="heading">TV & Audios</h3>
                        <ul>
                            <li>
                                <a href="product-grids.html">Smart Television</a>
                            </li>
                            <li>
                                <a href="product-grids.html">QLED TV</a>
                            </li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li>
                                <a href="product-grids.html">Headphones</a>
                            </li>
                            <li>
                                <a href="product-grids.html">View All</a>
                            </li>
                        </ul>
                        <div class="images">
                            <img src="images/fetured-item-1.png" alt="#" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-category">
                        <h3 class="heading">Desktop & Laptop</h3>
                        <ul>
                            <li>
                                <a href="product-grids.html">Smart Television</a>
                            </li>
                            <li>
                                <a href="product-grids.html">QLED TV</a>
                            </li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li>
                                <a href="product-grids.html">Headphones</a>
                            </li>
                            <li>
                                <a href="product-grids.html">View All</a>
                            </li>
                        </ul>
                        <div class="images">
                            <img src="images/fetured-item-2.png" alt="#" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-category">
                        <h3 class="heading">Cctv Camera</h3>
                        <ul>
                            <li>
                                <a href="product-grids.html">Smart Television</a>
                            </li>
                            <li>
                                <a href="product-grids.html">QLED TV</a>
                            </li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li>
                                <a href="product-grids.html">Headphones</a>
                            </li>
                            <li>
                                <a href="product-grids.html">View All</a>
                            </li>
                        </ul>
                        <div class="images">
                            <img src="images/fetured-item-3.png" alt="#" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-category">
                        <h3 class="heading">Dslr Camera</h3>
                        <ul>
                            <li>
                                <a href="product-grids.html">Smart Television</a>
                            </li>
                            <li>
                                <a href="product-grids.html">QLED TV</a>
                            </li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li>
                                <a href="product-grids.html">Headphones</a>
                            </li>
                            <li>
                                <a href="product-grids.html">View All</a>
                            </li>
                        </ul>
                        <div class="images">
                            <img src="images/fetured-item-4.png" alt="#" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-category">
                        <h3 class="heading">Smart Phones</h3>
                        <ul>
                            <li>
                                <a href="product-grids.html">Smart Television</a>
                            </li>
                            <li>
                                <a href="product-grids.html">QLED TV</a>
                            </li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li>
                                <a href="product-grids.html">Headphones</a>
                            </li>
                            <li>
                                <a href="product-grids.html">View All</a>
                            </li>
                        </ul>
                        <div class="images">
                            <img src="images/fetured-item-5.png" alt="#" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-category">
                        <h3 class="heading">Game Console</h3>
                        <ul>
                            <li>
                                <a href="product-grids.html">Smart Television</a>
                            </li>
                            <li>
                                <a href="product-grids.html">QLED TV</a>
                            </li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li>
                                <a href="product-grids.html">Headphones</a>
                            </li>
                            <li>
                                <a href="product-grids.html">View All</a>
                            </li>
                        </ul>
                        <div class="images">
                            <img src="images/fetured-item-6.png" alt="#" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    @yield('trending-product')
    @yield('home-product-list')
    @yield('brands')
    @yield('shipping-info')
    @include('partials.footer')
    @yield('dependencies')
</body>

</html>
