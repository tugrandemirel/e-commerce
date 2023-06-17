@extends('layouts.app')

@section('content')
    <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg" style="background-image: url({{ asset('assets/user/img/banner/page-banner-4.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Satıcı Başvurusu</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('index') }}"><span>Anasayfa</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Satıcı Başvurusu</span>
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
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="basic-login mb-50">

                    <label for="name">ADINIZ SOYADINIZ  <span>*</span></label>
                    <input id="name" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="name">EMAİL ADRESİNİZ  <span>*</span></label>
                    <input id="name" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="pass">Şirket Türü <span>*</span></label>
                    <input id="pass" type="text" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="pass">İLİNİZİ YAZINIZ <span>*</span></label>
                    <input id="pass" type="text" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            </div>
        </div>
        <div class="col-md-6">
            <div class="basic-login mb-50">


                    <label for="name">CEP TELEFONUNUZ  <span>*</span></label>
                    <input id="name" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                <label for="name">Satılacak Ürün Kategorisi Seçiniz <span>*</span></label><br>
                    <select class=" @error('email') is-invalid @enderror" id="exampleFormControlSelect1">
                        <option value="">Seçim Ypaınız</option>
                        <option>Elektronik</option>
                        <option>Ev Eşyaları</option>
                        <option>Kitap</option>
                        <option>Diğer</option>
                    </select>
                <br> <br>
                <label for="name" class="mt-3">TCK/VKN <span>*</span></label>
                <input id="name" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label for="pass">İLÇENİZİ YAZINIZ YAZINIZ <span>*</span></label>
                <input id="pass" type="text" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            </div>
        </div>
        <div class="col-md-6">
            <div class="login-action mb-10 fix">
                    <span class="log-rem f-left">
                       <input id="remember" type="checkbox">
                       <label for="remember"><a style="color: #263c97!important; text-decoration:underline;  " href="{{ route('front.page.index', ['slug'=> 'adyinlatma-metni']) }}">Aydınlatma metnini</a> okudum anladım.</label>
                    </span>
            </div>
        </div>
        <div class="col-md-6">

            <button type="submit" class="tp-in-btn w-100">Kayıt Ol</button>

        </div>
    </div>
</div>
@endsection
