<!-- Form -->
            <form method="post" action="<?php echo e(route('register')); ?>">
                  <!-- Heading -->
                  <h4 class="dark-grey-text text-center">
                    <strong>Sign Up Here </strong>
                  </h4>
                  <hr>

                  <div class="md-form <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <i class="fa fa-user prefix grey-text"></i>
                  
                    <input type="text" name="name" id="name" class="form-control ">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    
                    <label for="form3">Username</label>
                    <?php if($errors->has('name')): ?>
                            <span class="help-block">
                               <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                        <?php endif; ?>
                  </div>
                  <div class="md-form <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <i class="fa fa-envelope prefix grey-text"></i>
                
                    <input type="text" name="email" id="email" class="form-control ">
                    <label for="form2">Your Email</label>
                    <?php if($errors->has('email')): ?>
                            <span class="help-block">
                               <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                  </div>

                
                   <div class="md-form <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                   
                    <i class="fas fa-unlock-alt prefix grey-text"></i>
                  <?php echo e(csrf_field()); ?>

                    <input type="password" name="password" id="pwd" class="form-control ">
                    <label for="form3">Your Password</label>
                    <?php if($errors->has('password')): ?>
                            <span class="help-block">
                               <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                  </div>

                     <label style="margin-left:30px;">&nbsp;&nbsp;Sex: &nbsp;&nbsp;            
                  <label class="radio-inline">
                      <input type="radio" value="boy" name="sex" checked>&nbsp;Male &nbsp;
                    </label>
                    <label class="radio-inline">
                      <input type="radio" value="girl" name="sex">&nbsp;Female &nbsp;
                    </label>

                    <label class="radio-inline">
                      <input type="radio" value="other" name="sex">&nbsp;Other 
                    </label>

                    </label> 

                    <hr>
                  

                  <div class="text-center">
                    <button class="btn btn-indigo">Send</button>
                    <hr>
                    <fieldset class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox1">
                      <label for="checkbox1" class="form-check-label dark-grey-text">Subscribe me to the newsletter</label>
                    </fieldset>
                  </div>

                </form>