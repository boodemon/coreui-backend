<?php $__env->startSection('stylesheet'); ?>
	<link href="<?php echo e(asset('public/lib/jquery-ui-1.12.1.custom/jquery-ui.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('public/lib/plupload-2.1.8/jquery.ui.plupload/css/jquery.ui.plupload.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('public/css/picture-preview.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('public/build/css/content-form.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <i class="icon icon-notebook"></i> Contents
            <div class="pull-right">
                <!--
                <button type="button" id="btn-new" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New</button>
                <button type="button" class="btn btn-sm btn-default btn-delete"><i class="fa fa-trash"></i> Cancel</button>
                -->
            </div>
        </div>
      
        <div class="card-body">
            <!-- START FORM -->
            <form enctype="multipart/form-data" class="form-horizontal" id="frm-content" method="POST" action="<?php echo e($_action); ?>">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                  <input type="hidden" name="id" id="id" value="<?php echo e($id); ?>" />
                  <input type="hidden" name="_method" value="<?php echo e($_method); ?>" />
                <div class="clearfix" style="margin-top:10px; padding-left:10px;">
                  <div class="form-group row" >
                    <label class="col-md-3 form-control-label">CATEGORY : </label>
                    <div class="col-md-4">
                      <select class="form-control" name="category_id">
                          <?php echo App\Models\Category::option( $langs[0]->code , ( count($row) > 0 ? $row->category_id : '' ) ); ?>

                      </select>
                      <span class="require-category_id"></span>
                    </div>
                  </div>
                </div>
                <h4>CONTENT FROM</h4>
                <hr>
              <!-- Start Tab language input header -->
              <?php if( $langs ): ?>
              <ul class="nav nav-tabs" role="tablist">
                <?php foreach( $langs as  $i => $lang ): ?>
                <li class="nav-item">
                  <a class="nav-link <?php echo e($i == 0 ? 'active' : ''); ?>" data-toggle="tab" href="#<?php echo e($lang->code); ?>" role="tab" aria-controls="home">CONTENT <?php echo e($lang->code); ?></a>
                </li>
                <?php endforeach; ?>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" id="tab-map" href="#map" role="tab" aria-controls="map">MAP</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#photo" role="tab" aria-controls="photo">PHOTO</a>
                </li>
              </ul>

              <!-- Blog Tab language input -->
              <div class="tab-content">
                <!-- Start Loob tab content input -->
                 <?php foreach( $langs as $i => $lang ): ?>
                 <?php
                  $lc = $lang->code; 
                 ?>
                 
                <div class="tab-pane <?php echo e($i == 0 ? 'active' : ''); ?>" id="<?php echo e($lang->code); ?>" role="tabpanel">

                    <div class="form-group row">
                        <label class="col-md-3 form-control-label">SUBJECT : </label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="subject[<?php echo e($lang->code); ?>]" value="<?php echo e(count($row) > 0 ? @$row->subject->$lc : ''); ?>"/>
                          <span class="require-subject"></span>
                        </div>
                    </div>
                    <hr>        
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#detail-<?php echo e($lang->code); ?>" role="tab" aria-controls="home">TOUR DETAIL</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#itinerary-<?php echo e($lang->code); ?>" role="tab" aria-controls="home">ITINERARY</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                          <div class="tab-pane active" id="detail-<?php echo e($lang->code); ?>" role="tabpanel">
                              <div class="form-group">
                                  <label class="form-control-label"> </label>
                                  <div class="">
                                    <textarea type="text" class="form-control editor" name="detail[<?php echo e($lang->code); ?>]" ><?php echo e(count($row) > 0 ? $row->detail->$lc : ''); ?></textarea>
                                    <span class="require-detail"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane" id="itinerary-<?php echo e($lang->code); ?>" role="tabpanel">
                              <div class="form-group">
                                  <label class="form-control-label"></label>
                                  <div class="">
                                    <textarea type="text" class="form-control editor" name="itinerary[<?php echo e($lang->code); ?>]" ><?php echo e(count($row) > 0 ? $row->detail->$lc : ''); ?></textarea>
                                    <span class="require-itinerary"></span>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- Google Map Marker -->
                <div class="tab-pane" id="map" role="tabpanel">
                    <input id="pac-input" class="form-control" type="text" placeholder="Search Box">
                  <div id="gmap">
                      <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-danger"></i>
                      <span class="sr-only">Loading...</span>
                  </div>
                  <hr/>
                  <div class="form-group row">
                    <label class="col-md-1">START : </label>
                    <div class="col-md-2">
                      <input type="text" id="start-lat" name="map[start][lat]" class="form-control" value="<?php echo e($row ? @$row->map->start->lat : ''); ?>"/>
                    </div>
                    <div class="col-md-2">
                      <input type="text" id="start-lng" name="map[start][lng]" class="form-control" value="<?php echo e($row ? @$row->map->start->lng : ''); ?>"/>
                    </div>
                    <label class="col-md-1 text-right">END : </label>
                    <div class="col-md-2">
                      <input type="text" id="end-lat" name="map[end][lat]" class="form-control" value="<?php echo e($row ? @$row->map->end->lat : ''); ?>"/>
                    </div>
                    <div class="col-md-2">
                      <input type="text" id="end-lng" name="map[end][lng]" class="form-control" value="<?php echo e($row ? @$row->map->end->lng : ''); ?>"/>
                    </div>
                    <label class="col-md-1 text-right">Zoom : </label>
                    <div class="col-md-1">
                      <input type="text" id="map-zoom" name="map[zoom]" class="form-control" value="<?php echo e($row ? @$row->map->zoom : ''); ?>"/>
                    </div>
                  </div>
                </div>

                <!-- Photo Gallery -->
                <div class="tab-pane" id="photo" role="tabpanel">
                  <div class="form-group row" >
                    <label class="col-md-1 form-control-label">PHOTO : </label>
                    <div class="col-md-11">
                        <div id="gallery" class="multiupload" upload-url="<?php echo e(url('products/content/upload' )); ?>">					
                          <ul id="preview" class="preview">
                            <?php if( count($row) > 0 && count( $row->gallery ) > 0 ): ?>
                              <?php foreach($row->gallery as $g): ?>
                                <li id="gall_<?php echo e($g->id); ?>" class="img-gallery col-sm-3">
                                  <a href="<?php echo e(url('products/content-image-delete/'. $g->id  )); ?>" class="color-red del-preview"><i class="icon-close"></i></a>
                                  <b></b><img src="<?php echo e(asset( 'public/images/contents/'. @$g->attach_file )); ?>" id="img-product-<?php echo e($g->id); ?>" class="img-preview">
                                  <input type="hidden" name="gimage[]" value="<?php echo e($g->id); ?>" />
                                </li>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </ul>
                          <button type="button" class="btn btn-default" id="btn-select"><i class="fa fa-image"></i> เลือกรูปภาพ</button>
                        </div>
                    </div>
                </div>
                </div>
              </div>
              <!-- / End Tab language input -->
              <!-- /Form category input -->
              <div class="clearfix" style="margin-top:10px; padding-left:10px;">

                  <div class="form-group row" >
                      <label class="col-md-2 form-control-label">SORT : </label>
                      <div class="col-md-2">
                        <input type="text" class="form-control" name="content_sort" value="<?php echo e(count($row) > 0 ? $row->content_sort : old('content_sort')); ?>" />
                        <span class="require-content_sort"></span>
                      </div>
                      <label class="col-md-3 form-control-label"></label>
                      <div class="col-md-4">
                          <label class="checkbox">
                              <input type="checkbox" name="published" <?php echo e(( count( $row ) > 0 && $row->published == 'Y' ) ? 'checked' : ''); ?> /> PUBLISH
                          </label>
                        <span class="require-published"></span>
                      </div>
                  </div>
                  
                  <div class="form-groups text-right">
                    <button type="submit" class="btn btn-primary" id="btn-save">
                      <i class="fa fa-save"></i> SAVE</button>
                    <button type="button" class="btn btn-danger" >
                      <i class="fa fa-times"></i> CANCEL</button>
                  </div>
              </div>
            </form>
            <!-- /End FORM -->
        </div>
    </div>
    <div id="gmap" style="200px;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPFfbRmBZxXERbP26P8Ao-0YFY8Den2hU&callback=initAutocomplete&libraries=places" async defer></script>
  <script src="<?php echo e(asset('public/lib/jquery-ui-1.12.1.custom/jquery-ui.js')); ?>"></script>
	<script src="<?php echo e(asset('public/lib/tinymce/tinymce.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('public/lib/tools/tiny-editor-v2.js')); ?>" type="text/javascript"></script>
  
	<script type="text/javascript" src="<?php echo e(asset('public/lib/plupload-2.1.8/plupload.full.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/lib/plupload-2.1.8/jquery.plupload.queue/jquery.plupload.queue.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/lib/plupload-2.1.8/jquery.ui.plupload/jquery.ui.plupload.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/lib/tools/plupload-v2.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('public/build/js/content-form.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>