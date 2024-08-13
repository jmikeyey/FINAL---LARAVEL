<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>TechDepot</title>
    <meta name="description" content />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="fonts/favicon.svg" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/glightbox.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="canonical" href="https://demo.graygrids.com/themes/shopgrids/" />
        <!-- cookie -->
    <script src="js/cookie.js"></script>
    <script src="https://kit.fontawesome.com/d1c03249e2.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <header class="header navbar-area">
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="menu-top-link">
                                <li>
                                    <div class="select-position">
                                        <select id="select4">
                                            <option value="0" selected>
                                                $ USD
                                            </option>
                                            <option value="1">
                                                € EURO
                                            </option>
                                            <option value="2">$ CAD</option>
                                            <option value="3">₹ INR</option>
                                            <option value="4">¥ CNY</option>
                                            <option value="5">৳ BDT</option>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="select-position">
                                        <select id="select5">
                                            <option value="0" selected>
                                                English
                                            </option>
                                            <option value="1">
                                                Español
                                            </option>
                                            <option value="2">
                                                Filipino
                                            </option>
                                            <option value="3">
                                                Français
                                            </option>
                                            <option value="4">
                                                العربية
                                            </option>
                                            <option value="5">
                                                हिन्दी
                                            </option>
                                            <option value="6">বাংলা</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="index.html">Home</a></li>
                                <li>
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact Us</a>
                                </li>
                                <li>
                                    <a href="faq.html">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <a href="profile.html" style="text-decoration: none;color: white;">
                                    <i class="lni lni-user"></i>
                                    User1
                                </a>
                            </div>
                            <ul class="user-login">
                                <li>
                                    <a href="login.html">Sign In</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <a class="navbar-brand" href="{{route('main.index')}}">
                            <img src="images/logo.png" alt="Logo" />
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <div class="main-menu-search">
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1">
                                            <option selected>All</option>
                                            <option value="1">
                                                option 01
                                            </option>
                                            <option value="2">
                                                option 02
                                            </option>
                                            <option value="3">
                                                option 03
                                            </option>
                                            <option value="4">
                                                option 04
                                            </option>
                                            <option value="5">
                                                option 05
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="Search" />
                                </div>
                                <div class="search-btn">
                                    <button>
                                        <i class="fas fa-search"></i>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="fas fa-phone"></i>

                                <h3>
                                    Hotline:
                                    <span>(+100) 123 456 7890</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items">2</span>
                                    </a>

                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>2 Items</span>
                                            <a href="cart.html">View Cart</a>
                                        </div>
                                        <ul class="shopping-list">
                                            <li>
                                                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="product-details.html"><img
                                                            src="images/item1.jpg" alt="#" /></a>
                                                </div>
                                                <div class="content">
                                                    <h4>
                                                        <a href="product-details.html">
                                                            Apple Watch
                                                            Series 6</a>
                                                    </h4>
                                                    <p class="quantity">
                                                        1x -
                                                        <span class="amount">$99.00</span>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="product-details.html"><img
                                                            src="images/item2.jpg" alt="#" /></a>
                                                </div>
                                                <div class="content">
                                                    <h4>
                                                        <a href="product-details.html">Wi-Fi Smart
                                                            Camera</a>
                                                    </h4>
                                                    <p class="quantity">
                                                        1x -
                                                        <span class="amount">$35.00</span>
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="bottom">
                                            <div class="total">
                                                <span>Total</span>
                                                <span class="total-amount">$134.00</span>
                                            </div>
                                            <div class="button">
                                                <a href="checkout.html" class="btn animate">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="fas fa-bars"></i>
All
                                Categories</span>
                            <ul class="sub-category">
                                <li>
                                    <a href="product-grids.html">Electronics
                                        <i class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        <li>
                                            <a href="product-grids.html">Digital Cameras</a>
                                        </li> 
                                    </ul>
                                </li>
                                <li>
                                    <a href="product-grids.html">accessories</a>
                                </li>
                            </ul>
                        </div>

                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="index.html" class="active" aria-label="Toggle navigation">Home</a>
                                    </li> 
                                    <li class="nav-item">
                                        <a href="{{route('main.product_grids')}}" aria-label="Toggle navigation">Products</a>
                                    </li> 
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="nav-social">
                        <h5 class="title">Follow Us:</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="fab fa-facebook-square"></i>
</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="fab fa-twitter"></i>
</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="fab fa-instagram"></i>
</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="fab fa-whatsapp"></i>
</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <div class="hero-slider">
                            <div class="single-slider" style="
                                        background-image: url(images/slider-bg1.jpg);
                                    ">
                                <div class="content">
                                    <h2>
                                        <span>No restocking fee ($35
                                            savings)</span>
                                        M75 Sport Watch
                                    </h2>
                                    <p>
                                        Lorem ipsum dolor sit amet,
                                        consectetur elit, sed do eiusmod
                                        tempor incididunt ut labore dolore
                                        magna aliqua.
                                    </p>
                                    <h3><span>Now Only</span> $320.99</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="single-slider" style="
                                        background-image: url(images/slider-bg2.jpg);
                                    ">
                                <div class="content">
                                    <h2>
                                        <span>Big Sale Offer</span>
                                        Get the Best Deal on CCTV Camera
                                    </h2>
                                    <p>
                                        Lorem ipsum dolor sit amet,
                                        consectetur elit, sed do eiusmod
                                        tempor incididunt ut labore dolore
                                        magna aliqua.
                                    </p>
                                    <h3>
                                        <span>Combo Only:</span> $590.00
                                    </h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <div class="hero-small-banner" style="
                                        background-image: url(&#x27;images/slider-bnr.jpg&#x27;);
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
                                        <a class="btn" href="product-grids.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-categories section">
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
    </section>

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
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="images/product-1.jpg" alt="#" />
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Watches</span>
                            <h4 class="title">
                                <a href="product-grids.html">Xiaomi Mi Band 5</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$199.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="images/product-2.jpg" alt="#" />
                            <span class="sale-tag">-25%</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Speaker</span>
                            <h4 class="title">
                                <a href="product-grids.html">Big Power Sound Speaker</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$275.00</span>
                                <span class="discount-price">$300.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="images/product-3.jpg" alt="#" />
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Camera</span>
                            <h4 class="title">
                                <a href="product-grids.html">WiFi Security Camera</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$399.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="images/product-4.jpg" alt="#" />
                            <span class="new-tag">New</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Phones</span>
                            <h4 class="title">
                                <a href="product-grids.html">iphone 6x plus</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$400.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="images/product-5.jpg" alt="#" />
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Headphones</span>
                            <h4 class="title">
                                <a href="product-grids.html">Wireless Headphones</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$350.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="images/product-6.jpg" alt="#" />
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Speaker</span>
                            <h4 class="title">
                                <a href="product-grids.html">Mini Bluetooth Speaker</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$70.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="images/product-7.jpg" alt="#" />
                            <span class="sale-tag">-50%</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Headphones</span>
                            <h4 class="title">
                                <a href="product-grids.html">PX7 Wireless Headphones</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$100.00</span>
                                <span class="discount-price">$200.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="images/product-8.jpg" alt="#" />
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Laptop</span>
                            <h4 class="title">
                                <a href="product-grids.html">Apple MacBook Air</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$899.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner" style="
                                background-image: url(&#x27;images/banner-1-bg.jpg&#x27;);
                            ">
                        <div class="content">
                            <h2>Smart Watch 2.0</h2>
                            <p>
                                Space Gray Aluminum Case with
                                <br />Black/Volt Real Sport Band
                            </p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin" style="
                                background-image: url(&#x27;images/banner-2-bg.jpg&#x27;);
                            ">
                        <div class="content">
                            <h2>Smart Headphone</h2>
                            <p>
                                Lorem ipsum dolor sit amet, <br />eiusmod
                                tempor incididunt ut labore.
                            </p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="special-offer section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Special Offer</h2>
                        <p>
                            There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered
                            alteration in some form.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="images/product-3.jpg" alt="#" />
                                    <div class="button">
                                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                            Add to Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">Camera</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">WiFi Security Camera</a>
                                    </h4>
                                    <ul class="review">
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li><span>5.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>$399.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="images/product-8.jpg" alt="#" />
                                    <div class="button">
                                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                            Add to Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">Laptop</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">Apple MacBook Air</a>
                                    </h4>
                                    <ul class="review">
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li><span>5.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>$899.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="images/product-6.jpg" alt="#" />
                                    <div class="button">
                                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                            Add to Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">Speaker</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">Bluetooth Speaker</a>
                                    </h4>
                                    <ul class="review">
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star-filled"></i>
                                        </li>
                                        <li>
                                            <i class="lni lni-star"></i>
                                        </li>
                                        <li><span>4.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>$70.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-banner right" style="
                                background-image: url(&#x27;images/banner-3-bg.jpg&#x27;);
                                margin-top: 30px;
                            ">
                        <div class="content">
                            <h2>Samsung Notebook 9</h2>
                            <p>
                                Lorem ipsum dolor sit amet, <br />eiusmod
                                tempor incididunt ut labore.
                            </p>
                            <div class="price">
                                <span>$590.00</span>
                            </div>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="offer-content">
                        <div class="image">
                            <img src="images/offer-image.jpg" alt="#" />
                            <span class="sale-tag">-50%</span>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="product-grids.html">Bluetooth Headphone</a>
                            </h2>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$200.00</span>
                                <span class="discount-price">$400.00</span>
                            </div>
                            <p>
                                Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry incididunt
                                ut eiusmod tempor labores.
                            </p>
                        </div>
                        <div class="box-head">
                            <div class="box">
                                <h1 id="days">000</h1>
                                <h2 id="daystxt">Days</h2>
                            </div>
                            <div class="box">
                                <h1 id="hours">00</h1>
                                <h2 id="hourstxt">Hours</h2>
                            </div>
                            <div class="box">
                                <h1 id="minutes">00</h1>
                                <h2 id="minutestxt">Minutes</h2>
                            </div>
                            <div class="box">
                                <h1 id="seconds">00</h1>
                                <h2 id="secondstxt">Secondes</h2>
                            </div>
                        </div>
                        <div style="background: rgb(204, 24, 24)" class="alert">
                            <h1 style="padding: 50px 80px; color: white">
                                We are sorry, Event ended !
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-product-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">Best Sellers</h4>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="images/01.jpg" alt="#" /></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">GoPro Hero4 Silver</a>
                            </h3>
                            <span>$287.99</span>
                        </div>
                    </div>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="images/02_1.jpg" alt="#" /></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Puro Sound Labs BT2200</a>
                            </h3>
                            <span>$95.00</span>
                        </div>
                    </div>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="images/03_1.jpg" alt="#" /></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">HP OfficeJet Pro 8710</a>
                            </h3>
                            <span>$120.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">New Arrivals</h4>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="images/04.jpg" alt="#" /></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">iPhone X 256 GB Space Gray</a>
                            </h3>
                            <span>$1150.00</span>
                        </div>
                    </div>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="images/05_1.jpg" alt="#" /></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Canon EOS M50 Mirrorless Camera</a>
                            </h3>
                            <span>$950.00</span>
                        </div>
                    </div>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="images/06.jpg" alt="#" /></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Microsoft Xbox One S</a>
                            </h3>
                            <span>$298.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <h4 class="list-title">Top Rated</h4>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="images/07.jpg" alt="#" /></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Samsung Gear 360 VR Camera</a>
                            </h3>
                            <span>$68.00</span>
                        </div>
                    </div>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="images/08.jpg" alt="#" /></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Samsung Galaxy S9+ 64 GB</a>
                            </h3>
                            <span>$840.00</span>
                        </div>
                    </div>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="images/09.jpg" alt="#" /></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Zeus Bluetooth Headphones</a>
                            </h3>
                            <span>$28.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        <img src="images/01.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/02.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/03.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/04.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/05.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/06.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/03.png" alt="#" />
                    </div>
                    <div class="brand-logo">
                        <img src="images/04.png" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest News</h2>
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
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="images/blog-1.jpg" alt="#" />
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">eCommerce</a>
                            <h4>
                                <a href="blog-single-sidebar.html">What information is needed for
                                    shipping?</a>
                            </h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt.
                            </p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="images/blog-2.jpg" alt="#" />
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Gaming</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Interesting fact about gaming
                                    consoles</a>
                            </h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt.
                            </p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="images/blog-3.jpg" alt="#" />
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Electronic</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Electronics, instrumentation & control
                                    engineering
                                </a>
                            </h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt.
                            </p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shipping-info">
        <div class="container">
            <ul>
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Free Shipping</h5>
                        <span>On order over $99</span>
                    </div>
                </li>

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

                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Easy Return.</h5>
                        <span>Hassle Free Shopping.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="images/logo1.png" alt="#" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title">
                                    Subscribe to our Newsletter
                                    <span>Get all the latest information,
                                        Sales and Offers.</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="Email address here..." type="email" />
                                        <div class="button">
                                            <button class="btn">
                                                Subscribe<span class="dir-part"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
                                <p class="phone">
                                    Phone: +1 (900) 33 169 7720
                                </p>
                                <ul>
                                    <li>
                                        <span>Monday-Friday: </span> 9.00 am
                                        - 8.00 pm
                                    </li>
                                    <li>
                                        <span>Saturday: </span> 10.00 am -
                                        6.00 pm
                                    </li>
                                </ul>
                                <p class="mail">
                                    <a href="/cdn-cgi/l/email-protection#077472777768757347746f687760756e63742964686a"><span
                                            class="__cf_email__"
                                            data-cfemail="5d2e282d2d322f291d2e35322d3a2f34392e733e3230">[email&#160;protected]</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">About Us</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Downloads</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Sitemap</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">FAQs Page</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer f-link">
                                <h3>Shop Departments</h3>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Computers & Accessories</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Smartphones & Tablets</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">TV, Video & Audio</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Cameras, Photo & Video</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Headphones</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img src="images/credit-cards-footer.png" alt="#" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>
                                    Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                        target="_blank">GrayGrids</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="fab fa-facebook-square"></i>
</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="fab fa-twitter"></i>
</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="fab fa-instagram"></i>
</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="fab fa-google"></i>
</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="scroll-top">
        <i class="fas fa-chevron-up"></i>

    </a>

    <script data-cfasync="false" src="js/email-decode.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/glightbox.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.min.js"></script>
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
                0: { items: 1 },
                540: { items: 3 },
                768: { items: 5 },
                992: { items: 6 },
            },
        });
    </script>
    <script>
        const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

        const timer = () => {
            const now = new Date().getTime();
            let diff = finaleDate - now;
            if (diff < 0) {
                document.querySelector(".alert").style.display = "block";
                document.querySelector(".container").style.display = "none";
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor(
                (diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            let minutes = Math.floor(
                (diff % (1000 * 60 * 60)) / (1000 * 60)
            );
            let seconds = Math.floor((diff % (1000 * 60)) / 1000);

            days <= 99 ? (days = `0${days}`) : days;
            days <= 9 ? (days = `00${days}`) : days;
            hours <= 9 ? (hours = `0${hours}`) : hours;
            minutes <= 9 ? (minutes = `0${minutes}`) : minutes;
            seconds <= 9 ? (seconds = `0${seconds}`) : seconds;

            document.querySelector("#days").textContent = days;
            document.querySelector("#hours").textContent = hours;
            document.querySelector("#minutes").textContent = minutes;
            document.querySelector("#seconds").textContent = seconds;
        };
        timer();
        setInterval(timer, 1000);
    </script>
</body>

</html>