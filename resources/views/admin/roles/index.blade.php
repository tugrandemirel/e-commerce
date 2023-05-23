@extends('admin.layouts.app')
@section('title','Roller')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal">+</a>

                    </div>
                    <h4 class="mt-0 header-title">Roller</h4>
                    <p class="text-muted font-14 mb-3">
                        Bu sayfadan <b>Rol</b> eklenebilir güncellenebilir ve silinebilir. Buradaki işlemleri sadece admin olanlar yapabilmektedir.
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Adı</th>
                                <th>Oluşturuma Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($roles) > 0)
                            @foreach($roles as $role)
                            <tr>
                                <th scope="row">#{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary">Düzenle</a>
                                    <a href="" class="btn btn-sm btn-danger">Sil</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">Henüz rol tanımlanmamış.</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- end row -->
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Rol EKle</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.roles.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-1" class="form-label">Rol Adı</label>
                                    <input type="text" class="form-control" id="field-1" name="name" placeholder="Admin">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if(session()->has('success'))
        <script>
            $(document).ready(function () {
                $('.successModal').modal('show');
            });
        </script>
        <div class="modal fade successModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content modal-filled bg-success">
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="dripicons-checkmark h1 text-white"></i>
                            <h4 class="mt-2 text-white">Başarılı!</h4>
                            <p class="mt-3 text-white">İşleminiz başarılı bir şekilde gerçekleştirilmiştir.</p>
                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">Devam Et</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif

@endsection
