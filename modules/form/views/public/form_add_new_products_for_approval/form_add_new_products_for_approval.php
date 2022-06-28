
<script src="<?= BASE_ASSET; ?>js/custom.js"></script>


<?= form_open('', [
    'name'    => 'form_form_add_new_products_for_approval', 
    'class'   => 'form-horizontal form_form_add_new_products_for_approval', 
    'id'      => 'form_form_add_new_products_for_approval',
    'enctype' => 'multipart/form-data', 
    'method'  => 'POST'
]); ?>
 
<div class="form-group ">
    <label for="website" class="col-sm-2 control-label">Website 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <select  class="form-control chosen chosen-select" name="website[]" id="website" data-placeholder="Select Website" multiple >
            <option value=""></option>
            <?php foreach (db_get_all_data('website') as $row): ?>
            <option value="<?= $row->website_name ?>"><?= $row->website_name; ?></option>
            <?php endforeach; ?>  
        </select>
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="main_category" class="col-sm-2 control-label">Main Category 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <select  class="form-control chosen chosen-select" name="main_category[]" id="main_category" data-placeholder="Select Main Category" multiple >
            <option value=""></option>
            <?php foreach (db_get_all_data('category_main') as $row): ?>
            <option value="<?= $row->category_name ?>"><?= $row->category_name; ?></option>
            <?php endforeach; ?>  
        </select>
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="sub_category" class="col-sm-2 control-label">Sub Category 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <select  class="form-control chosen chosen-select" name="sub_category[]" id="sub_category" data-placeholder="Select Sub Category" multiple >
            <option value=""></option>
            <?php foreach (db_get_all_data('category_sub') as $row): ?>
            <option value="<?= $row->category_sub_name ?>"><?= $row->category_sub_name; ?></option>
            <?php endforeach; ?>  
        </select>
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="brand" class="col-sm-2 control-label">Brand 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <select  class="form-control chosen chosen-select" name="brand[]" id="brand" data-placeholder="Select Brand" multiple >
            <option value=""></option>
            <?php foreach (db_get_all_data('brand') as $row): ?>
            <option value="<?= $row->brand_name ?>"><?= $row->brand_name; ?></option>
            <?php endforeach; ?>  
        </select>
        <small class="info help-block">
        </small>
    </div>
</div>


<div class="row col-sm-12 message">
</div>
<div class="col-sm-2">
</div>
<div class="col-sm-8 padding-left-0">
    <button class="btn btn-flat btn-primary btn_save" id="btn_save" data-stype='stay'>
    Submit
    </button>
    <span class="loading loading-hide">
    <img src="https://productmanagement.byronsdesigns.co.za:443/asset//img/loading-spin-primary.svg"> 
    <i>Loading, Submitting data</i>
    </span>
</div>
</form></div>


<!-- Page script -->
<script>
    $(document).ready(function(){
          $('.form-preview').submit(function(){
        return false;
     });

     $('input[type="checkbox"].flat-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
     });


    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_form_add_new_products_for_approval = $('#form_form_add_new_products_for_approval');
        var data_post = form_form_add_new_products_for_approval.serializeArray();
        var save_type = $(this).attr('data-stype');
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + 'form/form_add_new_products_for_approval/submit',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
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
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 1000);
        });
    
        return false;
      }); /*end btn save*/


      
             
           
    }); /*end doc ready*/
</script>