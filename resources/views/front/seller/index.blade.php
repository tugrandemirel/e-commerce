@extends('layouts.app')
@section('title', $seller->name.' Mağazası'. ' | '.config('app.name'))
@section('styles')
    <style>
        .star {
            color: rgba(252,190,0,0.4);
        }
        .starSelected {
            color: rgba(252,190,0,1);
        }
    </style>
@endsection
@section('content')

    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="swiper-container slider__active">
            <div class="slider-wrapper swiper-wrapper">
                <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="{{ asset('assets/user/img/slider/01-slide-1.jpg') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="slider-content">
                                    <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="1.5s">
                                        <a  class="st-btn b-radius">{{ $seller->name }}</a>
                                    </div>
                                    <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">
                                        {{ $seller->slogan }}</h2>
                                    <div class="slider-bottom-btn mt-75">
                                        <a data-animation="fadeInUp" data-delay="1.15s" href="#FiveCol-tab" class="st-btn-b b-radius">Alışveriş Yap</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /single-slider -->
                <div class="main-slider-paginations"></div>
            </div>
        </div>
    </div>
    <!-- slider-area-end -->

    <!-- features__area-start -->
    <section class="features__area pt-20">
        <div class="container">
            <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 gx-0">
                <div class="col">
                    <div class="features__item d-flex white-bg">
                        <div class="features__icon mr-20">
                            <i class="fal fa-truck"></i>
                        </div>
                        <div class="features__content">
                            <h6>Ürün Sayısı</h6>
                            <p>{{ productCountCalculation($seller->products->count()) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features__item d-flex white-bg">
                        <div class="features__icon mr-20">
                            <i class="fal fa-calendar-times"></i>
                        </div>
                        <div class="features__content">
                            <h6>{{ config('app.name')."'deki Süresi" }}</h6>
                            <p>
                                {{ yearCalculation($seller->created_at) }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features__item d-flex white-bg">
                        <div class="features__icon mr-20">
                            <i class="fal fa-comments-alt"></i>
                        </div>
                        <div class="features__content">
                            <h6>Satıcıya Sor</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features__item features__item-last d-flex white-bg">
                        <div class="features__icon mr-20">
                            <i class="fad fa-star-shooting"></i>
                        </div>
                        <div class="features__content">
                            <h6>Mağaza Değerlendirmesi</h6>
                            <p>
                            <div class="comment-rating mb-20">
                                @php
                                    $avg = avgCalculation($seller->products);
                                @endphp
                                <span class="mr-5">{{ $avg }}</span>
                                <ul>
                                    <li><a ><i class="fas fa-star star "></i></a></li>
                                    <li><a ><i class="fas fa-star star"></i></a></li>
                                    <li><a ><i class="fas fa-star star"></i></a></li>
                                    <li><a ><i class="fas fa-star star"></i></a></li>
                                    <li><a ><i class="fas fa-star star"></i></a></li>
                                </ul>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features__area-end -->
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
                </div>
                <div class="col-xl-9 col-lg-8">

                    <div class="product-lists-top">
                        <div class="product__filter-wrap">
                            <div class="row align-items-center">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="product__filter d-sm-flex align-items-center">
                                        <div class="product__col">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="FiveCol-tab" data-bs-toggle="tab" data-bs-target="#FiveCol" type="button" role="tab" aria-controls="FiveCol" aria-selected="false">
                                                        <i class="fal fa-list"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__result pl-60">
                                            <p>{{ $seller->products->count() }} arasından 1 - {{ $seller->products->count() > 20 ? '20' : $seller->products->count() }} ürün gösteriliyor</p>
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
                        <div class="tab-pane fade show active" id="FiveCol" role="tabpanel" aria-labelledby="FiveCol-tab">
                            <div class="tp-wrapper-2">
                                @foreach($seller->products as $product)
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
                                                    <span>
                                                        <i class="fa fa-calendar-minus"></i>
                                                        {{ changingDateFormat($product->start_date) }}
                                                    </span>
                                                    <br>
                                                    <span>
                                                        <i class="fa fa-calendar-times"></i>
                                                        {{ changingDateFormat($product->end_date) }}

                                                    </span>
                                                    <h6 >
                                                        Başlangıç Fiyatı - {{ $product->price }}
                                                        <i class="fa fa-coins"></i>
                                                    </h6>
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
                </div>
            </div>
        </div>
    </div>
    <!-- shop-area-end -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            let star = document.querySelectorAll('.star');
            let leng = Math.ceil({{ $avg }});
            for (let i = 0; i < leng; i++)
            {
                star[i].classList.remove('star')
                star[i].classList.add('starSelected')
            }
        })
    </script>
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
