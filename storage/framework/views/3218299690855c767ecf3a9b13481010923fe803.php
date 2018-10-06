<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
        crossorigin="anonymous">

    <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" 
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" 
        crossorigin="anonymous" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>


            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" id="add-new" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id='title'>Add Item </h4>
                  </div>
                  <div class="modal-body">
                  <input type="hidden" id="id"> 
                   <input type="text" id="add-item" class="form-control" placeholder="Add new Item" >
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="display:none" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" style="display:none" id="delete"data-dismiss="modal" class="btn btn-warning">delete</button>
                    <button type="button" style="display:none" id="save" data-dismiss="modal" class="btn btn-secondary">Save Changes</button>
                    <button type="button"  id="add" class="btn btn-primary" data-dismiss="modal"  >Add new Item</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
    
            <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                             
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Panel title 
                                <a href="#" class=pull-right data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-plus"></i>
                            </a> </h3></div>
                            <div class="panel-body">
                            <?php echo e(csrf_field()); ?>

                            <ul class="list-group">
                            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item myitem" data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo e($items->item); ?>

                                <input type="hidden" id="item-id" value ="<?php echo e($items->id); ?>" />
                                </li>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            </div>
                        </div>

                        </div>
                        
                    </div>
                </div>

            </div>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
            crossorigin="anonymous"></script>
            <script type="text/javascript">
                
                $(document).ready(function(){
                $(document).on('click','.myitem', function(event)
                {
                        var text = $.trim($(this).text());
                        var id = $(this).find('#item-id').val();
                    
                        $('#add-item').val(text);
                        $('.modal-title').text('Edit Item');
                        $('#delete').show('300');
                        $('#save').show('300');
                        $('#id').val(id);
                        $('#add').hide('300');
                       // console.log(text);
                   
                });
                $(document).on('click','#add-new', function(event)
                    {
                        $('#add-item').val("");
                        $('.modal-title').text('Add New Item');
                        $('#delete').hide('300');
                    
                        $('#save').hide('300');
                        $('#add').show('300');
                    });

                    $('#add').click(function(event)
                    {
                        var text = $('#add-item').val();

                        $.post('list', {'item': text, '_token': $('input[name=_token]').val()}, function(data){
                           
                            $('.panel-body').load(location.href + ' .panel-body') //div refresh 
                        });
                    
                    });

                    $('#delete').click(function(event)
                    {
                        var id = $('#id').val();

                        $.post('delete', {'id': id, '_token': $('input[name=_token]').val()}, function(data){
                           $('.panel-body').load(location.href + ' .panel-body') //div refresh 
                          });
                    });

                    $('#save').click(function(event)
                    {
                        var id = $('#id').val();
                        var text = $.trim ($('#add-item').val());

                        $.post('update', {'id': id,'item': text ,'_token': $('input[name=_token]').val()}, function(data){
                         $('.panel-body').load(location.href + ' .panel-body') //div refresh 
                            //console.log(data);
                          });
                    });
                    
            });
    </script>
       
    </body>
    </html>
