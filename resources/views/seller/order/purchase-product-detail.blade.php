@extends('seller.layouts.app')
@section('title', $order->product_title.' Ürün Detayı')
@section('content')

        <!-- end row -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body task-detail">
                        <div class="d-flex mb-3">
                            @if ($order->product->hasMedia('images'))
                                <img class="flex-shrink-0 me-3 rounded-circle avatar-md" src="{{ $order->product->getFirstMedia('images')->getUrl() }}" alt="{{ $order->title }}" >
                            @else
                                Resim Yok
                            @endif

                            <div class="flex-grow-1">
                                <h5 class="font-600 m-b-5">#: {{ $order->id }}</h5>
                                <h4 class="media-heading mt-0">{{ $order->product_title }}</h4>
                                <h5 class="font-600 m-b-5">Kategori: {{ $order->product->category->name }}</h5>
                                <h5 class="font-600 m-b-5">Marka: {{ $order->product->brand->name }}</h5>
                               {{-- <span class="badge bg-danger">{{ $order->status === \App\Enum\Order\OrderEnum::WAITING ? 'Bekliyor' : ( $order->cart->status === 1 ? 'Onaylandı' : 'İptal Edildi') }}</span>--}}
                            </div>
                        </div>
                        <p class="text-muted">
                            {{ $order->product->short_description }}
                        </p>

                        <div class="row task-dates mb-0 mt-2">
                            <div class="col-lg-6">
                                <h5 class="font-600 m-b-5">Açık Artırma Başlangıç Tarihi</h5>
                                <p>{{ monthChangingDateFormat($order->product->start_date) }}</p>
                            </div>

                            <div class="col-lg-6">
                                <h5 class="font-600 m-b-5">Açık Artırma Bitiş Tarihi</h5>
                                <p> {{ monthChangingDateFormat($order->product->end_date) }}</p>
                            </div>
                        </div>

                        <div class="row task-dates mb-0 mt-2">
                            <div class="col-lg-6">
                                <h5 class="font-600 m-b-5">Ürün Fiyatı</h5>
                                <p> {{ $order->product_price }} <i style="margin-left: 1px;" class="fas fa-coins"> </i></p>
                            </div>

                            <div class="col-lg-6">
                                <h5 class="font-600 m-b-5">En Yüksek Verilen Açık Artırma Fiyatı</h5>
                                <p> {{ $order->product_bid_price }} <i style="margin-left: 1px;" class="fas fa-coins"> </i></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>



                        <div class="assign-team mt-3">
                            <h5>Ürün Resimleri</h5>
                            <div>
                                @if ($order->product->hasMedia('images'))
                                    @foreach($order->product->getMedia('images') as $image)

                                        <a target="_blank"> <img class="rounded-circle avatar-sm" alt="{{ $order->title }}" style="max-width: 64px; max-height: 64px;" src="{{ $image->getUrl() }}"> </a>

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
                                        <button onclick="event.preventDefault(); document.getElementById('approveForm').submit();" type="submit" class="btn btn-success waves-effect waves-light me-1">
                                            Ürünü Onayla
                                        </button>
                                        <button type="button" onclick="event.preventDefault(); document.getElementById('rejectForm').submit();" class="btn btn-light waves-effect">İptal Et
                                        </button>
                                        <form id="approveForm" action="{{ route('seller.order.updateOrderStatus', ['order' => $order]) }}" method="post">
                                            @csrf
                                        </form>
                                        <form id="rejectForm" action="{{ route('seller.order.updateOrderStatus', ['order' => $order]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="{{ \App\Enum\Order\OrderEnum::REJECTED }}">
                                        </form>
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
                                            <h5 class="mt-0">{{ $order->address->user->full_name }}</h5>
                                            <p class="font-13 text-muted mb-0">
                                                <a href="mailto:{{ $order->address->user->email }}" target="_blank" class="text-primary">
                                                    {{ $order->address->user->email }}
                                                </a>
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                                <a href="tel:{{ $order->address->user->phone }}" class="text-primary">
                                                    {{ $order->address->user->phone }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row mt-5">

                            <div class="dropdown">
                                <h4 class="header-title mt-0 mb-3">Adres Bilgileri
                                    <i id="copy" data-toggle="tooltip" title="Adresi Kopyala" class="mdi mdi-content-copy"></i>
                                    <i id="print" data-toggle="tooltip" title="Yazdır" class="mdi mdi-printer"></i>

                                </h4>

                                <div>

                                    <div class="d-flex mb-3" id="printAddress">

                                        <div class="flex-grow-1">
                                            <p class="font-13 text-muted mb-0">
                                                Ad-Soyad:
                                            </p>
                                            <p class="font-13 text-muted mb-0">

                                                Telefon:
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                                İl:
                                            </p>
                                            <p class="font-13 text-muted mb-0">

                                                İlçe:
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                                Açık Adres:
                                            </p>

                                        </div>
                                        <div class="flex-grow-1" style="margin-left: 30px;">
                                            <p class="font-13 text-muted mb-0">
                                                {{ $order->address->user->full_name }}
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                                {{ $order->address->user->phone }}
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                               {{ $order->address->city }}
                                            </p>
                                            <p class="font-13 text-muted mb-0">
                                               {{ $order->address->county }}
                                            </p>
                                            <p class="font-13 text-muted mb-0" id="address">
                                                {{ $order->address->address }}
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
        let print = document.getElementById('print');
        print.addEventListener('click', function() {
            let printText = window.open()
            printText.document.body.innerHTML = "" +
                "<table>" +
                    "<tr>" +
                        "<td>Ad-Soyad:</td>" +
                        "<td>{{ $order->address->user->full_name }}</td>" +
                    "</tr>" +
                    "<tr>" +
                        "<td>Telefon:</td>" +
                        "<td>{{ $order->address->user->phone }}</td>" +
                    "</tr>" +
                    "<tr>" +
                        "<td>İl:</td>" +
                        "<td>{{ $order->address->city }}</td>" +
                    "</tr>" +
                    "<tr>" +
                        "<td>İlçe:</td>" +
                        "<td>{{ $order->address->county }}</td>" +
                    "</tr>" +
                    "<tr>" +
                        "<td>Açık Adres:</td>" +
                        "<td>{{ $order->address->address }}</td>" +
                    "</tr>" +
                "</table>"
            printText.print();
        })
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        let copy = document.getElementById('copy');
        copy.addEventListener('mouseover', function() {
            copy.style.cursor = 'pointer';
        })
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
