@extends('layouts.app')
@section('title', 'Ödeme')
@section('styles')
@endsection
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
    <section class="checkout-area pb-85">
        <div class="container">
            <form action="{{ route('front.checkout.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Adres Bilgileri</h3>
                            <div class="row">
                                @error('select_address')
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $message }}
                                </div>
                                @enderror
                                @isset($addresses)
                                    @foreach($addresses as $address)
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-header" >
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="radio" name="select_address" value="{{ $address->id }}" >
                                                            </div>
                                                           <div class="col-md-6">
                                                               <p>{{ $address->title }}</p>
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p>{{ $address->user_name }} {{ $address->user_surname }}</p>
                                                    <p>
                                                        {{ $address->neighborhood }}
                                                    </p>
                                                    <p>
                                                        {{ $address->address }}
                                                    </p>

                                                    <p>
                                                        {{ $address->county }}/{{ $address->city }}
                                                    </p>
                                                    <p>
                                                        {{ $address->user_phone }}
                                                    </p>
                                                </div>
                                                <div class="card-footer" style="text-align: left;">
                                                    <div class="btn-group">
                                                        <a data-id="{{ $address->id }}" class="icon-box icon-box-1 removeAddress">
                                                            <i class="fal fa-trash-alt" style="color: red"></i>
                                                        </a>
                                                        <a data-id="{{ $address->id }}" class="icon-box icon-box-1 ml-10 addressModal">
                                                            <i class="fal fa-pencil " style="color: cornflowerblue"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Siparişiniz</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-name">Ürün</th>
                                        <th class="product-total">Toplam</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($carts)
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($carts as $cart)
                                            @php
                                                $total += $cart->bid_price;
                                            @endphp
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <a href="{{ route('front.product.detail', ['slug' => $cart->product->slug]) }}">
                                                        <img src="{{ $cart->product->getFirstMedia('images')->getUrl() }}" alt="{{$cart->product->slug}}" WIDTH="50">
                                                    </a>
                                                    {{ $cart->product->title }}

                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">
                                                        {{ $cart->bid_price }}
                                                        <i class="fas fa-coins"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                    </tbody>
                                    <tfoot>

                                    <tr class="order-total">
                                        <th>Toplam</th>
                                        <td><strong><span class="amount">
                                                     {{ $total }}
                                                        <i class="fas fa-coins"></i>
                                                </span></strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment-method">
                                <div class="order-button-payment mt-20">
                                    <button type="submit" class="tp-btn-h1">Siparişi Tamamla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- checkout-area-end -->


    <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modalContent">
                <div class="modal-header">
                    <h4 style="color: #0d6efd;"><a href="#">Yeni Adres Ekle</a></h4>
                    <div class="product__modal-close p-absolute" >
                        <button data-bs-dismiss="modal" style="background-color: #0d6efd; border-color: #0d6efd;"><i class="fal fa-times" ></i></button>
                    </div>
                </div>
                <form action="{{ route('front.account.address.store') }}" id="modelRoute" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mx-5">
                            <div class="col-md-6 mt-3">
                                <div class="form-group mt-3">
                                    <label for="user_name">Ad</label>
                                    <input type="text" class="form-control" name="user_name" id="user_name">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="user_phone">Telefon</label>
                                    <input type="text" class="form-control" name="user_phone" id="user_phone">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="county">İlçe</label>
                                    <input type="text" class="form-control" name="county" id="county">
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group mt-3">
                                    <label for="user_surname">Soyad</label>
                                    <input type="text" class="form-control" name="user_surname" id="user_surname">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="city">İl</label>
                                    <input type="text" class="form-control" name="city" id="city">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="neighborhood">Mahalle/Köy</label>
                                    <input type="text" class="form-control" name="neighborhood" id="neighborhood">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group mt-3">
                                    <label for="address">Mahalle/Köy</label>
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group mt-3">
                                    <label for="title">Adres Başlığı</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pro-cart-btn mb-25">
                            <button class="cart-btn" id="test" style="background-color: #0d6efd; color: white" type="submit">Güncelle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let closeAlert = document.querySelectorAll('.close');
        for (let i = 0; i < closeAlert.length; i++)
        {
            closeAlert[i].addEventListener('click', function () {
                closeAlert[i].parentElement.style.display = 'none';
            })
        }
    </script>
    <script>
        let selectAdres = document.querySelectorAll('.addresSelected');
        for (let i = 0; i < selectAdres.length; i++)
        {
            selectAdres[i].addEventListener('mouseenter', function () {
                selectAdres[i].style.cursor = 'pointer';
                selectAdres[i].style.color = 'red';
            })
        }
    </script>
    <script>
        $(document).ready(function () {
            addressModal = document.querySelectorAll('.addressModal');
            for(let i = 0; i < addressModal.length; i++){
                addressModal[i].addEventListener('mouseenter', function () {
                    addressModal[i].style.cursor = 'pointer';
                })
                addressModal[i].addEventListener('click', function () {

                    $id = addressModal[i].getAttribute('data-id');
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('front.account.address.edit') }}',
                        data: {
                            id: $id,
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function (data) {
                            $('#productModalId').modal('show');
                            $('#user_name').val(data.user_name);
                            $('#user_surname').val(data.user_surname);
                            $('#user_phone').val(data.user_phone);
                            $('#county').val(data.county);
                            $('#city').val(data.city);
                            $('#neighborhood').val(data.neighborhood);
                            $('#address').val(data.address);
                            $('#title').val(data.title);
                            $('#modelRoute').attr('action', '{{ route('front.account.address.update', ['id' => 'id']) }}'.replace('id', data.id));
                        },
                        errors: function (data) {
                            console.log(data);
                        }
                    })
                })
            }


        })
    </script>
    <script>
        $(document).ready(function () {
            $removeAddress = document.querySelectorAll('.removeAddress');
            for (let i = 0; i < $removeAddress.length; i++) {

                $removeAddress[i].addEventListener('mouseenter', function () {
                    $removeAddress[i].style.cursor = 'pointer';
                })

                $removeAddress[i].addEventListener('click', function () {

                    $id = $removeAddress[i].getAttribute('data-id');
                    console.log($id)
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('front.account.address.remove') }}',
                        data: {
                            id: $id,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            $removeAddress[i].parentElement.parentElement.parentElement.parentElement.remove();
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    })


                })
            }
        })
    </script>
    <script>
        $(document).ready(function () {
            saveAddress = document.getElementById('test')

            saveAddress.addEventListener('mouseenter', function () {
                saveAddress.style.backgroundColor = 'white';
                saveAddress.style.color = '#0d6efd';
            })

            saveAddress.addEventListener('mouseleave', function () {
                saveAddress.style.backgroundColor = '#0d6efd';
                saveAddress.style.color = 'white';
            })
        })
    </script>
@endsection
