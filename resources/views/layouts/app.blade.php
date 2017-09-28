<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SMADING - SMART BUILDING MONITORING SYSTEM</title>
    <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('jquery.bootgrid/jquery.bootgrid.min.css') }}" rel="stylesheet"/>
    <!-- iCheck -->
    <link href="{{ asset('gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('highcharts/code/css/highcharts.css') }}" rel="stylesheet"> -->
    <script src="{{ asset('gentelella/vendors/echarts/dist/echarts.min.js') }}"></script>
    <script src="{{ asset('js/angular.min.js') }}"></script>

</head>
<body style="background: url('images/dc.png');background-size: cover;background-repeat: no-repeat;">
    <div id="app">
        <!-- <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}">
                        SMADING
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav> -->

        <div class="container-fluid">
            @yield('content')
        </div>

        <div class="navbar-fixed-bottom menu-bottom">
            <div class="row">
                <div class="col-md-1"> </div>
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="{{url('home')}}" class="main-menu-btn @if (url()->current() == url('/')) active @endif">
                            <i class="fa fa-dashboard fa-5x"></i><br>
                            DASHBOARD
                        </a>
                    </div>
                </div>
                <!-- <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="/denah" class="main-menu-btn @if (url()->current() == url('/denah')) active @endif">
                            <i class="fa fa-th-large fa-5x"></i><br>
                            DENAH
                        </a>
                    </div>
                </div> -->
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="{{url('tren')}}" class="main-menu-btn @if (url()->current() == url('/tren')) active @endif">
                            <i class="fa fa-area-chart fa-5x"></i><br>
                            TREN
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="{{asset('pemantauan')}}" class="main-menu-btn @if (url()->current() == url('/pemantauan')) active @endif">
                            <i class="fa fa-binoculars fa-5x"></i><br>
                            PEMANTAUAN
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="{{asset('asset')}}" class="main-menu-btn @if (url()->current() == url('/asset')) active @endif">
                            <i class="fa fa-barcode fa-5x"></i><br>
                            ASSET
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="{{url('tata-kelola')}}" class="main-menu-btn @if (url()->current() == url('/tata-kelola')) active @endif">
                            <i class="fa fa-sitemap fa-5x"></i><br>
                            TATA KELOLA
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="{{url('it-peripheral')}}" class="main-menu-btn @if (url()->current() == url('/it-peripheral')) active @endif">
                            <i class="fa fa-laptop fa-5x"></i><br>
                            IT PERIPHERAL
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="{{url('master-data')}}" class="main-menu-btn @if (url()->current() == url('/master-data')) active @endif">
                            <i class="fa fa-database fa-5x"></i><br>
                            MASTER DATA
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="{{url('setting')}}" class="main-menu-btn @if (url()->current() == url('/setting')) active @endif">
                            <i class="fa fa-cogs fa-5x"></i><br>
                            SETTING
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="{{url('profile')}}" class="main-menu-btn @if (url()->current() == url('/profile')) active @endif">
                            <i class="fa fa-user fa-5x"></i><br>
                            PROFIL
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="menu-holder">
                        <a href="#" class="main-menu-btn" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-5x"></i><br>
                            LOGOUT
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('jquery.bootgrid/jquery.bootgrid.min.js') }}"></script>
    <script src="{{ asset('jquery.bootgrid/jquery.bootgrid.fa.min.js') }}"></script>
    <!-- <script src="{{ asset('highcharts/code/js/highcharts.js') }}"></script> -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
