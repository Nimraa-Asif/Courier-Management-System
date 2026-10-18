<!doctype html>
<html lang="en" class="dark-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/images/ts-favicon.png" type="image/png" />
    <!--plugins-->
    <link href="/dashboard/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="/dashboard/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/dashboard/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/dashboard/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/style.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="/dashboard/assets/css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="/dashboard/assets/css/dark-theme.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/light-theme.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/semi-dark.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/header-colors.css" rel="stylesheet" />

    <title>GoCourier- Admin Dashboard</title>
</head>
<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-icon fs-3 d-flex d-lg-none">
                    <i class="bi bi-list"></i>
                </div>
                {{-- <form class="searchbar">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i
                            class="bi bi-search"></i></div>
                    <input class="form-control" type="text" placeholder="Type here to search">
                    <div class="position-absolute top-50 translate-middle-y search-close-icon"><i
                            class="bi bi-x-lg"></i></div>
                </form> --}}
                <div class="top-navbar-right ms-auto">
                        <li class="nav-item dark-mode d-none d-sm-flex">
                            <a class="nav-link dark-mode-icon" href="javascript:;">
                                <div class="">
                                    <i class="bi bi-moon-fill"></i>
                                </div>
                            </a>
                        </li>
                </div>
                <div class="dropdown dropdown-user-setting">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                        <div class="user-setting d-flex align-items-center gap-3">
                        <img src="/dashboard/assets/images/avatars/avatar-1.png" class="user-img" alt="">
                            <div class="d-none d-sm-block">
                                <p class="user-name mb-0" >{{ @Auth::User()->name }}</p> 
                                
                                <small class="mb-0 dropdown-user-designation"  style="color: rgb(26, 228, 80)"> Admin </small>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-lock-fill"></i></div>
                                    <form action="/logout" method="POST" >
                                        @csrf
                                    <div class="ms-3"><a href="{{ route('logout') }}"><span style="color: red" >Logout</span></a></div>
                                    </form>
                                </div>
                            
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <!-- <div>
                    <img src="/dashboard/assets/images/ts_front-logo_blk-ink.png" class="logo-icon" alt="logo icon">
                </div> -->
                <div>
                   <h6 class="logo-text" style="font-size: 30px;font-style: italic;color: gold"><center>GoCourier</center></h6>
              </div>
                <div class="toggle-icon ms-auto"><i class="bi bi-list"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="/admin">
                        <div class="parent-icon"><i class="bi bi-house-fill"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                        </div>
                        <div class="menu-title">Agents</div>
                    </a>
                    <ul>

                        <li> <a href="{{ route('AgentForm') }}"><i class="bi bi-circle"></i>Add New Agent</a>
                        </li>
                        <li> <a href="{{ route('fetchAgent') }}"><i class="bi bi-circle"></i>Registered Agents</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                        </div>
                        <div class="menu-title">Users</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('registerUsers') }}"><i class="bi bi-circle"></i>Registered Users</a>
                        </li>
                        <li> <a href="{{ route('UserContact') }}"><i class="bi bi-circle"></i>Contact Us Details</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                        </div>
                        <div class="menu-title">Courier</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('adminNewCourier') }}"><i class="bi bi-circle"></i>Add New Courier</a>
                        </li>
                        <li> <a href="{{ route('adminTracking') }}"><i class="bi bi-circle"></i>Track Courier</a>
                        </li>

                    </ul>
                </li>
                 <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                        </div>
                        <div class="menu-title">Actions</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('fetchAll') }}"><i class="bi bi-circle"></i>Pending Couriers</a>
                        </li>
                        <li> <a href="{{ route('fetchConfirmOrder') }}"><i class="bi bi-circle"></i>Approved Couriers</a>
                        </li>
                        <li> <a href="{{ route('fetchDenyCourier') }}"><i class="bi bi-circle"></i>Denied Couriers</a>
                        </li>

                    </ul>
                </li>
              
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                        </div>
                        <div class="menu-title">Settings</div>
                    </a>
                    <ul>
                      
                       <form action="/logout" method="POST">
                        <li> <b><a href="{{ route('logout') }}"  style="color: red"><i class="bi bi-circle"></i>Logout</a></b>
                        </li>
                       </form>

                    </ul>
                </li>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->


        @yield('content')


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--start footer-->
        {{-- <footer class="footer">
            <div class="footer-text">
                Copyright © 2024. All right reserved.
            </div>
        </footer> --}}
        <!--end footer-->


        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                    class="bi bi-paint-bucket me-0"></i></button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme"
                            value="option1">
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme"
                            value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme"
                            value="option3">
                        <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
                    </div>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme"
                            value="option3" checked>
                        <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
                    </div>
                    <hr />
                    <h6 class="mb-0">Header Colors</h6>
                    <hr />
                    <div class="header-colors-indigators">
                        <div class="row row-cols-auto g-3">
                            <div class="col">
                                <div class="indigator headercolor1" id="headercolor1"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor2" id="headercolor2"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor3" id="headercolor3"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor4" id="headercolor4"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor5" id="headercolor5"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor6" id="headercolor6"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor7" id="headercolor7"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor8" id="headercolor8"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end switcher-->

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="/dashboard/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/dashboard/assets/js/jquery.min.js"></script>
    <script src="/dashboard/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/dashboard/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/dashboard/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="/dashboard/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/dashboard/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/dashboard/assets/js/pace.min.js"></script>
    <script src="/dashboard/assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="/dashboard/assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="/dashboard/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <!--app-->
    <script src="/dashboard/assets/js/app.js"></script>
    <script src="/dashboard/assets/js/index.js"></script>
    <script>
        new PerfectScrollbar(".best-product")
    </script>
   

</body>

</html>