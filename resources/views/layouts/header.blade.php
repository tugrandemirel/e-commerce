<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'E-Ticaret')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Tuğran Demirel">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/user/img/favicon.png') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/backtotop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade"><strong>Eski</strong> bir sürüme sahip tarayıcı kullanmaktasınız. Lütfen deneyiminizi ve güvenliğinizi geliştirmek için <a href="https://browsehappy.com/">tarayıcınızı yükseltiniz</a>.</p>
<![endif]-->

<!-- preloader start -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <svg viewBox="0 0 58 58" id="mustard" class="product">
                <g>
                    <path style="fill:#ED7161;" d="M39.869,58H18.131C16.954,58,16,57.046,16,55.869V12.621C16,11.726,16.726,11,17.621,11h22.757
                    C41.274,11,42,11.726,42,12.621v43.248C42,57.046,41.046,58,39.869,58z" />
                    <polygon style="fill:#D13834;" points="35,11 23,11 27.615,0 30.385,0 	" />
                    <rect x="16" y="16" style="fill:#D75A4A;" width="26" height="2" />
                    <rect x="20" y="11" style="fill:#D75A4A;" width="2" height="6" />
                    <rect x="25" y="11" style="fill:#D75A4A;" width="2" height="6" />
                    <rect x="30" y="11" style="fill:#D75A4A;" width="2" height="6" />
                    <rect x="36" y="11" style="fill:#D75A4A;" width="2" height="6" />
                    <circle style="fill:#D13834;" cx="29" cy="36" r="10" />
                </g>
            </svg>
            <svg viewBox="0 0 49.818 49.818" id="meat" class="product">
                <g>
                    <path style="fill:#994530;" d="M0.953,38.891c0,0,3.184,6.921,11.405,9.64c1.827,0.604,3.751,0.751,5.667,0.922
                        c7.866,0.703,26.714-0.971,31.066-18.976c1.367-5.656,0.76-11.612-1.429-17.003C44.51,5.711,37.447-4.233,22.831,2.427
                        c-8.328,3.795-7.696,10.279-5.913,14.787c2.157,5.456-2.243,11.081-8.06,10.316C1.669,26.584-1.825,30.904,0.953,38.891z" />
                    <g>
                        <path style="fill:#D75A4A;" d="M4.69,37.18c0.402,0.785,3.058,5.552,9.111,7.554c1.335,0.441,2.863,0.577,4.482,0.72l0.282,0.025
                            c0.818,0.073,1.698,0.11,2.617,0.11c18.18,0,22.854-11.218,24.02-16.041c1.134-4.693,0.706-9.703-1.235-14.488
                            C41.049,7.874,36.856,4.229,31.506,4.229c-2.21,0-4.683,0.615-7.349,1.83c-2.992,1.364-6.676,3.921-4.13,10.36
                            c1.284,3.25,0.912,6.746-1.023,9.591c-2.17,3.191-6.002,4.901-9.895,4.39c-0.493-0.065-0.966-0.099-1.404-0.099
                            c-1.077,0-2.502,0.198-3.173,1.143C3.765,32.524,3.823,34.609,4.69,37.18z" />
                        <path style="fill:#C64940;" d="M21.184,46.589c-0.948,0-1.858-0.038-2.706-0.114l-0.283-0.025
                            c-1.674-0.147-3.257-0.287-4.706-0.767c-6.376-2.108-9.188-7.073-9.688-8.047l-0.058-0.137c-0.984-2.917-0.993-5.273-0.026-6.635
                            c0.912-1.285,2.89-1.807,5.524-1.456c3.537,0.466,6.959-1.054,8.936-3.961c1.746-2.565,2.082-5.723,0.921-8.661
                            c-3.189-8.065,2.707-10.754,4.645-11.638c9.68-4.407,16.81-1.155,21.152,9.535c2.021,4.981,2.464,10.202,1.28,15.099
                            C44.953,34.836,40.073,46.589,21.184,46.589z M5.613,36.787c0.401,0.758,2.936,5.155,8.503,6.997
                            c1.229,0.406,2.699,0.536,4.256,0.673l0.284,0.025c0.788,0.07,1.639,0.106,2.527,0.106c17.469,0,21.938-10.683,23.048-15.276
                            c1.084-4.487,0.672-9.286-1.19-13.877C40.29,8.663,36.409,5.229,31.506,5.229c-2.067,0-4.4,0.585-6.934,1.74
                            c-3.02,1.376-5.81,3.532-3.615,9.083c1.408,3.563,0.998,7.398-1.126,10.521c-2.404,3.534-6.563,5.386-10.852,4.818
                            c-1.793-0.236-3.197,0.019-3.632,0.632C4.912,32.636,4.756,34.207,5.613,36.787z" />
                    </g>
                    <g>
                        <circle style="fill:#E6E6E6;" cx="32.455" cy="12.779" r="4" />
                        <path style="fill:#7A3726;" d="M32.455,17.779c-2.757,0-5-2.243-5-5s2.243-5,5-5s5,2.243,5,5S35.212,17.779,32.455,17.779z
                            M32.455,9.779c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S34.109,9.779,32.455,9.779z" />
                    </g>
                    <path style="fill:#C64940;" d="M25.617,45.684l-1.941-0.479c0.435-1.761-1.063-3.216-3.446-4.859
                        c-2.875-1.984-4.817-5.117-5.327-8.595c-0.186-1.266-0.425-2.285-0.428-2.295l1.922-0.548c0.01,0.028,1.09,3.104,3.978,4.314
                        c2.094,0.877,4.667,0.598,7.648-0.832c11.578-5.554,17.102-2.646,17.332-2.52l-0.967,1.752c-0.04-0.021-4.97-2.48-15.5,2.57
                        c-3.53,1.694-6.662,1.984-9.312,0.863c-0.801-0.339-1.49-0.779-2.078-1.265c0.769,1.974,2.11,3.695,3.867,4.907
                        C23.149,39.931,26.472,42.222,25.617,45.684z" />
                    <path style="fill:#C64940;" d="M27.074,27.586c-5.37,0-7.605-3.694-7.633-3.74l1.727-1.01l-0.863,0.505l0.859-0.511
                        c0.108,0.179,2.714,4.335,9.738,2.105c1.54-0.794,12.038-6.002,15.619-2.289l-1.439,1.389c-1.979-2.052-9.229,0.576-13.332,2.714
                        l-0.154,0.064C29.892,27.364,28.389,27.586,27.074,27.586z" />
                </g>
            </svg>
            <svg viewBox="0 0 49 49" id="soda" class="product">
                <g>
                    <path style="fill:#E22F37;" d="M9.5,27V5.918c0-1.362,0.829-2.587,2.094-3.093l0,0C12.642,2.406,13.5,1.14,13.5,0.011L13.5,0v0
                        l11,0l11,0v0v0.011c0,1.129,0.858,2.395,1.906,2.814l0,0c1.265,0.506,2.094,1.73,2.094,3.093V27v-5v21.082
                        c0,1.362-0.829,2.587-2.094,3.093h0c-1.048,0.419-1.906,1.686-1.906,2.814V49l0,0h-11h-11l0,0l0-0.011
                        c0-1.129-0.858-2.395-1.906-2.814h0c-1.265-0.506-2.094-1.73-2.094-3.093V22" />
                    <path style="fill:#F75B57;" d="M18.5,7h-5c-0.553,0-1-0.447-1-1s0.447-1,1-1h5c0.553,0,1,0.447,1,1S19.053,7,18.5,7z" />
                    <path style="fill:#F75B57;" d="M35.5,7h-13c-0.553,0-1-0.447-1-1s0.447-1,1-1h13c0.553,0,1,0.447,1,1S36.053,7,35.5,7z" />
                    <path style="fill:#994530;" d="M18.5,45h-5c-0.553,0-1-0.447-1-1s0.447-1,1-1h5c0.553,0,1,0.447,1,1S19.053,45,18.5,45z" />
                    <path style="fill:#994530;" d="M35.5,45h-13c-0.553,0-1-0.447-1-1s0.447-1,1-1h13c0.553,0,1,0.447,1,1S36.053,45,35.5,45z" />
                    <polygon style="fill:#E6E6E6;" points="39.5,32 9.5,42 9.5,20 39.5,10 	" />
                    <polygon style="fill:#F9D70B;" points="39.5,28 9.5,38 9.5,24 39.5,14 	" />
                </g>
            </svg>
            <div class="cart-container">
                <svg viewBox="0 0 512 512" id="cart">
                    <circle cx="376.8" cy="440" r="55" />
                    <circle cx="192" cy="440" r="55" />
                    <polygon points="128,0 0.8,0 0.8,32 104.8,32 136.8,124.8 170.4,124.8 " />
                    <polygon style="fill:#ED7161;" points="250.4,49.6 224,124.8 411.2,124.8 " />
                    <polygon style="fill:#ee5a46;" points="411.2,124.8 224,124.8 170.4,124.8 136.8,124.8 68,124.8 141.6,361.6 427.2,361.6
                    511.2,124.8 " />
                    <g>
                        <rect x="166.4" y="185.6" style="fill:#FFFFFF;" width="255.2" height="16" />
                        <rect x="166.4" y="237.6" style="fill:#FFFFFF;" width="166.4" height="16" />
                    </g>
                </svg>
            </div>
        </div>
    </div>
</div>
<!--  preloader end -->

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- back to top end -->
<!-- header-start -->
<header class="header d-blue-bg">
    <div class="header-top">
        <div class="container custom-conatiner">
            <div class="header-inner">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-7">
                        <div class="header-inner-start">
                            <!--
                            <div class="header__currency border-right">
                                <div class="s-name">
                                    <span>Language: </span>
                                </div>
                                <select>
                                    <option>English</option>
                                    <option>Deutsch</option>
                                    <option>Français</option>
                                    <option>Espanol</option>
                                </select>
                            </div>
                            <div class="header__lang border-right">
                                <div class="s-name">
                                    <span>Currency: </span>
                                </div>
                                <select>
                                    <option> USD</option>
                                    <option>EUR</option>
                                    <option>INR</option>
                                    <option>BDT</option>
                                    <option>BGD</option>
                                </select>
                            </div>
                            -->
                            <div class="support d-none d-sm-block">
                                <p>Yardıma mı İhtiyacınız var? <a href="tel:+001123456789">+001 123 456 789</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                        <div class="header-inner-end text-md-end">
                            <div class="ovic-menu-wrapper ovic-menu-wrapper-2">
                                <ul>
                                    <li><a href="about.html">Hakkımızda</a></li>
                                    <li><a href="contact.html">Order Tracking</a></li>
                                    <li><a href="contact.html">İletişim</a></li>
                                    <li><a href="faq.html">SSS</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mid">
        <div class="container custom-conatiner">
            <div class="heade-mid-inner">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                        <div class="header__info">
                            <div class="logo">
                                <a href="{{ route('index') }}" class="logo-image"><img src="{{ asset('assets/user/img/logo/logo1.svg') }}" alt="logo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                        <div class="header__search">
                            <form action="#">
                                <div class="header__search-box">
                                    <input class="search-input search-input-2" type="text" placeholder="Sizin için ne arayabilirim?">
                                    <button class="button button-2" type="submit"><i class="far fa-search"></i></button>
                                </div>
                                <div class="header__search-cat">
                                    <select>
                                        <option value="butun-categoriler">Bütün Kategoriler</option>
                                        @foreach($_categories as $category)
                                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8">
                        <div class="header-action">
                            <div class="block-userlink">
                                <a class="icon-link icon-link-2" href="my-account.html">
                                    <i class="flaticon-user"></i>
                                    <span class="text">
                                    <span class="sub">Giriş Yap </span>
                                    My Account </span>
                                </a>
                            </div>
                            <!--
                            <div class="block-wishlist action">
                                <a class="icon-link icon-link-2" href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                    <span class="count count-2">0</span>
                                    <span class="text">
                                    <span class="sub">Favorite</span>
                                    My Wishlist </span>
                                </a>
                            </div>
                            <div class="block-cart action">
                                <a class="icon-link icon-link-2" href="cart.html">
                                    <i class="flaticon-shopping-bag"></i>
                                    <span class="count count-2">1</span>
                                    <span class="text">
                                    <span class="sub">Your Cart:</span>
                                    $00.00 </span>
                                </a>
                                <div class="cart">
                                    <div class="cart__mini">
                                        <ul>
                                            <li>
                                                <div class="cart__title">
                                                    <h4>Your Cart</h4>
                                                    <span>(1 Item in Cart)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart__item d-flex justify-content-between align-items-center">
                                                    <div class="cart__inner d-flex">
                                                        <div class="cart__thumb">
                                                            <a href="product-details.html">
                                                                <img src="assets/user/img/cart/20.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="cart__details">
                                                            <h6><a href="product-details.html"> Samsung C49J89: £875, Debenhams Plus  </a></h6>
                                                            <div class="cart__price">
                                                                <span>$255.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cart__del">
                                                        <a href="#"><i class="fal fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart__sub d-flex justify-content-between align-items-center">
                                                    <h6>Subtotal</h6>
                                                    <span class="cart__sub-total">$255.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="cart.html" class="wc-cart mb-10">View cart</a>
                                                <a href="checkout.html" class="wc-checkout">Checkout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.navbar')
</header>
<!-- header-end -->
