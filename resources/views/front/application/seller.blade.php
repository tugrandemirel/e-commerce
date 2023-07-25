@extends('layouts.app')
@yield('title', 'Satıcı Başvurusu'.' | '.config('app.name'))
@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>

@endsection
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

                    <label for="name">ADINIZ  <span>*</span></label>
                    <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    <label for="surname">SOYADINIZ<span>*</span></label>
                    <input id="surname" type="text" class=" @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                    <label for="email">EMAİL ADRESİNİZ  <span>*</span></label>
                    <input id="email" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="company">Şirket Türü <span>*</span></label>
                    <input id="company" type="text" class=" @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus>
                    <label for="city">İLİNİZİ YAZINIZ <span>*</span></label>
                    <input id="city" type="text" class=" @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

            </div>
        </div>
        <div class="col-md-6">
            <div class="basic-login mb-50">


                    <label for="phone">CEP TELEFONUNUZ  <span>*</span></label>
                    <input id="phone" type="text" class="phone @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                <label for="category">Satılacak Ürün Kategorisi Seçiniz <span>*</span></label><br>
                    <select class=" @error('category') is-invalid @enderror" id="exampleFormControlSelect1">
                        <option value="">Seçim Yapınız</option>
                        @foreach($_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                <br> <br>
                <label for="identity_number" class="mt-3">TCK/VKN <span>*</span></label>
                <input id="identity_number" type="text" class=" @error('identity_number') is-invalid @enderror" name="identity_number" value="{{ old('identity_number') }}" required autocomplete="identity_number" autofocus>
                <label for="county">İLÇENİZİ YAZINIZ YAZINIZ <span>*</span></label>
                <input id="county" type="text" class=" @error('county') is-invalid @enderror" name="county" value="{{ old('county') }}" required autocomplete="county" autofocus>

            </div>
        </div>
        <div class="col-md-6">
            <div class="login-action mb-10 fix">
                    <span class="log-rem f-left">
                       <input id="remember" type="checkbox" required name="agreement" class=" @error('agreement') is-invalid @enderror">
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
@section('scripts')

    <script>
        $(document).ready(function(){
            $('.phone').inputmask('(999)-999-9999');
        });
    </script>
@endsection
