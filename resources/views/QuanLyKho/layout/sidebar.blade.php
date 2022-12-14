<div class="nav">
    <ul>
        {{-- <li class="nav-items nav-active">
            <a href="{{ route('loaisanpham.index') }}">
                Quản lý loại sản phẩm
            </a>
        </li>
        <li class="nav-items">
            <a href="{{ route('nhapsanpham.index') }}">
                Quản lý nhập sản phẩm
            </a>
        </li>
        <li class="nav-items">
            <a href="{{ route('sanpham.index') }}">
                Quản lý sản phẩm tồn kho
            </a>
        </li>
        <li class="nav-items">
            <a href="{{ route('donviphanphoi.index') }}">
                Quản lý đơn vị cung cấp
            </a>
        </li>
        <li class="nav-items">
            <a href="{{ route('loainguyenvatlieu.index') }}">
                Quản lý loại nguyên vật liệu
            </a>
        </li>
        <li class="nav-items">
            <a href="{{ route('nhapnguyenlieu.index') }}">
                Quản lý nhập nguyên vật liệu
            </a>
        </li>
        <li class="nav-items">
            <a href="{{ route('nguyenvatlieu.index') }}">
                Quản lý nguyên vật liệu tồn kho
            </a>
        </li>  --}}

        {{-- <li class="nav-items">
            <a href="#">
                Xuất hàng
            </a>
        </li>
        <li class="nav-items">
            <a href="#">
                Kiểm kê hàng hoá
            </a>
        </li>
        <li class="nav-items">
            <a href="#">
                Báo cáo
            </a>
        </li> --}}

        <li class="nav-items dropright">
            <a href="javascript:void(0)" class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" style="white-space: inherit !important;">
                Báo cáo - Thống kê
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="sub-menu-content" href="{{ route('baocao.nguyenvatlieu') }}">
                        Nguyên vật liệu
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="sub-menu-content" href="{{ route('baocao.nguyenvatlieu') }}">
                        Sản phẩm
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-items dropright">
            <a href="javascript:void(0)" class="dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="white-space: inherit !important;">
                Quản lý kho nguyên vật liệu
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="sub-menu-content" href="{{ route('donviphanphoi.index') }}">
                        Quản lý đơn vị cung cấp
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="sub-menu-content" href="{{ route('loainguyenvatlieu.index') }}">
                        Quản lý loại nguyên vật liệu
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="sub-menu-content" href="{{ route('nhapnguyenlieu.index') }}">
                        Quản lý nhập nguyên vật liệu
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="sub-menu-content" href="{{ route('nguyenvatlieu.index') }}">
                        Quản lý nguyên vật liệu tồn kho
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-items dropright">
            <a href="javascript:void(0)" class="dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="white-space: inherit !important;">
                Quản lý kho sản phẩm
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="sub-menu-content" href="{{ route('loaisanpham.index') }}">
                        Quản lý loại sản phẩm
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="sub-menu-content" href="{{ route('nhapsanpham.index') }}">
                        Quản lý nhập sản phẩm
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="sub-menu-content" href="{{ route('sanpham.index') }}">
                        Quản lý sản phẩm tồn kho
                    </a>
                </li>
            </ul>
        </li>

        {{-- <li class="nav-items">
            <a href="{{ route('baocao.index') }}">
                Báo cáo
            </a>
        </li> --}}
    </ul>
</div>
