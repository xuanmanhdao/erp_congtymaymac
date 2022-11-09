<!-- ========== Left Sidebar Start ========== -->

<div class="left-side-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Công ty may mặc</li>

            <li class="side-nav-item">
                <a href="{{ route('kehoach.index') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span class="badge badge-success float-right"></span>
                    <span>Quản lý kế hoạch</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('quytrinh.index') }}"class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Quản lý quy trình  </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('nguyenvatlieu.index') }}"class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Quản lý nguyên vật liệu </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('donviphanphoi.index') }}"class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Quản lý đơn vị phân phối </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('nhapkho.index') }}"class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Quản nhập kho </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('chitietnhapkho.index') }}"class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Quản lý chi tiết  nhập kho </span>
                </a>
            </li>


            {{-- <li class="side-nav-item"> có thể cụp mở
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Quản lý phòng </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="">Phòng</a>
                    </li>
                    <li>
                        <a href="">Loại phòng</a>
                    </li>
                    
                </ul>
            </li>  --}}
            <li class="side-nav-item">
                <a href="{{ route('xuong.index') }}"class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Quản lý Xưởng </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('vattu.index') }}"class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Quản lý Vật Tư </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="#"class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Giám sát </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="#"class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Báo cáo </span>
                </a>
            </li>
            {{-- @if(checkSuperAdmin())
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span> Quản lý nhân viên </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ route('nhan-vien.index') }}">Nhân viên</a>
                    </li>
                    <li>
                        <a href="{{ route('chuc-vu.index') }}">Chức vụ</a>
                    </li>
                </ul>
            </li>
            @endif --}}


        </ul>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
