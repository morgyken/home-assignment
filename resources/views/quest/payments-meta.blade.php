
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
            

                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Title -->
                    <h3 class="card-title text-center">Enter Payment Details</h3>
                      <hr class="my-4">
                    <!-- Link -->
                </div>
            <div class="col-md-11" style="text-align: center; margin-bottom:70px;" >
            <form method="post" action="{{route('post.meta')}}"  >

                <input type="hidden" name="_token" value="{{ csrf_token() }}">                       
                   
                    <div class="card" style="margin-top: 20px; margin-bottom:20px; margin-left: 0px;">
                       
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
                                 
                                     <div class="form-group col-md-6">
                                     	<button type="submit" class="btn btn-primary">Continue</button>
                                     </div>
                                     <div class="form-group col-md-6">
                                     	<a href="#payment" id="pay_button" type="submit" class="btn btn-primary">Continue</a>
                                     </div>                              



                                  </form> 
                        </div>
                    </div>

                                         
                </form>
            </div>
        </div>
        <!-- Card Light -->
        </div>

         <!-- Card Light -->
        <div class="card" id="payments">

            <div class="card-header text-center"><h4>Make 1 Dollar payment </h4>
                </div>

                <div class="container">
                    <div class="col-md-offset-3 text-center">
                        <div class="row" style="border-right-style:solid; border-right-color:#f7f7f7">

                                  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                        <input type="hidden" name="cmd" value="_s-xclick">
                                        <input type="hidden" name="hosted_button_id" value="SLTRFUAAURHJJ">
                                        <table>
                                        <tr><td><input type="hidden" name="on0" value="user_name"></td></tr>
                                        <tr>
                                            <td>
                                                 <div class="form-group">
                                                    <input type="hidden" name="os0" class="" 
                                                    value="{{strstr(Auth::user()->email, '@', -1)}}" >
                                                </div>
                                            </td>
                                        </tr>
                                        <tr><td>
                                                <div class="form-group">
                                                    <input class="form-control col-md-10"  type="hidden" name="on1" value="email">
                                                </div>
                                        </td></tr><tr><td>
                                             <div class="form-group">
                                                <input class="form-control col-md-12"  value="{{Auth::user()->email}}" type="hidden" name="os1">
                                            </div>
                                        </td></tr>
                                        </table>
                                        
                                        <input type="image" src="{{ asset('img/buynow.png') }}" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                </form>
                        </div>
                         <div class="row row-centered">
                            <h3> Pay using Card </h3>
                                                        
                            <div class="col-centered col-fixed">
                                <div class="line-separator"></div>
                            </div>

                        </div>
                        <div class="row" style="padding-right:10px; ">
                         
                                               

                            <form action="{{route('post.payment')}}" method="post" id="payment-form">
                                    {{ csrf_field()}}
                                                      

                                <label for="card-element">
                                  Credit or debit card
                                </label>
                                <div class="form-row">  
                                <div id="card-element" class="mystripe">
                                  <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <div class="form-row">  

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                           

                              <button type="submit" class="btn btn-primary">Submit Payment</button>
                            </form>
                                <style type="text/css">
                                    /**
                                     * The CSS shown here will not be introduced in the Quickstart guide, but shows
                                     * how you can use CSS to style your Element's container.
                                     */
                                    input{
                                        color: #890999;
                                    }

                                </style>                        
                                                         
                    </div>
		        </div>
		     </div>



        @endsection
