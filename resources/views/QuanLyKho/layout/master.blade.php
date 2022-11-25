<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">​
    <title>Product</title>

    <link rel="stylesheet" href="{{ asset('library/quanlykho/bootstrap-5.2.2-dist/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/quanlykho/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/quanlykho/layouts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/quanlykho/product.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('css')
</head>

<body>
    <div class="wrapper">
        <!-- ========== Header Start ========== -->
        @include('QuanLyKho.layout.header')
        <!-- ========== Header End ========== -->

        <!-- ========== Body Start ========== -->
        <div class="d-flex">

            <!-- ========== Sidebar Start ========== -->
            @include('QuanLyKho.layout.sidebar')
            <!-- ========== Sidebar End ========== -->

            <!-- ========== ContentPage Start ========== -->
            <div class="content">
                @yield('ContentPageQuanLyKho')
            </div>
            <!-- ========== ContentPage End ========== -->
        </div>
        <!-- ========== Body End ========== -->

        <!-- Footer Start -->
        @include('QuanLyKho.layout.footer')
        <!-- Footer End-->
    </div>
    @include('QuanLyKho.sanpham.modal-add-product')

    @include('QuanLyKho.loaisanpham.modal-add-type-product')
    @include('QuanLyKho.loaisanpham.modal-edit-type-product')

    @include('QuanLyKho.nhapkho.modal-add-bill-import-warehouse')
    @include('QuanLyKho.nhapkho.modal-edit-bill-import-warehouse')
    @include('QuanLyKho.nhapkho.modal-confirm-bill-import-warehouse')
    @include('QuanLyKho.nhapkho.modal-add-product-new')
    @include('QuanLyKho.nhapkho.modal-add-product-old')
    @include('QuanLyKho.nhapkho.modal-confirm-add-bill-import-warehouse')

    @include('QuanLyKho.loainguyenvatlieu.modal-add-ingredient-type')
    @include('QuanLyKho.loainguyenvatlieu.modal-edit-ingredient-type')

    @include('QuanLyKho.nhapkhonguyenlieu.modal-confirm-ingredient-exist')
    @include('QuanLyKho.nhapkhonguyenlieu.modal-add-ingredient-new')
    @include('QuanLyKho.nhapkhonguyenlieu.modal-confirm-bill-import-ingredient-warehouse-exist')
    @include('QuanLyKho.nhapkhonguyenlieu.modal-add-bill-import-ingredient-warehouse')
    @include('QuanLyKho.nhapkhonguyenlieu.modal-edit-bill-import-ingredient-warehouse')

    @include('QuanLyKho.donviphanphoi.modal-add-supplier')
    @include('QuanLyKho.donviphanphoi.modal-edit-supplier')



    <script src="{{ asset('library/quanlykho/jQuery.min.js') }}"></script>
    <script src="{{ asset('library/quanlykho/bootstrap-5.2.2-dist/js/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/fb15251dc0.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/quanlykho/main.js') }}"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @stack('js')
</body>


</html>
