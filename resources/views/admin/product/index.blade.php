@extends('admin.layouts.app')
@section('title', 'Ürünler')
@section('styles')


@endsection
@section('content')

    <!-- end row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-2 header-title">Ürünler</h4>
                    <p class="text-muted font-14 mb-3">
                        Onay bekleyen <b>Ürünler</b> burada listelenmektedir. Buradan ürün onaylayabilir, reddedebilirsiniz.
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Mağaza Adı</th>
                            <th>Başlık</th>
                            <th>Resim</th>
                            <th>Kategori</th>
                            <th>Marka</th>
                            <th>Fiyat</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Başlangıç Fiyatı</th>
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
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->seller->name }}</td>
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
                                    <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Oluşturma Tarihi">
                                        {{ date('d-m-Y H:i:s', strtotime($product->created_at)) }}
                                    </span>

                                    <span class="badge bg-soft-info text-info" data-toggle="tooltip" title="Güncelleme Tarihi">
                                        {{ date('d-m-Y H:i:s', strtotime($product->updated_at)) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.product.show', ['product' => $product]) }}" target="_blank" class="btn btn-info btn-sm waves-effect waves-light"><i class="mdi mdi-eye"></i></a>
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
