<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>NiRA Registra Database</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="nira_logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
   <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
    <script src="{{asset('assets/js/app-calendar-events.js')}}"></script>
    <script src="{{asset('assets/js/app-calendar.js')}}"></script>
</head>

<body>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme ">
            <div class="app-brand demo">
                <a href="{{route('dashboard')}}" class="app-brand-link mt-5">
                    <img src="{{asset('nira_logo.png')}}" style="height:150px;" />

                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboards -->
                <li class="menu-item active">
                    <a href="{{route('dashboard')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Dashboards">Dashboards</div>
                    </a>

                </li>

                <!-- Layouts -->

                <li class="menu-item">
                    <a href="javascript:void(0);"  class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxs-user-account"></i>
                        <div data-i18n="Authentications">Registra Profiles</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{route('all_profiles')}}" class="menu-link" >
                                <div data-i18n="Basic">All Profiles</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('create_profile')}}" class="menu-link" >
                                <div data-i18n="Basic">Create Profile</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('expired_profiles')}}" class="menu-link" >
                                <div data-i18n="Basic">Unrenewed Profiles</div>
                                
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Front Pages -->
                <li class="menu-item">
                    <a href="{{route('educational')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-school"></i>
                        <div data-i18n="Front Pages">Educational Resource</div>
                    </a>

                </li>
                <li class="menu-item">
                    <a
                        href="{{route('forum')}}"

                        class="menu-link">
                        <i class="menu-icon tf-icons bx bx-grid"></i>
                        <div data-i18n="Kanban">Forum Resource</div>
                    </a>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Apps &amp; Pages</span>
                </li>
                <!-- Apps -->
                <li class="menu-item">
                    <a
                        href="{{route('emails')}}"
                        class="menu-link">
                        <i class="menu-icon tf-icons bx bx-envelope"></i>
                        <div data-i18n="Email">Email</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="{{route('schedules')}}"
                        class="menu-link">
                        <i class="menu-icon tf-icons bx bx-calendar"></i>
                        <div data-i18n="Calendar">Schedules</div>
                    </a>
                </li>

                <!-- Pages -->
                <li class="menu-item">
                    <a href="{{route('account', 1)}}" class="menu-link ">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div data-i18n="Account Settings">Account Settings</div>
                    </a>

                </li>
                <li class="menu-item">
                    <a href="{{route('all_payment')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-money-withdraw"></i>
                        <div data-i18n="Authentications">Payments</div>
                    </a>

                </li>

                <li class="menu-item">
                    <a href="{{route('all_users')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-group"></i>
                        <div data-i18n="Misc">Users</div>
                    </a>

                </li>


            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <form method="get" action="{{route('all_profiles')}}" class="nav-item d-flex align-items-center">
                            @csrf
                            <button style="border-style: none;background: transparent;" type="submit">
                                <i class="bx bx-search fs-4 lh-0 text-white"></i></button>

                            <input
                                style="color:white;background: transparent;"
                                name="search"
                                type="text"
                                class="form-control border-0 shadow-none ps-1 ps-sm-2"
                                placeholder="Search Database Records........."
                                aria-label="Search..." />
                        </form>
                    </div>
                    <!-- /Search -->
<?php
  $user = auth()->user();
?>
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{$user->image}}" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{$user->image}}" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-medium d-block">{{$user->first_name}} {{$user->last_name}}</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('account', 1)}}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>

                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                   @yield('body')
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            © 2024 NiRA Registra's Database

                        </div>

                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/vendor/js/menu.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

<script src="{{asset('assets/js/token.js')}}"></script>
<script>
     let table = new DataTable('#table', {
        responsive: true
    });

    // noinspection JSDeprecatedSymbols
    $(document).ready(function() {
        $('#otp_target').otpdesigner({
            typingDone: function (code) {
                console.log('Entered OTP code: ' + code);
            },
        });

        $('#ok').on('click', function () {
            let result = $('#otp_target').otpdesigner('code');
            if (result.done) {
                alert('Entered OTP code: ' + result.code);
            } else {
                alert('Typing incomplete!');
            }
        });
    });
</script>
</body>
</html>
