
<!-- footer-start -->
<footer>
    <div class="fotter-area d-ddark-bg">
        <div class="footer__top pt-60 pb-10">
            <div class="container custom-conatiner">
                <div class="row">
                    <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-8">
                        <div class="footer__widget">
                            <div class="footer__widget-title mb-20">
                                <h4>Download App</h4>
                            </div>
                            <div class="footer__widget-content">
                                <p class="footer-text mb-25">DukaMarket App is now available on App Store & Google Play. Get it now.</p>
                                <div class="apps-store mb-20">
                                    <a href="#"><img src="{{ asset('assets/user/img/brand/app_ios.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('assets/user/img/brand/app_android.png') }}" alt=""></a>
                                </div>
                                <div class="social-icon social-icon-2">
                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                                    <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer__widget footer-col-2">
                            <div class="footer__widget-title">
                                <h4>My Account</h4>
                            </div>
                            <div class="footer__widget-content">
                                <div class="footer__link footer__link-2">
                                    <ul>
                                        <li><a href="contact.html">Product Support</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">Terms &amp; Conditions &amp;</a></li>
                                        <li><a href="faq.html">Redeem Voucher</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer__widget footer-col-2">
                            <div class="footer__widget-title">
                                <h4>Customer Care</h4>
                            </div>
                            <div class="footer__widget-content">
                                <div class="footer__link footer__link-2">
                                    <ul>
                                        <li><a href="faq.html">New Customers</a></li>
                                        <li><a href="faq.html">How to use Account</a></li>
                                        <li><a href="faq.html">Placing an Order</a></li>
                                        <li><a href="faq.html">Payment Methods</a></li>
                                        <li><a href="faq.html">Delivery &amp; Dispatch</a></li>
                                        <li><a href="faq.html">Problems with Order</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer__widget footer-col-2">
                            <div class="footer__widget-title">
                                <h4>Müşteri Servisi</h4>
                            </div>
                            <div class="footer__widget-content">
                                <div class="footer__link footer__link-2">
                                    <ul>
                                        <li><a href="faq.html">Yardım Merkezi</a></li>
                                        <li><a href="contact.html">İletişim</a></li>
                                        <li><a href="faq.html">Kötüye Kullanım Bildir</a></li>
                                        <li><a href="faq.html">İtiraz Gönder</a></li>
                                        <li><a href="faq.html">Politikalar ve Tüzük</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6">
                        <div class="footer__widget">
                            <div class="footer__widget-title mb-20">
                                <h4>Bültene Abone Ol</h4>
                            </div>
                            <div class="footer__widget-content">
                                <p class="footer-text mb-25">Duyurulardan haberdar olmak için bültene hemen abone ol. </p>
                                <div class="footer__newsletter-form">
                                    <form action="#">
                                        <input class="ft-newsl b-radius" type="email" placeholder="Enter your email ...">
                                        <button class="ft-newsl-btn" type="submit">subscribe</button>
                                    </form>
                                </div>
                                <p class="provide-text mt-20">Email adresinizi vererek <br> <a href="#">Gizlilik Politikamızı</a> ve <a href="#">Hizmet Şartlarımızı</a> kabul etmiş olursunuz.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom-2">
            <div class="container custom-conatiner">
                <div class="footer__bottom-content footer__bottom-content-2 pt-50 pb-50">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer__links footer__links-d text-center mb-25">
                                <p>
                                    @foreach($_footerPages as $_footerPage)
                                        <a href="{{ route('front.page.index', ['slug' => $_footerPage->slug]) }}">{{ $_footerPage->title }}</a>
                                    @endforeach
                                </p>
                            </div>
                            <div class="payment-image text-center mb-25">
                                <a href="#"><img src="assets/user/img/payment/payment.png" alt=""></a>
                            </div>
                            <div class="copy-right-area copy-right-area-2 text-center">
                                <p>Copyright © <span>DukaMarket.</span> All Rights Reserved. Powered by <a href="#"><span class="main-color">Theme_Pure.</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-end -->

<!-- JS here -->
<script src="{{ asset('assets/user/js/vendor/jquery.js') }}"></script>
<script src="{{ asset('assets/user/js/vendor/waypoints.js') }}"></script>
<script src="{{ asset('assets/user/js/bootstrap-bundle.js') }}"></script>
<script src="{{ asset('assets/user/js/meanmenu.js') }}"></script>
<script src="{{ asset('assets/user/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('assets/user/js/tweenmax.js') }}"></script>
<script src="{{ asset('assets/user/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/user/js/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/user/js/parallax.js') }}"></script>
<script src="{{ asset('assets/user/js/backtotop.js') }}"></script>
<script src="{{ asset('assets/user/js/nice-select.js') }}"></script>
<script src="{{ asset('assets/user/js/countdown.min.js') }}"></script>
<script src="{{ asset('assets/user/js/counterup.js') }}"></script>
<script src="{{ asset('assets/user/js/wow.js') }}"></script>
<script src="{{ asset('assets/user/js/isotope-pkgd.js') }}"></script>
<script src="{{ asset('assets/user/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('assets/user/js/ajax-form.js') }}"></script>
<script src="{{ asset('assets/user/js/main.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@yield('scripts')
</body>
</html>
