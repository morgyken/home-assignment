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
                <input type="hidden" name="_token" value="{{ csrf_token() }}">                 
                <div class="js-upload" uk-form-custom>
                    <input type="file" name="file" multiple>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
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