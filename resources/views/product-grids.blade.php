@extends('layouts.product-grids')

@section('title', 'TechDepot - Products')
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
                        <h1 class="page-title">Shop Grid</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>
                            <a href="{{ route('main.index') }}"><i class="lni lni-home"></i> Home</a>
                        </li>
                        <li><a href="javascript:void(0)">Products</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('products-section')
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="product-sidebar">
                        <div class="single-widget search">
                            <h3>Search Product</h3>
                            <form>
                                <input class="searh_form" type="text" id="search_value"
                                    placeholder="Search Here..." />
                                <button type="submit" id="prod-search">
                                    <i class="fas fa-search"></i>

                                </button>
                            </form>
                        </div>
                        <!-- all categories -->
                        <div class="single-widget">
                            <h3><a href="{{ route('main.product_grids') }}">All Categories</a></h3>
                            <ul class="list list_categories">
                                <!-- <li>
                <a href="product-grids.html">Computers & Accessories </a><span>(1138)</span>
                </li>
                <li>
                <a href="product-grids.html">Smartphones & Tablets</a><span>(2356)</span>
                </li> -->
                            </ul>
                        </div>
                        <!-- price range filter -->
                        <div class="single-widget range">
                            <h3>Price Range</h3>
                            <input type="range" class="form-range" name="range" step="1" min="100"
                                max="50000" value="100" id="range_sort" onchange="rangePrimary.value=value" />
                            <div class="range-inner">
                                <label>$</label>
                                <input type="text" id="rangePrimary" placeholder="100" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sort by // product grids // product list-->
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <label for="sorting">Sort by:</label>
                                        <select class="form-control" id="sorting">
                                            <option>Popularity</option>
                                            <option>
                                                Low - High Price
                                            </option>
                                            <option>
                                                High - Low Price
                                            </option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>
                                        <h3 class="total-show-product">
                                            Showing:
                                            <span class="show-product"></span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-grid" type="button" role="tab"
                                                aria-controls="nav-grid" aria-selected="true">
                                                <i class="lni lni-grid-alt"></i>
                                            </button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            <!-- GRID PRODUCTS -->
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="row product_row">
                                    <!-- product contents -->
                                </div>
                                <!-- pagination -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination left">
                                            <ul class="pagination-list">
                                                <li>
                                                    <a href="javascript:void(0)">1</a>
                                                </li>
                                                <li class="active">
                                                    <a href="javascript:void(0)">2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">4</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><i
                                                            class="lni lni-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- LIST TYPE PRODUCT -->
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
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/productAPI.js"></script>
    <script src="js/cart.js"></script>

    <script>
        eval(mod_pagespeed_Zp_OOsHKoc);
    </script>
    <script>
        eval(mod_pagespeed_5TvwT_lz9K);
    </script>
    <script>
        eval(mod_pagespeed_uoja0BW_wo);
    </script>
    <script src="js/general.js"></script>
    <script src="js/checkCookie.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.cta', function() {
                window.location.href = '/product-grids'; // Redirect to /product-grids
            });
        });
    </script>
@endsection