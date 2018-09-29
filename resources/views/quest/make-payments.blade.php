
@extends('layouts.current-template')

    @section('title')

    Set Price

    @endsection

    @section('content')

 

    <style type="text/css">

/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
          background-color: white;
          height: 40px;
          padding: 7px 8px;
          border-radius: 4px;
          border: 2px solid #151515;
          box-shadow: 0 1px 3px 0 #00ffff;
          -webkit-transition: box-shadow 150ms ease;
          transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
          box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
          border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
          background-color: #fefde5 !important;
        }

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

                              <div class="card-header text-center"><h4>Make {{ Session::get('question_price')}} payment </h4>
                                </div>

                
                        <div class="text-center col-md-12">
                          <a href="{{ route('get.paypal', ['price'=> session('question_price')]) }}" ><img src="https://news.androidout.com/wp-content/uploads/sites/3/sites/3/2014/05/paypal.png" height="150px"> </a>
                                               
                        </div>

                        <hr>
                     
                      <div class="col-md-12">
                         <h1>Pay using cards </h1>
                      </div>


                      <form action="{{ route('post.payment') }}" method="post" id="payment-form">
                        {{ csrf_field()}}

                          <label for="card-element">
                            Credit or debit card
                          </label>
                          <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                          </div>

                          <!-- Used to display form errors. -->
                          <div id="card-errors" role="alert"></div>
                        

                        <button class="btn btn-primary">Submit Payment</button>
                      </form>                              
                    
    		          </div>

           <script src="https://js.stripe.com/v3/"></script>
            <script type="text/javascript">
                        // Create a Stripe client.
            var stripe = Stripe('pk_test_LvVBuMY1fQNF0g0xcJFU18ur');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#1e90ff',
                lineHeight: '22px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontWeight:700,
                fontSize: '16px',
                '::placeholder': {
                  color: '#555555'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              stripe.createToken(card).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error.
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                } else {
                  // Send the token to your server.
                  stripeTokenHandler(result.token);
                }
              });
            });

            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);

              // Submit the form
              form.submit();
            }
    </script>


     
                        
	@endsection
