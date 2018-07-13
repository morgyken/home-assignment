<!-- Button trigger modal -->

<div class="modal modal-fluid fade" data-backdrop="false"
 id="getAskQuestions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">

  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header center">
              <h5 class="modal-title" id="exampleModalLabel">Post Questions Below</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          
          <div class="modal-body">
          <form action="{{route('ask-questions')}}" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        
                        <input type="text" name="topic" class="form-control input-lg" placeholder="Enter Topic" required="required"  id="topic">
                    </div>

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

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
      </div>
  </div>
</div>


