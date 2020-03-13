<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/landing/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/landing/css/bootstrap-datepicker.standalone.min.css')}}">
    <!-- Animate CSS -->
    <link href="{{asset('assets/landing/css/animate.css')}}" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/landing/css/style.css')}}">
    @yield('css')
</head>

<body class="load-full-screen">
<!-- BEGIN: PRELOADER -->
<div id="loader" class="load-full-screen">
    <div class="loading-animation">
        <span><i class="fa fa-plane"></i></span>
        <span><i class="fa fa-bed"></i></span>
        <span><i class="fa fa-ship"></i></span>
        <span><i class="fa fa-suitcase"></i></span>
    </div>
</div>
<!-- END: PRELOADER -->
<header>
    <div class="topHeader">
        <div class="container align-items-center d-flex">
            <a class="navbar-brand mr-auto" href="{{route('home')}}">
                <img src="{{asset('assets/landing/images/logo.png')}}" alt="">
            </a>

            <!-- Split dropup button -->
            <div class="pull-right">
                @if(!Auth::user())
                <div id="login" class="btn-group">
                    <span class="btn dropdown-toggle dropdown-toggle-split">
                      Login
                    </span>

                    <div class="dropdown-menu">
                        <form action="#">
                            <h5>Sky Travel Account</h5>
                            <div class="form-group">
                                <span class="invalid-feedback loginError" role="alert">
                                    <strong >Your username or password is invalid.</strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Username" class="form-control" id="username" name="username" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                    <label class="custom-control-label" for="remember">Remember </label>
                                </div>
                            </div>
                            <div class="w-100 mb-3 d-flex align-items-center">
                                <button type="button" class="btn btn-orange" id="loginBtn">Login</button>
                                <a href="{{ route('password.request') }}" class="link ml-3">Forgot password?</a>
                            </div>
                            <a class="link" href="{{route('register')}}">New User ? Create Account</a>
                        </form>
                    </div>
                </div>
                @else
                    <div id="login" class="btn-group">
                        <span class="btn dropdown-toggle dropdown-toggle-split">
                          {{Auth::user()->username}}
                        </span>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('account')}}">Account</a>
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>
                                <span>Log out</span>
                            </a>
                        </div>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
                <div class="btn-group">
                    <span  class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="{{asset('assets/landing/images/flag.png')}}" alt="">
                    </span>

                    <div class="dropdown-menu flag-container">
                        <a class="dropdown-item" href="#"><img src="{{asset('assets/landing/images/flag.png')}}" alt=""></a>
                        <a class="dropdown-item" href="#"><img src="{{asset('assets/landing/images/flag.png')}}" alt=""></a>
                        <a class="dropdown-item" href="#"><img src="{{asset('assets/landing/images/flag.png')}}" alt=""></a>
                    </div>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav"
                        aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg mainmenu" >
        <div class="container">
            <div class="collapse navbar-collapse justify-content-end" id="main-nav">
                <ul class="navbar-nav main-nav-link mr-auto">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->path() == '/') active @endif" href="{{route('home')}}"> <i class="fas fa-home"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->path() == 'flight-listing') active @endif" href="{{route('flightlisting')}}">
                            <i class="fas fa-plane"></i> Flight
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->path() == 'hotel-listing') active @endif" href="{{route('hotellisting')}}">
                            <i class="fas fa-bed"></i> Hotel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->path() == 'holiday-listing') active @endif" href="{{route('holidaylisting')}}">
                            <i class="fas fa-tree"></i> Holiday
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->path() == 'bus-listing') active @endif" href="{{route('buslisting')}}">
                            <i class="fas fa-bus"></i> Bus
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->path() == 'about-us') active @endif" href="{{route('aboutus')}}">
                            <i class="fas fa-info-circle"></i> About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->path() == 'contact') active @endif" href="{{route('contact')}}">
                            <i class="fas fa-phone-square"></i> Contact Us
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->

@yield('content')

<footer >
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget">
                            <h3>Company</h3>
                            <ul>
                                <li><a href="#">Flights</a></li>
                                <li><a href="#">Flight+Hotel Deals</a></li>
                                <li><a href="#">International Flights</a></li>
                                <li><a href="#">Hotels</a></li>
                                <li><a href="#">International Hotels</a></li>
                                <li><a href="#">Holidays in India</a></li>
                                <li><a href="#">International Holidays</a></li>
                                <li><a href="#">Cheap Tickets to India</a></li>
                                <li><a href="#">Bus Tickets</a></li>
                                <li><a href="#">Rail</a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="widget">
                            <h3>Product Offering</h3>
                            <ul>
                                <li><a href="#">Flights</a></li>
                                <li><a href="#">Flight+Hotel Deals</a></li>
                                <li><a href="#">International Flights</a></li>
                                <li><a href="#">Hotels</a></li>
                                <li><a href="#">International Hotels</a></li>
                                <li><a href="#">Holidays in India</a></li>
                                <li><a href="#">International Holidays</a></li>
                                <li><a href="#">Cheap Tickets to India</a></li>
                                <li><a href="#">Bus Tickets</a></li>
                                <li><a href="#">Rail</a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget">
                            <h3>Get In Touch</h3>

                            <div class="getInTouch">
                                <div class="media">
                                    <span class="icon"> <i class="fas fa-envelope"></i> </span>
                                    <div class="media-body">
                                        Email:  <a href="#">mail@yourdomain.com</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                    <div class="media-body">
                                        34234 Golf Course Road, <br> Avenue, US
                                    </div>
                                </div>
                                <div class="media">
                                    <span class="icon"> <i class="fas fa-phone-volume"></i> </span>
                                    <div class="media-body">
                                        Phone: 0987654321
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="widget">
                            <h3>Connect Online </h3>
                            <ul class="onlineLink">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>

                            <h3 class="mt-5">Newslatter </h3>
                            <form class="subscrib d-flex" method="post">
                                <input type="text" class="form-control " placeholder="Email Adress">
                                <button type="submit" class="btn btn-orange">Subscribe </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottomFooter" >
        &copy; 2014 skytravel. All Rights Reserved.
    </div>
</footer>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/landing/js/jquery.js')}}"></script>
<script src="{{asset('assets/landing/js/poper.js')}}"></script>
<script src="{{asset('assets/landing/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/landing/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/landing/js/main.js')}}"></script>
<script src="{{asset('assets/landing/js/wow.min.js')}}"></script>
@yield('js')
@if(!Auth::user())
<script type="text/javascript">
    $(document).on("click", "#loginBtn", function() {
        $.ajax({
            type: 'POST',
            url: "{{route('login')}}",
            data: {
                "_token": "{{csrf_token()}}",
                "username": $("#username").val(),
                "password": $("#password").val(),
                "login": 'ajax',
                "remember": $("#remember").val()
            },
            dataType: 'json',
            success: function(data) {
                window.location.href = "{{route('home')}}"
            },
            error: function(error) {
                if(error.status === 422) {
                    $(".loginError").show();
                }
            }
        });

    });
</script>
@endif
<script>
    $(window).ready(function () {
        "use strict";
        $("#loader").fadeOut("slow");
    });
</script>
</body>
</html>