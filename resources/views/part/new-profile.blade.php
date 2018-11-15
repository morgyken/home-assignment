  
                    <div class="col-xl-3 text-center">

                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img(31).jpg" class="img-fluid z-depth-1 rounded-circle" alt="Responsive image">

                        @if($role == 'cust')
                        <p>Account Type: <strong>Student</strong> </p>
                         @elseif($role == 'tutor')
                        <p>Account Type: <strong>Tutor</strong> </p>
                         @else
                            <p>Account Type: <strong>Admin</strong> </p>
                        @endif

                    </div>
                     <div class="col-xl-1">
                       

                    </div>
                    @if($role == 'cust')
                    <div>

                     <hr class="my-5">

                       <p> Student Since: <strong>{{$user->created_at}}</strong> </p>
                       <p> Question Asked: <strong>100</strong>
                       </p>
                       <p> Rejected: <strong>23</strong></p>

                       <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#frameModalBottom">Ask Question Now!</a>
                    </div>
                    
                    @else 
                    <div class="col-xl-5">
                        <h4>{{ Auth::user()->user_name }}</h4>
                        <p> Success rate: {{ $success['current']}} / {{ $success['completed']}} / {{ $success['other']}}  {{ (($success['completed'] - $success['other'])/ $success['completed'])* 100}} % </p>
                        <p>Suspensions 24, PLG 4  </p>                                       
                    </div>
                    <div class="col-xl-3">
                        <h4>Finances</h4>
                        <p> Current: $20 </p>
                        <p> Amount Ready: $234 </p>
                        <p> Total Earnings: $400 </p> 
                        
            
                    </div>
                    @endif
        <!-- Grid column -->
                    
                