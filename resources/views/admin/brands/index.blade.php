@extends('admin.layouts.app')
@section('title','Markalar')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                    <a href="{{ route('admin.brands.create') }}" class="btn btn-success">+</a>

                    </div>
                    <h4 class="mt-0 header-title">Markalar</h4>
                    <p class="text-muted font-14 mb-3">
                        Bu sayfadan <b>Marka</b> eklenebilir güncellenebilir ve silinebilir. Buradaki işlemleri sadece admin olanlar yapabilmektedir.
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resim</th>
                                <th>Marka Adı</th>
                                <th>Durum</th>
                                <th>Sıra</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($brands) > 0)
                            @foreach($brands as $brand)
                            <tr>
                                <th scope="row">#{{ $brand->id }}</th>
                                <td>
                                    <img src="{{ asset( $brand->image ) }}" alt="{{ $brand->name }}" class="img-fluid" width="100">
                                </td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->status }}</td>
                                <td>{{ $brand->order }}</td>
                                <td>{{ $brand->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.brands.edit', ['brand' => $brand]) }}" class="btn btn-sm btn-primary">Düzenle</a>
                                    <a href="{{ route('admin.brands.destroy', ['brand' => $brand]) }}" class="btn btn-sm btn-danger">Sil</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center">Henüz <b>Marka</b> tanımlanmamış.</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
