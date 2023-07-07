@extends('layouts.app')
@section('title', 'Sipariş Bildirimi')
@section('content')
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Checkout</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="index.html"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Checkout</span>
                                            </li>
                                        </ul>
                                    </nav>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-banner-area-end -->

        <!-- coupon-area-start -->
        <section class="coupon-area pt-120 pb-30">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </section>
        <!-- coupon-area-end -->

        <!-- checkout-area-start -->
        <section class=" pb-85">
            <div class="container">
                    <div class="row justify-content-center">
                       <div class="card" style="width:400px; border: none;">
                           <img class="card-img-top" src="{{ asset('assets/check_mark.jpg') }}" alt="Card image">
                           <div class="card-body">
                               <p class="card-text text-center">Siparişiniz başarılı bir şekilde alınmıştır.</p>
                               <p class="card-text text-center">Yönlendiriliyorsunuz... <b id="timer">5</b></p>
                           </div>
                       </div>
                    </div>
            </div>
        </section>
        <!-- checkout-area-end -->
    @endsection
    @section('scripts')
        <script>
            var count = 5;
            var redirect = "{{ route('index') }}";
            setInterval(function(){
                count--;
                $("#timer").html(count);
                if(count == 0) {
                    window.location.href = redirect;
                }
            }, 1000);
        </script>
    @endsection
