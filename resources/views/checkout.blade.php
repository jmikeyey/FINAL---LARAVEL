@extends('layouts.checkout')

@section('title', 'TechDepot - Checkout')

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
                    <h1 class="page-title">checkout</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li>
                        <a href="{{ route('main.index') }}"><i class="lni lni-home"></i> Home</a>
                    </li>
                    <li><a href="{{ route('main.product_grids') }}">Products</a></li>
                    <li>checkout</li>
                </ul>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('wrapper')
  <section class="checkout-wrapper section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- ========================== -->
                <!-- PRODUCTS BEING CHECKOUTED -->
                <!-- ========================== -->
                <div class="checkout-steps-form-style-1 prod_check">
                    <div class="top_level">
                        <i class="fa-solid fa-location-dot"></i> <span>Delivery Address</span>

                        <!-- ========================== -->
                        <!-- USER ADDRESS -->
                        <!-- ========================== -->
                    </div>
                </div>
                <!-- ========================== -->
                <!-- PRODUCT INFO -->
                <!-- ========================== -->
                <div class="checkout-steps-form-style-1 prod_check">
                    <div class="products_">
                        <div class="row heading_">
                            <div class="col-md-6 prod_order">
                                Products Ordered
                            </div>
                            <div class="col-md-2">Unit Price</div>
                            <div class="col-md-2">Amount</div>
                            <div class="col-md-2">Item Subtotal</div>
                        </div>
                        <!-- ========================== -->
                        <!-- SINGLE PRODUCT INFO -->
                        <!-- ========================== -->
                        <!-- <div class="row data_ mt-2 border-bottom-light-gray">
            <div class="col-md-6 d-flex">
              <div class="prod_img" style="margin-right: 10px;">
                <img src="img-prod/default.jpg" alt="" width="50" height="50" class="img_style">
              </div>
              <div class="prod_dets">
                <span>Dumbbells Pair Detachable 20/30/40kg Dumbbell Set PVC</span>
              </div>
            </div>
            <div class="col-md-2">₱695</div>
            <div class="col-md-2">1</div>
            <div class="col-md-2">₱695</div>
          </div>
          <div class="row data_ mt-2 border-bottom-light-gray">
            <div class="col-md-6 d-flex">
              <div class="prod_img" style="margin-right: 10px;">
                <img src="img-prod/default.jpg" alt="" width="50" height="50"  class="img_style">
              </div>
              <div class="prod_dets">
                <span>Dumbbells Pair Detachable 20/30/40kg Dumbbell Set PVC</span>
              </div>
            </div>
            <div class="col-md-2">₱695</div>
            <div class="col-md-2">1</div>
            <div class="col-md-2">₱695</div>
          </div>               -->
                    </div>
                </div>
            </div>
            <!-- ========================== -->
            <!-- PAYMENT METHOD -->
            <!-- ========================== -->
            <div class="col-lg-4">
                <div class="checkout-sidebar">
                    <div class="checkout-sidebar-coupon">
                        <p>Payment Method</p>
                        <div class="radio-content d-flex">
                            <div class="radio-container">
                                <input type="radio" id="cashOnDelivery" name="paymentMethod" value="COD">
                                <label for="cashOnDelivery">
                                    <span class="radio-button">COD</span>
                                </label>
                            </div>

                            <div class="radio-container">
                                <input type="radio" id="gcash" name="paymentMethod" value="GCASH">
                                <label for="gcash">
                                    <span class="radio-button ">Gcash</span>
                                </label>
                            </div>
                        </div>
                        <div class="gcash-number">
                            <div class="number">
                                <span>Gcash Number: +639386837879</span><span
                                    class="d-none gcash_">09386834879</span>
                                <i class="fas fa-copy copy-icon fa-lg" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Copy number"></i>
                            </div>
                            <div class="mid-number">
                                <span class="leftline"></span> or <span class="rightline"></span>
                            </div>
                            <div class="img-number">
                                <img src="img-prod/gcash_number.png" alt="gcash number">
                            </div>

                        </div>
                        <br>
                        <span class="error_cop payment_method d-none">Please select payment method</span>
                    </div>
                </div>
                <div class="checkout-sidebar mt-10">
                    <div class="checkout-sidebar-coupon">
                        <p>Appy Coupon to get discount!</p>
                        <div class="single-form form-default">
                            <div class="form-input form">
                                <input type="text" placeholder="Coupon Code" id="coup_" />
                            </div>
                            <div class="button">
                                <button class="btn coupon_">apply</button>
                            </div>
                            <span class="error_cop d-none">Invalid coupon</span>
                        </div>
                    </div>
                    <div class="checkout-sidebar-price-table mt-10">
                        <h5 class="title">Pricing Table</h5>
                        <div class="sub-total-price">
                            <div class="total-price">
                                <p class="value">Subotal Price:</p>
                                <p class="subtotal-price">0</p>
                            </div>
                            <div class="total-price shipping">
                                <p class="value">Shipping Cost (+):</p>
                                <p class="shipping_">0</p>
                            </div>
                            <div class="total-price discount">
                                <p class="value">Discount</p>
                                <p class="discount_">0</p>
                            </div>
                        </div>
                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Total Price:</p>
                                <p class="total_price">0</p>
                            </div>
                        </div>
                        <div class="price-table-btn button">
                            <button class="btn btn-alt checkout_" type="submit">CHECK OUT</button>
                        </div>
                    </div>
                    <div class="checkout-sidebar-banner mt-30">
                        <a href="{{ route('main.product_grids') }}">
                            <img src="images/banner.jpg" alt="#" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

@section('modal')
  <!-- ========================== -->
  <!-- Modal -->
  <!-- ========================== -->
  <div class="modal_content">
      <div class="modal-overlay">
          <div class="modal-content">
              <h5>My Address</h3>
                  <hr>

                  <div class="address_content">

                      <!-- <div class="single_address">
                <div class="radio_">
                  <input type="radio" name="address" class="address_radio">
                </div>
                <div class="info_add">
                  <span class="name"><b> John Micky Butnande | (+63) 9386834879</b></span>
                  
                  <div class="address_desc">
                    <span class="info_">Region X | Misamis Occidental | Ozamiz City | Labo</span>
                    <span class="desc">
                      Purok 3 Labo, Doot sa gate na pula na dako, diha lang sa naay tindahan.
                      Labo, Ozamis City, Misamis Occidental, Mindanao, 7200
                    </span>
                    <hr>
                  </div>
                </div>
              </div> -->

                  </div>

                  <button class="modal-close">&times;</button>
                  <hr>
                  <div class="button_holder">
                      <button class="btn btn-primary edit_btn" type="submit">Save</button>
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
  <script src="js/checkout.js"></script>
  <script src="js/checkuser.js"></script>
  <script src="js/checkCookie.js"></script>
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
  <script src="js/general.js"></script>
  <script>
        $(document).ready(function() {
            $(document).on('click', '.cta', function() {
                window.location.href = '/product-grids'; // Redirect to /product-grids
            });
        });
  </script>
@endsection