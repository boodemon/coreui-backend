<div class="modal fade "  tabindex="-1" id="modal-import" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title pull-left">Carrier Form</h4>
          <button type="button" class="close pull-right" aria-label="Close"  data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form category input -->
          <form enctype="multipart/form-data" class="form-horizontal" id="frm-user" method="POST" action="">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <input type="hidden" name="id" id="id" />
            <input type="hidden" name="_method" value="POST" />
            
            <div class="form-group row">
              <label class="col-md-3 form-control-label">Cerrier file : </label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" id="file"/>
                <span class="require-file"></span>
              </div>
            </div>
          
            <div class="form-groups text-right">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> SAVE</button>
              <button type="button" class="btn btn-danger"  data-dismiss="modal">
                <i class="fa fa-times"></i> CANCEL</button>
            </div>
          </form>
          <!-- /Form category input -->
        </div>
  </div>
  </div>
</div>