<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- This is the modal -->
<div id="modal-ask-question" uk-modal>

    <div class="uk-modal-dialog">
    <div class="uk-modal-header">
        <h4>
        <a class="uk-modal-close" style="float:right" >X</a>      
        <span class="uk-modal-title">Post Question</span>
        </h4>
    </div>
        
        <div class="uk-modal-body  white">
                <!--Card content-->
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

        </div>
</div>

    <script>
    $(document).ready(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       
        $("#btn-submit").click(function(){
            var qbody =$('input[name=question_body]').val();
            var topic = $('input[name=topic]').val();
            var special =$('input[name =special]').val();
            var file = $('input[name = file]').val();   
            var token =  $('input[name =_token]').val();     

           // console.log(qbody);
            
            $.ajax(
                {
                    type:"POST",
                    data:{
                        '_token' : token,
                        'question_body':qbody,
                        'topic':topic, 
                        'special':special,
                        'file':file    

                    },
                    url: 'ask-questions',
                    success: function(data){
                    console.log(data)
                  }
                }
              );
        });

     });

    </script>
 