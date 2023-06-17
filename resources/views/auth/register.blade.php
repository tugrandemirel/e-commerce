@extends('layouts.app')
@yield('title', 'Kayıt Ol'.' | '.config('app.name'))
@section('content')

    <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg" style="background-image: url(&quot;assets/img/banner/page-banner-4.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">My account</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="index.html"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>My account</span>
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

        <div class="col-lg-6">
            <div class="basic-login">
                <h5>Kayıt Ol</h5>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <label for="username">Kullanıcı Adı <span>*</span></label>
                    <input id="username" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="surname">Kullanıcı Soyadı <span>*</span></label>
                    <input id="surname" type="text" class="@error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                    <label for="phone-id">Telefon Numarası <span>*</span></label>
                    <input id="phone-id" type="tel" class="@error('phone') is-invalid @enderror" placeholder="+123-45-678"  pattern="+[0-9]{3}-[0-9]{2}-[0-9]{3}" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                    <label for="email-id">Email Adresi <span>*</span></label>
                    <input id="email-id" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <label for="userpass">Şifre <span>*</span></label>
                    <input id="userpass" type="password"class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <label for="cuserpass">Şifre Tekrarı <span>*</span></label>
                    <input id="cuserpass" type="password" name="password_confirmation" required autocomplete="new-password">
                    <label for="reference">Referans Kodu <span data-toggle="tooltip" title="İsteğe Bağlı">?</span></label>
                    <input id="reference" type="text" name="reference" required autocomplete="">
                    <div class="login-action mb-10 fix">
                        <p>
                            Kişisel verileriniz, bu web sitesindeki deneyiminizi desteklemek, hesabınıza erişimi yönetmek ve
                            <a href="" target="_blank">gizlilik politikamızda</a> açıklanan diğer amaçlar için kullanılacaktır.</p>
                    </div>
                    <button type="submit" class="tp-in-btn w-100">Kayıt Ol</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
