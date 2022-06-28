
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
      Products      <small><?= cclang('detail', ['Products']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/siteproduct'); ?>">Products</a></li>
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
                     <h3 class="widget-user-username">Products</h3>
                     <h5 class="widget-user-desc">Detail Products</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_siteproduct" id="form_siteproduct" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                           <?= _ent($siteproduct->id); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Name </label>

                        <div class="col-sm-8">
                           <?= _ent($siteproduct->product_name); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SKU </label>

                        <div class="col-sm-8">
                           <?= _ent($siteproduct->sku); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Parent </label>

                        <div class="col-sm-8">
                          <?= join_multi_select($siteproduct->category_main, 'category_main', 'category_name', 'category_name'); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Child </label>

                        <div class="col-sm-8">
                          <?= join_multi_select($siteproduct->category_sub, 'category_sub', 'category_sub_name', 'category_sub_name'); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Brands </label>

                        <div class="col-sm-8">
                          <?= join_multi_select($siteproduct->brand, 'brand', 'brand_name', 'brand_name'); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Type </label>

                        <div class="col-sm-8">
                          <?= join_multi_select($siteproduct->simpleorvariant, 'form_single_or_variant', 'id', 'id'); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Price </label>

                        <div class="col-sm-8">
                           <?= _ent($siteproduct->price); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Desc </label>

                        <div class="col-sm-8">
                           <?= _ent($siteproduct->description); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">WITB </label>

                        <div class="col-sm-8">
                           <?= _ent($siteproduct->whatsinthebox); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> First </label>
                        <div class="col-sm-8">
                             <?php if (is_image($siteproduct->first_image)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/siteproduct/' . $siteproduct->first_image; ?>">
                                <img src="<?= BASE_URL . 'uploads/siteproduct/' . $siteproduct->first_image; ?>" class="image-responsive" alt="image siteproduct" title="first_image siteproduct" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/siteproduct/' . $siteproduct->first_image; ?>">
                                 <img src="<?= get_icon_file($siteproduct->first_image); ?>" class="image-responsive" alt="image siteproduct" title="first_image <?= $siteproduct->first_image; ?>" width="40px"> 
                               <?= $siteproduct->first_image ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                       
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Second </label>
                        <div class="col-sm-8">
                             <?php if (is_image($siteproduct->second_image)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/siteproduct/' . $siteproduct->second_image; ?>">
                                <img src="<?= BASE_URL . 'uploads/siteproduct/' . $siteproduct->second_image; ?>" class="image-responsive" alt="image siteproduct" title="second_image siteproduct" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/siteproduct/' . $siteproduct->second_image; ?>">
                                 <img src="<?= get_icon_file($siteproduct->second_image); ?>" class="image-responsive" alt="image siteproduct" title="second_image <?= $siteproduct->second_image; ?>" width="40px"> 
                               <?= $siteproduct->second_image ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                       
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Gallery </label>
                        <div class="col-sm-8">
                             <?php if (!empty($siteproduct->gallery)): ?>
                             <?php foreach (explode(',', $siteproduct->gallery) as $filename): ?>
                               <?php if (is_image($siteproduct->gallery)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/siteproduct/' . $filename; ?>">
                                  <img src="<?= BASE_URL . 'uploads/siteproduct/' . $filename; ?>" class="image-responsive" alt="image siteproduct" title="gallery siteproduct" width="40px">
                                </a>
                                <?php else: ?>
                                <label>
                                  <a href="<?= BASE_URL . 'administrator/file/download/siteproduct/' . $filename; ?>">
                                   <img src="<?= get_icon_file($filename); ?>" class="image-responsive" alt="image siteproduct" title="gallery <?= $filename; ?>" width="40px"> 
                                 <?= $filename ?>
                               </a>
                               </label>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </div>
                    </div>
                  
                                       
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Websites </label>

                        <div class="col-sm-8">
                          <?= join_multi_select($siteproduct->website, 'website', 'website_name', 'website_name'); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                          <?= join_multi_select($siteproduct->status, 'status', 'status_name', 'status_name'); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Updated </label>

                        <div class="col-sm-8">
                           <?= _ent($siteproduct->created_at); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('siteproduct_update', function() use ($siteproduct){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit siteproduct (Ctrl+e)" href="<?= site_url('administrator/siteproduct/edit/'.$siteproduct->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Siteproduct']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/siteproduct/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Siteproduct']); ?></a>
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
