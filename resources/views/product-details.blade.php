@extends('layouts.product-details')

@section('title', 'TechDepot - Product Details')
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
                    <h1 class="page-title">Product Details</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li>
                        <a href="{{ route('main.index') }}"><i class="lni lni-home"></i> Home</a>
                    </li>
                    <li><a href="#" onclick="history.back()">Products</a></li>
                    <li>Product Details</li>
                </ul>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('item-section')
  <section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <!-- <img src="images/x01.jpg.pagespeed.ic.XjDYxdFHtv.jpg" id="current" alt="#" /> -->
                            </div>
                            <div class="images">

                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title product_name"></h2>
                        <p class="category">
                            <i class="lni lni-tag"></i> <span class="prod_category"></span>
                        </p>
                        <div class="price_info">
                            <!-- <h3 class="price">$850<span style="text-decoration: line-through;">123</span></h3> -->
                        </div>
                        <!-- <p class="info-text">
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p> -->
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group quantity">
                                    <label for="color">Quantity</label>
                                    <select class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="row align-items-end">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="button cart-button">
                                        <button class="btn btn_test" data-prod="" style="width: 100%">
                                            <i class="lni lni-cart"></i>
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="wish-button">
                                        <button class="btn buyNow" style="font-weight: bolder;">
                                            Buy Now
                                        </button>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-4 col-md-4 col-12">
                                    <div class="wish-button">
                                        <button class="btn">
                                            <i class="lni lni-heart"></i>
                                            To Wishlist
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-details-info">
            <div class="single-block">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="info-body info_details custom-responsive-margin">
                            <!-- details body -->
                        </div>
                    </div>
                    <!-- SPECS -->
                    <div class="col-lg-6 col-12">
                        <div class="info-body">
                            <h4 style="font-size: 1.5rem;">Specifications</h4>
                            <ul class="normal-list">
                                <!-- specifications list -->
                                <!-- <li>
                <span>Weight:</span> 35.5oz (1006g)
              </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-lg-4 col-12">
        <div class="single-block give-review">
          <h4>4.5 (Overall)</h4>
          <ul>
            <li>
              <span>5 stars - 38</span>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
            </li>
            <li>
              <span>4 stars - 10</span>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star"></i>
            </li>
            <li>
              <span>3 stars - 3</span>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star"></i>
              <i class="lni lni-star"></i>
            </li>
            <li>
              <span>2 stars - 1</span>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star"></i>
              <i class="lni lni-star"></i>
              <i class="lni lni-star"></i>
            </li>
            <li>
              <span>1 star - 0</span>
              <i class="lni lni-star-filled"></i>
              <i class="lni lni-star"></i>
              <i class="lni lni-star"></i>
              <i class="lni lni-star"></i>
              <i class="lni lni-star"></i>
            </li>
          </ul>

          <button type="button" class="btn review-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Leave a Review
          </button>
        </div>
      </div>
      <div class="col-lg-8 col-12">
        <div class="single-block">
          <div class="reviews">
            <h4 class="title">Latest Reviews</h4>

            <div class="single-review">
              <img src="images/comment1.jpg" alt="#" />
              <div class="review-info">
                <h4>
                  Awesome quality for the price
                  <span>Jacob Hammond </span>
                </h4>
                <ul class="stars">
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
                </ul>
                <p>
                  Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit, sed
                  do eiusmod tempor...
                </p>
              </div>
            </div>

            <div class="single-review">
              <img src="images/xcomment2.jpg.pagespeed.ic.P3c5pVzEa7.jpg" alt="#" />
              <div class="review-info">
                <h4>
                  My husband love his new...
                  <span>Alex Jaza </span>
                </h4>
                <ul class="stars">
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
                </ul>
                <p>
                  Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit, sed
                  do eiusmod tempor...
                </p>
              </div>
            </div>

            <div class="single-review">
              <img src="images/comment3.jpg" alt="#" />
              <div class="review-info">
                <h4>
                  I love the built quality...
                  <span>Jacob Hammond </span>
                </h4>
                <ul class="stars">
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
                </ul>
                <p>
                  Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit, sed
                  do eiusmod tempor...
                </p>
              </div>
            </div>
          </div>
        </div>
      </div> -->

                <div class="col-lg-4 col-12">
                    related products should be here
                </div>

            </div>
        </div>
    </div>
  </section>
@endsection

@section('modal')
  <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Leave a Review
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-name">Your Name</label>
                            <input class="form-control" type="text" id="review-name" required />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-email">Your Email</label>
                            <input class="form-control" type="email" id="review-email" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-subject">Subject</label>
                            <input class="form-control" type="text" id="review-subject" required />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-rating">Rating</label>
                            <select class="form-control" id="review-rating">
                                <option>5 Stars</option>
                                <option>4 Stars</option>
                                <option>3 Stars</option>
                                <option>2 Stars</option>
                                <option>1 Star</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="review-message">Review</label>
                    <textarea class="form-control" id="review-message" rows="8" required></textarea>
                </div>
            </div>
            <div class="modal-footer button">
                <button type="button" class="btn">Submit Review</button>
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
  <!-- <script type="text/javascript">
    const current = document.getElementById("current");
    const opacity = 0.6;
    const imgs = document.querySelectorAll(".img");
    imgs.forEach((img) => {
        img.addEventListener("click", (e) => {
            imgs.forEach((img) => {
                img.style.opacity = 1;
            });
            current.src = e.target.src;
            e.target.style.opacity = opacity;
        });
    });
  </script> -->

  <script src="js/prod_details.js"></script>
  <script src="js/checkuser.js"></script>
  <script src="js/general.js"></script>
  <script src="js/cartDetails.js"></script>
  <script src="js/checkCookie.js"></script>
  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
        $(document).ready(function() {
            $(document).on('click', '.cta', function() {
                window.location.href = '/product-grids'; // Redirect to /product-grids
            });
        });
  </script>
@endsection