Q<div class="header__bottom">
    <div class="container custom-conatiner">
        <div class="row g-0 align-items-center">
            <div class="col-lg-3">
                <div class="cat__menu-wrapper side-border d-none d-lg-block">
                    <div class="cat-toggle">
                        <button type="button" class="cat-toggle-btn cat-toggle-btn-1"><i class="fal fa-bars"></i> Kategoriler</button>
                        <div class="cat__menu-2 cat__menu">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                    @foreach($_categories as $category)
                                        <li>
                                            <a href="{{ route('front.product.category', ['slug' =>$category->slug]) }}">{{ $category->name }}
                                                @if($category->children()->count() > 0 )
                                                    <i class="far fa-angle-down"></i>
                                                @endif
                                            </a>
                                            @if($category->children()->count() > 0 )
                                                <ul class="mega-menu mega-menu-2">
                                                    @foreach($category->children()->get() as $subCcategory)
                                                        <li>
                                                            <ul class="mega-item">
                                                                <li><a href="{{ route('front.product.category', ['slug' =>$subCcategory->slug]) }}">{{ $subCcategory->name }}</a></li>
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-3">
                <div class="header__bottom-left d-flex d-xl-block align-items-center">
                    <div class="side-menu d-lg-none mr-20">
                        <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i class="fas fa-bars"></i></button>
                    </div>
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul>
                                <li>
                                    <a
                                        href="{{ route('index') }}"
                                        @if(route('index') == request()->fullUrl())
                                            class="active"
                                        @endif
                                    >
                                        Anasayfa
                                    </a>
                                </li>
                                @foreach($_navbarPages as $_navbarPage)
                                    <li>
                                        <a
                                            href="{{ route('front.page.index', ['slug' => $_navbarPage->slug]) }}"
                                            @if(route('front.page.index', ['slug' => $_navbarPage->slug]) == request()->fullUrl())
                                                class="active"
                                            @endif
                                        >
                                            {{ $_navbarPage->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-9">
                <div class="shopeing-text text-sm-end">
                    <p>Spend $120 more and get free shipping!</p>
                </div>
            </div>
        </div>
    </div>
</div>
