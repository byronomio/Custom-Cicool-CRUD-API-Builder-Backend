
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
        Api Orders        <small><?= cclang('new', ['Api Orders']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/api_orders'); ?>">Api Orders</a></li>
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
                            <h3 class="widget-user-username">Api Orders</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Api Orders']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_api_orders', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_api_orders', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="id" class="col-sm-2 control-label">Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?= set_value('id'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="user_id" class="col-sm-2 control-label">User Id 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?= set_value('user_id'); ?>">
                                <small class="info help-block">
                                <b>Input User Id</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_number" class="col-sm-2 control-label">Order Number 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_number" id="order_number" placeholder="Order Number" value="<?= set_value('order_number'); ?>">
                                <small class="info help-block">
                                <b>Input Order Number</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_parent_id" class="col-sm-2 control-label">Order Parent Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_parent_id" id="order_parent_id" placeholder="Order Parent Id" value="<?= set_value('order_parent_id'); ?>">
                                <small class="info help-block">
                                <b>Input Order Parent Id</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_status" class="col-sm-2 control-label">Order Status 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_status" id="order_status" placeholder="Order Status" value="<?= set_value('order_status'); ?>">
                                <small class="info help-block">
                                <b>Input Order Status</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_currency" class="col-sm-2 control-label">Order Currency 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_currency" id="order_currency" placeholder="Order Currency" value="<?= set_value('order_currency'); ?>">
                                <small class="info help-block">
                                <b>Input Order Currency</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_version" class="col-sm-2 control-label">Order Version 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_version" id="order_version" placeholder="Order Version" value="<?= set_value('order_version'); ?>">
                                <small class="info help-block">
                                <b>Input Order Version</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_payment_method" class="col-sm-2 control-label">Order Payment Method 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_payment_method" id="order_payment_method" placeholder="Order Payment Method" value="<?= set_value('order_payment_method'); ?>">
                                <small class="info help-block">
                                <b>Input Order Payment Method</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_payment_method_title" class="col-sm-2 control-label">Order Payment Method Title 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_payment_method_title" id="order_payment_method_title" placeholder="Order Payment Method Title" value="<?= set_value('order_payment_method_title'); ?>">
                                <small class="info help-block">
                                <b>Input Order Payment Method Title</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_date_created" class="col-sm-2 control-label">Order Date Created 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_date_created" id="order_date_created" placeholder="Order Date Created" value="<?= set_value('order_date_created'); ?>">
                                <small class="info help-block">
                                <b>Input Order Date Created</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_date_modified" class="col-sm-2 control-label">Order Date Modified 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_date_modified" id="order_date_modified" placeholder="Order Date Modified" value="<?= set_value('order_date_modified'); ?>">
                                <small class="info help-block">
                                <b>Input Order Date Modified</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_timestamp_created" class="col-sm-2 control-label">Order Timestamp Created 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_timestamp_created" id="order_timestamp_created" placeholder="Order Timestamp Created" value="<?= set_value('order_timestamp_created'); ?>">
                                <small class="info help-block">
                                <b>Input Order Timestamp Created</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_timestamp_modified" class="col-sm-2 control-label">Order Timestamp Modified 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_timestamp_modified" id="order_timestamp_modified" placeholder="Order Timestamp Modified" value="<?= set_value('order_timestamp_modified'); ?>">
                                <small class="info help-block">
                                <b>Input Order Timestamp Modified</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_discount_total" class="col-sm-2 control-label">Order Discount Total 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_discount_total" id="order_discount_total" placeholder="Order Discount Total" value="<?= set_value('order_discount_total'); ?>">
                                <small class="info help-block">
                                <b>Input Order Discount Total</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_discount_tax" class="col-sm-2 control-label">Order Discount Tax 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_discount_tax" id="order_discount_tax" placeholder="Order Discount Tax" value="<?= set_value('order_discount_tax'); ?>">
                                <small class="info help-block">
                                <b>Input Order Discount Tax</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_total" class="col-sm-2 control-label">Order Shipping Total 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_total" id="order_shipping_total" placeholder="Order Shipping Total" value="<?= set_value('order_shipping_total'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping Total</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_tax" class="col-sm-2 control-label">Order Shipping Tax 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_tax" id="order_shipping_tax" placeholder="Order Shipping Tax" value="<?= set_value('order_shipping_tax'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping Tax</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_total_tax" class="col-sm-2 control-label">Order Total Tax 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_total_tax" id="order_total_tax" placeholder="Order Total Tax" value="<?= set_value('order_total_tax'); ?>">
                                <small class="info help-block">
                                <b>Input Order Total Tax</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_customer_id" class="col-sm-2 control-label">Order Customer Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_customer_id" id="order_customer_id" placeholder="Order Customer Id" value="<?= set_value('order_customer_id'); ?>">
                                <small class="info help-block">
                                <b>Input Order Customer Id</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_first_name" class="col-sm-2 control-label">Order Billing First Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_first_name" id="order_billing_first_name" placeholder="Order Billing First Name" value="<?= set_value('order_billing_first_name'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing First Name</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_last_name" class="col-sm-2 control-label">Order Billing Last Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_last_name" id="order_billing_last_name" placeholder="Order Billing Last Name" value="<?= set_value('order_billing_last_name'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing Last Name</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_company" class="col-sm-2 control-label">Order Billing Company 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_company" id="order_billing_company" placeholder="Order Billing Company" value="<?= set_value('order_billing_company'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing Company</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_address_1" class="col-sm-2 control-label">Order Billing Address 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_address_1" id="order_billing_address_1" placeholder="Order Billing Address 1" value="<?= set_value('order_billing_address_1'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing Address 1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_city" class="col-sm-2 control-label">Order Billing City 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_city" id="order_billing_city" placeholder="Order Billing City" value="<?= set_value('order_billing_city'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing City</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_state" class="col-sm-2 control-label">Order Billing State 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_state" id="order_billing_state" placeholder="Order Billing State" value="<?= set_value('order_billing_state'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing State</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_postcode" class="col-sm-2 control-label">Order Billing Postcode 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_postcode" id="order_billing_postcode" placeholder="Order Billing Postcode" value="<?= set_value('order_billing_postcode'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing Postcode</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_country" class="col-sm-2 control-label">Order Billing Country 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_country" id="order_billing_country" placeholder="Order Billing Country" value="<?= set_value('order_billing_country'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing Country</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_email" class="col-sm-2 control-label">Order Billing Email 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_email" id="order_billing_email" placeholder="Order Billing Email" value="<?= set_value('order_billing_email'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing Email</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_billing_phone" class="col-sm-2 control-label">Order Billing Phone 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_billing_phone" id="order_billing_phone" placeholder="Order Billing Phone" value="<?= set_value('order_billing_phone'); ?>">
                                <small class="info help-block">
                                <b>Input Order Billing Phone</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_first_name" class="col-sm-2 control-label">Order Shipping First Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_first_name" id="order_shipping_first_name" placeholder="Order Shipping First Name" value="<?= set_value('order_shipping_first_name'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping First Name</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_last_name" class="col-sm-2 control-label">Order Shipping Last Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_last_name" id="order_shipping_last_name" placeholder="Order Shipping Last Name" value="<?= set_value('order_shipping_last_name'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping Last Name</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_company" class="col-sm-2 control-label">Order Shipping Company 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_company" id="order_shipping_company" placeholder="Order Shipping Company" value="<?= set_value('order_shipping_company'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping Company</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_address_1" class="col-sm-2 control-label">Order Shipping Address 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_address_1" id="order_shipping_address_1" placeholder="Order Shipping Address 1" value="<?= set_value('order_shipping_address_1'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping Address 1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_address_2" class="col-sm-2 control-label">Order Shipping Address 2 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_address_2" id="order_shipping_address_2" placeholder="Order Shipping Address 2" value="<?= set_value('order_shipping_address_2'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping Address 2</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_city" class="col-sm-2 control-label">Order Shipping City 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_city" id="order_shipping_city" placeholder="Order Shipping City" value="<?= set_value('order_shipping_city'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping City</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_state" class="col-sm-2 control-label">Order Shipping State 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_state" id="order_shipping_state" placeholder="Order Shipping State" value="<?= set_value('order_shipping_state'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping State</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_postcode" class="col-sm-2 control-label">Order Shipping Postcode 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_postcode" id="order_shipping_postcode" placeholder="Order Shipping Postcode" value="<?= set_value('order_shipping_postcode'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping Postcode</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_shipping_country" class="col-sm-2 control-label">Order Shipping Country 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_shipping_country" id="order_shipping_country" placeholder="Order Shipping Country" value="<?= set_value('order_shipping_country'); ?>">
                                <small class="info help-block">
                                <b>Input Order Shipping Country</b> Max Length : 255.</small>
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
              window.location.href = BASE_URL + 'administrator/api_orders';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_api_orders = $('#form_api_orders');
        var data_post = form_api_orders.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/api_orders/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('.steps li').removeClass('error');
          $('form').find('.error-input').remove();
          if(res.success) {
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
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
      
       
 
       

      
    
    
    }); /*end doc ready*/
</script>