@extends('seller.layouts.app')
@section('title', 'Kargo Bekleyen Ürünler')
@section('styles')


@endsection
@section('content')

    <!-- end row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('seller.order.cargo.index', ['status' => \App\Enum\Order\OrderEnum::DELIVERED]) }}" class="btn btn-success waves-effect waves-light" >Teslim Edilen Ürünler</a>
                            </div>
                        </div><!-- end col-->
                        <div class="col-md-3">
                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('seller.order.cargo.index', ['status' => \App\Enum\Order\OrderEnum::CANCELLED]) }}" class="btn btn-success waves-effect waves-light" >Müşteri Tarafından İptal Edilen Ürünler</a>
                            </div>
                        </div><!-- end col-->
                        <div class="col-md-3">
                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('seller.order.cargo.index', ['status' => \App\Enum\Order\OrderEnum::RETURNED]) }}" class="btn btn-success waves-effect waves-light" >Geri Gelen Ürünler</a>
                            </div>
                        </div><!-- end col-->
                        <div class="col-md-3">
                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('seller.order.cargo.index', ['status' => \App\Enum\Order\OrderEnum::SHIPPED]) }}" class="btn btn-success waves-effect waves-light" >Yola Çıkan Ürünler</a>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                    <h4 class="mt-2 header-title">Kargo Bekleyen Ürünler</h4>
                    <p class="text-muted font-14 mb-3">
                        Onaylanmış <b>Ürünler</b> burada listelenmektedir. Buradan ürünlerinizi müşteriye göndermek için kargo bilgilerini girebilirsiniz.
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Resim</th>
                            <th>Kategori</th>
                            <th>Marka</th>
                            <th>Fiyat</th>
                            <th>Teklif Verilen Fiyat</th>
                            <th>
                                İşlem Tarihi
                                <i class="fa fa-question" data-toggle="tooltip" title="İşlem tarihleri üzerine gelerek hakknda bilgi alabilirsiniz."></i>
                            </th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>


                        <tbody>
                        @if($orders->count() > 0)
                            @foreach($orders as $order)
                                @if(isset($order) && $order->count() > 0)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->title }}</td>
                                        @if ($order->product->hasMedia('images'))
                                            <td>
                                                <img src="{{ $order->product->getFirstMedia('images')->getUrl() }}" alt="{{ $order->title }}" width="80">
                                            </td>
                                        @else
                                            <td>Resim Yok</td>
                                        @endif
                                        <td>{{ $order->product->category->name }}</td>
                                        <td>{{ $order->product->brand->name }}</td>
                                        <td>
                                            {{ $order->price }}<i style="margin-left: 1px;" class="fas fa-coins">
                                        </td>
                                        <td>
                                            {{ $order->product_bid_price }}<i style="margin-left: 1px;" class="fas fa-coins">
                                        </td>

                                        <td>
                                        <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Oluşturma Tarihi">
                                            {{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}
                                        </span>

                                            <span class="badge bg-soft-info text-info" data-toggle="tooltip" title="Güncelleme Tarihi">
                                            {{ date('d-m-Y H:i:s', strtotime($order->updated_at)) }}
                                        </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('seller.order.purchaseDetail', ['order' => $order]) }}" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light"><i class="mdi mdi-eye"></i></a>
                                            <a href="{{ route('seller.product.edit', ['product' => $order, 'status' => 'resend']) }}" class="btn btn-danger btn-sm waves-effect waves-light"><i class="mdi mdi-close-circle"></i></a>
                                        </td>

                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="8">Henüz ürününüz yok.</td>
                                    </tr>
                                    @break
                                @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- end row -->

@endsection
@section('scripts')

    <!-- third party js -->
    <script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>

@endsection
