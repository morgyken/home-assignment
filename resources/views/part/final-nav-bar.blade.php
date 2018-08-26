<style type="text/css">
    .nav-bar{
        background-color: rgba(240, 95, 64, 0.8);
    }

 .nav-bar a {
     color: #fff;
     font-size:18px;
     font-weight: 900;

 }

 .nav-bar .navbar-brand{
    font-size: 23px;
 }
</style>

<nav class="navbar nav-bar navbar-expand-lg navbar-light fixed-top" id="mainNav"">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}">TutorsBoard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                
                <li><a href="#about">About us</a></li>
               

            
            </ul>


            <ul class="nav navbar-nav navbar-right">
               
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                <li><a href="{{ route('all-questions')}}">Browse Jobs</a></li>
                <li><a href="{{ route('register') }}">{{ Auth::user()->name }}</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                         document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>


    
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
