<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dawnwingapi Controller
*| --------------------------------------------------------------------------
*| Dawnwingapi site
*|
*/
class Dawnwingapi extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_dawnwingapi');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Dawnwingapis
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('dawnwingapi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['dawnwingapis'] = $this->model_dawnwingapi->get($filter, $field, $this->limit_page, $offset);
		$this->data['dawnwingapi_counts'] = $this->model_dawnwingapi->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/dawnwingapi/index/',
			'total_rows'   => $this->model_dawnwingapi->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Dawnwingapi List');
		$this->render('backend/standart/administrator/dawnwingapi/dawnwingapi_list', $this->data);
	}
	
	/**
	* Add new dawnwingapis
	*
	*/
	public function add()
	{
		$this->is_allowed('dawnwingapi_add');

		$this->template->title('Dawnwingapi New');
		$this->render('backend/standart/administrator/dawnwingapi/dawnwingapi_add', $this->data);
	}

	/**
	* Add New Dawnwingapis
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('dawnwingapi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('id', 'Id', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('PostID', 'PostID', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAccNo', 'SendAccNo', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendSite', 'SendSite', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendCompany', 'SendCompany', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd1', 'SendAdd1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd2', 'SendAdd2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd3', 'SendAdd3', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd4', 'SendAdd4', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd5', 'SendAdd5', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendContactPerson', 'SendContactPerson', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendHomeTel', 'SendHomeTel', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendWorkTel', 'SendWorkTel', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendCell', 'SendCell', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecCompany', 'RecCompany', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd1', 'RecAdd1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd2', 'RecAdd2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd3', 'RecAdd3', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd4', 'RecAdd4', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd5', 'RecAdd5', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd6', 'RecAdd6', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd7', 'RecAdd7', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecContactPerson', 'RecContactPerson', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecHomeTel', 'RecHomeTel', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecWorkTel', 'RecWorkTel', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecCell', 'RecCell', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SpecialInstructions', 'SpecialInstructions', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ServiceType', 'ServiceType', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('TotQTY', 'TotQTY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('TotMass', 'TotMass', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('Insurance', 'Insurance', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('InsuranceValue', 'InsuranceValue', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CustomerRef', 'CustomerRef', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('StoreCode', 'StoreCode', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SecurityStamp', 'SecurityStamp', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RequiredDocs', 'RequiredDocs', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('WaybillInstructions', 'WaybillInstructions', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('InstructionCode', 'InstructionCode', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('IsSecureDelivery', 'IsSecureDelivery', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('VerificationNumbers', 'VerificationNumbers', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('GenerateSecurePin', 'GenerateSecurePin', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CollectionNo', 'CollectionNo', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('invoiceRef', 'InvoiceRef', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CompleteWaybillAfterSave', 'CompleteWaybillAfterSave', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsWaybillNo', 'ParcelsWaybillNo', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsLength', 'ParcelsLength', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsHeight', 'ParcelsHeight', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsWidth', 'ParcelsWidth', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsMass', 'ParcelsMass', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelDescription', 'ParcelDescription', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelNo', 'ParcelNo', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelCount', 'ParcelCount', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderStatus', 'OrderStatus', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderDiscountTotal', 'OrderDiscountTotal', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderDiscountTax', 'OrderDiscountTax', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderShippingTotal', 'OrderShippingTotal', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderShippingTax', 'OrderShippingTax', 'trim|required|max_length[255]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'PostID' => $this->input->post('PostID'),
				'SendAccNo' => $this->input->post('SendAccNo'),
				'SendSite' => $this->input->post('SendSite'),
				'SendCompany' => $this->input->post('SendCompany'),
				'SendAdd1' => $this->input->post('SendAdd1'),
				'SendAdd2' => $this->input->post('SendAdd2'),
				'SendAdd3' => $this->input->post('SendAdd3'),
				'SendAdd4' => $this->input->post('SendAdd4'),
				'SendAdd5' => $this->input->post('SendAdd5'),
				'SendContactPerson' => $this->input->post('SendContactPerson'),
				'SendHomeTel' => $this->input->post('SendHomeTel'),
				'SendWorkTel' => $this->input->post('SendWorkTel'),
				'SendCell' => $this->input->post('SendCell'),
				'RecCompany' => $this->input->post('RecCompany'),
				'RecAdd1' => $this->input->post('RecAdd1'),
				'RecAdd2' => $this->input->post('RecAdd2'),
				'RecAdd3' => $this->input->post('RecAdd3'),
				'RecAdd4' => $this->input->post('RecAdd4'),
				'RecAdd5' => $this->input->post('RecAdd5'),
				'RecAdd6' => $this->input->post('RecAdd6'),
				'RecAdd7' => $this->input->post('RecAdd7'),
				'RecContactPerson' => $this->input->post('RecContactPerson'),
				'RecHomeTel' => $this->input->post('RecHomeTel'),
				'RecWorkTel' => $this->input->post('RecWorkTel'),
				'RecCell' => $this->input->post('RecCell'),
				'SpecialInstructions' => $this->input->post('SpecialInstructions'),
				'ServiceType' => $this->input->post('ServiceType'),
				'TotQTY' => $this->input->post('TotQTY'),
				'TotMass' => $this->input->post('TotMass'),
				'Insurance' => $this->input->post('Insurance'),
				'InsuranceValue' => $this->input->post('InsuranceValue'),
				'CustomerRef' => $this->input->post('CustomerRef'),
				'StoreCode' => $this->input->post('StoreCode'),
				'SecurityStamp' => $this->input->post('SecurityStamp'),
				'RequiredDocs' => $this->input->post('RequiredDocs'),
				'WaybillInstructions' => $this->input->post('WaybillInstructions'),
				'InstructionCode' => $this->input->post('InstructionCode'),
				'IsSecureDelivery' => $this->input->post('IsSecureDelivery'),
				'VerificationNumbers' => $this->input->post('VerificationNumbers'),
				'GenerateSecurePin' => $this->input->post('GenerateSecurePin'),
				'CollectionNo' => $this->input->post('CollectionNo'),
				'invoiceRef' => $this->input->post('invoiceRef'),
				'CompleteWaybillAfterSave' => $this->input->post('CompleteWaybillAfterSave'),
				'ParcelsWaybillNo' => $this->input->post('ParcelsWaybillNo'),
				'ParcelsLength' => $this->input->post('ParcelsLength'),
				'ParcelsHeight' => $this->input->post('ParcelsHeight'),
				'ParcelsWidth' => $this->input->post('ParcelsWidth'),
				'ParcelsMass' => $this->input->post('ParcelsMass'),
				'ParcelDescription' => $this->input->post('ParcelDescription'),
				'ParcelNo' => $this->input->post('ParcelNo'),
				'ParcelCount' => $this->input->post('ParcelCount'),
				'OrderStatus' => $this->input->post('OrderStatus'),
				'OrderDiscountTotal' => $this->input->post('OrderDiscountTotal'),
				'OrderDiscountTax' => $this->input->post('OrderDiscountTax'),
				'OrderShippingTotal' => $this->input->post('OrderShippingTotal'),
				'OrderShippingTax' => $this->input->post('OrderShippingTax'),
				'OrderTotal' => $this->input->post('OrderTotal'),
			];

			
			$save_dawnwingapi = $this->model_dawnwingapi->store($save_data);
            

			if ($save_dawnwingapi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_dawnwingapi;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/dawnwingapi/edit/' . $save_dawnwingapi, 'Edit Dawnwingapi'),
						anchor('administrator/dawnwingapi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/dawnwingapi/edit/' . $save_dawnwingapi, 'Edit Dawnwingapi')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/dawnwingapi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/dawnwingapi');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Dawnwingapis
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('dawnwingapi_update');

		$this->data['dawnwingapi'] = $this->model_dawnwingapi->find($id);

		$this->template->title('Dawnwingapi Update');
		$this->render('backend/standart/administrator/dawnwingapi/dawnwingapi_update', $this->data);
	}

	/**
	* Update Dawnwingapis
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('dawnwingapi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('id', 'Id', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('PostID', 'PostID', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAccNo', 'SendAccNo', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendSite', 'SendSite', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendCompany', 'SendCompany', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd1', 'SendAdd1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd2', 'SendAdd2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd3', 'SendAdd3', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd4', 'SendAdd4', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendAdd5', 'SendAdd5', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendContactPerson', 'SendContactPerson', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendHomeTel', 'SendHomeTel', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendWorkTel', 'SendWorkTel', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SendCell', 'SendCell', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecCompany', 'RecCompany', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd1', 'RecAdd1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd2', 'RecAdd2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd3', 'RecAdd3', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd4', 'RecAdd4', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd5', 'RecAdd5', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd6', 'RecAdd6', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecAdd7', 'RecAdd7', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecContactPerson', 'RecContactPerson', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecHomeTel', 'RecHomeTel', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecWorkTel', 'RecWorkTel', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RecCell', 'RecCell', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SpecialInstructions', 'SpecialInstructions', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ServiceType', 'ServiceType', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('TotQTY', 'TotQTY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('TotMass', 'TotMass', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('Insurance', 'Insurance', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('InsuranceValue', 'InsuranceValue', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CustomerRef', 'CustomerRef', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('StoreCode', 'StoreCode', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SecurityStamp', 'SecurityStamp', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('RequiredDocs', 'RequiredDocs', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('WaybillInstructions', 'WaybillInstructions', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('InstructionCode', 'InstructionCode', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('IsSecureDelivery', 'IsSecureDelivery', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('VerificationNumbers', 'VerificationNumbers', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('GenerateSecurePin', 'GenerateSecurePin', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CollectionNo', 'CollectionNo', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('invoiceRef', 'InvoiceRef', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CompleteWaybillAfterSave', 'CompleteWaybillAfterSave', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsWaybillNo', 'ParcelsWaybillNo', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsLength', 'ParcelsLength', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsHeight', 'ParcelsHeight', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsWidth', 'ParcelsWidth', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelsMass', 'ParcelsMass', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelDescription', 'ParcelDescription', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelNo', 'ParcelNo', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ParcelCount', 'ParcelCount', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderStatus', 'OrderStatus', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderDiscountTotal', 'OrderDiscountTotal', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderDiscountTax', 'OrderDiscountTax', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderShippingTotal', 'OrderShippingTotal', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OrderShippingTax', 'OrderShippingTax', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'PostID' => $this->input->post('PostID'),
				'SendAccNo' => $this->input->post('SendAccNo'),
				'SendSite' => $this->input->post('SendSite'),
				'SendCompany' => $this->input->post('SendCompany'),
				'SendAdd1' => $this->input->post('SendAdd1'),
				'SendAdd2' => $this->input->post('SendAdd2'),
				'SendAdd3' => $this->input->post('SendAdd3'),
				'SendAdd4' => $this->input->post('SendAdd4'),
				'SendAdd5' => $this->input->post('SendAdd5'),
				'SendContactPerson' => $this->input->post('SendContactPerson'),
				'SendHomeTel' => $this->input->post('SendHomeTel'),
				'SendWorkTel' => $this->input->post('SendWorkTel'),
				'SendCell' => $this->input->post('SendCell'),
				'RecCompany' => $this->input->post('RecCompany'),
				'RecAdd1' => $this->input->post('RecAdd1'),
				'RecAdd2' => $this->input->post('RecAdd2'),
				'RecAdd3' => $this->input->post('RecAdd3'),
				'RecAdd4' => $this->input->post('RecAdd4'),
				'RecAdd5' => $this->input->post('RecAdd5'),
				'RecAdd6' => $this->input->post('RecAdd6'),
				'RecAdd7' => $this->input->post('RecAdd7'),
				'RecContactPerson' => $this->input->post('RecContactPerson'),
				'RecHomeTel' => $this->input->post('RecHomeTel'),
				'RecWorkTel' => $this->input->post('RecWorkTel'),
				'RecCell' => $this->input->post('RecCell'),
				'SpecialInstructions' => $this->input->post('SpecialInstructions'),
				'ServiceType' => $this->input->post('ServiceType'),
				'TotQTY' => $this->input->post('TotQTY'),
				'TotMass' => $this->input->post('TotMass'),
				'Insurance' => $this->input->post('Insurance'),
				'InsuranceValue' => $this->input->post('InsuranceValue'),
				'CustomerRef' => $this->input->post('CustomerRef'),
				'StoreCode' => $this->input->post('StoreCode'),
				'SecurityStamp' => $this->input->post('SecurityStamp'),
				'RequiredDocs' => $this->input->post('RequiredDocs'),
				'WaybillInstructions' => $this->input->post('WaybillInstructions'),
				'InstructionCode' => $this->input->post('InstructionCode'),
				'IsSecureDelivery' => $this->input->post('IsSecureDelivery'),
				'VerificationNumbers' => $this->input->post('VerificationNumbers'),
				'GenerateSecurePin' => $this->input->post('GenerateSecurePin'),
				'CollectionNo' => $this->input->post('CollectionNo'),
				'invoiceRef' => $this->input->post('invoiceRef'),
				'CompleteWaybillAfterSave' => $this->input->post('CompleteWaybillAfterSave'),
				'ParcelsWaybillNo' => $this->input->post('ParcelsWaybillNo'),
				'ParcelsLength' => $this->input->post('ParcelsLength'),
				'ParcelsHeight' => $this->input->post('ParcelsHeight'),
				'ParcelsWidth' => $this->input->post('ParcelsWidth'),
				'ParcelsMass' => $this->input->post('ParcelsMass'),
				'ParcelDescription' => $this->input->post('ParcelDescription'),
				'ParcelNo' => $this->input->post('ParcelNo'),
				'ParcelCount' => $this->input->post('ParcelCount'),
				'OrderStatus' => $this->input->post('OrderStatus'),
				'OrderDiscountTotal' => $this->input->post('OrderDiscountTotal'),
				'OrderDiscountTax' => $this->input->post('OrderDiscountTax'),
				'OrderShippingTotal' => $this->input->post('OrderShippingTotal'),
				'OrderShippingTax' => $this->input->post('OrderShippingTax'),
				'OrderTotal' => $this->input->post('OrderTotal'),
			];

			
			$save_dawnwingapi = $this->model_dawnwingapi->change($id, $save_data);

			if ($save_dawnwingapi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/dawnwingapi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/dawnwingapi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/dawnwingapi');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Dawnwingapis
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('dawnwingapi_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'dawnwingapi'), 'success');
        } else {
            set_message(cclang('error_delete', 'dawnwingapi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Dawnwingapis
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('dawnwingapi_view');

		$this->data['dawnwingapi'] = $this->model_dawnwingapi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Dawnwingapi Detail');
		$this->render('backend/standart/administrator/dawnwingapi/dawnwingapi_view', $this->data);
	}
	
	/**
	* delete Dawnwingapis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$dawnwingapi = $this->model_dawnwingapi->find($id);

		
		
		return $this->model_dawnwingapi->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('dawnwingapi_export');

		$this->model_dawnwingapi->export('dawnwingapi', 'dawnwingapi');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('dawnwingapi_export');

		$this->model_dawnwingapi->pdf('dawnwingapi', 'dawnwingapi');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('dawnwingapi_export');

		$table = $title = 'dawnwingapi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_dawnwingapi->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file dawnwingapi.php */
/* Location: ./application/controllers/administrator/Dawnwingapi.php */