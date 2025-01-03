@extends('layouts.app')
@section('title', 'Ürünler'.' | '.config('app.name'))
@section('description', 'Ürün description')
@section('keywords', 'Ürün, leywords')
@section('content')
        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Anasayfa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Ürünler </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->

        <!-- shop-area-start -->
        <div class="shop-area mb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Kategoriler</h5>
                            <div class="widget-category-list mt-20">
                                <form action="#">
                                    @foreach($_categories as $_category)
                                        <div class="single-widget-category">
                                            <input type="checkbox" id="{{ $_category->slug }}" data-id="{{ $_category->id }}" name= "{{ $_category->slug }}">
                                            <label for="{{ $_category->slug }}"> {{ $_category->name }} <span>({{ $_category->products->count() }})</span></label>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Marka Seç</h5>
                            <div class="widget-category-list mt-20">
                                <form action="#">
                                    @foreach($_brands as $_brand)
                                    <div class="single-widget-category">
                                        <input type="checkbox" id="{{ $_brand->slug }}" class="category" name="{{ $_brand->slug }}">
                                        <label for="{{ $_brand->slug }}">{{ $_brand->name }} <span>({{ $_brand->products->count() }})</span></label>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Açık Artırması Sona Ermek Üzere Olanlar</h5>
                            <div class="product__sm mt-20">
                                <ul>
                                    <li class="product__sm-item d-flex align-items-center">
                                        <div class="product__sm-thumb mr-20">
                                            <a href="product-details.html">
                                                <img src="assets/user/img/product/sm-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product__sm-content">
                                            <h5 class="product__sm-title">
                                                <a href="product-details.html">Classic Leather Backpack Daypack 2022</a>
                                            </h5>
                                            <div class="product__sm-price">
                                                <span class="price">$300.00</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product__sm-item d-flex align-items-center">
                                        <div class="product__sm-thumb mr-20">
                                            <a href="product-details.html">
                                                <img src="assets/user/img/product/sm-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product__sm-content">
                                            <h5 class="product__sm-title">
                                                <a href="product-details.html">Samsung Galaxy A12, 32GB, Black - (Locked)</a>
                                            </h5>
                                            <div class="product__sm-price">
                                                <span class="price">$150.00</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product__sm-item d-flex align-items-center">
                                        <div class="product__sm-thumb mr-20">
                                            <a href="product-details.html">
                                                <img src="assets/user/img/product/sm-3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product__sm-content">
                                            <h5 class="product__sm-title">
                                                <a href="#">Coffee Maker AH240a Full Function</a>
                                            </h5>
                                            <div class="product__sm-price">
                                                <span class="price">$300.00</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product__sm-item d-flex align-items-center">
                                        <div class="product__sm-thumb mr-20">
                                            <a href="product-details.html">
                                                <img src="assets/user/img/product/sm-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product__sm-content">
                                            <h5 class="product__sm-title">
                                                <a href="product-details.html">Imported Wooden Felt Cushion Chair</a>
                                            </h5>
                                            <div class="product__sm-price">
                                                <span class="price">$120.00</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product__sm-item d-flex align-items-center">
                                        <div class="product__sm-thumb mr-20">
                                            <a href="product-details.html">
                                                <img src="assets/user/img/product/sm-5.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product__sm-content">
                                            <h5 class="product__sm-title">
                                                <a href="product-details.html">Sunhouse Decorative Lights - Imported</a>
                                            </h5>
                                            <div class="product__sm-price">
                                                <span class="price">$110.00</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="shop-banner mb-30">
                            <div class="banner-image">
                                <img class="banner-l" src="assets/user/img/banner/sl-banner.jpg" alt="">
                                <img class="banner-sm" src="assets/user/img/banner/sl-banner-sm.png" alt="">
                                <div class="banner-content text-center">
                                    <p class="banner-text mb-30">Hurry Up! <br> Free Shipping All Order Over $99</p>
                                    <a href="shop.html" class="st-btn-d b-radius">Discover now</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-lists-top">
                            <div class="product__filter-wrap">
                                <div class="row align-items-center">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <div class="product__filter d-sm-flex align-items-center">
                                            <div class="product__col">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="FourCol-tab" data-bs-toggle="tab" data-bs-target="#FourCol" type="button" role="tab" aria-controls="FourCol" aria-selected="true">
                                                            <i class="fal fa-th"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="FiveCol-tab" data-bs-toggle="tab" data-bs-target="#FiveCol" type="button" role="tab" aria-controls="FiveCol" aria-selected="false">
                                                            <i class="fal fa-list"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__result pl-60">
                                                <p>{{ $products->count() }} arasından 1 - {{ $products->count() > 20 ? '20' : $products->count() }} ürün gösteriliyor</p>
                                            </div>
                                        </div>
                                    </div>
                                   <!-- <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <div class="product__filter-right d-flex align-items-center justify-content-md-end">
                                            <div class="product__sorting product__show-no">
                                                <select>
                                                    <option>10</option>
                                                    <option>20</option>
                                                    <option>30</option>
                                                    <option>40</option>
                                                </select>
                                            </div>
                                            <div class="product__sorting product__show-position ml-20">
                                                <select>
                                                    <option>Latest</option>
                                                    <option>New</option>
                                                    <option>Up comeing</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="productGridTabContent">
                            <div class="tab-pane fade  show active" id="FourCol" role="tabpanel" aria-labelledby="FourCol-tab">
                                <div class="tp-wrapper">
                                    <div class="row g-0">
                                        @foreach($products as $product)
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <div class="product__item product__item-d">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}">
                                                            @if($product->hasMedia('images'))
                                                            <img src="{{$product->getFirstMedia('images')->getUrl() }}" alt="product">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a class="icon-box icon-box-1">
                                                            <i class="fal fa-heart wishlist" data-id="{{ $product->id }}"></i>
                                                            <i class="fal fa-heart wishlist" data-id="{{ $product->id }}"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                                <div class="product__content-3">
                                                    <h6><a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}">{{ $product->title }}</a></h6>
                                                    <div class="price mb-10">
                                                        <span>Başlangıç Fiyatı: {{ $product->price }}</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart-s text-center">
                                                    <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                        Teklif Ver
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="FiveCol" role="tabpanel" aria-labelledby="FiveCol-tab">
                                <div class="tp-wrapper-2">
                                    @foreach($products as $product)
                                    <div class="single-item-pd">
                                        <div class="row align-items-center">
                                            <div class="col-xl-9">
                                                <div class="single-features-item single-features-item-df b-radius mb-20">
                                                    <div class="row  g-0 align-items-center">
                                                        <div class="col-md-4">
                                                            <div class="features-thum">
                                                                <div class="features-product-image w-img">
                                                                    <a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}">
                                                                        @if($product->hasMedia('images'))
                                                                            <img src="{{$product->getFirstMedia('images')->getUrl() }}" alt="product">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="product__offer">
                                                                    <span class="discount">-15%</span>
                                                                </div>
                                                                <div class="product-action">
                                                                    <a class="icon-box icon-box-1">
                                                                        <i class="fal fa-heart wishlist" data-id="{{ $product->id }}"></i>
                                                                        <i class="fal fa-heart wishlist" data-id="{{ $product->id }}"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="product__content product__content-d">
                                                                <h6><a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}">{{ $product->title }}</a></h6>
                                                                <div class="rating mb-5">
                                                                    <ul class="rating-d">
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    </ul>
                                                                    <span>({{ count($product->reviews) }})</span>
                                                                </div>
                                                                <div class="features-des">
                                                                    <ul>
                                                                        <li><a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}"><i class="fas fa-circle"></i> {{ $product->short_description }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="product-stock mb-15">
                                                    <h5>Availability: <span> 940 in stock</span></h5>
                                                    <h6>Başlangıç Fiyatı - <del> {{ $product->price }}</del></h6>
                                                </div>
                                                <div class="stock-btn ">
                                                    <a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                        Teklif Ver
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tp-pagination text-center">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="basic-pagination pt-30 pb-30">
                                        <nav>
                                            <ul>
                                                <li>
                                                    <a href="shop.html" class="active">1</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html">2</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html">3</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html">5</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html">6</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html">
                                                        <i class="fal fa-angle-double-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-area-end -->
@endsection
@section('scripts')
    @if(\Illuminate\Support\Facades\Auth::check())
        <script>
            $(document).ready(function() {
                let wishlist = document.querySelectorAll('.wishlist');
                console.log(wishlist.length)
                for (let i=0; i< wishlist.length; i++){
                    // mouse üzerine geldiğinde
                    wishlist[i].addEventListener('mouseenter', (e) => {
                        wishlist[i].style.color =  '#fcbe00';
                    });

                    // mouse üzerinden gittiğnde
                    wishlist[i].addEventListener('mouseleave', (e) => {
                        wishlist[i].style.color =  '#666';
                    });

                    // mouse ile üzerine tıklandığında
                    wishlist[i].addEventListener('click', (e) => {
                        alert(true)
                        e.preventDefault()
                        let product_id = parseInt(wishlist[i].getAttribute('data-id'));
                        $.ajax({
                            url: "{{ route('front.wishlist.store') }}",
                            method: "POST",
                            data: {product_id: product_id, "_token": "{{ csrf_token() }}"},
                            success: function (data) {
                                if (data.success) {
                                    toastr.success(data.success);
                                    wishlist.style.color =  '#fcbe00';
                                    document.getElementById('wishlist-count').innerHTML = data.count
                                } else {
                                    toastr.error(data.error);
                                    wishlist.style.color =  '#666';
                                    document.getElementById('wishlist-count').innerHTML = data.count
                                }
                            }
                        })
                    });
                }
            })
        </script>
    @else
        <script>
            $(document).ready(function () {
                $('#wishlist').click(function () {
                    event.preventDefault();
                    toastr.error('İsteklerinize eklemek için giriş yapmalısınız.');
                })
            });
        </script>
    @endif
@endsection
