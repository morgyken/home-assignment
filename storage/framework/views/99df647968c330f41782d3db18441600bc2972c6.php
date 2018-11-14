    <?php $__env->startSection('title'); ?>

    Payment Metadata

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
    .text-danger strong {
        color: #9f181c;
    }
    .receipt-main {
      background: #ffffff none repeat scroll 0 0;
      border-bottom: 12px solid #333333;
      border-top: 12px solid #9f181c;
      margin-top: 50px;
      margin-bottom: 50px;
      padding: 40px 30px !important;
      position: relative;
      box-shadow: 0 1px 21px #acacac;
      color: #333333;
      font-family: open sans;
    }
    .receipt-main p {
      color: #333333;
      font-family: open sans;
      line-height: 1.42857;
    }
    .receipt-footer h1 {
      font-size: 15px;
      font-weight: 400 !important;
      margin: 0 !important;
    }
    .receipt-main::after {
      background: #414143 none repeat scroll 0 0;
      content: "";
      height: 5px;
      left: 0;
      position: absolute;
      right: 0;
      top: -13px;
    }
    .receipt-main thead {
      background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
      color:#fff;
    }
    .receipt-right h5 {
      font-size: 16px;
      font-weight: bold;
      margin: 0 0 7px 0;
    }
    .receipt-right p {
      font-size: 12px;
      margin: 0px;
    }
    .receipt-right p i {
      text-align: center;
      width: 18px;
    }
    .receipt-main td {
      padding: 9px 20px !important;
    }
    .receipt-main th {
      padding: 13px 20px !important;
    }
    .receipt-main td {
      font-size: 13px;
      font-weight: initial !important;
    }
    .receipt-main td p:last-child {
      margin: 0;
      padding: 0;
    } 
    .receipt-main td h2 {
      font-size: 20px;
      font-weight: 900;
      margin: 0;
      text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
      font-weight: 100;
      margin: 34px 0 0;
      text-align: right;
      text-transform: uppercase;
    }
    .receipt-header-mid {
      margin: 24px 0;
      overflow: hidden;
    }
    
    #container {
      background-color: #dcdcdc;
    }
  </style>

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

      #card-element{
         margin-top: 50px;
        margin-bottom:50px;
      }
     
      
    </style>

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
                    
                    
                    <!-- Link -->
                </div>
            <div class="col-md-12" style="text-align: center; margin-bottom:70px;" >
              <form action="<?php echo e(route('post.payment')); ?>" class="" method="post" >

                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">     
                       
                         
                          
                              <div class="row container ">                              
	                             
	 
    
            <div class="receipt-main col-md-12">
                <table class="table table-bordered">
          <tr>       <td class="col-md-6"> <h2>Order Serial: <?php echo e(session('question_id')); ?> </h2></td>
                              <td class="col-md-3"> <h2>Amount: <i class="fa fa-usd"></i><?php echo e(substr(session('question_price'), 2)); ?> </h2></td>
                          </tr>

           </table>  
             <hr class="my-4">      
          
                <div>
                    <table class="table table-bordered">
                        <thead>

                            <tr>
                                <th> Payment Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td class="col-md-9">Zip Code</td>
                                <td class="col-md-3"><i class="fa fa-inr"></i> 6,00/-</td>
                            </tr>
                            <tr>
                                <td class="col-md-9">City: </td>
                                <td class="col-md-3"><i class="fa fa-inr"></i> 35,00/-</td>
                            </tr>
                              <tr>
                                <td class="col-md-9">Country: </td>
                                <td class="col-md-3"><i class="fa fa-inr"></i> 35,00/-</td>
                            </tr>

                            <tr>
                                <td class="text-right">
                                <p>
                                    <strong>Total Amount: </strong>
                                </p>
                                <p>
                                    <strong>Tax: </strong>
                                </p>
                  <p>
                                    <strong>Shipping: </strong>
                                </p>
                
                  </td>
                                <td>
                                <p>
                                    <strong><i class="fa fa-usd"></i><?php echo e(substr(Session::get('question_price'),2)); ?></strong>
                                </p>
                                <p>
                                    <strong><i class="fa fa-usd"></i><?php echo e(0.16 * substr(Session::get('question_price'),2)); ?></strong>
                                </p>
                  <p>
                                    <strong><i class="fa fa-usd"></i> <?php echo e(0.024 * substr(Session::get('question_price'),2)); ?></strong>
                                </p>
                 
                  </td>
                            </tr>
                             <tr>
                               
                                <td class="text-right"><h2><strong>Total: </strong></h2></td>
                                <td class="text-left text-danger"><h2><strong><i class="fa fa-usd"></i> <?php echo e(1.184 * substr(Session::get('question_price'),2)); ?></strong></h2></td>
                            </tr>

                          </tbody>
                        </table>
                        <div class="container">
                          
                     

                        <table class="table table-bordered">
                          <tbody>
                           
                             <tr>
                               
                                <td class="text-center">
                                        
                                         <a href="<?php echo URL::to('paypal', ['price' => substr(Session::get('question_price'),2), 'qid' => session('question_id')]); ?>" ><img src="https://news.androidout.com/wp-content/uploads/sites/3/sites/3/2014/05/paypal.png" height="120px"> </a>
                                          
                                  
                                   </td>
                                
                            </tr>

                             <tr>
                               
                                <td class="text-center">
                                        
                                         
                        <h1>OR </h1>
                         <h4>Pay using cards </h4>

                         <img src="<?php echo e(asset('img/card.jpg')); ?>">                    


                      <form action="<?php echo e(route('post.payment')); ?>" method="post" id="payment-form">
                        <?php echo e(csrf_field()); ?>

                          <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                          </div>

                          <!-- Used to display form errors. -->
                          <div id="card-errors" role="alert"></div>
                        

                        <button class="btn btn-primary">Submit Payment</button>
                      </form>    
                                  
                                   </td>
                                
                            </tr>
                        </tbody>
                    </table>
                       </div>
                </div>
          
      

                            

                                     
                                  
                                   </div>
                                 
                                  </form>  

                              
                                                    
                    
                   
            </div>
        </div>
        <!-- Card Light -->
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

        



                  
                
		        </div>
		     <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.current-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>