    <?php $__env->startSection('title'); ?>

    Set Price

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>

  <script type="text/javascript">
  	
  	  window.onload= function(){
      {
        $('#payments').hide(100);
        $('#pay_button').click(function(){
        	$('#payments').show(400);
        })
      }
    };

  </script>

    <style type="text/css">
    	.card{
    		margin-top: 40px;
    		marker-bottom:30px;
    	}
    </style>


       <!-- Card Light -->
        <div class="card">

          <!-- Card image -->
          <div class="view overlay clearfix">
            


                    <!-- Title -->
                    <h3 class="card-title text-center">Enter Payment Details</h3>
                      <hr class="my-4">
                    <!-- Link -->
                </div>
            <div class="col-md-11" style="text-align: center; margin-bottom:70px;" >
            <form method="post" action="<?php echo e(route('post.meta')); ?>"  >

                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">     
                       
                         <div class="row">                         	
                  
                         <div class="col-md-6">
                         	<h3>Serial: <?php echo e(session('question_id')); ?> </h3>
                         </div>                        
                              
                          <div class="col-md-6">
                            <h3>Amount:<?php echo e(session('question_price')); ?> </h3>
                          </div>
                            </div>
                          
                              <div  class="col-md-12">
                                <hr>


                               <h3>Fill in the following foms with the payment details</h3>
                              </div>
                              <div class="row container ">
                              
	                             
	                                <form action="<?php echo e(route('post.meta')); ?>" class="" method="post" >

	                               <div class="col-md-6">
                                        <?php echo e(csrf_field()); ?>



                                    <div class="form-group">
                                     
                                          <input type="text" name="name" class="form-control" placeholder="Name on Card">
                                    </div>                              

                                    <div class="form-group" >
                                      
                                          <input type="text" name="zip" placeholder="Zip Code" class="form-control">
                                    </div>

                                  </div>

                                <div class="col-md-6">
                                    <div  class="form-group">
                                     
                                          <input type="text" name="state" class="form-control" placeholder="State">
                                    </div>
                                    <div class="form-group">
                                     
                                          <input type="text" name="city" class="form-control" placeholder="City">
                                    </div>
                                     <div class="form-group">
                                      
                                            <?php echo $__env->make('part.countries', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>

                                     </div>
                                  
                                   </div>
                                   <div class="row container ">

                                      <!--hidden fields -->

                                     <input type="hidden" name="email" value="<?php echo e(Auth::User()->email); ?>">

                                     <!--hidden fields -->

                                     <input type="hidden" name="name" value="<?php echo e(Auth::User()->name); ?>">
                                 
                                     <div class="form-group text-center">
                                     	<button type="submit" class="btn btn-primary">Continue</button>
                                     </div>
                                                                   



                                  </form> 
                        </div>
                   
            </div>
        </div>
        <!-- Card Light -->
        </div>

        



                  
                
		        </div>
		     <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.current-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>