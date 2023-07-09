<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-end mb-0">
        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="" class="text-dark">
                                                <small>Tümünü Temizle</small>
                                            </a>
                                        </span>Bildirimler
                    </h5>
                </div>

                <div class="noti-scroll" data-simplebar>

                    <!-- item-->
                    @foreach($_unreadNotifications as $_unreadNotification)
                    <a href="javascript:void(0);" class="dropdown-item notify-item @if($loop->first) active @endif">
                        <div class="notify-icon">
                            <img src="{{ asset($_unreadNotification->data['image']) }}" class="img-fluid rounded-circle" alt=""/>
                        </div>
                        <p class="notify-details">{{ $_unreadNotification->data['title'] }}</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>{{ $_unreadNotification->data['message'] }}</small>
                        </p>
                    </a>
                    @endforeach
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    Tümünü Görüntüle
                    <i class="fe-arrow-right"></i>
                </a>

            </div>
        </li>
        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
               href="#" role="button" aria-haspopup="false" aria-expanded="false">

                <span class="pro-user-name ms-1">
                                    {{$_seller->name}} <i class="mdi mdi-chevron-down"></i>
                                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Hoşgeldiniz !  </h6>
                    <span class="text-overflow m-0">{{ $_seller->user->name }} </span>
                </div>

                <!-- item-->
                <a href="contacts-profile.html" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Hesabım</span>
                </a>

                <!-- item-->
                <a href="auth-lock-screen.html" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Ekranı Kilitle</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a onclick="document.getElementById('logoutForm').submit();" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Çıkış Yap</span>
                </a>
                <form id="logoutForm" action="{{ route('logout') }}" method="post">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="assets/admin/images/logo-sm.png" alt="" height="22">
                            </span>
            <span class="logo-lg">
                                <img src="assets/admin/images/logo-light.png" alt="" height="16">
                            </span>
        </a>
        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="assets/admin/images/logo-sm.png" alt="" height="22">
                            </span>
            <span class="logo-lg">
                                <img src="assets/admin/images/logo-dark.png" alt="" height="16">
                            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            <h4 class="page-title-main">Dashboard</h4>
        </li>

    </ul>

    <div class="clearfix"></div>

</div>
<!-- end Topbar -->
