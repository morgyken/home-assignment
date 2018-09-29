<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Home Assign-@yield('title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="{{URL::asset('mdb/landing/css/bootstrap.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{URL::asset('mdb/landing/css/mdb.css ')}}" rel="stylesheet"> 

    <link href="{{URL::asset('stripe/css/base.css ')}}" rel="stylesheet"> 
     <!-- Your custom styles (optional) -->

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="{{URL::asset('sidebar/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{URL::asset('sidebar/assets/css/custom-themes.css ')}}">
    <link rel="shortcut icon" type="image/png" href="{{URL::asset('sidebar/assets/img/favicon.png ')}}" />

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    
  <script>tinymce.init({ selector:'textarea' });</script>

  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


     <script src="https://js.stripe.com/v3/"></script>
   

  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }
  </style>
</head>

<body>


 <!-- Navbar -->
  <nav class="navbar  fixed-top navbar-expand-lg navbar-dark secondary-color">

    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">
        <strong>Home-Assign</strong>
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
            <a class="nav-link" href="{{ route('home') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">About Us</a>
          </li>
      @if(Auth::check())
        <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Browse Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Post Jobs</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">My Profile</a>
          </li>
        @endif
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="https://www.facebook.com/mdbootstrap" class="nav-link" target="_blank">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link" target="_blank">
              <i class="fa fa-twitter"></i>
            </a>
          </li>


          <li class="nav-item">

                  
            @if(Auth::check())

            <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link" target="_blank">
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

    <!--Main layout-->
  <main>
    <div class="container">
      <section style="margin-top:100px;">

           <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
          @include('sidebar.nav')
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    
                    @include('part.new-profile')
                
                    <!--Main layout-->
                 
            </div>
                     <hr>       

               
                  <!-- SHOW IF STUDENT: ASK QUESTION BUTTON -->  
                               
                   @yield('content')
                    <hr> 
              
            </div>
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
        <hr class="my-4">

      </section>
      <!--Section: Main features & Quick Start--> 

    </div>
  </main>
  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">
    <!--/.Call to action-->


    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/mdbootstrap" target="_blank">
        <i class="fa fa-facebook mr-3"></i>
      </a>

      <a href="https://twitter.com/MDBootstrap" target="_blank">
        <i class="fa fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fa fa-youtube mr-3"></i>
      </a>

      <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
        <i class="fa fa-google-plus mr-3"></i>
      </a>

      <a href="https://dribbble.com/mdbootstrap" target="_blank">
        <i class="fa fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com/mdbootstrap" target="_blank">
        <i class="fa fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
        <i class="fa fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/mdbootstrap/" target="_blank">
        <i class="fa fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    
  </footer>

  @include ('gen.part.login')
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the the stripe tags----------> 
 
  <script type="text/javascript" src="{{URL::asset('mdb/landing/js/jquery-3.3.1.min.js ')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{URL::asset('mdb/landing/js/popper.min.js ')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{URL::asset('mdb/landing/js/bootstrap.min.js ')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{URL::asset('mdb/landing/js/mdb.min.js ')}}"></script>

   <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="{{URL::asset('sidebar/assets/js/custom.js')}}"></script>
        <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{URL::asset('uikit/js/uikit-icons.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{URL::asset('uikit/js/uikit.min.js')}}"></script>

     <!-- MDB core JavaScript -->
     <script type="text/javascript" src="{{URL::asset('uikit/js/my.js')}}"></script>

   <script type="text/javascript">
     <script type="text/javascript">
       // Create a Stripe client.
            var stripe = Stripe('pk_test_LvVBuMY1fQNF0g0xcJFU18ur');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              stripe.createToken(card).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error.
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                } else {
                  // Send the token to your server.
                  stripeTokenHandler(result.token);
                }
              });
            });
     </script>
   </script>

  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>