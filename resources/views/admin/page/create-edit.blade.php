@extends('admin.layouts.app')
@section('title', isset($page) ? 'Sayfa Düzenle' : 'Sayfa Oluştur')
@section('styles')

@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($page) ? route('admin.page.update', ['page' => $page]) : route('admin.page.store') }}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="header-title">Sayfa Bilgileri</h4>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Sayfa Adı</label>
                                    <input type="text" id="simpleinput" name="title" value="{{ isset($page) ? $page->title : old('title') }}" class="form-control">
                                </div>

                                <h4 class="header-title mt-5 mt-sm-0">Sayfa Nerede Gösterilsin?</h4>
                                <div class="mt-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="header"
                                               @if(isset($page))
                                                   {{ $page->header ? "checked" :  old('header') }}
                                               @endif
                                               class="form-check-input" id="customCheck1">
                                        <label class="form-check-label"  for="customCheck1">Yukarda Göster</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="navbar"
                                               @if(isset($page))
                                                   {{ $page->navbar ? "checked" :  old('navbar') }}
                                               @endif
                                               class="form-check-input" id="customCheck21">
                                        <label class="form-check-label"  for="customCheck21">Sol Tarafta Göster</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="footer"
                                               @if(isset($page))
                                                  {{ $page->footer ? "checked" : old('footer') }}
                                               @endif
                                               class="form-check-input" id="customCheck2">
                                        <label class="form-check-label"  for="customCheck2">Aşağıda Göster</label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                <div class="form-check">
                                    <input type="checkbox" name="is_active"
                                           @if(isset($page))
                                               {{ $page->is_active ? "checked" :  old('is_active') }}
                                           @endif
                                           class="form-check-input" id="customCheck11">
                                    <label class="form-check-label"  for="customCheck11">Sayfa olarak göster</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="example-palaceholder" class="form-label">Meta Title</label>
                                <input type="text" id="example-palaceholder" class="form-control" value="{{ isset($page) ? $page->meta_title : old('meta_title') }}" name="meta_title" >
                            </div>

                            <div class="mb-3">
                                <label for="example-textarea" class="form-label">Meta Description</label>
                                <textarea class="form-control" id="example-textarea" name="meta_description" rows="5">{{ isset($page) ? $page->meta_description : old('meta_description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="example-palaceholder1" class="form-label">Meta Keywords</label>
                                <input type="text" id="example-palaceholder1" class="form-control" value="{{ isset($page) ? $page->meta_keywords : old('meta_keywords') }}" name="meta_keywords">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="example-textarea" class="form-label">Sayfa İçeriği</label>
                                <textarea class="form-control" id="pageContent" name="content" rows="15">{{ isset($page) ? $page->content : old('content') }}</textarea>
                            </div>
                        </div>
                    </div> <!-- end row -->
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Sayfa Oluştur</button>
                    </form>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="show"></div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // textarea id
            let content = document.getElementById('pageContent')

            // önlizme gösterileceği yer id
            let show = document.querySelector('.show')
            content.addEventListener('keydown', function() {
                let contentValue = content.value
                show.innerHTML = contentValue
            })
        })
    </script>
@endsection
