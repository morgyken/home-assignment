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
                                            @if(Auth::user()->user_role=='tutor')
                                            <p>Price: ${{ $question->tutor_price}}</p>
                                            @else
                                            <p>Price: ${{ $question->question_price}}</p>
                                            @endif
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
                             @include('part.chat')

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
                                   @if($assigned == 1)
                            <hr>
                               <div class="text-center">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#post-ans">Post Answer now</a>
                                </div>
                                <hr>
                                @endif

                            @if($role != 'tutor')

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

                            @if($question->status == 'answered')

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
                          <a href="" class="btn btn-secondary btn-rounded mb-4" data-toggle="modal" data-target="#reassign">Reassign the question</a>
                        </div>

                    </p>
                    </div>
                    @else
                    <h4> The Question has not been Answered</h4>
                      @endif

                      @endif
                         </div>
                         <!--/.Panel 3-->

                     </div>

            </div>

    </div>
    </div>
    @if($role == 'admin')
    <div class="card" style="margin-top: 20px;">
      <div class="card-header text-center"> <h3>Admin Pannel</h3></div>
      <br>

        <div class="row col-md-12 text-left card-body">
            <p>
                    <div class="col-md-6" >

                    <form method="post" action="{{ route('assign-question', ['question_id' => $question->question_id])  }}">
                         {{ csrf_field() }}

                    <h5>Select a tutor to assign the Question</h5>
                        @if(count($bids)  >=1  )

                        <?php

                        $num = 1;

                        ?>

                            @foreach($bids as $bid => $key)

                        <?php
                        ++ $num;

                        ?>

                                 <div>
                                    <input type="radio" id="huey" name="tutor_id" value="{{ $key->tutor_id }}"  checked />
                                    <label for="huey">{{$num }}:- Tutor Keen | ${{$key->bid_price}} | {{ $key->question_deadline }} </label>
                                </div>
                            @endforeach

                                <button class="btn btn-warning btn-rounded"> Assign Question</button>
                        @else
                        <h6>The Question has no Bids </h6>

                        @endif



                        </form>


                        <form  action="" type="post">
                            <h5> Or just assign your favourite tutor</h5>

                        </form>



                    </div>

                    <div class="col-md-6">
                        <button class="btn btn-secondary"> Reassign </button> <br>
                        <button class="btn btn-secondary">Adjust Price </button> <br>
                        <button class="btn btn-secondary">Adjust Deadline</button> <br>
                    </div>

                </p>
                </div>


        </div>

      @endif

       <div class="card" style="margin-top: 20px;">
          <div class="card-header text-center"> <h3>Question Details </h3></div>
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
                            @if($assigned == 1)
                             <p>Number of Bids: {{$question->academic_level}}</p>
                             @else
                              <p>Assigned to: {{$tutor}}</p>
                             @endif
                        </div>

                    </p>
                    </div>


            </div>



        @if(Auth::user()->user_role != 'tutor')
        <div class="card" style="margin-top: 20px;">
          <div class="card-header text-center"> <h3>Tutor Bids </h3></div>
          <br>

            <div class="row col-md-12 text-left card-body">
                <p>
                        <div class="col-md-6" >

                        <form method="post" action="{{ route('assign-question', ['question_id' => $question->question_id])  }}">
                             {{ csrf_field() }}

                        <h5>Select a tutor to assign the Question</h5>
                            @if(count($bids)  >=1  )

                            <?php

                            $num = 1;

                            ?>

                                @foreach($bids as $bid => $key)

                            <?php
                            ++ $num;

                            ?>

                                     <div>
                                        <input type="radio" id="huey" name="tutor_id" value="{{ $key->tutor_id }}"  checked />
                                        <label for="huey">{{$num }}:- Tutor Keen | ${{$key->bid_price}} | {{ $key->question_deadline }} </label>
                                    </div>
                                @endforeach

                                    <button class="btn btn-warning btn-rounded"> Assign Question</button>
                            @else
                            <h6>The Question has no Bids </h6>

                            @endif



                            </form>


                            <form  action="" type="post">
                                <h5> Or just assign your favourite tutor</h5>

                            </form>



                        </div>

                        <div class="col-md-6">
                            <p>Accept offer: $45</p>
                            <p>Interested Tutors: 44</p>
                            <p>My Bid: $45</p>
                        </div>

                    </p>
                    </div>


            </div>
            @else
            @if($assigned != 1)

            <div class="card" style="margin-top: 20px;">
          <div class="card-header text-center"> <h4>Answer Question</h4></div>
          <br>
            <div class="row col-md-12 text-left card-body">
                <p>
                        <div class="col-md-6" >
                            <a href="" data-toggle="modal" data-target="#bid" class="btn btn-secondary btn-rounded btn-block">
                                Place Bid
                            </a>

                        </div>

                        <div class="col-md-6">
                            <a href="" data-toggle="modal" data-target="#assign" class="btn btn-secondary btn-rounded btn-block">
                                Commit to Answer
                            </a>
                        </div>

                    </p>
                    </div>


            </div>
            @endif

        @endif

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
                    <h4>Rate tutor</h4>
                    <div class="col-md-2">
                          <label><input type="radio" id="urg" value="1" name="rating">Poor</label>
                        </div>
                        <div class="col-md-2">
                          <label><input type="radio" id="urg" value="2" name="rating">Average</label>
                        </div>
                        <div class="col-md-2">
                          <label><input type="radio" id="urg" value="3" name="rating">Good</label>
                        </div>
                        <div class="col-md-2">
                          <label><input type="radio" id="urg" value="4" name="rating">Very Good</label>
                        </div>
                        <div class="col-md-2">
                          <label><input type="radio" id="urg" value="5" name="rating">Excellent!</label>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"> Accept Answer </button>
            </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- End o Accepted -->


  <!-- Reassign the questions   -->
  <div class="modal fade bottom" id="reassign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">


      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header ">
                <h4 class="modal-title" id="exampleModalLongTitle"> Reassing Question</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

         <div class="row d-flex justify-content-center align-items-center">


            <div class="col-xl-12">
                <div class="card-body">
                    <form action="{{ route('update-question', ['question_id' => $question->question_id]) }}" method="POST">
                   {{ csrf_field() }}

                    <input type="hidden" name="update" value="reassign">
                    <h4>Select Tutor</h4>
                    <div class="col-md-12">
                        @include('part.auto-com')
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"> Accept Answer </button>
            </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- End of REassign Question -->

  <!-- Reassign the questions   -->
  <div class="modal fade bottom" id="revision" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">


      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header ">
                <h4 class="modal-title" id="exampleModalLongTitle"> Reassing Question</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

         <div class="row d-flex justify-content-center align-items-center">


            <div class="col-xl-12">
                <div class="card-body">
                    <form action="{{ route('update-question', ['question_id' => $question->question_id]) }}" method="POST">
                   {{ csrf_field() }}

                    <input type="hidden" name="update" value="revision">
                    <h4>Are you sure you want to put the question on Revision? </h4>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"> Put on Revision </button>
            </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- End of REassign Question -->

  <!--Place Question Bids -->
  <div class="modal fade bottom" id="bid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">


      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header ">
                <h4 class="modal-title" id="exampleModalLongTitle"> Place a bid </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

         <div class="row d-flex justify-content-center align-items-center">


            <div class="col-xl-12">
                <div class="card-body">
                    <form action="{{ route('post-bids', ['question_id' => $question->question_id, 'tutor_id' => Auth::user()->email]) }}" method="POST">
                   {{ csrf_field() }}
                    <h4>Confirm that you will provide answer at the right time and appropriate answer. If you are not sure Use the CANCEL button to return back? </h4>
                    <div class="form-group">

                        <input type="text" name="bid_price" class="form-control" placeholder="Enter Bid Price">

                    </div>

                    <div class="form-group">

                        @include ('part.datetimepicker')

                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"> Place Bid </button>
            </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Place Bids  -->

  <!--Place Question Bids -->
  <div class="modal fade bottom" id="assign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-frame modal-bottom col-xl-10" role="document">


      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header ">
                <h4 class="modal-title" id="exampleModalLongTitle"> Place a bid </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

         <div class="row d-flex justify-content-center align-items-center">


            <div class="col-xl-12">
                <div class="card-body">

                    <form action="{{ route('assign-question', ['question_id' => $question->question_id, 'tutor_id' => Auth::user()->email]) }}" method="POST">

                   {{ csrf_field() }}

                    <h4>
                        Confirm that you will provide answer at the right time and appropriate answer. If you are not sure Use the CANCEL button to return back?
                    </h4>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"> Commit to answer</button>
                </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Place Bids  -->

 @endsection
