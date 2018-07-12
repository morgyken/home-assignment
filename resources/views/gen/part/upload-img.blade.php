
<style>
#orangeModalSubscription{
    margin-top: 50px;
    z-index: 2000;

    }
</style>
<div class="modal fade" data-backdrop="false" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header center">
              <h5 class="modal-title" id="exampleModalLabel">Upload Your Photos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          
          <div class="modal-body">
          <form method="POST" action="{{route('profile-pic')}}" enctype="multipart/form-data" />
               
              <div class="form-group">
                    <input type="file" class=" form-control"
                    placeholder="No file selected" name="file[]" multiple id="file-input" /> 
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                      
              </div>
          <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
      </div>
  </div>
</div>

