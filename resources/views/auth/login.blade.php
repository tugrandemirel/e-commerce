@extends('layouts.app')
@yield('title', 'Giriş Yap'.' | '.config('app.name'))
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
        <div class="col-md-6">
            <div class="basic-login mb-50">
                <h5>Giriş Yap</h5>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label for="name">Email Adresiniz  <span>*</span></label>
                    <input id="name" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="pass">Şifreniz <span>*</span></label>
                    <input id="pass" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <div class="login-action mb-10 fix">
                    <span class="log-rem f-left">
                       <input id="remember" type="checkbox">
                       <label for="remember">Beni Hatırla</label>
                    </span>
                        @if (Route::has('password.request'))
                            <span class="forgot-login f-right">
                           <a href="{{ route('password.request') }}">Şifremi unuttum</a>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="tp-in-btn w-100">Giriş Yap</button>
                </form>
                <a href="{{ route('register') }}">Hesabınız yok mu? Hemen <b>kayıt ol!</b></a>
            </div>
        </div>
    </div>
</div>
@endsection
