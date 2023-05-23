
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="assets/admin/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">Nowak Helme</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">Admin Head</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <li>
                <a href="{{ route('admin.brands.index') }}" >
                    <i class="mdi mdi-hand-left"></i>
                    <span> Marka </span>

                </a>
            </li>
            <ul id="side-menu">
                <li>
                    <a href="#email" data-bs-toggle="collapse">
                        <i class="mdi mdi-hand-left"></i>
                        <span> Rol </span>
                        <span class="menu-arrow"></span>
                    </a>
                <div class="collapse" id="email">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ route('admin.categories.index') }}">Ana Kategoriler</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.sub.index') }}">Alt Kategoriler</a>
                        </li>
                    </ul>
                </div>
                </li>
                <li class="menu-title mt-2">Yetkilendirme</li>
                <li>
                    <a href="#email" data-bs-toggle="collapse">
                        <i class="mdi mdi-hand-left"></i>
                        <span> Rol </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="email">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.roles.index') }}">Roller</a>
                            </li>
                            <li>
                                <a href="email-templates.html">Kullanıcı Rolleri</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
