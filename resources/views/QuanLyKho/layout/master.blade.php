<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <link rel="stylesheet" href="{{ asset('library/quanlykho/bootstrap-5.2.2-dist/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/quanlykho/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/quanlykho/layouts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/quanlykho/product.css') }}" rel="stylesheet" type="text/css">
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


    <script src="{{ asset('library/quanlykho/jQuery.min.js') }}"></script>
    <script src="{{ asset('library/quanlykho/bootstrap-5.2.2-dist/js/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/fb15251dc0.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/quanlykho/main.js') }}"></script>

    @stack('js')
</body>


</html>
