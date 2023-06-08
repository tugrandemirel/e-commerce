@extends('layouts.app')
@section('title', 'Hesabım')
@section('styles')
@endsection
@section('content')
    <div class="container mt-70 mb-60">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-profile-tab" data-toggle="pill"
                            data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">Katıldığım Çekilişler
                    </button>
                    <button class="nav-link" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home"
                            type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Tüm Siparişler
                    </button>
                    <button class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                            data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                            aria-selected="false">Kullanıcı Bilgilerim
                    </button>
                    <button class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                            data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                            aria-selected="false">Adres Bilgileri
                    </button>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                         aria-labelledby="v-pills-profile-tab">
                        <section class="cart-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="#">
                                            <div class="table-content table-responsive">
                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th class="product-thumbnail">Resim</th>
                                                        <th class="cart-product-name">Ürün</th>
                                                        <th class="product-price">Başlangıç Fiyatı</th>
                                                        <th class="product-quantity">Teklif</th>
                                                        <th class="product-subtotal">Tarih</th>
                                                        <th class="product-remove">İşlemler</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($bids)
                                                    @foreach($bids as $bid)
                                                        <tr>
                                                            @if (($bid->product->hasMedia('images')))
                                                            <td class="product-thumbnail"><a
                                                                    href="{{ route('front.product.detail', ['slug' => $bid->product->slug]) }}"><img
                                                                        src="{{ $bid->product->getFirstMedia('images')->getUrl() }}"
                                                                        alt="{{ $bid->product->meta_title }}" style="width: 35px;"></a></td>
                                                            @else
                                                                <td class="product-thumbnail"><a
                                                                        href="{{ route('front.product.detail', ['slug' => $bid->product->slug]) }}">RESİM YOK</a></td>
                                                            @endif
                                                            <td class="product-name"><a
                                                                    href="shop-details.html">{{ $bid->product->title }}</a>
                                                            </td>
                                                            <td class="product-price"><span
                                                                    class="amount">{{ $bid->bid_price }}</span>
                                                            </td>
                                                            <td class="product-price"><span
                                                                    class="amount">{{ $bid->bid_price }}</span></td>
                                                            <td class="product-price"><span
                                                                    class="amount">{{ changingDateTimeFormat($bid->created_at) }}</span>
                                                            </td>
                                                            <td class="product-remove " data-toggle="tooltip"
                                                                title="Teklifi geri çek"><a href="#"
                                                                                            data-toggle="tooltip"
                                                                                            title="Teklifi geri çek"><i
                                                                        class="fa fa-times remove-wishlist"
                                                                        data-toggle="tooltip"
                                                                        title="Teklifi geri çek"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                        @endisset

                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <section class="cart-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="#">
                                            <div class="table-content table-responsive">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">Resim</th>
                                                            <th class="cart-product-name">Ürün</th>
                                                            <th class="product-quantity">Adres</th>
                                                            <th class="product-price">Başlangıç Fiyatı</th>
                                                            <th class="product-quantity">Satın Alınma Fiyatı</th>
                                                            <th class="product-subtotal">Tarih</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td class="product-thumbnail"><a
                                                                    href="{{ route('front.product.detail', ['slug' => $order->product->slug]) }}"><img
                                                                        src="{{ $order->product->getFirstMedia('images')->getUrl() }}"
                                                                        alt=""></a></td>
                                                            <td class="product-name"><a
                                                                    href="shop-details.html">{{ $order->product->title }}</a>
                                                            </td>
                                                            <td class="product-name"><a href="shop-details.html">Jacket
                                                                    light</a></td>
                                                            <td class="product-price"><span
                                                                    class="amount">{{ $order->product->price }}</span>
                                                            </td>
                                                            <td class="product-price"><span
                                                                    class="amount">{{ $order->bid_price }}</span></td>
                                                            <td class="product-price"><span
                                                                    class="amount">{{ changingDateTimeFormat($order->created_at) }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                         aria-labelledby="v-pills-settings-tab">
                        <div class="cart-area">
                            <div class="container">
                                <div class="row">

                                    @if(session()->get('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    @if(session()->get('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <form action="{{ route('front.account.update') }}" method="post">
                                            @csrf
                                            <div class="row">

                                                <div class="card"
                                                     style="border-top-right-radius: 0;border-bottom-right-radius: 0;">
                                                    <p class="text-primary mt-2 "><b>Üyelik Bilgilerim</b></p>
                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Ad</label>
                                                                    <input type="text" class="form-control" name="name"
                                                                           value="{{ $user->name ?? '-' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Soyad</label>
                                                                    <input type="text" class="form-control"
                                                                           name="surname"
                                                                           value="{{ $user->surname ?? '-' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <div class="form-group">
                                                                    <label for="">E-Mail</label>
                                                                    <input type="text" class="form-control" name="email"
                                                                           value="{{ $user->email ?? '-' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-md-6 mt-3">
                                                                <div class="form-group">
                                                                    <label for="">Telefon Numarası</label>
                                                                    <input type="text" name="phone" class="form-control"
                                                                           placeholder="+123-45-678"
                                                                           pattern="+[0-9]{3}-[0-9]{2}-[0-9]{3}"
                                                                           value="{{ $user->phone ?? '-' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <div class="form-group">
                                                                    <label for="">Doğum Tarihi</label>
                                                                    <input type="date" name="date_of_birth"
                                                                           class="form-control"
                                                                           value="{{ date('d.m.Y', strtotime($user->date_of_birth)) ?? '-' }}">
                                                                </div>
                                                            </div>
                                                            <button class="btn-block btn-primary btn mt-3">GÜNCELLE
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{ route('front.account.password.update') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="card"
                                                     style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                                    <p class="text-primary mt-2 "><b>Şifre Güncelleme</b></p>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Eski Şifre</label>
                                                                    <input type="password" name="old_password"
                                                                           class="form-control @error('old_password') is-invalid @enderror">
                                                                    @error('old_password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <div class="form-group">
                                                                    <label for="">Yeni Şifre</label>
                                                                    <input type="password" name="password"
                                                                           class="form-control @error('password') is-invalid @enderror">
                                                                    @error('password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <div class="form-group">
                                                                    <label for="">Yeni Şifre(Tekrar)</label>
                                                                    <input type="password" name="password_confirmation"
                                                                           class="form-control @error('password_confirmation') is-invalid @enderror">
                                                                    @error('password_confirmation')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <button type="submit" class="btn-block btn-primary btn">
                                                                GÜNCELLE
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                         aria-labelledby="v-pills-messages-tab">

                        <div class="cart-area">
                            <div class="container">
                                <div class="row">

                                    @if(session()->get('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    @if(session()->get('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    <div class="col-md-12">

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row my-1">
                                                    <div class="col-md-6">
                                                        <p>Adres Bilgilerim</p>
                                                    </div>
                                                    <div class="col-md-6 text-end">
                                                        <p>
                                                            <a href="#" data-bs-toggle="modal"
                                                               data-bs-target="#productModalId" id="modalReset" style="color: #fcbe00">
                                                                <i class="fa fa-plus" style="color: #fcbe00"></i> Yeni
                                                                Adres Ekle
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-30">
                                    @foreach($addresses as $address)
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-header" style="text-align: center">
                                                        <p>{{ $address->title }}</p>
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
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <button class="cart-btn" id="test" style="background-color: #0d6efd; color: white" type="submit">Kaydet</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
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
                            '_token': '{{ csrf_token() }}'
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
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        $(document).ready(function () {
            $removeWishlist = document.querySelectorAll('.remove-wishlist');
            console.log($removeWishlist.length)
            for (let i = 0; i < $removeWishlist.length; i++) {
                $removeWishlist[i].addEventListener('mouseenter', function () {
                    $removeWishlist[i].style.color = 'red';
                    $removeWishlist[i].style.cursor = 'pointer';
                })
                $removeWishlist[i].addEventListener('mouseleave', function () {
                    $removeWishlist[i].style.color = '#337ab7';
                })
            }
        })
    </script>
    <script>
        let navLink = document.querySelectorAll('.nav-link');
        let tabPane = document.querySelectorAll('.tab-pane');

        for (let i = 0; i < navLink.length; i++) {

            navLink[i].addEventListener('click', function () {
                for (let j = 0; j < navLink.length; j++) {
                    navLink[j].classList.remove('active');
                }
                this.classList.add('active');
                let target = this.getAttribute('data-target');
                for (let k = 0; k < tabPane.length; k++) {
                    tabPane[k].classList.remove('show');
                    tabPane[k].classList.remove('active');
                }
                document.querySelector(target).classList.add('show');
                document.querySelector(target).classList.add('active');
            });

        }


    </script>
@endsection
