@extends('layouts.app')
@section('title', 'Beğenilenler')
@section('styles')
@endsection
@section('content')
    <!-- page-banner-area-start -->
    <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Wishlist</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="index.html"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Wishlist</span>
                                        </li>
                                    </ul>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-banner-area-end -->

    <!-- cart-area-start -->
    <section class="cart-area pb-120 pt-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Resim</th>
                                    <th class="cart-product-name">Ürün</th>
                                    <th class="cart-product-name">Marka</th>
                                    <th class="product-price">Açık Artırma Başlangıç Fiyatı</th>
                                    <th class="product-price">Açık Artırma Bitiş Tarihi</th>
                                    <th class="product-remove">Kaldır</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($wishlists->count() > 0)
                                @foreach($wishlists as $wishlist)
                                    <tr>
                                        @if ($wishlist->product->hasMedia('images'))
                                        <td class="product-thumbnail"><a href="{{ route('front.product.detail', ['slug' => $wishlist->product->slug]) }}"><img src="{{ $wishlist->product->getFirstMedia('images')->getUrl() }}" alt=""></a></td>
                                        @else
                                        <td class="product-thumbnail"><a href="{{ route('front.product.detail', ['slug' => $wishlist->product->slug]) }}"><img src="" alt=""></a></td>
                                        @endif
                                        <td class="product-name"><a href="{{ route('front.product.detail', ['slug' => $wishlist->product->slug]) }}">{{ $wishlist->product->title }}</a></td>
                                        <td class="product-name"><a href="#">{{ $wishlist->product->brand->name }}</a></td>
                                        <td class="product-price"><span class="amount">{{ $wishlist->product->price }}</span></td>
                                        <td class="product-price"><span class="amount">{{ monthChangingDateFormat($wishlist->product->ended_date) <= date('D-M-Y') ? 'Süresi Doldu' : monthChangingDateFormat($wishlist->product->ended_date) }}</span></td>
                                        <td class="product-remove"><a class="deleteWishlist" data-wishlist-id="{{ $wishlist->id }}"><i class="fa fa-times remove-wishlist"></i></a></td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Beğenilen ürün bulunmamaktadır.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- cart-area-end -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.deleteWishlist').click(function () {
                event.preventDefault();
                var wishlistId = $(this).data('wishlist-id');
                $.ajax({
                    url: '{{ route('front.wishlist.destroy') }}',
                    type: 'POST',
                    data: {
                        wishlistId: wishlistId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.success);
                            location.reload();
                        }
                        if(response.error) {
                            toastr.success(response.error);
                            location.reload();
                        }
                    }
                })
            })

        })
    </script>
    <script>
        $(document).ready(function () {
            $removeWishlist = document.querySelectorAll('.remove-wishlist');
            console.log($removeWishlist.length)
            for (let i = 0; i < $removeWishlist.length; i++) {
                $removeWishlist[i].addEventListener('mouseenter', function() {
                    $removeWishlist[i].style.color = 'red';
                    $removeWishlist[i].style.cursor = 'pointer';
                })
                $removeWishlist[i].addEventListener('mouseleave', function() {
                    $removeWishlist[i].style.color = '#666';
                })
            }
        })
    </script>
@endsection
