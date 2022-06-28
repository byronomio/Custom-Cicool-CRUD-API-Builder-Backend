

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
        Wp Woocommerce Order Itemmeta        <small>Edit Wp Woocommerce Order Itemmeta</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/wp_woocommerce_order_itemmeta'); ?>">Wp Woocommerce Order Itemmeta</a></li>
        <li class="active">Edit</li>
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
                            <h3 class="widget-user-username">Wp Woocommerce Order Itemmeta</h3>
                            <h5 class="widget-user-desc">Edit Wp Woocommerce Order Itemmeta</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/wp_woocommerce_order_itemmeta/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_wp_woocommerce_order_itemmeta', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_wp_woocommerce_order_itemmeta', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="meta_id" class="col-sm-2 control-label">Meta Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="meta_id" id="meta_id" placeholder="Meta Id" value="<?= set_value('meta_id', $wp_woocommerce_order_itemmeta->meta_id); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_item_id" class="col-sm-2 control-label">Order Item Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_item_id" id="order_item_id" placeholder="Order Item Id" value="<?= set_value('order_item_id', $wp_woocommerce_order_itemmeta->order_item_id); ?>">
                                <small class="info help-block">
                                <b>Input Order Item Id</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="meta_key" class="col-sm-2 control-label">Meta Key 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="meta_key" id="meta_key" placeholder="Meta Key" value="<?= set_value('meta_key', $wp_woocommerce_order_itemmeta->meta_key); ?>">
                                <small class="info help-block">
                                <b>Input Meta Key</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="meta_value" class="col-sm-2 control-label">Meta Value 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="meta_value" id="meta_value" placeholder="Meta Value" value="<?= set_value('meta_value', $wp_woocommerce_order_itemmeta->meta_value); ?>">
                                <small class="info help-block">
                                </small>
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
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
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
              window.location.href = BASE_URL + 'administrator/wp_woocommerce_order_itemmeta';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_wp_woocommerce_order_itemmeta = $('#form_wp_woocommerce_order_itemmeta');
        var data_post = form_wp_woocommerce_order_itemmeta.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_wp_woocommerce_order_itemmeta.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#wp_woocommerce_order_itemmeta_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            if (res.errors) {
               parseErrorField(res.errors);
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
      
       
       
       

      async function chain(){
      }
       
      chain();


    
    
    }); /*end doc ready*/
</script>