@extends('seller.layouts.app')
@section('title', $product->title)
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('assets/admin/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" integrity="sha512-WvVX1YO12zmsvTpUQV8s7ZU98DnkaAokcciMZJfnNWyNzm7//QRV61t4aEr0WdIa4pe854QHLTV302vH92FSMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .header-color{
            background-color: #92c7fa !important;
        }
    </style>
@endsection
@section('content')
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header header-color" >
                        Genel Özellikler
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Ürün Adı</label>
                            <input type="text" id="example-input-small" name="title" class="readonly form-control form-control-sm @error('title') is-invalid @enderror" value="{{ isset($product) ? $product->title : old('title') }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small2" class="form-label">Ürün Açıklaması</label>
                            <textarea type="text" id="example-input-small2" name="description" rows="5" class="readonly form-control form-control-sm @error('description') is-invalid @enderror">{{ isset($product) ? $product->title : old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small2" class="form-label">Kısa Açıklaması</label>
                            <textarea type="text" id="example-input-small2" name="short_description" rows="3" class="readonly form-control form-control-sm @error('short_description') is-invalid @enderror">{{ isset($product) ? $product->title : old('short_description') }}</textarea>
                            @error('short_description')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small2" class="form-label">Kategori</label>
                            <select name="category_id" class="readonly form-control @error('category_id') is-invalid @enderror" id="cat_id">
                                <option value="">{{ $category[0]->name }}</option>
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="example-input-small2" class="form-label">Marka</label>
                            <select name="brand_id" class="readonly form-control @error('brand_id') is-invalid @enderror" id="">
                                <option value="">{{ $brand[0]->name }}</option>

                            </select>
                            @error('brand_id')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small2" class="form-label">Stok Durumu</label>

                            <select name="stock" class="readonly form-control @error('stock') is-invalid @enderror" id="">
                                <option
                                    @if(isset($product) && $product->stock == \App\Enum\Product\ProductEnum::STOCK_PASSIVE) selected @endif
                                @if(old('stock') == \App\Enum\Product\ProductEnum::STOCK_PASSIVE) selected @endif
                                    value="0">
                                    Yok
                                </option>
                                <option
                                    @if(isset($product) && $product->stock == \App\Enum\Product\ProductEnum::STOCK_ACTIVE) selected @endif
                                @if(old('stock') == \App\Enum\Product\ProductEnum::STOCK_ACTIVE) selected @endif
                                    value="1">
                                    Var
                                </option>
                            </select>
                            @error('stock')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small2" class="form-label">Müşteriye Göster</label>
                            <select name="visibility" class="readonly form-control @error('visibility') is-invalid @enderror" id="">
                                <option
                                    @if(isset($product) && $product->visibility == \App\Enum\Product\ProductEnum::VISIBILITY_PASSIVE) selected @endif
                                @if(old('visibility') == \App\Enum\Product\ProductEnum::VISIBILITY_PASSIVE) selected @endif
                                    value="0">
                                    Hayır
                                </option>
                                <option
                                    @if(isset($product) && $product->visibility == \App\Enum\Product\ProductEnum::VISIBILITY_ACTIVE) selected @endif
                                @if(old('visibility') ==  \App\Enum\Product\ProductEnum::VISIBILITY_ACTIVE) selected @endif
                                    value="1">
                                    Evet
                                </option>
                            </select>
                            @error('visibility')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small2" class="form-label">Öne Çıkar</label>
                            <div class="input-group">
                                <select name="push_on" class="readonly form-control @error('push_on') is-invalid @enderror" id="">
                                    <option
                                        @if(isset($product) && $product->push_on == \App\Enum\Product\ProductEnum::PUSH_ON_PASSIVE) selected @endif
                                    @if(old('push_on') == \App\Enum\Product\ProductEnum::PUSH_ON_PASSIVE) selected @endif
                                        value="0">
                                        Hayır
                                    </option>
                                    <option


                                        @if(old('push_on') == \App\Enum\Product\ProductEnum::PUSH_ON_ACTIVE) selected @endif
                                    value="1">
                                        Evet
                                    </option>
                                </select>
                                <span class="input-group-text question" data-toggle="tooltip" title="Detaylı bilgi için tıklayınız." id="basic-addon1"><i class="fas fa-question-circle"></i></span>
                            </div>
                            @error('push_on')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small2" class="form-label">Ürün Durumu</label>

                            <select name="status" class="readonly form-control @error('status') is-invalid @enderror" id="">
                                <option
                                    @if(isset($product) && $product->status == \App\Enum\Product\ProductEnum::STATUS_NEW) selected @endif
                                @if(old('status') == \App\Enum\Product\ProductEnum::STATUS_NEW) selected @endif
                                    value="0">
                                    Sıfır Ürün
                                </option>
                                <option
                                    @if(isset($product) && $product->status == \App\Enum\Product\ProductEnum::STATUS_RENEWED) selected @endif
                                @if(old('status') == \App\Enum\Product\ProductEnum::STATUS_RENEWED) selected @endif
                                    value="2">
                                    İkinci El Ürün
                                </option>
                                <option
                                    @if(isset($product) && $product->status == \App\Enum\Product\ProductEnum::STATUS_SECONDHAND) selected @endif
                                @if(old('status') == \App\Enum\Product\ProductEnum::STATUS_SECONDHAND) selected @endif
                                    value="1">
                                    Kullanılmış/Yenilenmiş Ürün
                                </option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Başlangıç Fiyatı</label>
                            <div class="input-group">

                                <input type="number" class="readonly form-control @error('price') is-invalid @enderror" name="price" placeholder="Fiyat" value="{{ isset($product) ? $product->price : old('price') }}" aria-label="Fiyat" aria-describedby="basic-addon1">
                                <span class="input-group-text" id="basic-addon1" data-toggle="tooltip" title="Coin Cinsinden" ><i class="fas fa-coins"></i></span>
                            </div>
                            @error('price')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header header-color">
                                Ürün Bilgileri
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Preview -->
                                                <div class="row ">
                                                    @if($product->hasMedia('images'))
                                                        @php
                                                            $images = $product->getMedia('images');
                                                        @endphp
                                                        @foreach($images as  $image)
                                                            <div class="col-md-3">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <a href="{{ $image->getUrl() }}" target="_blank">
                                                                            <img src="{{ $image->getUrl() }}" class="img-fluid" width="85">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="col-md-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <img src="https://static.vecteezy.com/system/resources/thumbnails/016/808/173/small/camera-not-allowed-no-photography-image-not-available-concept-icon-in-line-style-design-isolated-on-white-background-editable-stroke-vector.jpg" class="img-fluid" width="85">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-input-small" class="form-label">Başlangıç Tarihi</label>
                                                    <input type="date" name="start_date" id="example-input-small" value="{{ isset($product) ? $product->start_date : old('start_date') }}" class="readonly form-control form-control-sm @error('start_date') is-invalid @enderror">
                                                    @error('start_date')
                                                    <div class="invalid-feedback">
                                                        {{  $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-input-small" class="form-label">Bitiş Tarihi</label>
                                                    <input type="date" name="end_date" id="example-input-small" value="{{ isset($product) ? $product->end_date : old('end_date') }}" class="readonly form-control form-control-sm @error('end_date') is-invalid @enderror">
                                                    @error('end_date')
                                                    <div class="invalid-feedback">
                                                        {{  $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div><!-- end col -->
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header header-color">
                                Meta Özellikler
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="example-input-small" class="form-label">Meta Başlık</label>
                                    <input type="text" id="example-input-small" name="meta_title" value="{{ isset($product) ? $product->meta_title : old('meta_title') }}" class="readonly form-control form-control-sm  @error('meta_title') is-invalid @enderror">
                                    @error('meta_title')
                                    <div class="invalid-feedback">
                                        {{  $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="example-input-small2" class="form-label">Meta Açıklaması</label>
                                    <textarea type="text" id="example-input-small2" name="meta_description" rows="5" class="readonly form-control form-control-sm @error('meta_description') is-invalid @enderror">{{ isset($product) ? $product->meta_description : old('meta_description') }}</textarea>
                                    @error('meta_description')
                                    <div class="invalid-feedback">
                                        {{  $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="example-input-small" class="form-label">Meta Keywords</label>
                                    <input type="text" id="example-input-small" name="meta_keywords" value="{{ isset($product) ? $product->meta_keywords : old('meta_keywords') }}" class="readonly form-control form-control-sm @error('meta_keywords') is-invalid @enderror">
                                    @error('meta_keywords')
                                    <div class="invalid-feedback">
                                        {{  $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <button class="btn btn-success btn-sm" onclick="document.getElementById('approve').submit()">Onayla</button>
                                <form id="approve" action="{{ route('admin.product.approve', ['product' => $product]) }}" method="POST">
                                    @csrf
                                </form>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Reddet
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ürün Red Etme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.product.reject', ['product' => $product]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="example-input-small" class="form-label">Red Sebebi</label>
                            <textarea id="example-input-small" rows="5" name="feedback" value="{{ isset($product) ? $product->feedback : old('feedback') }}" class=" form-control form-control-sm @error('feedback') is-invalid @enderror"></textarea>
                            @error('feedback')
                            <div class="invalid-feedback">
                                {{  $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).ready(function () {
            $('.question').click(function (){
                $('#centermodal').modal('show');
            });

        });

        $('.readonly').attr("readonly","true").css('background-color','#fff');
    </script>
@endsection