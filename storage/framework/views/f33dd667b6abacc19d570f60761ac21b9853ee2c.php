<?php $__env->startSection('content'); ?>

<style>

    .row{
        margin-top:40px;
    }
    .row1{
         margin-top:40px;
    }
</style>



    <div class="col-lg-10">
    <hr>
        <h1> User Profile</h1>

        <hr>

    <form method="post" action="<?php echo e(route ('post.tut-profile')); ?>" enctype="multipart/form-data"> 

     <article class="col-xl-12 maincontent">
         <div class="row">

             <div class="col-sm-4"> Name:  </div>
             <div class="col-sm-8"> <input type="" name="firstname" class="form-control" value="<?php echo e($tutorprofile->firstname); ?>">  </div>

         </div>

         <div class="row">

             <div class="col-sm-4"> Second Name: </div>
             <div class="col-sm-8"> <input type="" name="lastname" class="form-control" value="<?php echo e($tutorprofile->lastname); ?>">  </div>

         </div>
         <div class="row">

             <div class="col-sm-4"> Skype ID: </div>
             <div class="col-sm-8"> <input type="" name="skype" value="<?php echo e($tutorprofile->skype); ?>" class="form-control">  </div>

         </div>
        <div class="row">

             <div class="col-sm-4"> Phone Number:</div>
             <div class="col-sm-8"> <input type="" name="phoneno" class="form-control" value="<?php echo e($tutorprofile->phoneno); ?>">  </div>

         </div>

         <div class="row">

             <div class="col-sm-4"> Town/City: </div>
             <div class="col-sm-8">
                <div class="row1">
                    <input type="" name="town" class="form-control" placeholder="Town"  value="<?php echo e($tutorprofile-> town); ?>"> 
                </div>

                <div class="row1">
                    <input type="" name="city" class="form-control" placeholder="City" value="<?php echo e($tutorprofile->city); ?>"> 
                    
                </div>  
        `</div>

         </div>

         <div class="row">

             <div class="col-sm-4"> Payment Methods: </div>
             <div class="col-sm-8">
                <div class="row1">
                     <select name="payment_method" class="form-control">
                          <option value="Equity">Equity</option>
                          <option value="paypal">Paypal</option>
                          <option value="mpesa">MPESA</option>
                          
                        </select>  
                </div>

                <div class="row1">
                    <input type="" name="payment_account" class="form-control" placeholder="Enter Account Details"> 
                    
                </div>  
        `</div>

         </div>

         <div class="row">

             <div class="col-sm-4"> Profile Pic: </div>
             <div class="col-sm-8"> <input type="file" name="profilepic" class="form-control"> </div>

         </div>


         <h2> Areas Of Expertise</h2>
         <hr>
          <div class="row">
            
            <h4> Choose Only four areas.</h4>
        </div>
        <div class="row">

            <div class="col-xl-5">
            
            <input type="checkbox" class="checkbx" name="aofeexp1" value="Art"> Art<br>
            <input type="checkbox" class="checkbx" name="aofeexp2" value="Pedagogy">Pedagogy<br>
            <input type="checkbox" class="checkbx" name="aofeexp3" value="Human Sciences"> Human Sciences <br>
            <input type="checkbox" class="checkbx" name="aofeexp4" value="French"> French<br>
            <input type="checkbox" class="checkbx" name="aofeexp5" value="Computer Science"> Computer Science <br>
            <input type="checkbox" class="checkbx" name="aofeexp6" value="Political Science"> Political Science<br> 
            <input type="checkbox" class="checkbx" name="aofeexp7" value="Psychology"> Psychology<br>
            <input type="checkbox" class="checkbx" name="aofeexp8" value="Technology"> Technology<br>
            <input type="checkbox" class="checkbx" name="aofeexp9" value="Pharmacology"> Pharmacology<br>
            <input type="checkbox" class="checkbx" name="aofeexp10" value="Engineering"> Engineering<br>

        </div>

          <div class="col-xl-7">
            <input type="checkbox" class="checkbx" name="aofeexp11" value="Religion"> Religion and Theology<br> 
            <input type="checkbox" class="checkbx" name="aofeexp12" value="Web Design"> Web Design<br>
            <input type="checkbox" class="checkbx" name="aofeexp13" value="Management"> Management<br>
            <input type="checkbox" class="checkbx" name="aofeexp14" value="Business"> Business <br> 
            <input type="checkbox" class="checkbx" name="aofeexp15" value="Economics"> Economics<br>
            <input type="checkbox" class="checkbx" name="aofeexp16" value="Tourism"> Tourism <br>
            <input type="checkbox" class="checkbx" name="aofeexp17" value="IT and Management"> IT and Management<br>              
            <input type="checkbox" class="checkbx"name="expert18" value="Healthcare"> Healthcare <br>
            
            <input type="checkbox" class="checkbx" name="aofeexp19" value="English"> English<br>
            <input type="checkbox" class="checkbx" name="aofeexp20" value="Mathematics"> Mathematics <br>
            <input type="checkbox" class="checkbx" name="aofeexp21" value="Programming"> Programming <br>
            
    </div>
<hr>
         <div class="row">

             <div class="col-sm-5"> Education: </div>
             <div class="col-sm-7"> 
                        

                    <div class="row"> College Degree: <input type="radio" name="college" value="Degree"> </div>
                    
                    <div class="row"> Masters Degree :  <input type="radio" name="college" value="Masters"></div>                   
                
            </div>
         </div>
         <hr>

         <div class="row">

             <div class="col-sm-5">Change password: </div>
             <div class="col-sm-7"> 
                        

                    <div class="row">Old Password: <input type="" name="oldpassword" class="form-control"> </div>
                    
                    <div class="row"> New Password :  <input type="" name="newpassword" class="form-control"></div>                   
                
            </div>
         </div>

<hr>

           <div class="row">

             <div class="col-sm-5">Upload your College Degree: </div>
             <div class="col-sm-7"><input type="file" name="collegeCert" class="form-control"> 
             </div>
         </div>

        <!--- If user is admin 

         <div class="row">

                <div class="col-sm-12"> Curriculum Vitae</div>
                <div class="col-sm-17"> Show vitae here</div>
                <div class="col-sm-17"> Show certificate here</div>
        </div>


           End Admin-->
    <div class="row">

        <button type="submit" class="btn btn-primary  btn-block">
         Submit Profile Info</button>
        </div>


     </article>

<!-- /Article -->
 <hr>
    <script type="text/javascript">
            $(document).ready(function() {
             $('input.checkbx').each(function() {
                this.checked = false;
            });

            });
              
            var limit = 5;
            $('input.checkbx').on('change', function(evt) {
               if($(this).siblings(':checked').length >= limit) {
                   this.checked = false;
                   $(':checkbox:not(:checked)').prop('disabled', true);
                swal({
                      title: "Subjec Categries",
                      text: "Yo have reached the maximum allowed!",
                      icon: "success",
                      button: "Back",
                    });

                      }
                      else
                      {

                      }

                   
               });
                           
             </script>

<?php $__env->stopSection(); ?>
<!-- /Article -->
<?php echo $__env->make('layouts.current-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>