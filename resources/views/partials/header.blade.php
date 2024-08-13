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
                                            ₱ PHP
                                        </option>
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
                            <li><a href="{{ route('main.index') }}"
                                    @if (request()->routeIs('main.index')) class="active-link" @endif>Home</a></li>
                            <li><a href="{{ route('main.about') }}"
                                    @if (request()->routeIs('main.about')) class="active-link" @endif>About Us</a></li>
                            <li><a href="{{ route('main.contact') }}"
                                    @if (request()->routeIs('main.contact')) class="active-link" @endif>Contact Us</a></li>
                            <li><a href="{{ route('main.faq') }}"
                                    @if (request()->routeIs('main.faq')) class="active-link" @endif>FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        <ul class="user-login user_">
                            <!-- user info -->
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
                    <a class="navbar-brand" href="{{ route('main.index') }}">
                        <img src="images/logo.png" alt="Logo" />
                    </a>
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <div class="main-menu-search">
                        <div class="navbar-search search-style-5">
                            <div class="search-input">
                                <input type="text" class="search_value" placeholder="Search" />
                            </div>
                            <div class="search-btn">
                                <button type="submit" class="prod-search">
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
                                <span>(+63) 938 683 4879</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="cart-items">
                                <!-- ========================== -->
                                <!-- CART ITEMS -->
                                <!-- ========================== -->
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
                        <span class="cat-button"><i class="fas fa-bars"></i>All Categories</span>
                        <ul class="sub-category">
                            <!-- ========================== -->
                            <!-- CATEGORIES ITEMS -->
                            <!-- ========================== -->
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
                                    <a href="{{ route('main.index') }}"
                                        @if (request()->routeIs('main.index')) class="active-link-no-border" @endif
                                        aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('main.product_grids') }}"
                                        @if (request()->routeIs('main.product_grids')) class="active-link-no-border" @endif
                                        aria-label="Toggle navigation">Products</a>
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
                            <a href="https://facebook.com"><i class="fab fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com"><i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com"><i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://skype.com"><i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</header>
