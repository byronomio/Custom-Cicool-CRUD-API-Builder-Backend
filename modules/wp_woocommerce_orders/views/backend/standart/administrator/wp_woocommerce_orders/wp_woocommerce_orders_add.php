
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
        Wp Woocommerce Orders        <small><?= cclang('new', ['Wp Woocommerce Orders']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/wp_woocommerce_orders'); ?>">Wp Woocommerce Orders</a></li>
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
                            <h3 class="widget-user-username">Wp Woocommerce Orders</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Wp Woocommerce Orders']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_wp_woocommerce_orders', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_wp_woocommerce_orders', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="order_id" class="col-sm-2 control-label">Order Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_id" id="order_id" placeholder="Order Id" value="<?= set_value('order_id'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="order_key" class="col-sm-2 control-label">Order Key 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="order_key" id="order_key" placeholder="Order Key" value="<?= set_value('order_key'); ?>">
                                <small class="info help-block">
                                <b>Input Order Key</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="customer_id" class="col-sm-2 control-label">Customer Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Customer Id" value="<?= set_value('customer_id'); ?>">
                                <small class="info help-block">
                                <b>Input Customer Id</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_index" class="col-sm-2 control-label">Billing Index 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_index" id="billing_index" placeholder="Billing Index" value="<?= set_value('billing_index'); ?>">
                                <small class="info help-block">
                                <b>Input Billing Index</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_first_name" class="col-sm-2 control-label">Billing First Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_first_name" id="billing_first_name" placeholder="Billing First Name" value="<?= set_value('billing_first_name'); ?>">
                                <small class="info help-block">
                                <b>Input Billing First Name</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_last_name" class="col-sm-2 control-label">Billing Last Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_last_name" id="billing_last_name" placeholder="Billing Last Name" value="<?= set_value('billing_last_name'); ?>">
                                <small class="info help-block">
                                <b>Input Billing Last Name</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_company" class="col-sm-2 control-label">Billing Company 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_company" id="billing_company" placeholder="Billing Company" value="<?= set_value('billing_company'); ?>">
                                <small class="info help-block">
                                <b>Input Billing Company</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_address_1" class="col-sm-2 control-label">Billing Address 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_address_1" id="billing_address_1" placeholder="Billing Address 1" value="<?= set_value('billing_address_1'); ?>">
                                <small class="info help-block">
                                <b>Input Billing Address 1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_address_2" class="col-sm-2 control-label">Billing Address 2 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_address_2" id="billing_address_2" placeholder="Billing Address 2" value="<?= set_value('billing_address_2'); ?>">
                                <small class="info help-block">
                                <b>Input Billing Address 2</b> Max Length : 200.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_city" class="col-sm-2 control-label">Billing City 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_city" id="billing_city" placeholder="Billing City" value="<?= set_value('billing_city'); ?>">
                                <small class="info help-block">
                                <b>Input Billing City</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_state" class="col-sm-2 control-label">Billing State 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_state" id="billing_state" placeholder="Billing State" value="<?= set_value('billing_state'); ?>">
                                <small class="info help-block">
                                <b>Input Billing State</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_postcode" class="col-sm-2 control-label">Billing Postcode 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_postcode" id="billing_postcode" placeholder="Billing Postcode" value="<?= set_value('billing_postcode'); ?>">
                                <small class="info help-block">
                                <b>Input Billing Postcode</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_country" class="col-sm-2 control-label">Billing Country 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_country" id="billing_country" placeholder="Billing Country" value="<?= set_value('billing_country'); ?>">
                                <small class="info help-block">
                                <b>Input Billing Country</b> Max Length : 2.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_email" class="col-sm-2 control-label">Billing Email 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_email" id="billing_email" placeholder="Billing Email" value="<?= set_value('billing_email'); ?>">
                                <small class="info help-block">
                                <b>Input Billing Email</b> Max Length : 200.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="billing_phone" class="col-sm-2 control-label">Billing Phone 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="billing_phone" id="billing_phone" placeholder="Billing Phone" value="<?= set_value('billing_phone'); ?>">
                                <small class="info help-block">
                                <b>Input Billing Phone</b> Max Length : 200.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_index" class="col-sm-2 control-label">Shipping Index 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_index" id="shipping_index" placeholder="Shipping Index" value="<?= set_value('shipping_index'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping Index</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_first_name" class="col-sm-2 control-label">Shipping First Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_first_name" id="shipping_first_name" placeholder="Shipping First Name" value="<?= set_value('shipping_first_name'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping First Name</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_last_name" class="col-sm-2 control-label">Shipping Last Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_last_name" id="shipping_last_name" placeholder="Shipping Last Name" value="<?= set_value('shipping_last_name'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping Last Name</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_company" class="col-sm-2 control-label">Shipping Company 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_company" id="shipping_company" placeholder="Shipping Company" value="<?= set_value('shipping_company'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping Company</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_address_1" class="col-sm-2 control-label">Shipping Address 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_address_1" id="shipping_address_1" placeholder="Shipping Address 1" value="<?= set_value('shipping_address_1'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping Address 1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_address_2" class="col-sm-2 control-label">Shipping Address 2 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_address_2" id="shipping_address_2" placeholder="Shipping Address 2" value="<?= set_value('shipping_address_2'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping Address 2</b> Max Length : 200.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_city" class="col-sm-2 control-label">Shipping City 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_city" id="shipping_city" placeholder="Shipping City" value="<?= set_value('shipping_city'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping City</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_state" class="col-sm-2 control-label">Shipping State 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_state" id="shipping_state" placeholder="Shipping State" value="<?= set_value('shipping_state'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping State</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_postcode" class="col-sm-2 control-label">Shipping Postcode 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_postcode" id="shipping_postcode" placeholder="Shipping Postcode" value="<?= set_value('shipping_postcode'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping Postcode</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_country" class="col-sm-2 control-label">Shipping Country 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_country" id="shipping_country" placeholder="Shipping Country" value="<?= set_value('shipping_country'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping Country</b> Max Length : 2.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="payment_method" class="col-sm-2 control-label">Payment Method 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="payment_method" id="payment_method" placeholder="Payment Method" value="<?= set_value('payment_method'); ?>">
                                <small class="info help-block">
                                <b>Input Payment Method</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="payment_method_title" class="col-sm-2 control-label">Payment Method Title 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="payment_method_title" id="payment_method_title" placeholder="Payment Method Title" value="<?= set_value('payment_method_title'); ?>">
                                <small class="info help-block">
                                <b>Input Payment Method Title</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="discount_total" class="col-sm-2 control-label">Discount Total 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="discount_total" id="discount_total" placeholder="Discount Total" value="<?= set_value('discount_total'); ?>">
                                <small class="info help-block">
                                <b>Input Discount Total</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="discount_tax" class="col-sm-2 control-label">Discount Tax 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="discount_tax" id="discount_tax" placeholder="Discount Tax" value="<?= set_value('discount_tax'); ?>">
                                <small class="info help-block">
                                <b>Input Discount Tax</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_total" class="col-sm-2 control-label">Shipping Total 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_total" id="shipping_total" placeholder="Shipping Total" value="<?= set_value('shipping_total'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping Total</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shipping_tax" class="col-sm-2 control-label">Shipping Tax 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shipping_tax" id="shipping_tax" placeholder="Shipping Tax" value="<?= set_value('shipping_tax'); ?>">
                                <small class="info help-block">
                                <b>Input Shipping Tax</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="cart_tax" class="col-sm-2 control-label">Cart Tax 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="cart_tax" id="cart_tax" placeholder="Cart Tax" value="<?= set_value('cart_tax'); ?>">
                                <small class="info help-block">
                                <b>Input Cart Tax</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="total" class="col-sm-2 control-label">Total 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?= set_value('total'); ?>">
                                <small class="info help-block">
                                <b>Input Total</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="version" class="col-sm-2 control-label">Version 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="version" id="version" placeholder="Version" value="<?= set_value('version'); ?>">
                                <small class="info help-block">
                                <b>Input Version</b> Max Length : 16.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="currency" class="col-sm-2 control-label">Currency 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="currency" id="currency" placeholder="Currency" value="<?= set_value('currency'); ?>">
                                <small class="info help-block">
                                <b>Input Currency</b> Max Length : 3.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="prices_include_tax" class="col-sm-2 control-label">Prices Include Tax 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="prices_include_tax" id="prices_include_tax" placeholder="Prices Include Tax" value="<?= set_value('prices_include_tax'); ?>">
                                <small class="info help-block">
                                <b>Input Prices Include Tax</b> Max Length : 3.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="transaction_id" class="col-sm-2 control-label">Transaction Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="transaction_id" id="transaction_id" placeholder="Transaction Id" value="<?= set_value('transaction_id'); ?>">
                                <small class="info help-block">
                                <b>Input Transaction Id</b> Max Length : 200.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="customer_ip_address" class="col-sm-2 control-label">Customer Ip Address 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="customer_ip_address" id="customer_ip_address" placeholder="Customer Ip Address" value="<?= set_value('customer_ip_address'); ?>">
                                <small class="info help-block">
                                <b>Input Customer Ip Address</b> Max Length : 40.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="customer_user_agent" class="col-sm-2 control-label">Customer User Agent 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="customer_user_agent" id="customer_user_agent" placeholder="Customer User Agent" value="<?= set_value('customer_user_agent'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="created_via" class="col-sm-2 control-label">Created Via 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="created_via" id="created_via" placeholder="Created Via" value="<?= set_value('created_via'); ?>">
                                <small class="info help-block">
                                <b>Input Created Via</b> Max Length : 200.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="date_completed" class="col-sm-2 control-label">Date Completed 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="date_completed" id="date_completed" placeholder="Date Completed" value="<?= set_value('date_completed'); ?>">
                                <small class="info help-block">
                                <b>Input Date Completed</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="date_paid" class="col-sm-2 control-label">Date Paid 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="date_paid" id="date_paid" placeholder="Date Paid" value="<?= set_value('date_paid'); ?>">
                                <small class="info help-block">
                                <b>Input Date Paid</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="cart_hash" class="col-sm-2 control-label">Cart Hash 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="cart_hash" id="cart_hash" placeholder="Cart Hash" value="<?= set_value('cart_hash'); ?>">
                                <small class="info help-block">
                                <b>Input Cart Hash</b> Max Length : 32.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="amount" class="col-sm-2 control-label">Amount 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?= set_value('amount'); ?>">
                                <small class="info help-block">
                                <b>Input Amount</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="refunded_by" class="col-sm-2 control-label">Refunded By 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="refunded_by" id="refunded_by" placeholder="Refunded By" value="<?= set_value('refunded_by'); ?>">
                                <small class="info help-block">
                                <b>Input Refunded By</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="reason" class="col-sm-2 control-label">Reason 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="reason" id="reason" placeholder="Reason" value="<?= set_value('reason'); ?>">
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
              window.location.href = BASE_URL + 'administrator/wp_woocommerce_orders';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_wp_woocommerce_orders = $('#form_wp_woocommerce_orders');
        var data_post = form_wp_woocommerce_orders.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/wp_woocommerce_orders/add_save',
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