@extends('layouts.current-template')

    @section('title')

    Set Price

    @endsection

    @section('content')


       <!-- Card Light -->
        <div class="card">

      
        
            <div class="row" style="text-align: center; margin-bottom:70px;" >

                <div class="col-xl-12">     
        <!-- Card Light -->
                    
                    <!-- Link -->

                                <!-- Nav tabs -->
                     <ul class="nav nav-tabs md-tabs nav-justified indigo" role="tablist">
                         <li class="nav-item">
                             <a class="nav-link active" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-user"></i>Question Details</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-heart"></i> Chat Box </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-envelope"></i> Files </a>
                         </li>
                     </ul>
                     <!-- Tab panels -->
                     <div class="tab-content">
                         <!--Panel 1-->
                         <div class="tab-pane fade in show active" id="panel5" role="tabpanel">
                             <br>
                              <div class="row col-md-12">              
                
                                    <div class="col-md-3" >
                                        <p>Category: {{$question->order_subject}}</p>
                                    </div>
                                    <div class="col-md-3" >
                                 
                                        <p>Time left: {!! $difference !!} </p>
                                    
                                    </div>
                                   @if(Auth::user()->user_role=='admin')
                                    <div class="col-md-3">                    
                                         <p>Price: ${{ $question->question_price}}</p>
                                       
                                     </div>
                                      @endif
                               
                                    <div class="col-md-3" >
                                        <span >
                                            <p>Price: ${{ $question->question_price}}</p>
                                        </span>
                                    </div>
                                    <div class="col-md-3">
                                      
                                      <span>Posted:{{ $question->created_at }}</span>
                                    </div>
                                </div>
                                    <hr class="my-4">
                                <div class="row container">
                                    <div class="col-md-2 ">
                                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img(31).jpg" class="img-fluid z-depth-1 rounded-circle img-thumbnail" alt="Responsive image">
                                        <hr>
                                                       

                            <span style="font-weight:800; color:#337ab7;">{{ ucfirst(strstr($question->user_id, '@', true)) }}

                                        </span> Posted a Question 
                            <hr>
                             </div>

                                <div class="col-md-10 text-left ">
                                    
                                  {!! htmlspecialchars_decode($question-> question_body) !!}
                                </div>
                            </div>
                            
                         </div>
                         <!--/.Panel 1-->
                         <!--Panel 2-->
                         <div class="tab-pane fade" id="panel6" role="tabpanel">
                             <br>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                         </div>
                         <!--/.Panel 2-->
                         <!--Panel 3-->
                         <div class="tab-pane fade" id="panel7" role="tabpanel">
                            <br>
                          
                             
                               <h4> Question attachments</h4>
                               <hr>


                                @foreach($files as $file)

                                    <p class="down-files"><a href="{{route('file-download',
                                                    [
                                                        'question_id' =>$question->question_id,
                                                        'filename'=>$file['basename'],
                                                        'type' =>'question'
                                                     ])}}"
                                        ><i class="icon-download-alt">{{$file['basename'] }}</a>   </p>
                                @endforeach
                                <hr>

                               <div class="text-center">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#post-ans">Post Answer now</a>
                                </div>
                               <hr>
                               <table class="table">
                               @foreach($answer_files as $file)
                                <tr>
                                <td> <span style="font-size: 38px; color: blue"><i class="fas fa-file"></i></span></td>
                                <td> <p style="font-size:18px;color:blue; font-weight: 800" class="down-files"><a href="{{route('file-download',
                                                    [
                                                        'question_id' =>$question->question_id,
                                                        'filename'=>$file['basename'],
                                                        'type' =>'answer'
                                                     ])}}"
                                        ><i class="icon-download-alt">{{$file['basename'] }}</a>   </p>
                                </td>
                                    
                                </tr>                          

                                    
                                @endforeach
                            </table>

                             <hr>

                             <div class="row col-md-12 text-left card-body">              
                <p>
                        <div class="col-md-4" >
                        <a href="" class="btn btn-success btn-rounded mb-4" data-toggle="modal" data-target="#accept-ans">Accept answer</a>
                        
                        </div>
                       
                        <div class="col-md-4">                    
                            
                           <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#revision">Put on revision</a>
                         </div>
                          
        
                        <div class="col-md-4">
                          <a href="" class="btn btn-secondary btn-rounded mb-4" data-toggle="modal" data-target="#re-assign">Reassign the question</a>
                        </div>

                    </p>
                    </div>
                         </div>
                         <!--/.Panel 3-->
                     </div>
     
            </div>
         
    </div>
    </div>

       <div class="card" style="margin-top: 20px;">
          <div class="card-header"> <h3>Question Details </h3></div>
          <br>
            <div class="row col-md-12 text-left card-body">              
                <p>
                        <div class="col-md-4" >
                     
                            <p>Page Numbers: {{ $question->pagenum}} </p>
                             <p>Writing Style: {{ $question->lang_style}}</p>
                             
                        
                        </div>
                       
                        <div class="col-md-4">                    
                             <p>Spacing: {{ $question->spacing}}</p>
                              <p>Paper Format: {{ $question->paper_format}}</p>
                              <p>Paper Type: {{ $question->paper_type}}</p>
                           
                         </div>
                          
        
                        <div class="col-md-4">
                          <p>Subject: {{ $question->order_subject}}</p>
                            <p>Academic Level: {{$question->academic_level}}</p>
                        </div>

                    </p>
                    </div>

                           
            </div>

        <div class="card" style="margin-top: 20px;">
          <div class="card-header"> <h3>Tutor Bids </h3></div>
          <br>
            <div class="row col-md-12 text-left card-body">              
                <p>
                        <div class="col-md-6" >                     
                            <p>Accept offer: $45</p>
                            <p>Interested Tutors: 44</p>
                            <p>My Bid: $45</p>                            
                        
                        </div>                                       
        
                        <div class="col-md-6">
                            <p>Accept offer: $45</p>
                            <p>Interested Tutors: 44</p>
                            <p>My Bid: $45</p>
                        </div>

                    </p>
                    </div>

                           
            </div>

    <div class="modal fade bottom" id="post-ans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">


      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header ">
                <h4 class="modal-title" id="exampleModalLongTitle"> Post Your Answer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

         <div class="row d-flex justify-content-center align-items-center">

          
            <div class="col-xl-12">
                <div class="card-body">
                    <form action="{{ route('update-question', ['question_id' => $question->question_id]) }}"  enctype="multipart/form-data" method="POST">
                   {{ csrf_field() }} 
                                            
                    <input type="hidden" name="update" value="post-ans">

                      <div class="form-group">
                      @include('part.file-picker')
                     </div>                 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Post answer</button>
            </form>

            </div>
              
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Frame Modal Bottom -->


<!-- Beginning of accepted here  -->
  <div class="modal fade bottom" id="accept-ans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">


      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header ">
                <h4 class="modal-title" id="exampleModalLongTitle"> Post Your Answer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

         <div class="row d-flex justify-content-center align-items-center">

          
            <div class="col-xl-12">
                <div class="card-body">
                    <form action="{{ route('update-question', ['question_id' => $question->question_id]) }}" method="POST">
                   {{ csrf_field() }} 
                                            
                    <input type="hidden" name="update" value="accept-ans">
                                     
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Post answer</button>
            </form>

            </div>
              
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- End o Accepted -->
    
 @endsection
