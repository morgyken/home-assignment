<section class="section text-center">

<!--Section heading-->

<div class="row">
    <!--Grid column-->
    <div class="col-md-4">

        <!--Card-->
        <div class="card testimonial-card">

            <!--Background color-->
            <div class="card-up teal lighten-2">
            </div>

            <!--Avatar-->
            <div class="avatar mx-auto white">
                <img src="{{URL::asset('uploads/profile/'.$user->id.'/profile-pic.jpg')}}" 
                alt="avatar mx-auto white" 
            class="rounded-circle profile-pic img-fluid">
            </div>

            <div class="card-body">
                <!--Name-->
                <h4 class="card-title mt-1"> {{$user->name}}</h4>
                <hr>
                <!--Quotation-->
                <p><i class="fa fa-quote-left"></i> {{$user->intro_text }}</p>
              <p> 
              <div class="text-center">
                    <a href="#" data-toggle="modal"
                     data-target="#orangeModalSubscription">Update Profiel Pic</a>
                </div>
</div>

        </div>
        <!--Card-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-8 mb-4">

        <!--Card-->
        <div class="card testimonial-card">

            <!--Background color-->
            <div class="card-up teal lighten-2">
            </div>                                                  

            <div class="card-body">
                <!--Name-->
                <h4 class="card-title mt-1">Account Information</h4>
                <hr>
                <!--Quotation-->
                <p>Tutor since:  </p>
                <p>Remaining Balance:  </p>
                <p>Account since:  </p>
                <p>Account Balance:  </p>
            </div>
        </div>
        <!--Card-->
    </div>
    <!--Grid column-->
</div>


</section>