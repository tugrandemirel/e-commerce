@extends('admin.layouts.app')
@section('title','Kategoriler')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                    <a href="{{ route('admin.categories.sub.create') }}" class="btn btn-success">+</a>

                    </div>
                    <h4 class="mt-0 header-title">Kategoriler</h4>
                    <p class="text-muted font-14 mb-3">
                        Bu sayfadan <b>Kategori</b> eklenebilir güncellenebilir ve silinebilir. Buradaki işlemleri sadece admin olanlar yapabilmektedir.
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori Adı</th>
                                <th>Durum</th>
                                <th>Sıra</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($subCategories) > 0)
                            @foreach($subCategories as $subCategory)
                            <tr>
                                <th scope="row">#{{ $subCategory->id }}</th>

                                <td>{{ $subCategory->name }}</td>
                                <td>{{ $subCategory->status }}</td>
                                <td>{{ $subCategory->order }}</td>
                                <td>{{ $subCategory->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.sub.edit', ['subCategory' => $subCategory]) }}" class="btn btn-sm btn-primary">Düzenle</a>
                                    <a href="{{ route('admin.categories.sub.destroy', ['subCategory' => $subCategory]) }}" class="btn btn-sm btn-danger">Sil</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center">Henüz <b>Kategori</b> tanımlanmamış.</td>
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
