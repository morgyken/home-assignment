  
                    <div class="col-xl-3 text-center">

                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img(31).jpg" class="img-fluid z-depth-1 rounded-circle" alt="Responsive image">

                        <?php if($role == 'cust'): ?>
                        <p>Account Type: <strong>Student</strong> </p>
                         <?php elseif($role == 'tutor'): ?>
                        <p>Account Type: <strong>Tutor</strong> </p>
                         <?php else: ?>
                            <p>Account Type: <strong>Admin</strong> </p>
                        <?php endif; ?>

                    </div>
                     <div class="col-xl-1">
                       

                    </div>
                    <?php if($role == 'cust'): ?>
                    <div>

                     <hr class="my-5">

                       <p> Student Since: <strong><?php echo e($user->created_at); ?></strong> </p>
                       <p> Question Asked: <strong>100</strong>
                       </p>
                       <p> Rejected: <strong>23</strong></p>

                       <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#frameModalBottom">Ask Question Now!</a>
                    </div>
                    
                    <?php else: ?> 
                    <div class="col-xl-5">
                        <h4><?php echo e(Auth::user()->user_name); ?></h4>
                        <p> Success rate: <?php echo e($success['current']); ?> / <?php echo e($success['completed']); ?> / <?php echo e($success['other']); ?>  <?php echo e((($success['completed'] - $success['other'])/ $success['completed'])* 100); ?> % </p>
                        <p>Suspensions: <?php echo e($suspension); ?>, PLG: <?php echo e($plag); ?>  </p>                                       
                    </div>
                    <div class="col-xl-3">
                        <h4>Finances</h4>
                        <p> Current: $<?php echo e($current_amount); ?> </p>
                        <p> Amount Ready: $<?php echo e($next_payment); ?>  </p>
                        <p> Total Earnings: $ <?php echo e($total_earned); ?></p> 
                        
            
                    </div>
                    <?php endif; ?>
        <!-- Grid column -->
                    
                