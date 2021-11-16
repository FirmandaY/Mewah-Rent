<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        

        <link rel="shortcut icon" href="{{asset('images/logomewahicon.png')}}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Mewah Rental | Multimedia</title>

        <!-- Scripts (Dinonaktifkan karena untuk mencegah error pada navbar)
        <script src="{{ asset('js/app.js') }}" defer></script>-->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Fonts for Homecard-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Styles Sidebar -->
        <link rel="stylesheet" href="{{ asset('sidebar/css/style.css') }}">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('images/logomewah.png')}}" alt="sing up image" width='60' height='25'>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        @if(Auth::check())
                            <ul class="navbar-nav mr-auto">
                                <li><a class="linkin" href="/home">Home Admin</a></li>
                                <li><a class="linkin" href="#">About</a></li>
                                <li><a class="linkin" href="#">FAQ</a></li>
                                <li><a class="linkin" href="#">Produk</a></li>
                            </ul>
                        @endif
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @if(Auth::check())
                <div class="wrapper d-flex align-items-stretch">
                    <nav id="sidebar">
                        <div class="custom-menu">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                                <i class="fa fa-bars"></i>
                                <span class="sr-only">Toggle Menu</span>
                            </button>
                        </div>
                        <div class="p-4">
                            <h1><a href="index.html" class="logo">Mewah-Rent <span>Rental Agency</span></a></h1>
                            <ul class="list-unstyled components mb-5">
                                <li class="active">
                                    <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
                                </li>
                                <li>
                                <a href="#"><span class="fa fa-user mr-3"></span> About</a>
                                </li>
                                <li>
                                    
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <span class="fa fa-briefcase mr-3"></span> Products
                                    </a>
                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                        <li>
                                            <a href="{{ route('adminPC') }}">Komputer (PC)</a>
                                        </li>
                                        <li>
                                            <a href="#">Monitor</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('adminLaptop') }}">Laptop</a>
                                        </li>
                                        <li>
                                            <a href="#">Tablet</a>
                                        </li>
                                        <li>
                                            <a href="#">Proyektor</a>
                                        </li>
                                        <li>
                                            <a href="#">Printer</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="fa fa-sticky-note mr-3"></span> Blog</a>
                                </li>
                                <li>
                                    <a href="#"><span class="fa fa-suitcase mr-3"></span> Gallery</a>
                                </li>
                                <li>
                                    <a href="#"><span class="fa fa-cogs mr-3"></span> Services</a>
                                </li>
                                <li>
                                    <a href="#"><span class="fa fa-paper-plane mr-3"></span> Contacts</a>
                                </li>
                                </ul>

                            <div class="mb-5">
                                <h3 class="h6 mb-3">Subscribe for newsletter</h3>
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <div class="icon"><span class="icon-paper-plane"></span></div>
                                        <input type="text" class="form-control" placeholder="Enter Email Address">
                                    </div>
                                </form>
                            </div>

                            <div class="footer">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>

                        </div>
                    </nav>
            @endif
                    <!-- Page Content  -->
                    <div id="content" class="p-4 p-md-5 pt-5">
                        <!--<h2 class="mb-4">Sidebar #05</h2>-->
                        
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
                </div>
            
            
        </div>

        <script src="{{ asset('sidebar/js/jquery.min.js') }}"></script>
        <script src="{{ asset('sidebar/js/popper.js') }}"></script>
        <script src="{{ asset('sidebar/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('sidebar/js/main.js') }}"></script>
    </body>
</html>
