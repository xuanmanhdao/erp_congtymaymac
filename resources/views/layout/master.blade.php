<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    {{-- <title>{{ $title }}</title> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href={{ asset('/css/icons.min.css') }} rel="stylesheet" type="text/css" />
    <link href={{ asset('/css/app-creative.min.css') }} rel="stylesheet" type="text/css" />
    @stack('css')
</head>

<body
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    @include('layout.sidebar');
    <div class="wrapper">
        @include('layout.header');
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                {{-- <h4 class="page-title">{{ $title }}</h4> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class='col-12'>
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        
                                            {{ session()->get('success') }}
                                        
                                    </div>
                                @endif
                                @if (session()->has('deleted'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            {{ session()->get('deleted') }}
                                        </ul>
                                    </div>
                                @endif
                                @if (session()->has('fail'))
                                <div class="alert alert-danger">
                                    <ul>
                                        {{ session()->get('fail') }}
                                    </ul>
                                </div>
                            @endif

                           
                        
                        <div class="col-12">
                            {{-- section @ ở đây  --}}
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- content -->

            <!-- Footer Start -->
            {{-- @include('layout.footer') --}}
            <!-- end Footer -->

        </div>
        @yield('scripts')


    </div>
    <!-- END wrapper -->


    <!-- bundle -->
    {{-- // goi thu vien Jquery ve de su dung --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src={{ asset('/js/vendor.min.js') }}></script>
    <script src={{ asset('/js/app.min.js') }}></script>
    @stack('js')

</body>

</html>
