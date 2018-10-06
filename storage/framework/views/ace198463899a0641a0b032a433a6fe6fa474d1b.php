<div id="modal-sections" uk-modal>
    <div class="uk-modal-dialog">
       
          <div class="uk-modal-header uk-flex-top">
            <button class="uk-modal-close-default uk-align-right" type="button" uk-close></button>
            <h2 class="uk-modal-title">Upload your Images</h2>
          </div>
          
          <div class="modal-body">
            <form method="POST" action="<?php echo e(route('profile-pic')); ?>" enctype="multipart/form-data" />
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">                 
                <div class="form-group">
                    <input type="file" class=" form-control"
                    placeholder="No file selected" name="file[]" multiple id="file-input" /> 
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">                      
              </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary uk-modal-close">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
       </div>
</div>