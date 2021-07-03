<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Other meta tags -->
        <meta name="description" content="Sistem Informasi Kemahasiswaan ITS">
        <meta name="author" content="DPTSI ITS">

        <title>@yield('title') &bullet; myITS Student Connect</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

        <!-- vendor CSS -->
        <link href="{{ asset('lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/animate.css/animate.min.css') }}" rel="stylesheet">

        @yield('prestyles')

        <!-- DashForge CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/dashforge.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dashforge.profile.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dashforge.customs.css') }}">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
            #content {
                min-height: 66vh;
            }
            @media (min-width: 992px) {
                #content {
                    min-height: 69vh;
                }
            }
            /* @media (min-width: 1200px) {
                #content {
                    min-height: 78vh;
                }
            } */
        </style>

        @yield('styles')

        @if (session('skin') == 'dark')
            <link rel="stylesheet" href="{{ asset('assets/css/skin.dark.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('assets/css/skin.light.css') }}">
        @endif
    </head>
<body>
<aside class="aside aside-fixed">
    @include('partials.menu')
</aside>

<div class="content ht-100v pd-0" style="position: relative">
<header class="navbar navbar-header navbar-header-fixed">
    <div class="navbar-brand">
        <a class="navbar-brand" href="{{ url('') }}" class="aside-logo">
            <img src="{{ url('assets/img/logo.png') }}" height="30" alt="" class="aside-logo">
        </a>
    </div><!-- navbar-brand -->
    <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
            <a href="../../index.html" class="df-logo">dash<span>forge</span></a>
            <a id="mainMenuClose" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></a>
        </div><!-- navbar-menu-header -->
    </div><!-- navbar-menu-wrapper -->
    <div class="navbar-right">
    <div class="dropdown dropdown-profile">
        <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
        <div class="avatar avatar-sm"><img src="https://i.etsystatic.com/14193803/r/il/7eba8e/2455919397/il_794xN.2455919397_h3lz.jpg" class="rounded-circle" alt=""></div>
        </a><!-- dropdown-link -->
        <div class="dropdown-menu dropdown-menu-right tx-13">
        <div class="avatar avatar-lg mg-b-15"><img src="https://i.etsystatic.com/14193803/r/il/7eba8e/2455919397/il_794xN.2455919397_h3lz.jpg" class="rounded-circle" alt=""></div>
        @if(Auth::guard('owner')->check())
        <h6 class="tx-semibold mg-b-5">{{Auth::guard('owner')->user()->name}}</h6>
        <p class="mg-b-25 tx-12 tx-color-03">Owner</p>
        @elseif(Auth::guard('staff')->check())
        <h6 class="tx-semibold mg-b-5">{{Auth::guard('staff')->user()->name}}</h6>
        <p class="mg-b-25 tx-12 tx-color-03">Staff</p>
        @endif

        <!-- <a href="" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg> Edit Profile</a>
        <a href="page-profile-view.html" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> View Profile</a> -->
        <div class="dropdown-divider"></div>
        <a href="javascript: logout()" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
        @if(Auth::guard('owner')->check())
            <form action="{{route('logout')}}" method="post" name="logoutForm" class="d-none">
                @csrf
            </form>
        @elseif(Auth::guard('staff')->check())
            <form action="{{route('staff_logout')}}" method="post" name="logoutForm" class="d-none">
                @csrf
            </form>
        @endif
        <script>
            function logout() {
                document.logoutForm.submit();
            }
        </script>
        </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
    </div><!-- navbar-right -->
</header>
    <div class="content-body ht-100p pd-t-80">
        <div class="container pd-x-0" id="content">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    @yield('breadcrumbs')
                    <h4 class="mg-b-0 tx-montserrat tx-medium text-truncate">
                        @yield('header_title')
                    </h4>
                </div>
                <div class="d-lg-none mg-t-10">
                </div>
                <div>
                    @yield('header_right')
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger mt-3" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div><!-- container -->
        <div>
            <div class="card card-body bg-transparent mg-t-10">
                <div class="d-flex align-items-center row row-xs">
                    <div class="col-lg-12">
                        <span class="tx-medium tx-color-03 tx-13">Copyright &copy; 2021 KanbanResto</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/jqueryui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


@yield('prescripts')

<script src="{{ asset('assets/js/dashforge.js') }}"></script>
<script src="{{ asset('assets/js/dashforge.aside.js') }}"></script>
{{-- <script src="{{ asset('assets/js/dark-mode-switch.min.js') }}"></script> --}}

<!-- append theme customizer -->

@yield('scripts')

@include('partials.fixed-scripts')

</body>
</html>
