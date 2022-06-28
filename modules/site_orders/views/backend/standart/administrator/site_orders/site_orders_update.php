

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
        Site Orders        <small>Edit Site Orders</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/site_orders'); ?>">Site Orders</a></li>
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
                            <h3 class="widget-user-username">Site Orders</h3>
                            <h5 class="widget-user-desc">Edit Site Orders</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/site_orders/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_site_orders', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_site_orders', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="id" class="col-sm-2 control-label">Id 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?= set_value('id', $site_orders->id); ?>">
                                <small class="info help-block">
                                <b>Input Id</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PostID" class="col-sm-2 control-label">PostID 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PostID" id="PostID" placeholder="PostID" value="<?= set_value('PostID', $site_orders->PostID); ?>">
                                <small class="info help-block">
                                <b>Input PostID</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="WaybillNo" class="col-sm-2 control-label">WaybillNo 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="WaybillNo" id="WaybillNo" placeholder="WaybillNo" value="<?= set_value('WaybillNo', $site_orders->WaybillNo); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendAccNo" class="col-sm-2 control-label">SendAccNo 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendAccNo" id="SendAccNo" placeholder="SendAccNo" value="<?= set_value('SendAccNo', $site_orders->SendAccNo); ?>">
                                <small class="info help-block">
                                <b>Input SendAccNo</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendSite" class="col-sm-2 control-label">SendSite 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendSite" id="SendSite" placeholder="SendSite" value="<?= set_value('SendSite', $site_orders->SendSite); ?>">
                                <small class="info help-block">
                                <b>Input SendSite</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendCompany" class="col-sm-2 control-label">SendCompany 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendCompany" id="SendCompany" placeholder="SendCompany" value="<?= set_value('SendCompany', $site_orders->SendCompany); ?>">
                                <small class="info help-block">
                                <b>Input SendCompany</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendAdd1" class="col-sm-2 control-label">SendAdd1 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendAdd1" id="SendAdd1" placeholder="SendAdd1" value="<?= set_value('SendAdd1', $site_orders->SendAdd1); ?>">
                                <small class="info help-block">
                                <b>Input SendAdd1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendAdd2" class="col-sm-2 control-label">SendAdd2 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendAdd2" id="SendAdd2" placeholder="SendAdd2" value="<?= set_value('SendAdd2', $site_orders->SendAdd2); ?>">
                                <small class="info help-block">
                                <b>Input SendAdd2</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendAdd3" class="col-sm-2 control-label">SendAdd3 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendAdd3" id="SendAdd3" placeholder="SendAdd3" value="<?= set_value('SendAdd3', $site_orders->SendAdd3); ?>">
                                <small class="info help-block">
                                <b>Input SendAdd3</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendAdd4" class="col-sm-2 control-label">SendAdd4 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendAdd4" id="SendAdd4" placeholder="SendAdd4" value="<?= set_value('SendAdd4', $site_orders->SendAdd4); ?>">
                                <small class="info help-block">
                                <b>Input SendAdd4</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendAdd5" class="col-sm-2 control-label">SendAdd5 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendAdd5" id="SendAdd5" placeholder="SendAdd5" value="<?= set_value('SendAdd5', $site_orders->SendAdd5); ?>">
                                <small class="info help-block">
                                <b>Input SendAdd5</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendContactPerson" class="col-sm-2 control-label">SendContactPerson 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendContactPerson" id="SendContactPerson" placeholder="SendContactPerson" value="<?= set_value('SendContactPerson', $site_orders->SendContactPerson); ?>">
                                <small class="info help-block">
                                <b>Input SendContactPerson</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendHomeTel" class="col-sm-2 control-label">SendHomeTel 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendHomeTel" id="SendHomeTel" placeholder="SendHomeTel" value="<?= set_value('SendHomeTel', $site_orders->SendHomeTel); ?>">
                                <small class="info help-block">
                                <b>Input SendHomeTel</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendWorkTel" class="col-sm-2 control-label">SendWorkTel 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendWorkTel" id="SendWorkTel" placeholder="SendWorkTel" value="<?= set_value('SendWorkTel', $site_orders->SendWorkTel); ?>">
                                <small class="info help-block">
                                <b>Input SendWorkTel</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SendCell" class="col-sm-2 control-label">SendCell 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SendCell" id="SendCell" placeholder="SendCell" value="<?= set_value('SendCell', $site_orders->SendCell); ?>">
                                <small class="info help-block">
                                <b>Input SendCell</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecCompany" class="col-sm-2 control-label">RecCompany 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecCompany" id="RecCompany" placeholder="RecCompany" value="<?= set_value('RecCompany', $site_orders->RecCompany); ?>">
                                <small class="info help-block">
                                <b>Input RecCompany</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecAdd1" class="col-sm-2 control-label">RecAdd1 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecAdd1" id="RecAdd1" placeholder="RecAdd1" value="<?= set_value('RecAdd1', $site_orders->RecAdd1); ?>">
                                <small class="info help-block">
                                <b>Input RecAdd1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecAdd2" class="col-sm-2 control-label">RecAdd2 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecAdd2" id="RecAdd2" placeholder="RecAdd2" value="<?= set_value('RecAdd2', $site_orders->RecAdd2); ?>">
                                <small class="info help-block">
                                <b>Input RecAdd2</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecAdd3" class="col-sm-2 control-label">RecAdd3 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecAdd3" id="RecAdd3" placeholder="RecAdd3" value="<?= set_value('RecAdd3', $site_orders->RecAdd3); ?>">
                                <small class="info help-block">
                                <b>Input RecAdd3</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecAdd4" class="col-sm-2 control-label">RecAdd4 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecAdd4" id="RecAdd4" placeholder="RecAdd4" value="<?= set_value('RecAdd4', $site_orders->RecAdd4); ?>">
                                <small class="info help-block">
                                <b>Input RecAdd4</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecAdd5" class="col-sm-2 control-label">RecAdd5 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecAdd5" id="RecAdd5" placeholder="RecAdd5" value="<?= set_value('RecAdd5', $site_orders->RecAdd5); ?>">
                                <small class="info help-block">
                                <b>Input RecAdd5</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecContactPerson" class="col-sm-2 control-label">RecContactPerson 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecContactPerson" id="RecContactPerson" placeholder="RecContactPerson" value="<?= set_value('RecContactPerson', $site_orders->RecContactPerson); ?>">
                                <small class="info help-block">
                                <b>Input RecContactPerson</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecHomeTel" class="col-sm-2 control-label">RecHomeTel 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecHomeTel" id="RecHomeTel" placeholder="RecHomeTel" value="<?= set_value('RecHomeTel', $site_orders->RecHomeTel); ?>">
                                <small class="info help-block">
                                <b>Input RecHomeTel</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecWorkTel" class="col-sm-2 control-label">RecWorkTel 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecWorkTel" id="RecWorkTel" placeholder="RecWorkTel" value="<?= set_value('RecWorkTel', $site_orders->RecWorkTel); ?>">
                                <small class="info help-block">
                                <b>Input RecWorkTel</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RecCell" class="col-sm-2 control-label">RecCell 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RecCell" id="RecCell" placeholder="RecCell" value="<?= set_value('RecCell', $site_orders->RecCell); ?>">
                                <small class="info help-block">
                                <b>Input RecCell</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SpecialInstructions" class="col-sm-2 control-label">SpecialInstructions 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SpecialInstructions" id="SpecialInstructions" placeholder="SpecialInstructions" value="<?= set_value('SpecialInstructions', $site_orders->SpecialInstructions); ?>">
                                <small class="info help-block">
                                <b>Input SpecialInstructions</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ServiceType" class="col-sm-2 control-label">ServiceType 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ServiceType" id="ServiceType" placeholder="ServiceType" value="<?= set_value('ServiceType', $site_orders->ServiceType); ?>">
                                <small class="info help-block">
                                <b>Input ServiceType</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TotQTY" class="col-sm-2 control-label">TotQTY 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="TotQTY" id="TotQTY" placeholder="TotQTY" value="<?= set_value('TotQTY', $site_orders->TotQTY); ?>">
                                <small class="info help-block">
                                <b>Input TotQTY</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TotMass" class="col-sm-2 control-label">TotMass 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="TotMass" id="TotMass" placeholder="TotMass" value="<?= set_value('TotMass', $site_orders->TotMass); ?>">
                                <small class="info help-block">
                                <b>Input TotMass</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="Insurance" class="col-sm-2 control-label">Insurance 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Insurance" id="Insurance" placeholder="Insurance" value="<?= set_value('Insurance', $site_orders->Insurance); ?>">
                                <small class="info help-block">
                                <b>Input Insurance</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="InsuranceValue" class="col-sm-2 control-label">InsuranceValue 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="InsuranceValue" id="InsuranceValue" placeholder="InsuranceValue" value="<?= set_value('InsuranceValue', $site_orders->InsuranceValue); ?>">
                                <small class="info help-block">
                                <b>Input InsuranceValue</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CustomerRef" class="col-sm-2 control-label">CustomerRef 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CustomerRef" id="CustomerRef" placeholder="CustomerRef" value="<?= set_value('CustomerRef', $site_orders->CustomerRef); ?>">
                                <small class="info help-block">
                                <b>Input CustomerRef</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="StoreCode" class="col-sm-2 control-label">StoreCode 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="StoreCode" id="StoreCode" placeholder="StoreCode" value="<?= set_value('StoreCode', $site_orders->StoreCode); ?>">
                                <small class="info help-block">
                                <b>Input StoreCode</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SecurityStamp" class="col-sm-2 control-label">SecurityStamp 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SecurityStamp" id="SecurityStamp" placeholder="SecurityStamp" value="<?= set_value('SecurityStamp', $site_orders->SecurityStamp); ?>">
                                <small class="info help-block">
                                <b>Input SecurityStamp</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="RequiredDocs" class="col-sm-2 control-label">RequiredDocs 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="RequiredDocs" id="RequiredDocs" placeholder="RequiredDocs" value="<?= set_value('RequiredDocs', $site_orders->RequiredDocs); ?>">
                                <small class="info help-block">
                                <b>Input RequiredDocs</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="WaybillInstructions" class="col-sm-2 control-label">WaybillInstructions 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="WaybillInstructions" id="WaybillInstructions" placeholder="WaybillInstructions" value="<?= set_value('WaybillInstructions', $site_orders->WaybillInstructions); ?>">
                                <small class="info help-block">
                                <b>Input WaybillInstructions</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="InstructionCode" class="col-sm-2 control-label">InstructionCode 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="InstructionCode" id="InstructionCode" placeholder="InstructionCode" value="<?= set_value('InstructionCode', $site_orders->InstructionCode); ?>">
                                <small class="info help-block">
                                <b>Input InstructionCode</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="IsSecureDelivery" class="col-sm-2 control-label">IsSecureDelivery 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="IsSecureDelivery" id="IsSecureDelivery" placeholder="IsSecureDelivery" value="<?= set_value('IsSecureDelivery', $site_orders->IsSecureDelivery); ?>">
                                <small class="info help-block">
                                <b>Input IsSecureDelivery</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="VerificationNumbers" class="col-sm-2 control-label">VerificationNumbers 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="VerificationNumbers" id="VerificationNumbers" placeholder="VerificationNumbers" value="<?= set_value('VerificationNumbers', $site_orders->VerificationNumbers); ?>">
                                <small class="info help-block">
                                <b>Input VerificationNumbers</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="GenerateSecurePin" class="col-sm-2 control-label">GenerateSecurePin 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="GenerateSecurePin" id="GenerateSecurePin" placeholder="GenerateSecurePin" value="<?= set_value('GenerateSecurePin', $site_orders->GenerateSecurePin); ?>">
                                <small class="info help-block">
                                <b>Input GenerateSecurePin</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CollectionNo" class="col-sm-2 control-label">CollectionNo 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CollectionNo" id="CollectionNo" placeholder="CollectionNo" value="<?= set_value('CollectionNo', $site_orders->CollectionNo); ?>">
                                <small class="info help-block">
                                <b>Input CollectionNo</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="invoiceRef" class="col-sm-2 control-label">InvoiceRef 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="invoiceRef" id="invoiceRef" placeholder="InvoiceRef" value="<?= set_value('invoiceRef', $site_orders->invoiceRef); ?>">
                                <small class="info help-block">
                                <b>Input InvoiceRef</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CompleteWaybillAfterSave" class="col-sm-2 control-label">CompleteWaybillAfterSave 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CompleteWaybillAfterSave" id="CompleteWaybillAfterSave" placeholder="CompleteWaybillAfterSave" value="<?= set_value('CompleteWaybillAfterSave', $site_orders->CompleteWaybillAfterSave); ?>">
                                <small class="info help-block">
                                <b>Input CompleteWaybillAfterSave</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ParcelsWaybillNo" class="col-sm-2 control-label">ParcelsWaybillNo 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ParcelsWaybillNo" id="ParcelsWaybillNo" placeholder="ParcelsWaybillNo" value="<?= set_value('ParcelsWaybillNo', $site_orders->ParcelsWaybillNo); ?>">
                                <small class="info help-block">
                                <b>Input ParcelsWaybillNo</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ParcelsLength" class="col-sm-2 control-label">ParcelsLength 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ParcelsLength" id="ParcelsLength" placeholder="ParcelsLength" value="<?= set_value('ParcelsLength', $site_orders->ParcelsLength); ?>">
                                <small class="info help-block">
                                <b>Input ParcelsLength</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ParcelsHeight" class="col-sm-2 control-label">ParcelsHeight 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ParcelsHeight" id="ParcelsHeight" placeholder="ParcelsHeight" value="<?= set_value('ParcelsHeight', $site_orders->ParcelsHeight); ?>">
                                <small class="info help-block">
                                <b>Input ParcelsHeight</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ParcelsWidth" class="col-sm-2 control-label">ParcelsWidth 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ParcelsWidth" id="ParcelsWidth" placeholder="ParcelsWidth" value="<?= set_value('ParcelsWidth', $site_orders->ParcelsWidth); ?>">
                                <small class="info help-block">
                                <b>Input ParcelsWidth</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ParcelsMass" class="col-sm-2 control-label">ParcelsMass 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ParcelsMass" id="ParcelsMass" placeholder="ParcelsMass" value="<?= set_value('ParcelsMass', $site_orders->ParcelsMass); ?>">
                                <small class="info help-block">
                                <b>Input ParcelsMass</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ParcelDescription" class="col-sm-2 control-label">ParcelDescription 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ParcelDescription" id="ParcelDescription" placeholder="ParcelDescription" value="<?= set_value('ParcelDescription', $site_orders->ParcelDescription); ?>">
                                <small class="info help-block">
                                <b>Input ParcelDescription</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ParcelNo" class="col-sm-2 control-label">ParcelNo 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ParcelNo" id="ParcelNo" placeholder="ParcelNo" value="<?= set_value('ParcelNo', $site_orders->ParcelNo); ?>">
                                <small class="info help-block">
                                <b>Input ParcelNo</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ParcelCount" class="col-sm-2 control-label">ParcelCount 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ParcelCount" id="ParcelCount" placeholder="ParcelCount" value="<?= set_value('ParcelCount', $site_orders->ParcelCount); ?>">
                                <small class="info help-block">
                                <b>Input ParcelCount</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OrderStatus" class="col-sm-2 control-label">OrderStatus 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OrderStatus" id="OrderStatus" placeholder="OrderStatus" value="<?= set_value('OrderStatus', $site_orders->OrderStatus); ?>">
                                <small class="info help-block">
                                <b>Input OrderStatus</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OrderDiscountTotal" class="col-sm-2 control-label">OrderDiscountTotal 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OrderDiscountTotal" id="OrderDiscountTotal" placeholder="OrderDiscountTotal" value="<?= set_value('OrderDiscountTotal', $site_orders->OrderDiscountTotal); ?>">
                                <small class="info help-block">
                                <b>Input OrderDiscountTotal</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OrderDiscountTax" class="col-sm-2 control-label">OrderDiscountTax 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OrderDiscountTax" id="OrderDiscountTax" placeholder="OrderDiscountTax" value="<?= set_value('OrderDiscountTax', $site_orders->OrderDiscountTax); ?>">
                                <small class="info help-block">
                                <b>Input OrderDiscountTax</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OrderShippingTotal" class="col-sm-2 control-label">OrderShippingTotal 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OrderShippingTotal" id="OrderShippingTotal" placeholder="OrderShippingTotal" value="<?= set_value('OrderShippingTotal', $site_orders->OrderShippingTotal); ?>">
                                <small class="info help-block">
                                <b>Input OrderShippingTotal</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OrderShippingTax" class="col-sm-2 control-label">OrderShippingTax 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OrderShippingTax" id="OrderShippingTax" placeholder="OrderShippingTax" value="<?= set_value('OrderShippingTax', $site_orders->OrderShippingTax); ?>">
                                <small class="info help-block">
                                <b>Input OrderShippingTax</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OrderTotal" class="col-sm-2 control-label">OrderTotal 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OrderTotal" id="OrderTotal" placeholder="OrderTotal" value="<?= set_value('OrderTotal', $site_orders->OrderTotal); ?>">
                                <small class="info help-block">
                                <b>Input OrderTotal</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OrderTotalTax" class="col-sm-2 control-label">OrderTotalTax 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OrderTotalTax" id="OrderTotalTax" placeholder="OrderTotalTax" value="<?= set_value('OrderTotalTax', $site_orders->OrderTotalTax); ?>">
                                <small class="info help-block">
                                <b>Input OrderTotalTax</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OrderPaymentMethod" class="col-sm-2 control-label">OrderPaymentMethod 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OrderPaymentMethod" id="OrderPaymentMethod" placeholder="OrderPaymentMethod" value="<?= set_value('OrderPaymentMethod', $site_orders->OrderPaymentMethod); ?>">
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
              window.location.href = BASE_URL + 'administrator/site_orders';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_site_orders = $('#form_site_orders');
        var data_post = form_site_orders.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_site_orders.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#site_orders_image_galery').find('li').attr('qq-file-id');
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