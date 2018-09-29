
@extends('layouts.current-template')

    @section('title')

    Set Price

    @endsection

    @section('content')

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
            <form method="post" action="{{route('post.meta')}}"  >

                <input type="hidden" name="_token" value="{{ csrf_token() }}">     
                       
                         <div class="row">                         	
                  
                         <div class="col-md-6">
                         	<h3>Serial: {{ session('question_id')}} </h3>
                         </div>                        
                              
                          <div class="col-md-6">
                            <h3>Amount:{{ session('question_price')}} </h3>
                          </div>
                            </div>
                          
                              <div  class="col-md-12">
                                <hr>


                               <h3>Fill in the following foms with the payment details</h3>
                              </div>
                              <div class="row container ">
                              
	                             
	                                <form action="{{route('post.meta')}}" class="" method="post" >

	                               <div class="col-md-6">
                                        {{ csrf_field() }}


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
                                      
                                            @include('part.countries')
                                    </div>

                                     </div>
                                  
                                   </div>
                                   <div class="row container ">

                                      <!--hidden fields -->

                                     <input type="hidden" name="email" value="{{ Auth::User()->email }}">

                                     <!--hidden fields -->

                                     <input type="hidden" name="name" value="{{ Auth::User()->name }}">
                                 
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
		     @endsection
