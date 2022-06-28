

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
        Api Orders Products        <small>Edit Api Orders Products</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/api_orders_products'); ?>">Api Orders Products</a></li>
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
                            <h3 class="widget-user-username">Api Orders Products</h3>
                            <h5 class="widget-user-desc">Edit Api Orders Products</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/api_orders_products/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_api_orders_products', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_api_orders_products', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="id" class="col-sm-2 control-label">Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?= set_value('id', $api_orders_products->id); ?>">
                                <small class="info help-block">
                                <b>Input Id</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="item_id" class="col-sm-2 control-label">Item Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="item_id" id="item_id" placeholder="Item Id" value="<?= set_value('item_id', $api_orders_products->item_id); ?>">
                                <small class="info help-block">
                                <b>Input Item Id</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="item_name" class="col-sm-2 control-label">Item Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Item Name" value="<?= set_value('item_name', $api_orders_products->item_name); ?>">
                                <small class="info help-block">
                                <b>Input Item Name</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="item_type" class="col-sm-2 control-label">Item Type 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="item_type" id="item_type" placeholder="Item Type" value="<?= set_value('item_type', $api_orders_products->item_type); ?>">
                                <small class="info help-block">
                                <b>Input Item Type</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="item_data" class="col-sm-2 control-label">Item Data 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="item_data" id="item_data" placeholder="Item Data" value="<?= set_value('item_data', $api_orders_products->item_data); ?>">
                                <small class="info help-block">
                                <b>Input Item Data</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="variation_id" class="col-sm-2 control-label">Variation Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="variation_id" id="variation_id" placeholder="Variation Id" value="<?= set_value('variation_id', $api_orders_products->variation_id); ?>">
                                <small class="info help-block">
                                <b>Input Variation Id</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="quantity" class="col-sm-2 control-label">Quantity 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?= set_value('quantity', $api_orders_products->quantity); ?>">
                                <small class="info help-block">
                                <b>Input Quantity</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="tax_class" class="col-sm-2 control-label">Tax Class 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tax_class" id="tax_class" placeholder="Tax Class" value="<?= set_value('tax_class', $api_orders_products->tax_class); ?>">
                                <small class="info help-block">
                                <b>Input Tax Class</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="line_subtotal" class="col-sm-2 control-label">Line Subtotal 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="line_subtotal" id="line_subtotal" placeholder="Line Subtotal" value="<?= set_value('line_subtotal', $api_orders_products->line_subtotal); ?>">
                                <small class="info help-block">
                                <b>Input Line Subtotal</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="line_subtotal_tax" class="col-sm-2 control-label">Line Subtotal Tax 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="line_subtotal_tax" id="line_subtotal_tax" placeholder="Line Subtotal Tax" value="<?= set_value('line_subtotal_tax', $api_orders_products->line_subtotal_tax); ?>">
                                <small class="info help-block">
                                <b>Input Line Subtotal Tax</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="line_total" class="col-sm-2 control-label">Line Total 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="line_total" id="line_total" placeholder="Line Total" value="<?= set_value('line_total', $api_orders_products->line_total); ?>">
                                <small class="info help-block">
                                <b>Input Line Total</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="line_total_tax" class="col-sm-2 control-label">Line Total Tax 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="line_total_tax" id="line_total_tax" placeholder="Line Total Tax" value="<?= set_value('line_total_tax', $api_orders_products->line_total_tax); ?>">
                                <small class="info help-block">
                                <b>Input Line Total Tax</b> Max Length : 255.</small>
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
              window.location.href = BASE_URL + 'administrator/api_orders_products';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_api_orders_products = $('#form_api_orders_products');
        var data_post = form_api_orders_products.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_api_orders_products.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#api_orders_products_image_galery').find('li').attr('qq-file-id');
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