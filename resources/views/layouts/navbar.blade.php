<div class="header__bottom">
    <div class="container custom-conatiner">
        <div class="row g-0 align-items-center">
            <div class="col-lg-3">
                <div class="cat__menu-wrapper side-border d-none d-lg-block">
                    <div class="cat-toggle">
                        <button type="button" class="cat-toggle-btn cat-toggle-btn-1"><i class="fal fa-bars"></i> Kategoriler</button>
                        <div class="cat__menu-2 cat__menu">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                    <li>
                                        <a href="#">Bütün Kategoriler</a>
                                    </li>
                                    @foreach(\App\Models\Category::where('parent_id', 0)->where('status', \App\Enum\Category\CategoryEnum::STATUS_ACTIVE)->get() as $category)
                                        <li>
                                            <a href="{{ $category->slug }}">{{ $category->name }}
                                                @if(\App\Models\Category::where('parent_id', $category->id)->where('status', \App\Enum\Category\CategoryEnum::STATUS_ACTIVE)->count() > 0 )
                                                <i class="far fa-angle-down"></i>
                                                @endif
                                            </a>
                                            @if(\App\Models\Category::where('parent_id', $category->id)->where('status', \App\Enum\Category\CategoryEnum::STATUS_ACTIVE)->count() > 0 )
                                            <ul class="mega-menu mega-menu-2">
                                                @foreach(\App\Models\Category::where('parent_id', $category->id)->where('status', \App\Enum\Category\CategoryEnum::STATUS_ACTIVE)->get() as $subCcategory)
                                                <li>
                                                    <ul class="mega-item">
                                                        <li><a href="{{ $subCcategory->slug }}">{{ $subCcategory->name }}</a></li>
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
                                    <a href="index.html" class="active">Anasayfa</a>
                                </li>
                                <li><a href="about.html">Hakkımızda</a></li>
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
