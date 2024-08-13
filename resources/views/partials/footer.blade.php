<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="footer-logo">
                            <a href="{{ route('main.index') }}">
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
                                <form class="newsletter-form">
                                    <input name="EMAIL" placeholder="Email address here..." type="email" />
                                    <div class="button">
                                        <button class="btn subscribe_" type="submit">Subscribe
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
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-footer f-contact">
                            <h3>Get In Touch With Us</h3>
                            <p class="phone">
                                Phone: +63 (938) 683 4879
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
                                <a a
                                    href="/cdn-cgi/l/email-protection#693e3b3b323f3439372a1b32353b233834362b062b2725">
                                    aw8hurt@gmail.com
                                </a>

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-footer f-link">
                            <h3>Information</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('main.about') }}" 
                                        @if (request()->routeIs('main.about'))
                                            class="active-link-no-border"
                                        @endif
                                    >About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('main.contact') }}"
                                        @if (request()->routeIs('main.contact'))
                                            class="active-link-no-border"
                                        @endif
                                    >Contact Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('main.faq') }}"
                                        @if (request()->routeIs('main.faq'))
                                            class="active-link-no-border"
                                        @endif
                                    >FAQs Page</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-footer f-link">
                            <h3>Shop Departments</h3>
                            <ul>
                                <li>
                                    <a href="product-grids?cat_id=14">RAM</a>
                                </li>
                                <li>
                                    <a href="product-grids?cat_id=13">Motherboard</a>
                                </li>
                                <li>
                                    <a href="product-grids?cat_id=15">Graphic Cards</a>
                                </li>
                                <li>
                                    <a href="product-grids?cat_id=18">Computer Cases</a>
                                </li>
                                <li>
                                    <a href="product-grids?cat_id=17">Power Supplies</a>
                                </li>
                            </ul>
                        </div>
                    </div </div>
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
                                <p>All Rights Reserved @2023
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-instagram"></i>

                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-google"></i>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>