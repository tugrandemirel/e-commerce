@extends('seller.layouts.app')
@section('title', 'Ürün Ekle')
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
    <form action="{{ route('seller.product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header header-color" >
                        Genel Özellikler
                    </div>
                    <div class="card-body">
                            <div class="mb-3">
                                <label for="example-input-small" class="form-label">Ürün Adı</label>
                                <input type="text" id="example-input-small" name="title" class="form-control form-control-sm @error('title') is-invalid @enderror" value="{{old('title')}}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{  $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="example-input-small2" class="form-label">Ürün Açıklaması</label>
                                <textarea type="text" id="example-input-small2" name="description" rows="5" class="form-control form-control-sm @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{  $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="example-input-small2" class="form-label">Kısa Açıklaması</label>
                                <textarea type="text" id="example-input-small2" name="short_description" rows="3" class="form-control form-control-sm @error('short_description') is-invalid @enderror">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">
                                        {{  $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="example-input-small2" class="form-label">Kategori</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="cat_id">
                                    <option value="">Kategori Seçiniz</option>
                                    @foreach($categories as $category)
                                        <option @if(old('category_id') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{  $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3" id="subCat">
                                <label for="example-input-small2" class="form-label">Alt Kategori</label>
                                <select name="sub_category_id" class="form-control @error('sub_category_id') is-invalid @enderror" id="subCat_id">
                                </select>
                                @error('sub_category_id')
                                <div class="invalid-feedback">
                                    {{  $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="example-input-small2" class="form-label">Marka</label>
                                <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror" id="">
                                    <option value="">Marka Seçiniz</option>
                                    @foreach($brands as $brand)
                                        <option @if(old('brand_id') == $category->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{  $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="example-input-small2" class="form-label">Stok Durumu</label>
                                <select name="stock" class="form-control @error('stock') is-invalid @enderror" id="">
                                    <option @if(old('stock') == 0) selected @endif value="0">Yok</option>
                                    <option @if(old('stock') == 1) selected @endif value="1">Var</option>
                                </select>
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{  $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="example-input-small2" class="form-label">Müşteriye Göster</label>
                                <select name="visibility" class="form-control @error('visibility') is-invalid @enderror" id="">
                                    <option @if(old('visibility') == 0) selected @endif  value="0">Hayır</option>
                                    <option @if(old('visibility') == 1) selected @endif  value="1">Evet</option>
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
                                    <select name="push_on" class="form-control @error('push_on') is-invalid @enderror" id="">
                                        <option @if(old('push_on') == 0) selected @endif   value="0">Hayır</option>
                                        <option @if(old('push_on') == 1) selected @endif   value="1">Evet</option>
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
                                <select name="status" class="form-control @error('status') is-invalid @enderror" id="">
                                    <option @if(old('status') == 0) selected @endif value="0">0 Ürün</option>
                                    <option @if(old('status') == 1) selected @endif value="1">İkinci El Ürün</option>
                                    <option @if(old('status') == 2) selected @endif value="1">Yenilenmiş Ürün</option>
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

                                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Fiyat" value="{{ old('price') }}" aria-label="Fiyat" aria-describedby="basic-addon1">
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
                                                <div class="mb-3 ">
                                                    <div class="needsclick dropzone @error('document') is-invalid  @enderror" id="document-dropzone">
                                                        <h4 class="header-title">Ürün Resimleri Seçiniz</h4>
                                                        <p class="sub-header">
                                                            Lütfen resimleri sırayla görünecek şekilde seçiniz.
                                                        </p>
                                                        <div class="dz-message needsclick">
                                                            <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                            <h3>Lütfen yüklenecek dosyaları seçiniz.</h3>
                                                        </div>
                                                        @error('price')
                                                        <div class="invalid-feedback">
                                                            {{  $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="example-input-small" class="form-label">Başlangıç Tarihi</label>
                                                    <input type="date" name="start_date" id="example-input-small" value="{{ old('start_date') }}" class="form-control form-control-sm @error('start_date') is-invalid @enderror">
                                                    @error('start_date')
                                                    <div class="invalid-feedback">
                                                        {{  $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-input-small" class="form-label">Bitiş Tarihi</label>
                                                    <input type="date" name="end_date" id="example-input-small" value="{{ old('end_date') }}" class="form-control form-control-sm @error('end_date') is-invalid @enderror">
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
                                <input type="text" id="example-input-small" name="meta_title" value="{{ old('meta_title') }}" class="form-control form-control-sm  @error('meta_title') is-invalid @enderror">
                                 @error('meta_title')
                                    <div class="invalid-feedback">
                                        {{  $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="example-input-small2" class="form-label">Meta Açıklaması</label>
                                <textarea type="text" id="example-input-small2" name="meta_description" rows="5" class="form-control form-control-sm @error('meta_description') is-invalid @enderror">{{old('meta_description')}}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback">
                                        {{  $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="example-input-small" class="form-label">Meta Keywords</label>
                                <input type="text" id="example-input-small" name="meta_keywords" value="{{ old('meta_keywords') }}" class="form-control form-control-sm @error('meta_keywords') is-invalid @enderror">
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
                       <div class="row justify-content-center">
                           <button class="btn btn-success btn-sm">TEST</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="centermodal" tabindex="-1" aria-modal="true" role="dialog" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Öne Çıkar</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Öne Çıkar Hakkında</h5>
                    <p>Ürün öne çıkarma işleminiz tarafımız tarafından onaylandıktan sonra sipariş verildikten sonra kazanılan Coin üzerinden %5 oranında kesinti yapılmasını sağlamaktadır..</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('seller.product.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            maxFiles: 10,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($product) && $product->document)
                var files =
                    {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).ready(function () {
            $('.question').click(function (){
                $('#centermodal').modal('show');
            });

        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#subCat').hide();
            $('#cat_id').change(function () {
                $('#subCat_id').empty();
                var cat_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '{{ route('seller.product.getSubCat') }}',
                    data: {'category_id': cat_id},
                    success: function (data) {
                        console.log(data)
                        if (data == 0) {
                            $('#subCat').hide();
                        } else{
                            $('#subCat').show();
                            $('#subCat_id').append(data);
                        }
                    }
                })
            })
        })
    </script>
@endsection
