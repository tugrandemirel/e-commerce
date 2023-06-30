@extends('seller.layouts.app')
@section('title', 'Sipariş Detay')
@section('content')

        <!-- end row -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body task-detail">
                        <div class="d-flex mb-3">
                            @if ($product->hasMedia('images'))
                                <img class="flex-shrink-0 me-3 rounded-circle avatar-md" src="{{ $product->getFirstMedia('images')->getUrl() }}" alt="{{ $product->title }}" >
                            @else
                                Resim Yok
                            @endif

                            <div class="flex-grow-1">
                                <h4 class="media-heading mt-0">{{ $product->title }}</h4>
                                <h5 class="font-600 m-b-5">Kategori: {{ $product->category->name }}</h5>
                                <h5 class="font-600 m-b-5">Marka: {{ $product->brand->name }}</h5>
                                <span class="badge bg-danger">{{ $product->cart->status === 0 ? 'Bekliyor' : ( $product->cart->status === 1 ? 'Onaylandı' : 'İptal Edildi') }}</span>
                            </div>
                        </div>
                        <p class="text-muted">
                            {{ $product->short_description }}
                        </p>

                        <div class="row task-dates mb-0 mt-2">
                            <div class="col-lg-6">
                                <h5 class="font-600 m-b-5">Açık Artırma Başlangıç Tarihi</h5>
                                <p>{{ monthChangingDateFormat($product->start_date) }}</p>
                            </div>

                            <div class="col-lg-6">
                                <h5 class="font-600 m-b-5">Açık Artırma Bitiş Tarihi</h5>
                                <p> {{ monthChangingDateFormat($product->end_date) }}</p>
                            </div>
                        </div>

                        <div class="row task-dates mb-0 mt-2">
                            <div class="col-lg-6">
                                <h5 class="font-600 m-b-5">Ürün Fiyatı</h5>
                                <p> {{ $product->cart->product_price }} <i style="margin-left: 1px;" class="fas fa-coins"> </i></p>
                            </div>

                            <div class="col-lg-6">
                                <h5 class="font-600 m-b-5">En Yüksek Verilen Açık Artırma Fiyatı</h5>
                                <p> {{ $product->cart->bid_price }} <i style="margin-left: 1px;" class="fas fa-coins"> </i></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>



                        <div class="assign-team mt-3">
                            <h5>Ürün Resimleri</h5>
                            <div>
                                @if ($product->hasMedia('images'))
                                    @foreach($product->getMedia('images') as $image)

                                        <a href="#" target="_blank"> <img class="rounded-circle avatar-sm" alt="{{ $product->title }}" style="max-width: 64px; max-height: 64px;" src="{{ $image->getUrl() }}"> </a>

                                    @endforeach
                                @else
                                    <a href="#" target="_blank"> RESİM YOK </a>
                                @endif

                            </div>
                        </div>
                        <div class="attached-files mt-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light me-1">
                                            Ürünü Onayla
                                        </button>
                                        <button type="button" class="btn btn-light waves-effect">İptal Et
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body ">
                        <div class="row">

                            <div class="dropdown">
                                <h4 class="header-title mt-0 mb-3">Müşteri Bilgileri</h4>

                                <div>

                                    <div class="d-flex mb-3">

                                        <div class="flex-grow-1">
                                            <h5 class="mt-0">{{ $product->cart->user->full_name }}</h5>
                                            <p class="font-13 text-muted mb-0">
                                                <a href="mailto:{{ $product->cart->user->email }}" target="_blank" class="text-primary">
                                                    {{ $product->cart->user->email }}
                                                </a>
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                                <a href="tel:{{ $product->cart->user->phone }}" class="text-primary">
                                                    {{ $product->cart->user->phone }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row mt-5">

                            <div class="dropdown">
                                <h4 class="header-title mt-0 mb-3">Adres Bilgileri <i id="copy" data-toggle="tooltip" title="Adresi Kopyala" class="mdi mdi-content-copy"></i></h4>

                                <div>

                                    <div class="d-flex mb-3">

                                        <div class="flex-grow-1">
                                            <p class="font-13 text-muted mb-0">
                                                USERNAME
                                            </p>
                                            <p class="font-13 text-muted mb-0">

                                                Phone:
                                            </p>
                                            <p class="font-13 text-muted mb-0">

                                                City:
                                            </p>
                                            <p class="font-13 text-muted mb-0">

                                                County:
                                            </p>
                                            <p class="font-13 text-muted mb-0">

                                                Address:
                                            </p>

                                        </div>
                                        <div class="flex-grow-1" style="margin-left: 30px;">
                                            <p class="font-13 text-muted mb-0">
                                                Tuğran Demirel
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                               0544 338 0633
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                               Yozgat
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                               Sorgun
                                            </p>
                                            <p class="font-13 text-muted mb-0" id="address">
                                                Ahmet Efendi Mahallesi Şehit Mustafa Tekgül Caddesi No 52. SOrgun/Yozgat
                                            </p>

                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->
        </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        let copy = document.getElementById('copy');
        copy.addEventListener('click', function() {
            let address = document.getElementById('address');
            let range = document.createRange();
            range.selectNode(address);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();

            copy.classList.remove('mdi-content-copy');
            copy.classList.add('mdi-check');
            copy.style.color = 'green';
            setTimeout(() => {
                copy.classList.remove('mdi-check');
                copy.classList.add('mdi-content-copy');
                copy.style.color = 'black';
            }, 2000);

        })
    </script>

@endsection
