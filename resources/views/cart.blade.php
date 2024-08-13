@extends('layouts.cart')


@section('title', 'TechDepot - Cart')

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
						<h1 class="page-title">Cart</h1>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<ul class="breadcrumb-nav">
						<li>
							<a href="{{ route('main.index') }}"><i class="lni lni-home"></i> Home</a>
						</li>
						<li><a href="{{ route('main.product_grids') }}">Shop</a></li>
						<li>Cart</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('shopping-cart')
	<div class="shopping-cart section">
		<div class="container">
			<div class="cart-list-head cart_details">
				<!-- ========================== -->
				<!-- CART LIST TITLE -->
				<!-- ========================== -->
				<!-- <div class="cart-list-title">
					<div class="row">
					<div class="col-lg-1 col-md-1 col-12">
						<p>Check Tag</p>
					</div>
					<div class="col-lg-1 col-md-1 col-12">
					</div>
					<div class="col-lg-4 col-md-3 col-12">
						<p>Product Name</p>
					</div>
					<div class="col-lg-2 col-md-2 col-12">
						<p>Quantity</p>
					</div>
					<div class="col-lg-2 col-md-2 col-12">
						<p>Subtotal</p>
					</div>
					<div class="col-lg-1 col-md-2 col-12">
						<p>Discount</p>
					</div>
					<div class="col-lg-1 col-md-2 col-12">
						<p>Remove</p>
					</div>
					</div>
					</div>

					<div class="cart-single-list">
					<div class="row align-items-center">
					<div class="col-lg-1 col-md-1 col-12">
						<center>
						<input type="checkbox" class="form-check-input big_check" id="exampleCheck1">
						</center>
					</div>
					<div class="col-lg-1 col-md-1 col-12">
						<a href="product-details.html"
						><img
						src="images/x01.jpg.pagespeed.ic.eLp5IujAcr.jpg"
						alt="#"
						/></a>
					</div>
					<div class="col-lg-4 col-md-3 col-12">
						<h5 class="product-name">
						<a href="product-details.html">
						Canon EOS M50 Mirrorless Camera</a
						>
						</h5>
						<p class="product-des">
						<span><em>Type:</em> Mirrorless</span>
						<span><em>Color:</em> Black</span>
						</p>
					</div>
					<div class="col-lg-2 col-md-2 col-12">
						<div class="count-input">
						<select class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-12">
						<p>$910.00</p>
					</div>
					<div class="col-lg-1 col-md-2 col-12">
						<p>$29.00</p>
					</div>
					<div class="col-lg-1 col-md-2 col-12">
						<a class="remove-item" href="javascript:void(0)"
						><i class="lni lni-close"></i
						></a>
					</div>
					</div>
					</div>

					<div class="cart-single-list">
					<div class="row align-items-center">
					<div class="col-lg-1 col-md-1 col-12">
						<center>
						<input type="checkbox" class="form-check-input big_check" id="exampleCheck1">
						</center>
					</div>
					<div class="col-lg-1 col-md-1 col-12">
						<a href="product-details.html"
						><img
						src="images/x02.jpg.pagespeed.ic.ciMpeAtsld.jpg"
						alt="#"
						/></a>
					</div>
					<div class="col-lg-4 col-md-3 col-12">
						<h5 class="product-name">
						<a href="product-details.html">
						Apple iPhone X 256 GB Space Gray</a
						>
						</h5>
						<p class="product-des">
						<span><em>Memory:</em> 256 GB</span>
						<span><em>Color:</em> Space Gray</span>
						</p>
					</div>
					<div class="col-lg-2 col-md-2 col-12">
						<div class="count-input">
						<select class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-12">
						<p>$1100.00</p>
					</div>
					<div class="col-lg-1 col-md-2 col-12">
						<p>—</p>
					</div>
					<div class="col-lg-1 col-md-2 col-12">
						<a class="remove-item" href="javascript:void(0)"
						><i class="lni lni-close"></i
						>
						</a>
					</div>
					</div>
					</div>

					<div class="cart-single-list">
					<div class="row align-items-center">
					<div class="col-lg-1 col-md-1 col-12">
						<center>
						<input type="checkbox" class="form-check-input big_check" id="exampleCheck1">
						</center>
					</div>
					<div class="col-lg-1 col-md-1 col-12">
						<a href="product-details.html"
						><img
						src="images/x03.jpg.pagespeed.ic.D7-y7DEWw8.jpg"
						alt="#"
						/></a>
					</div>
					<div class="col-lg-4 col-md-3 col-12">
						<h5 class="product-name">
						<a href="product-details.html"
						>HP LaserJet Pro Laser Printer</a
						>
						</h5>
						<p class="product-des">
						<span><em>Type:</em> Laser</span>
						<span><em>Color:</em> White</span>
						</p>
					</div>
					<div class="col-lg-2 col-md-2 col-12">
						<div class="count-input">
						<select class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-12">
						<p>$550.00</p>
					</div>
					<div class="col-lg-1 col-md-2 col-12">
						<p>—</p>
					</div>
					<div class="col-lg-1 col-md-2 col-12">
						<a class="remove-item" href="javascript:void(0)"
						><i class="lni lni-close"></i
						></a>
					</div>
					</div>
					</div> -->

			</div>
			<!-- ========================== -->
			<!-- COUPON -->
			<!-- ========================== -->
			<div class="row">
				<div class="col-12">
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-6 col-12">
								{{-- <div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon" />
											<div class="button">
												<button class="btn">
													Apply Coupon
												</button>
											</div>
										</form>
									</div>
								</div> --}}
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span class="subtotal_">0</span></li>
										<li>Shipping<span class="shipping_">0</span></li>
										<li>You Save<span class="youSave_">0</span></li>
										<li class="last">
											You Pay<span class="youPay_">0</span>
										</li>
									</ul>
									<div class="button">
										<a href="#" class="btn checkout_btn">Checkout</a>
										<a href="{{ route('main.product_grids') }}" class="btn btn-alt">Continue
											shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
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
	<script src="js/carthtml.js"></script>
	<script src="js/cart.js"></script>
	<script src="js/checkuser.js"></script>
	<script src="js/checkCookie.js"></script>
	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function logout() {
			Cookies.remove("name");
			console.log("logout");
			window.location.replace("login.html");
		}
		$(document).ready(function() {
            $(document).on('click', '.cta', function() {
                window.location.href = '/product-grids'; // Redirect to /product-grids
            });
        });
	</script>
@endsection