<!-- This is the modal -->
<div id="modal-ask-question" uk-modal>

    <div class="uk-modal-container">
    <div class="uk-modal-header">
        <h4>
        <a class="uk-modal-close" style="float:right" >X</a>      
        <span class="uk-modal-title">Post Question</span>
        </h4>
    </div>
        
        <div class="uk-modal-body white">
                <!--Card content-->
            <div class="card-body">   
                <form action="{{route('ask-questions')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <input type="text" name="topic" class="form-control input-lg" placeholder="Enter Topic" required="required"  id="topic">
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
                            <button class="uk-button uk-button-primary" type="submit">Save Details</button>
                    </div>
                </form> 
            </div>

        </div>
</div>

