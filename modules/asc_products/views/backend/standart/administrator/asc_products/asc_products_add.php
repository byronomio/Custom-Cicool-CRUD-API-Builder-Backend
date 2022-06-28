
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
        Asc Products        <small><?= cclang('new', ['Asc Products']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/asc_products'); ?>">Asc Products</a></li>
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
                            <h3 class="widget-user-username">Asc Products</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Asc Products']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_asc_products', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_asc_products', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="id" class="col-sm-2 control-label">Id 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id" id="id" placeholder="Id" value="<?= set_value('id'); ?>">
                                <small class="info help-block">
                                <b>Input Id</b> Max Length : 24.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="partno_1" class="col-sm-2 control-label">Partno 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="partno_1" id="partno_1" placeholder="Partno 1" value="<?= set_value('partno_1'); ?>">
                                <small class="info help-block">
                                <b>Input Partno 1</b> Max Length : 600.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="fulldesc_1" class="col-sm-2 control-label">Fulldesc 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="fulldesc_1" id="fulldesc_1" placeholder="Fulldesc 1" value="<?= set_value('fulldesc_1'); ?>">
                                <small class="info help-block">
                                <b>Input Fulldesc 1</b> Max Length : 600.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shortdes_1" class="col-sm-2 control-label">Shortdes 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shortdes_1" id="shortdes_1" placeholder="Shortdes 1" value="<?= set_value('shortdes_1'); ?>">
                                <small class="info help-block">
                                <b>Input Shortdes 1</b> Max Length : 600.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="price_1" class="col-sm-2 control-label">Price 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="price_1" id="price_1" placeholder="Price 1" value="<?= set_value('price_1'); ?>">
                                <small class="info help-block">
                                <b>Input Price 1</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="sopfree_2" class="col-sm-2 control-label">Sopfree 2 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="sopfree_2" id="sopfree_2" placeholder="Sopfree 2" value="<?= set_value('sopfree_2'); ?>">
                                <small class="info help-block">
                                <b>Input Sopfree 2</b> Max Length : 24.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="prodanal_1" class="col-sm-2 control-label">Prodanal 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="prodanal_1" id="prodanal_1" placeholder="Prodanal 1" value="<?= set_value('prodanal_1'); ?>">
                                <small class="info help-block">
                                <b>Input Prodanal 1</b> Max Length : 24.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="status_1" class="col-sm-2 control-label">Status 1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="status_1" id="status_1" placeholder="Status 1" value="<?= set_value('status_1'); ?>">
                                <small class="info help-block">
                                <b>Input Status 1</b> Max Length : 24.</small>
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
              window.location.href = BASE_URL + 'administrator/asc_products';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_asc_products = $('#form_asc_products');
        var data_post = form_asc_products.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/asc_products/add_save',
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