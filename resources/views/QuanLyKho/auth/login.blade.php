<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('library/bootstrap-5.2.2-dist/css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <link href="{{ asset('css/quanlykho/login.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="wrapper">
        <div class="glass">

        </div>
        <div class="content d-flex justify-content-center align-items-center flex-column">
            <div class="header-content">
                <img src="{{ asset('img/quanlykho/login_logo.png') }}" alt="">
            </div>

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="main-content">
                <h2>Đăng Nhập</h2>

                <form action="{{ route('duyetdangnhap') }}" method="post">
                    @csrf
                    <div class="login-form">
                        @if ($errors->has('MaNhanVien'))
                            <span class="text-danger">{{ $errors->first('MaNhanVien') }}</span>
                        @endif
                        <div class="login-input">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="text" value="{{ old('MaNhanVien') }}" placeholder="Mã nhân viên" class=""
                                name="MaNhanVien">
                        </div>
                        @if ($errors->has('MatKhau'))
                            <span class="text-danger">{{ $errors->first('MatKhau') }}</span>
                        @endif
                        <div class="login-input">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" value="{{ old('MatKhau') }}" placeholder="......" name="MatKhau">
                        </div>
                        <div class="login-options d-flex justify-content-between">
                            <div>
                                <input type="checkbox" id="remember">
                                <label for="remember">Ghi nhớ tài khoản</label>
                            </div>
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <div class="login-button">
                        <button type="submit">Đăng Nhập</button>
                    </div>


                </form>
            </div>
        </div>
    </div>



    <script src="{{ asset('library/bootstrap-5.2.2-dist/js/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/fb15251dc0.js" crossorigin="anonymous"></script>

</body>

</html>
