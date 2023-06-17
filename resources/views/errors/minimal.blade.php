@extends('layouts.app')

@section('title', 'Sayfa Bulunamadı')

@section('content')

    <div class="error-area pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-info text-center">
                        <div class="error-image text-center mb-50">
                            <img src="{{ asset('assets/user/img/banner/404.png') }}" alt="">
                        </div>
                        <div class="error-content">
                            <h5>Sayfa bulunamadı</h5>
                            <p>
                                Üzgünüz, istediğiniz sayfa mevcut değil. Lütfen başka bir şey aramayı deneyin veya Ana Sayfaya dönün.
                            </p>
                            <div class="error-button">
                                <a href="{{ route('index') }}" class="error-btn">Anasayfa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- error-area-start -->
@endsection
