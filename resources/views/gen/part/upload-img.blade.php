<style>
#orangeModalSubscription{
    margin-top: 50px;
    z-index: 2000;
    }
</style>


<div id="modal-sections" uk-modal>
    <div class="uk-modal-dialog">
    <div class="modal-content">
         
          <div class="uk-modal-header">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <h2 class="uk-modal-title">Upload your Images</h2>
          </div>
          
          <div class="modal-body">
            <form method="POST" action="{{route('profile-pic')}}" enctype="multipart/form-data" />
                
                    <div class="form-group">
                            <input type="file" class=" form-control"
                            placeholder="No file selected" name="file[]" multiple id="file-input" /> 
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary uk-modal-close">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
            </div>
    </div>
    </div>
</div>





<div id="modal-sections" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Modal Title</h2>
        </div>
        <div class="uk-modal-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Save</button>
        </div>
    </div>



  
