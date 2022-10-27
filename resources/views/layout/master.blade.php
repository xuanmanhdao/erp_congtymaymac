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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            {{ session()->get('success') }}
                                        </ul>
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


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    {{-- <div class="right-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar>

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout width, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1" />

                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light"
                        id="light-mode-check" checked />
                    <label class="custom-control-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark"
                        id="dark-mode-check" />
                    <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
                </div>

                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1" />
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check"
                        checked />
                    <label class="custom-control-label" for="fluid-check">Fluid</label>
                </div>
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                    <label class="custom-control-label" for="boxed-check">Boxed</label>
                </div>



                <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>

                <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                    class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-basket mr-1"></i> Purchase
                    Now</a>
            </div> <!-- end padding-->

        </div>
    </div> --}}

    {{-- <div class="rightbar-overlay"></div> --}}
    <!-- /Right-bar -->

    <!-- bundle -->
    {{-- // goi thu vien Jquery ve de su dung --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src={{ asset('/js/vendor.min.js') }}></script>
    <script src={{ asset('/js/app.min.js') }}></script>
    @stack('js')

</body>

</html>
