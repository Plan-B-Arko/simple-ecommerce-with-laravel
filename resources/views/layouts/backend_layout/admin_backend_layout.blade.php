<?php
    use App\Http\Controllers\AnalysisController;
    $orderplaced = AnalysisController::orderPlaced();
    $contactRequest = AnalysisController::contact_request();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Royal Food - {{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="{{ asset('admin/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{ asset('admin/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">

    @yield('admin_header_script')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <!-- <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt=""> -->
                <h5 class="text-white"> <img src="" alt=""> Royal Food</h5>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    Contact Request<i class="mdi mdi-bell">({{ $contactRequest }})</i>
                                    <div class="pulse-css"></div>
                                </a>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="{{ route('new_order_list') }}">
                                    Orders<i class="mdi mdi-bell">({{ $orderplaced }})</i>
                                    <div class="pulse-css"></div>
                                </a>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('admin_logout')}}" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a  href="{{ route('admindashboard')}}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Category</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('category')}}">Category List</a></li>
                            <li><a href="{{ route('add_category')}}">Add Category</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Product</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('product')}}">Product List</a></li>
                            <li><a href="{{ route('add_product')}}">Add Product</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Discount</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('discount')}}">Discount List</a></li>
                            <li><a href="{{ route('add_discount')}}">Add Discount</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Order</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('new_order_list')}}">New Order List</a></li>
                            <li><a href="{{ route('order_delivered') }}">Order Delivered</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Contact Request</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('contact_list')}}">Contact Request List</a></li>
                            <li><a href="{{ route('replied_list') }}">Replied List</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Restaurant</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('restaurant')}}">Top Restaurant List</a></li>
                            <li><a href="{{ route('add_restaurant') }}">Replied List</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('admin_content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('admin/vendor/global/global.min.js')}}"></script>
    <script src="{{ asset('admin/js/quixnav-init.js')}}"></script>
    <script src="{{ asset('admin/js/custom.min.js')}}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('admin/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('asmin/vendor/morris/morris.min.js')}}"></script>


    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{ asset('admin/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('admin/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('admin/vendor/flot/jquery.flot.resize.js')}}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('admin/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('admin/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{ asset('admin/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>


    <script src="{{ asset('admin/js/dashboard/dashboard-1.js') }}"></script>
    @yield('admin_footer_script')

</body>

</html>
