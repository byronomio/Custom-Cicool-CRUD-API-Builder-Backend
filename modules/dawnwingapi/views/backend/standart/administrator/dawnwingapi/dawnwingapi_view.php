
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
      Dawnwingapi      <small><?= cclang('detail', ['Dawnwingapi']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/dawnwingapi'); ?>">Dawnwingapi</a></li>
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
                     <h3 class="widget-user-username">Dawnwingapi</h3>
                     <h5 class="widget-user-desc">Detail Dawnwingapi</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_dawnwingapi" id="form_dawnwingapi" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->id); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PostID </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->PostID); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">WaybillNo </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->WaybillNo); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendAccNo </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendAccNo); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendSite </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendSite); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendCompany </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendCompany); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendAdd1 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendAdd1); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendAdd2 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendAdd2); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendAdd3 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendAdd3); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendAdd4 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendAdd4); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendAdd5 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendAdd5); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendContactPerson </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendContactPerson); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendHomeTel </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendHomeTel); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendWorkTel </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendWorkTel); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SendCell </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SendCell); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecCompany </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecCompany); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecAdd1 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecAdd1); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecAdd2 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecAdd2); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecAdd3 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecAdd3); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecAdd4 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecAdd4); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecAdd5 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecAdd5); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecAdd6 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecAdd6); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecAdd7 </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecAdd7); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecContactPerson </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecContactPerson); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecHomeTel </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecHomeTel); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecWorkTel </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecWorkTel); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RecCell </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RecCell); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SpecialInstructions </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SpecialInstructions); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ServiceType </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->ServiceType); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">TotQTY </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->TotQTY); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">TotMass </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->TotMass); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Insurance </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->Insurance); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">InsuranceValue </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->InsuranceValue); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CustomerRef </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->CustomerRef); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">StoreCode </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->StoreCode); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SecurityStamp </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->SecurityStamp); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RequiredDocs </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->RequiredDocs); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">WaybillInstructions </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->WaybillInstructions); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">InstructionCode </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->InstructionCode); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">IsSecureDelivery </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->IsSecureDelivery); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">VerificationNumbers </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->VerificationNumbers); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">GenerateSecurePin </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->GenerateSecurePin); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CollectionNo </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->CollectionNo); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">InvoiceRef </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->invoiceRef); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CompleteWaybillAfterSave </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->CompleteWaybillAfterSave); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ParcelsWaybillNo </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->ParcelsWaybillNo); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ParcelsLength </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->ParcelsLength); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ParcelsHeight </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->ParcelsHeight); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ParcelsWidth </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->ParcelsWidth); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ParcelsMass </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->ParcelsMass); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ParcelDescription </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->ParcelDescription); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ParcelNo </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->ParcelNo); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ParcelCount </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->ParcelCount); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">OrderStatus </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->OrderStatus); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">OrderDiscountTotal </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->OrderDiscountTotal); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">OrderDiscountTax </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->OrderDiscountTax); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">OrderShippingTotal </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->OrderShippingTotal); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">OrderShippingTax </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->OrderShippingTax); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">OrderTotal </label>

                        <div class="col-sm-8">
                           <?= _ent($dawnwingapi->OrderTotal); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('dawnwingapi_update', function() use ($dawnwingapi){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit dawnwingapi (Ctrl+e)" href="<?= site_url('administrator/dawnwingapi/edit/'.$dawnwingapi->WaybillNo); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Dawnwingapi']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/dawnwingapi/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Dawnwingapi']); ?></a>
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
