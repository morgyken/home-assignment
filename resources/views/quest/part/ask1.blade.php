@extends('layouts.new-layout')

@section('content')

<div class="card-body ">   
                <form class="uk-overflow-container" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <input type="text" name="topic"  id ="topic" class="form-control input-lg" placeholder="Enter Topic" required="required"  id="topic">
                    </div>

                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                    @include('part.ckeditor')
                    </div>

                    <div class="form-group">
                        <label for="comment">Special Instructions </label>
                        <textarea class="form-control" name="special" rows="5" id="comment"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="usr">Include Files</label>
                        @include('part.file-picker')
                    </div>       
                    <div class="uk-modal-footer uk-text-right" >
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button  class="uk-button 
                            uk-button-primary" id="btn-submit" type="submit">Save Details</button>
                    </div>
                </form> 
            </div>


    <script type="text/javascript">   

        $("#btn-submit").click(function(event){
            event.preventDefault();
         
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                });
      
                    var qbody =$('input[name=question_body]').val();
                    var topic = $('input[name=topic]').val();
                    var special =$('input[name =special]').val();
                    var file = $('input[name = file]').val();   
                    var token = "{{ csrf_token() }}";     

           // console.log(qbody)
                       
            $.ajax(
                {
                    type:"POST",
                    data:{
                        '_method':'POST'
                        '_token' : token,
                        'question_body':qbody,
                        'topic':topic, 
                        'special':special,
                        'file':file, 
                    },
                    url: "{{url('ask-questions')}}",
                    contentType:"application/json",
                    dataType:'json',
                    success: function(data){
                    console.log(data)
                    }
                    error: function(xhr, textStatus, error){
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);  }
                }
              );
        });

    </script>

    @endsection