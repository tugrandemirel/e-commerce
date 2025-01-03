
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ asset($_seller->image) }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">{{$_seller->name}}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>Hesabım</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Ayarlar</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Ekranı Kilitle</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Çıkış</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">{{ auth()->user()->name.' '. auth()->user()->surname}}</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a onclick="document.getElementById('logout').submit()">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
                <form action="{{ route('logout') }}" method="post" id="logout">
                    @csrf
                </form>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li>
                    <a href="#product" data-bs-toggle="collapse">
                        <i class="mdi mdi-hand-left"></i>
                        <span> Ürün </span>
                        <span class="menu-arrow"></span>
                    </a>
                <div class="collapse" id="product">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ route('seller.product.index') }}">Ürünler</a>
                        </li>
                        <li>
                            <a href="{{ route('seller.order.purchase') }}">Satın Alınan Ürünler</a>
                        </li>
                        <li>
                            <a href="{{ route('seller.order.cargo.index') }}">Kargo</a>
                        </li>
                        <li>
                            <a href="{{ route('seller.product.rejected') }}">Red Edilen Ürünler</a>
                        </li>
                    </ul>
                </div>
                </li>
                <li class="menu-title mt-2">Yetkilendirme</li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
