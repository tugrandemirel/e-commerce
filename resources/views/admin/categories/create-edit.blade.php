@extends('admin.layouts.app')
@section('title', isset($category) ? 'Kategori Düzenle' : 'Kategori Ekle')
@section('styles')
    <link href="{{ asset('assets/admin/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <form action="{{ isset($category) ? route('admin.categories.update', ['category' => $category]) : route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <h4 class="header-title">{{ isset($category) ? 'Kategori Düzenle' : 'Kategori Ekle' }}</h4>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Kategori Adı</label>
                            <input type="text" id="example-input-small" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{ isset($category) ? $category->name :old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Status</label>
                            <input type="checkbox" class="form-check-input" id="example-input-small"  name="status" {{ isset($category) ? "checked" :'' }}>
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Görsel</label>
                            <input type="file" id="example-input-small"  name="image"  class="form-control form-control-sm" >
                        </div>
                        @isset($category)
                            <div class="mb-3">

                                <img src="{{ asset($category->image) }}" alt=" {{  $category->name  }}" class="img-fluid rounded">
                            </div>
                        @endisset
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Meta Başlık</label>
                            <input type="text" name="meta_title" value="{{ isset($category) ? $category->meta_title :old('meta_title') }}" class="form-control form-control-sm @error('meta_title') is-invalid @enderror" >
                            @error('meta_title')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Meta Açıklama</label>
                            <textarea type="checkbox"  name="meta_description" rows="5" class="form-control form-control-sm @error('meta_description') is-invalid @enderror" >{{ isset($category) ? $category->meta_description :old('meta_description') }}</textarea>
                            @error('meta_description')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Anahtar Kelime</label>
                                <input type="text" id="selectize-tags" class="form-control form-control-sm @error('meta_keywords') is-invalid @enderror"  name="meta_keywords" value="{{ isset($category) ? $category->meta_keywords :old('meta_keywords') }}" >
                                @error('meta_keywords')
                                <div class="invalid-feedback">
                                    {{  $message }}
                                </div>
                                @enderror
                            </div>
                    </div> <!-- end card-body -->
                    <div class="card-footer">
                        <div class="mb-3">
                            <button class="btn btn-success btn-block">Kaydet</button>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/libs/selectize/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/mohithg-switchery/switchery.min.js') }}"></script>
@endsection

