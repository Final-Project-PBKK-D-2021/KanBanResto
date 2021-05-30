<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Other meta tags -->
    <meta name="description" content="Sistem Informasi Kemahasiswaan ITS">
    <meta name="author" content="DPTSI ITS">

    <title>@yield('title') &bullet; KanbanResto</title>

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
    </style>

    @yield('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/skin.light.css') }}">
</head>
<body>
<div class="content ht-100v pd-0" style="position: relative">
    <div class="content-body ht-100p pd-t-80">
        <div class="container pd-x-0" id="content">
            @if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert">
                <ul class="pd-l-15">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
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
