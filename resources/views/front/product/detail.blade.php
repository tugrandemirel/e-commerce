@extends('layouts.app')
@section('title', $product->title)
@section('description', $product->meta_description)
@section('keywords', $product->meta_keywords)
@section('styles')
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
                                <li class="breadcrumb-item active" aria-current="page">Ürün Detay</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb__area-end -->

    <!-- product-details-start -->
    <div class="product-details">

        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="product__details-nav d-sm-flex align-items-start">
                        <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                            @php
                                $images = $product->getMedia('images');
                            @endphp
                            @foreach($images as  $image)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if($loop->iteration == 1) active @endif" id="{{ $image->uuid }}-tab" data-bs-toggle="tab" data-bs-target="#thumb{{ $image->uuid }}" type="button" role="tab" aria-controls="{{ $image->uuid }}" aria-selected="true">
                                        <img src="{{ $image->getUrl() }}" alt="{{ $product->title }}" width="85" height="85">
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="product__details-thumb">
                            <div class="tab-content" id="productThumbContent">
                                @foreach($images as  $image)
                                <div class="tab-pane fade show active" id="{{ $image->uuid }}" role="tabpanel" aria-labelledby="{{ $image->uuid }}-tab">
                                    <div class="product__details-nav-thumb w-img">
                                        <img src="{{ $image->getUrl() }}" alt=""{{ $product->title }}"">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="product__details-content">
                        <h6>{{ $product->title }}</h6>
                        <!--<div class="pd-rating mb-10">
                            <ul class="rating">
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                            </ul>
                            <span>(01 review)</span>
                            <span><a href="#">Add your review</a></span>
                        </div> -->
                        <div class="price mb-10">
                            <span>{{ $product->price }} <i class="fas fa-coins"></i></span>
                        </div>
                        <div class="features-des mb-20 mt-10">
                            <ul>
                                <li><a href="#"><i class="fas fa-circle"></i> {{ $product->short_description }}</a></li>
                            </ul>
                        </div>
                        <div class="product-stock mb-20">
                            <h5>Teklif Kapanış Tarihi: <span> {{ changingDateFormat($product->end_date) }}</span></h5>
                        </div>
                        <div class="cart-option mb-15">
                            <div class="product-quantity mr-20">
                                <div class="cart-plus-minus "><input type="number" value="{{ $product->price }}"></div>
                            </div>
                            <a href="" id="bidding" class="cart-btn">Teklif Ver</a>
                        </div>
                        <div class="details-meta">
                            <div class="d-meta-left">
                                <div class="dm-item mr-20">
                                    <a href="#"><i class="fal fa-heart"></i>Beğenilenlere Ekle</a>
                                </div>
                            </div>
                            <div class="d-meta-left">
                                <div class="dm-item">
                                    <a href="#"><i class="fal fa-share-alt"></i>Paylaş</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-tag-area mt-15">
                            <div class="product_info">
                                <span class="posted_in">
                                        <span class="title">Kategori:</span>
                                        <a href="#">{{ $product->category->name }}</a>
                                    </span>
                                <span class="tagged_as">
                                        <span class="title">Etiket:</span>
                                        @foreach(explodeTags($product->meta_keywords) as $tag)
                                            <a href="#">{{ $tag }}</a>,
                                        @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details-end -->

    <!-- product-details-des-start -->
    <div class="product-details-des mt-40 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="product__details-des-tab">
                        <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="bidding-tab" data-bs-toggle="tab" data-bs-target="#bidding" type="button" role="tab" aria-controls="bidding" aria-selected="true">Açık Artırma </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Ürün Açıklaması </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Ürün Yorumları </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="prodductDesTaContent">
                <div class="tab-pane fade active show" id="bidding" role="tabpanel" aria-labelledby="bidding-tab">
                    <div class="product__details-des-wrapper">
                        <div class="table-content table-responsive" style="height: 500px; width: 500px;">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="cart-product-name">Kullanıcı Adı</th>
                                    <th class="product-price">Fiyat</th>
                                    <th class="product-subtotal">Tarih</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="product-name"><a href="shop-details.html">Light Jacketasdasds</a></td>
                                    <td class="product-price"><span class="amount">130.09876540 <i class="fas fa-coins"></i></span></td>
                                    <td class="product-subtotal"><span class="amount">130.00-000-*000</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="des" role="tabpanel" aria-labelledby="des-tab">
                    <div class="product__details-des-wrapper">
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="product__details-review">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="review-rate">
                                    <h5>5.00</h5>
                                    <div class="review-star">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                    <span class="review-count">Yorum Sayısı(10)</span>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="review-des-infod">
                                    <h6>" <span>{{ $product->title }}</span> "</h6>
                                    <div class="review-details-des">
                                        <div class="review-details-content">
                                            <div class="str-info">
                                                <div class="review-star mr-15">
                                                    <a href="#"><i class="fas fa-star" style="color: rgba(252,190,0,0.4)"></i></a>
                                                    <a href="#"><i class="fas fa-star" style="color: rgba(252,190,0,0.4)"></i></a>
                                                    <a href="#"><i class="fas fa-star" style="color: rgba(252,190,0,0.4)"></i></a>
                                                    <a href="#"><i class="fas fa-star" style="color: rgba(252,190,0,0.4)"></i></a>
                                                    <a href="#"><i class="fas fa-star" style="color: rgba(252,190,0,0.4)"></i></a>
                                                </div>
                                            </div>
                                            <div class="name-date mb-30">
                                                <h6> admin – <span> {{ monthChangingDateFormat($product->started_date) }}</span></h6>
                                            </div>
                                            <p>A light chair, easy to move around the dining table and about the room. Duis aute irure dolor in reprehenderit in <br> voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(! \Illuminate\Support\Facades\Auth::check())
                            <div class="row">
                            <div class="col-xl-12">
                                <div class="product__details-comment ">
                                    <div class="comment-title mb-20">
                                        <h3>Yorum Yap</h3>
                                    </div>
                                    <div class="comment-rating mb-20">
                                        <span>Puan ver:</span>
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="comment-input-box">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-xxl-6 col-xl-6">
                                                    <div class="comment-input">
                                                        <input type="text" placeholder="Your Name">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6">
                                                    <div class="comment-input">
                                                        <input type="email" placeholder="Your Email">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <textarea placeholder="Your review" class="comment-input comment-textarea"></textarea>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div class="comment-agree d-flex align-items-center mb-25">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Save my name, email, and website in this browser for the next time I comment.
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div class="comment-submit">
                                                        <button type="submit" class="cart-btn">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details-des-end -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#bidding').click(function () {
                event.preventDefault();

            })
        });
    </script>
@endsection
