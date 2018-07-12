<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome Home</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('mdb/dashboard/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{URL::asset('mdb/dashboard/css/mdb.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{URL::asset('mdb/dashboard/css/style.css')}}" rel="stylesheet">
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="#" target="_blank">
                    <strong class="blue-text">Home Assignment</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">About Us</a>
                        </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">Browse Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">Post Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="htt#" target="_blank">My Profile</a>
                        </li>
                        @endif
                        </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">
                            <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">
                            <i class="fa fa-twitter"></i>
                            </a>
                        </li>


                        <li class="nav-item">

                                
                            @if(Auth::check())

                            <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">
                            <i class="fas fa-sign-in-alt"></i> {{ Auth::User()->name}}
                            </a>
                        </li>              
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                                        document.getElementById('logout-form').submit();" 
                                                        class="nav-link border border-light rounded"
                            target="_blank">
                                <i class="fas fa-user-alt"></i>
                            

                            Log Out
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                                </a>
                            @else 

                            <a href="{{ route('login') }}" class="nav-link border border-light rounded"
                            data-toggle="modal" data-target="#modalContactForm">
                                <i class="fas fa-user-alt"></i>
                            Log in

                            @endif

                            </a>
                        </li>
                        </ul>


                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

            <a class="logo-wrapper waves-effect">
                <img src="{{URL::asset('mdb/dashboard/img/logo.png')}}" class="img-fluid logo1" alt="">
            </a>

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item active waves-effect">
                    <i class="fa fa-pie-chart mr-3"></i>Dashboard
                </a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-user mr-3"></i>Profile</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-table mr-3"></i>Orders</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Finances</a>
               
            </div>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="#" target="_blank">Home Page</a>
                        <span>/</span>
                        <span>Dashboard</span>
                    </h4>

                    <form class="d-flex justify-content-center">
                        <!-- Default input -->
                        <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                        <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!--Grid row-->
            <div class="row wow fadeIn">
                @yield('content')
            </div>
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

        <!--Call to action-->
        
        

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 Copyright:
            <a href="#" target="_blank">Home Assign.com</a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{URL::asset('mdb/dashboard/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{URL::asset('mdb/dashboard/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{URL::asset('mdb/dashboard/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{URL::asset('mdb/dashboard/js/mdb.min.js')}}"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>   

</body>

</html>