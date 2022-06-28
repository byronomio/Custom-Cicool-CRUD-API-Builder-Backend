
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Api Orders      <small><?= cclang('detail', ['Api Orders']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/api_orders'); ?>">Api Orders</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
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
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Api Orders</h3>
                     <h5 class="widget-user-desc">Detail Api Orders</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_api_orders" id="form_api_orders" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->id); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">User Id </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->user_id); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Number </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_number); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Parent Id </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_parent_id); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Status </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_status); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Currency </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_currency); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Version </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_version); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Payment Method </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_payment_method); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Payment Method Title </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_payment_method_title); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Date Created </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_date_created); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Date Modified </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_date_modified); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Timestamp Created </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_timestamp_created); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Timestamp Modified </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_timestamp_modified); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Discount Total </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_discount_total); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Discount Tax </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_discount_tax); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping Total </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_total); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping Tax </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_tax); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Total Tax </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_total_tax); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Customer Id </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_customer_id); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing First Name </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_first_name); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing Last Name </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_last_name); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing Company </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_company); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing Address 1 </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_address_1); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing City </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_city); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing State </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_state); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing Postcode </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_postcode); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing Country </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_country); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing Email </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_email); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Billing Phone </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_billing_phone); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping First Name </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_first_name); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping Last Name </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_last_name); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping Company </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_company); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping Address 1 </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_address_1); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping Address 2 </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_address_2); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping City </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_city); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping State </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_state); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping Postcode </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_postcode); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Order Shipping Country </label>

                        <div class="col-sm-8">
                           <?= _ent($api_orders->order_shipping_country); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('api_orders_update', function() use ($api_orders){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit api_orders (Ctrl+e)" href="<?= site_url('administrator/api_orders/edit/'.$api_orders->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Api Orders']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/api_orders/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Api Orders']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->
