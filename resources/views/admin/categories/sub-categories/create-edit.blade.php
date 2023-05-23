@extends('admin.layouts.app')
@section('title', isset($subCategory) ? 'Kategori Düzenle' : 'Kategori Ekle')
@section('styles')
    <link href="{{ asset('assets/admin/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- {{ isset($subCategory) ? route('admin.categories.update', ['category' => $subCategory]) : route('admin.categories.store') }} -->
    <form action="{{ isset($subCategory) ? route('admin.categories.sub.update', ['subCategory' => $subCategory]) : route('admin.categories.sub.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <h4 class="header-title">{{ isset($subCategory) ? 'Kategori Düzenle' : 'Kategori Ekle' }}</h4>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Ana Kategori</label>
                            <select class="form-control" name="parent_id" id="">
                                <option value="">Seçiniz</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ isset($subCategory) && $subCategory->parent_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Kategori Adı</label>
                            <input type="text" id="example-input-small" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{ isset($subCategory) ? $subCategory->name :old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Status</label>
                            <input type="checkbox" class="form-check-input" id="example-input-small"  name="status" {{ isset($subCategory) ? "checked" :'' }}>
                        </div>


                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Meta Başlık</label>
                            <input type="text" name="meta_title" value="{{ isset($subCategory) ? $subCategory->meta_title :old('meta_title') }}" class="form-control form-control-sm @error('meta_title') is-invalid @enderror" >
                            @error('meta_title')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Meta Açıklama</label>
                            <textarea type="checkbox"  name="meta_description" rows="5" class="form-control form-control-sm @error('meta_description') is-invalid @enderror" >{{ isset($subCategory) ? $subCategory->meta_description :old('meta_description') }}</textarea>
                            @error('meta_description')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Anahtar Kelime</label>
                                <input type="text" id="selectize-tags" class="form-control form-control-sm @error('meta_keywords') is-invalid @enderror"  name="meta_keywords" value="{{ isset($subCategory) ? $subCategory->meta_keywords :old('meta_keywords') }}" >
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

