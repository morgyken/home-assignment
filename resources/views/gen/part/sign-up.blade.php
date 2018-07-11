<!-- Form -->
            <form method="post" action="{{route('register')}}">
                  <!-- Heading -->
                  <h4 class="dark-grey-text text-center">
                    <strong>Sign Up Here </strong>
                  </h4>
                  <hr>

                  <div class="md-form {{ $errors->has('name') ? ' has-error' : '' }}">
                    <i class="fa fa-user prefix grey-text"></i>
                  
                    <input type="text" name="name" id="name" class="form-control ">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <label for="form3">Username</label>
                    @if ($errors->has('name'))
                            <span class="help-block">
                               <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div class="md-form {{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="fa fa-envelope prefix grey-text"></i>
                
                    <input type="text" name="email" id="email" class="form-control ">
                    <label for="form2">Your Email</label>
                    @if ($errors->has('email'))
                            <span class="help-block">
                               <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                  </div>

                
                   <div class="md-form {{ $errors->has('password') ? ' has-error' : '' }}">
                   
                    <i class="fas fa-unlock-alt prefix grey-text"></i>
                  {{ csrf_field() }}
                    <input type="password" name="password" id="pwd" class="form-control ">
                    <label for="form3">Your Password</label>
                    @if ($errors->has('password'))
                            <span class="help-block">
                               <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                  </div>

                    <div class="md-form {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                   
                   <i class="fas fa-unlock-alt prefix grey-text"></i>
                 {{ csrf_field() }}
                   <input type="password" name="password_confirmation" id="pwd" class="form-control ">
                   <label for="form3">Confirm Password</label>
                   @if ($errors->has('password'))
                           <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                           </span>
                       @endif
                 </div>

                  <div class="md-form {{ $errors->has('intro-text') ? ' has-error' : '' }}">
                   
                      <i class="fa fa-pencil prefix grey-text"></i>
                  {{ csrf_field() }}
                    <textarea type="text" name="intro-text" id="message" class="md-textarea"></textarea>
                    <label for="form8">Set profile heading text.. </label>
                    @if ($errors->has('message'))
                            <span class="help-block">
                               <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                  </div>

                  <div class="text-center">
                    <button class="btn btn-indigo">Send</button>
                    <hr>
                    <fieldset class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox1">
                      <label for="checkbox1" class="form-check-label dark-grey-text">Subscribe me to the newsletter</label>
                    </fieldset>
                  </div>

                </form>