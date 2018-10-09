<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">  
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title>Home Assign-<?php echo $__env->yieldContent('title'); ?></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(URL::asset('mdb/landing/css/bootstrap.css')); ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo e(URL::asset('mdb/landing/css/mdb.css ')); ?>" rel="stylesheet"> 

    <link href="<?php echo e(URL::asset('stripe/css/base.css ')); ?>" rel="stylesheet"> 
     <!-- Your custom styles (optional) -->

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('sidebar/assets/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('sidebar/assets/css/custom-themes.css ')); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo e(URL::asset('sidebar/assets/img/favicon.png ')); ?>" />

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<!--- Paypal Button -->

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
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
            <a class="nav-link" href="<?php echo e(route('home')); ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">About Us</a>
          </li>
      <?php if(Auth::check()): ?>
        <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Browse Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Post Jobs</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">My Profile</a>
          </li>
        <?php endif; ?>
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

                  
            <?php if(Auth::check()): ?>

            <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link" target="_blank">
             <i class="fas fa-sign-in-alt"></i> <?php echo e(Auth::User()->name); ?>

            </a>
          </li>              
            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); 
                                         document.getElementById('logout-form').submit();" 
                                          class="nav-link border border-light rounded"
              target="_blank">
                 <i class="fas fa-user-alt"></i>
              

              Log Out
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
             </form>
                  </a>
            <?php else: ?> 

            <a href="<?php echo e(route('login')); ?>" class="nav-link border border-light rounded"
              data-toggle="modal" data-target="#modalContactForm">
                 <i class="fas fa-user-alt"></i>
              Log in

            <?php endif; ?>

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
          <?php echo $__env->make('sidebar.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    
                    <?php echo $__env->make('part.new-profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
                    <!--Main layout-->
                 
            </div>
                     <hr>       

               
                  <!-- SHOW IF STUDENT: ASK QUESTION BUTTON -->  
                               
                   <?php echo $__env->yieldContent('content'); ?>
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



  <?php echo $__env->make('gen.part.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
  <script type="text/javascript" src="<?php echo e(URL::asset('mdb/landing/js/jquery-3.3.1.min.js ')); ?>"></script>

    <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo e(URL::asset('mdb/landing/js/popper.min.js ')); ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo e(URL::asset('mdb/landing/js/bootstrap.min.js ')); ?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo e(URL::asset('mdb/landing/js/mdb.min.js ')); ?>"></script>

   <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="<?php echo e(URL::asset('sidebar/assets/js/custom.js')); ?>"></script>
        <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo e(URL::asset('uikit/js/uikit-icons.min.js')); ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo e(URL::asset('uikit/js/uikit.min.js')); ?>"></script>

     <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo e(URL::asset('uikit/js/my.js')); ?>"></script>

    <!-- MDB core JavaScript -->
       
    <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>