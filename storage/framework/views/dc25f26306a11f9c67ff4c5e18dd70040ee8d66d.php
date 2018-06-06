<div class="modal fade "  tabindex="-1" id="modal-language" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title pull-left">Language setting</h4>
          <button type="button" class="close pull-right" aria-label="Close"  data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form category input -->
          <form enctype="multipart/form-data" class="form-horizontal" id="frm-language" method="POST" action="">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <input type="hidden" name="id" id="id" />
            <input type="hidden" name="_method" />
            
            <div class="form-group row">
              <label class="col-md-3 form-control-label">Code : </label>
              <div class="col-md-4">
                <input type="text" class="form-control" name="code" id="code"/>
                <span class="require-code"></span>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 form-control-label">Name : </label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="name" id="name"/>
                <span class="require-name"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 form-control-label">Sort : </label>
              <div class="col-md-2">
                <input type="text" class="form-control" name="lang_sort" id="lang_sort"/>
                <span class="require-name"></span>
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