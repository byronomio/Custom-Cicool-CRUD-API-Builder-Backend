
<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Products        <small><?= cclang('new', ['Products']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/siteproduct'); ?>">Products</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Products</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Products']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_siteproduct', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_siteproduct', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="id" class="col-sm-2 control-label">Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id" id="id" placeholder="Id" value="<?= set_value('id'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="product_name" class="col-sm-2 control-label">Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Name" value="<?= set_value('product_name'); ?>">
                                <small class="info help-block">
                                <b>Input Product Name</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="sku" class="col-sm-2 control-label">SKU 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sku" id="sku" placeholder="SKU" value="<?= set_value('sku'); ?>">
                                <small class="info help-block">
                                <b>Input Sku</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="category_main" class="col-sm-2 control-label">Parent 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="category_main[]" id="category_main" data-placeholder="Select Parent" multiple >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('category_main') as $row): ?>
                                    <option value="<?= $row->category_name ?>"><?= $row->category_name; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Category Main</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="category_sub" class="col-sm-2 control-label">Child 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="category_sub[]" id="category_sub" data-placeholder="Select Child" multiple >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('category_sub') as $row): ?>
                                    <option value="<?= $row->category_sub_name ?>"><?= $row->category_sub_name; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Category Sub</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="brand" class="col-sm-2 control-label">Brands 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="brand[]" id="brand" data-placeholder="Select Brands" multiple >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('brand') as $row): ?>
                                    <option value="<?= $row->brand_name ?>"><?= $row->brand_name; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Brand</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="simpleorvariant" class="col-sm-2 control-label">Type 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <?php foreach (db_get_all_data('form_single_or_variant') as $row): ?>
                                    <div class="col-md-3  padding-left-0">
                                    <label>
                                    <input type="checkbox" class="flat-red" name="simpleorvariant[]" value="<?= $row->id ?>"> <?= $row->id; ?>
                                    </label>
                                    </div>
                                    <?php endforeach; ?>  
                                    <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                    </small>
                                    </div>
                                    
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="price" class="col-sm-2 control-label">Price 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?= set_value('price'); ?>">
                                <small class="info help-block">
                                <b>Input Price</b> Max Length : 39.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="description" class="col-sm-2 control-label">Desc 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="description" name="description" rows="5" class="textarea form-control"><?= set_value('description'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="whatsinthebox" class="col-sm-2 control-label">WITB 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="whatsinthebox" name="whatsinthebox" rows="5" class="textarea form-control"><?= set_value('whatsinthebox'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="first_image" class="col-sm-2 control-label">First 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <div id="siteproduct_first_image_galery"></div>
                                <input class="data_file" name="siteproduct_first_image_uuid" id="siteproduct_first_image_uuid" type="hidden" value="<?= set_value('siteproduct_first_image_uuid'); ?>">
                                <input class="data_file" name="siteproduct_first_image_name" id="siteproduct_first_image_name" type="hidden" value="<?= set_value('siteproduct_first_image_name'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="second_image" class="col-sm-2 control-label">Second 
                            </label>
                            <div class="col-sm-8">
                                <div id="siteproduct_second_image_galery"></div>
                                <input class="data_file" name="siteproduct_second_image_uuid" id="siteproduct_second_image_uuid" type="hidden" value="<?= set_value('siteproduct_second_image_uuid'); ?>">
                                <input class="data_file" name="siteproduct_second_image_name" id="siteproduct_second_image_name" type="hidden" value="<?= set_value('siteproduct_second_image_name'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="gallery" class="col-sm-2 control-label">Gallery 
                            </label>
                            <div class="col-sm-8">
                                <div id="siteproduct_gallery_galery"></div>
                                <div id="siteproduct_gallery_galery_listed"></div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="website" class="col-sm-2 control-label">Websites 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="website[]" id="website" data-placeholder="Select Websites" multiple >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('website') as $row): ?>
                                    <option value="<?= $row->website_name ?>"><?= $row->website_name; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Website</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="status" class="col-sm-2 control-label">Status 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="status[]" id="status" data-placeholder="Select Status" multiple >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('status') as $row): ?>
                                    <option value="<?= $row->status_name ?>"><?= $row->status_name; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Status</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                        
                        
                                                <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                           <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                 <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){

                          
      $('#btn_cancel').click(function(){
        swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/siteproduct';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_siteproduct = $('#form_siteproduct');
        var data_post = form_siteproduct.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/siteproduct/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('.steps li').removeClass('error');
          $('form').find('.error-input').remove();
          if(res.success) {
            var id_first_image = $('#siteproduct_first_image_galery').find('li').attr('qq-file-id');
            var id_second_image = $('#siteproduct_second_image_galery').find('li').attr('qq-file-id');
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            $('#siteproduct_gallery_galery').find('li').each(function() {
               $('#siteproduct_gallery_galery').fineUploader('deleteFile', $(this).attr('qq-file-id'));
            });
            if (typeof id_first_image !== 'undefined') {
                    $('#siteproduct_first_image_galery').fineUploader('deleteFile', id_first_image);
                }
            if (typeof id_second_image !== 'undefined') {
                    $('#siteproduct_second_image_galery').fineUploader('deleteFile', id_second_image);
                }
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
          } else {
            if (res.errors) {
                
                $.each(res.errors, function(index, val) {
                    $('form #'+index).parents('.form-group').addClass('has-error');
                    $('form #'+index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">`+val+`</div>
                      `);
                });
                $('.steps li').removeClass('error');
                $('.content section').each(function(index, el) {
                    if ($(this).find('.has-error').length) {
                        $('.steps li:eq('+index+')').addClass('error').find('a').trigger('click');
                    }
                });
            }
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
              var params = {};
       params[csrf] = token;

       $('#siteproduct_first_image_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/siteproduct/upload_first_image_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/siteproduct/delete_first_image_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["*"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#siteproduct_first_image_galery').fineUploader('getUuid', id);
                   $('#siteproduct_first_image_uuid').val(uuid);
                   $('#siteproduct_first_image_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#siteproduct_first_image_uuid').val();
                  $.get(BASE_URL + '/administrator/siteproduct/delete_first_image_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#siteproduct_first_image_uuid').val('');
                  $('#siteproduct_first_image_name').val('');
                }
              }
          }
      }); /*end first_image galery*/
                     var params = {};
       params[csrf] = token;

       $('#siteproduct_second_image_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/siteproduct/upload_second_image_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/siteproduct/delete_second_image_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["*"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#siteproduct_second_image_galery').fineUploader('getUuid', id);
                   $('#siteproduct_second_image_uuid').val(uuid);
                   $('#siteproduct_second_image_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#siteproduct_second_image_uuid').val();
                  $.get(BASE_URL + '/administrator/siteproduct/delete_second_image_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#siteproduct_second_image_uuid').val('');
                  $('#siteproduct_second_image_name').val('');
                }
              }
          }
      }); /*end second_image galery*/
              
 
              var params = {};
       params[csrf] = token;

       $('#siteproduct_gallery_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/siteproduct/upload_gallery_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/siteproduct/delete_gallery_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          validation: {
              allowedExtensions: ["*"],
              sizeLimit : 0,
                            
          },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#siteproduct_gallery_galery').fineUploader('getUuid', id);
                   $('#siteproduct_gallery_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="siteproduct_gallery_uuid['+id+']" value="'+uuid+'" /><input type="hidden" class="listed_file_name" name="siteproduct_gallery_name['+id+']" value="'+xhr.uploadName+'" />');
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#siteproduct_gallery_galery_listed').find('.listed_file_uuid[name="siteproduct_gallery_uuid['+id+']"]').remove();
                  $('#siteproduct_gallery_galery_listed').find('.listed_file_name[name="siteproduct_gallery_name['+id+']"]').remove();
                }
              }
          }
      }); /*end gallery galery*/
              

      
    
    
    }); /*end doc ready*/
</script>