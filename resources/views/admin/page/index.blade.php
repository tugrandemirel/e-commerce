@extends('admin.layouts.app')
@section('title', 'Sayfalar')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.page.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 float-right">
                                <i class="mdi mdi-plus-circle"></i>
                            </a>
                        </div>

                    <h4 class="mt-2 header-title">Sayfalar</h4>
                    <p class="text-muted font-14 mb-3">
                       <b>Sabit Sayfalar</b> burada listelenmektedir. Buradan sayfa oluşturabilir, düzenleyebilir, silebilirsiniz.
                    </p>
                    <table id="datatable-buttons" class="table table-responsive table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>Sıra</th>
                            <th>Sayfa Adı</th>
                            <th>Gösterildiği Yerler</th>
                            <th>Görünürlük</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>

                            <th>İşlemler</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->order }}</td>
                                <td>{{ $page->title }}</td>
                                <td>
                                    @if($page->header)
                                        <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Anasayfada Göster">
                                            Header
                                        </span>
                                    @endif
                                    @if($page->footer)
                                        <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Footerda Göster">
                                            Footer
                                        </span>
                                    @endif
                                    @if($page->navbar)
                                        <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Menüde Göster">
                                            Navbar
                                        </span>
                                    @endif

                                </td>
                                <td>
                                    @if($page->is_active)
                                        <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Görünür">
                                            Görünür
                                        </span>
                                    @else
                                        <span class="badge bg-soft-danger text-danger" data-toggle="tooltip" title="Görünmez">
                                            Görünmez
                                        </span>
                                    @endif
                                </td>
                                <td>
                                     <span class="badge bg-soft-success text-success" data-toggle="tooltip" title="Oluşturma Tarihi">
                                        {{ changingDateTimeFormat($page->created_at) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-soft-info text-info" data-toggle="tooltip" title="Güncelleme Tarihi">
                                        {{ changingDateTimeFormat($page->updated_at) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.page.edit', ['page' => $page]) }}" target="_blank" class="btn btn-info btn-sm waves-effect waves-light">Düzenle</a>
                                    <a data-id="{{ $page->id }}" class="btn btn-danger btn-sm waves-effect waves-light removePage">Sil</a>
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

        $(document).ready(function () {
            $('.removePage').click(function () {
                let id = $(this).data('id');
                 $.ajax({
                     url: '{{ route('admin.page.destroy') }}',
                     type: 'POST',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                     success: function (response) {
                         if (response.status === 'success'){
                             setTimeout(function (){
                                 window.location.href = '{{ route('admin.page.index') }}';
                             }, 1000);
                         }else{
                             setTimeout(function (){
                                 window.location.href = '{{ route('admin.page.index') }}';
                             }, 1000);
                         }
                    }
                 })
            })
        })

    </script>

@endsection
