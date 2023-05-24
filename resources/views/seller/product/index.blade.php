@extends('seller.layouts.app')
@section('title', 'Ürünler')
@section('styles')


@endsection
@section('content')

    <!-- end row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('seller.product.create') }}" class="btn btn-success waves-effect waves-light" ><i class="mdi mdi-plus-circle me-1"></i></a>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                    <h4 class="mt-2 header-title">Ürünler</h4>
                    <p class="text-muted font-14 mb-3">
                        Bütün <b>Ürünler</b> burada listelenmektedir. Buradan ürün detaylarını görüntüleyebilir, güncelleyebilir, silebilirsiniz.
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Resim</th>
                            <th>Kategori</th>
                            <th>Marka</th>
                            <th>Fiyat</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Başlangıç Fiyatı</th>
                            <th>
                                Ürün Durumu
                                <i class="fa fa-question" data-toggle="tooltip" title="Ürün Durum özellikleri üzerine gelerek hakkında bilgi alabilirsiniz."></i>
                            </th>
                            <th>
                                İşlem Tarihi
                                <i class="fa fa-question" data-toggle="tooltip" title="İşlem tarihleri üzerine gelerek hakknda bilgi alabilirsiniz."></i>
                            </th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                @if ($product->hasMedia('images'))
                                    <td>
                                        <img src="{{ $product->getFirstMedia('images')->getUrl() }}" alt="{{ $product->title }}" width="80">
                                    </td>
                                @else
                                    <td>Resim Yok</td>
                                @endif
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>

                                        {{ $product->price }}<i style="margin-left: 1px;" class="fas fa-coins">
                                    </div>
                                </td>
                                <td>{{ changingDateFormat($product->start_date) }}</td>
                                <td>{{ changingDateFormat($product->end_date) }}</td>
                                <td>
                                    @if($product->status == \App\Enum\Product\ProductEnum::STATUS_NEW)
                                        <span class="badge bg-soft-success text-success"  data-toggle="tooltip" title="Ürün Kullanım Durumu">Sıfır Ürün</span>
                                    @elseif($product->status == \App\Enum\Product\ProductEnum::STATUS_SECONDHAND)
                                        <span class="badge bg-soft-warning text-warning" data-toggle="tooltip" title="Ürün Kullanım Durumu">Kullanılmış/Yenilenmiş Ürün</span>
                                    @elseif($product->status == \App\Enum\Product\ProductEnum::STATUS_RENEWED)
                                        <span class="badge bg-soft-danger text-danger"  data-toggle="tooltip" title="Ürün Kullanım Durumu">İkinci El Ürün</span>
                                    @endif
                                    @if($product->visibility == \App\Enum\Product\ProductEnum::VISIBILITY_ACTIVE)
                                        <span class="badge bg-soft-success text-success"  data-toggle="tooltip" title="Ürün Görünürlük Durumu">Aktif</span>
                                    @else
                                        <span class="badge bg-soft-danger text-danger" data-toggle="tooltip" title="Ürün Görünürlük Durumu">Pasif</span>
                                    @endif
                                    @if($product->push_on == \App\Enum\Product\ProductEnum::PUSH_ON_ACTIVE)
                                        <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Ürün Öne Çıkma Durumu">Öne Çıkarılmış</span>
                                    @else
                                        <span class="badge bg-soft-danger text-danger" data-toggle="tooltip" title="Ürün Öne Çıkma Durumu">Öne Çıkarılmamış</span>
                                    @endif
                                    @if($product->stock == \App\Enum\Product\ProductEnum::STOCK_ACTIVE)
                                        <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Ürün Stok Durumu">Stokta Var</span>
                                    @else
                                        <span class="badge bg-soft-danger text-danger" data-toggle="tooltip" title="Ürün Stok Durumu">Stokta Yok</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Oluşturma Tarihi">
                                        {{ date('d-m-Y H:i:s', strtotime($product->created_at)) }}
                                    </span>

                                    <span class="badge bg-soft-info text-info" data-toggle="tooltip" title="Güncelleme Tarihi">
                                        {{ date('d-m-Y H:i:s', strtotime($product->updated_at)) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light"><i class="mdi mdi-eye"></i></a>
                                    <a href="{{ route('seller.product.edit', ['product' => $product]) }}" class="btn btn-warning btn-sm waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                    <a href="" class="btn btn-danger btn-sm waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a>
                                </td>
                            </tr>
                        @endforeach
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
