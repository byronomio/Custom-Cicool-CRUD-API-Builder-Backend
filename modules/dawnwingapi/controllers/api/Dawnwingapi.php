<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Dawnwingapi extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_dawnwingapi');
	}

	/**
	 * @api {get} /dawnwingapi/all Get all dawnwingapis.
	 * @apiVersion 0.1.0
	 * @apiName AllDawnwingapi 
	 * @apiGroup dawnwingapi
	 * @apiHeader {String} X-Api-Key Dawnwingapis unique access-key.
	 * @apiPermission Dawnwingapi Cant be Accessed permission name : api_dawnwingapi_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Dawnwingapis.
	 * @apiParam {String} [Field="All Field"] Optional field of Dawnwingapis : id, PostID, WaybillNo, SendAccNo, SendSite, SendCompany, SendAdd1, SendAdd2, SendAdd3, SendAdd4, SendAdd5, SendContactPerson, SendHomeTel, SendWorkTel, SendCell, RecCompany, RecAdd1, RecAdd2, RecAdd3, RecAdd4, RecAdd5, RecAdd6, RecAdd7, RecContactPerson, RecHomeTel, RecWorkTel, RecCell, SpecialInstructions, ServiceType, TotQTY, TotMass, Insurance, InsuranceValue, CustomerRef, StoreCode, SecurityStamp, RequiredDocs, WaybillInstructions, InstructionCode, IsSecureDelivery, VerificationNumbers, GenerateSecurePin, CollectionNo, invoiceRef, CompleteWaybillAfterSave, ParcelsWaybillNo, ParcelsLength, ParcelsHeight, ParcelsWidth, ParcelsMass, ParcelDescription, ParcelNo, ParcelCount, OrderStatus, OrderDiscountTotal, OrderDiscountTax, OrderShippingTotal, OrderShippingTax, OrderTotal, OrderTotalTax, OrderPaymentMethod, OrderPaymentMethodTitle, OrderCustomerID, WayBill, OrderItems, Company, OrderModified, OrderCreated.
	 * @apiParam {String} [Start=0] Optional start index of Dawnwingapis.
	 * @apiParam {String} [Limit=10] Optional limit data of Dawnwingapis.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of dawnwingapi.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataDawnwingapi Dawnwingapi data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_dawnwingapi_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id', 'PostID', 'WaybillNo', 'SendAccNo', 'SendSite', 'SendCompany', 'SendAdd1', 'SendAdd2', 'SendAdd3', 'SendAdd4', 'SendAdd5', 'SendContactPerson', 'SendHomeTel', 'SendWorkTel', 'SendCell', 'RecCompany', 'RecAdd1', 'RecAdd2', 'RecAdd3', 'RecAdd4', 'RecAdd5', 'RecAdd6', 'RecAdd7', 'RecContactPerson', 'RecHomeTel', 'RecWorkTel', 'RecCell', 'SpecialInstructions', 'ServiceType', 'TotQTY', 'TotMass', 'Insurance', 'InsuranceValue', 'CustomerRef', 'StoreCode', 'SecurityStamp', 'RequiredDocs', 'WaybillInstructions', 'InstructionCode', 'IsSecureDelivery', 'VerificationNumbers', 'GenerateSecurePin', 'CollectionNo', 'invoiceRef', 'CompleteWaybillAfterSave', 'ParcelsWaybillNo', 'ParcelsLength', 'ParcelsHeight', 'ParcelsWidth', 'ParcelsMass', 'ParcelDescription', 'ParcelNo', 'ParcelCount', 'OrderStatus', 'OrderDiscountTotal', 'OrderDiscountTax', 'OrderShippingTotal', 'OrderShippingTax', 'OrderTotal', 'OrderTotalTax', 'OrderPaymentMethod', 'OrderPaymentMethodTitle', 'OrderCustomerID', 'WayBill', 'OrderItems', 'Company', 'OrderModified', 'OrderCreated'];
		$dawnwingapis = $this->model_api_dawnwingapi->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_dawnwingapi->count_all($filter, $field);
		$dawnwingapis = array_map(function($row){
						
			return $row;
		}, $dawnwingapis);

		$data['dawnwingapi'] = $dawnwingapis;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Dawnwingapi',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /dawnwingapi/detail Detail Dawnwingapi.
	 * @apiVersion 0.1.0
	 * @apiName DetailDawnwingapi
	 * @apiGroup dawnwingapi
	 * @apiHeader {String} X-Api-Key Dawnwingapis unique access-key.
	 * @apiPermission Dawnwingapi Cant be Accessed permission name : api_dawnwingapi_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Dawnwingapis.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of dawnwingapi.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError DawnwingapiNotFound Dawnwingapi data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_dawnwingapi_detail', false);

		$this->requiredInput(['WaybillNo']);

		$id = $this->get('WaybillNo');

		$select_field = ['id', 'PostID', 'WaybillNo', 'SendAccNo', 'SendSite', 'SendCompany', 'SendAdd1', 'SendAdd2', 'SendAdd3', 'SendAdd4', 'SendAdd5', 'SendContactPerson', 'SendHomeTel', 'SendWorkTel', 'SendCell', 'RecCompany', 'RecAdd1', 'RecAdd2', 'RecAdd3', 'RecAdd4', 'RecAdd5', 'RecAdd6', 'RecAdd7', 'RecContactPerson', 'RecHomeTel', 'RecWorkTel', 'RecCell', 'SpecialInstructions', 'ServiceType', 'TotQTY', 'TotMass', 'Insurance', 'InsuranceValue', 'CustomerRef', 'StoreCode', 'SecurityStamp', 'RequiredDocs', 'WaybillInstructions', 'InstructionCode', 'IsSecureDelivery', 'VerificationNumbers', 'GenerateSecurePin', 'CollectionNo', 'invoiceRef', 'CompleteWaybillAfterSave', 'ParcelsWaybillNo', 'ParcelsLength', 'ParcelsHeight', 'ParcelsWidth', 'ParcelsMass', 'ParcelDescription', 'ParcelNo', 'ParcelCount', 'OrderStatus', 'OrderDiscountTotal', 'OrderDiscountTax', 'OrderShippingTotal', 'OrderShippingTax', 'OrderTotal', 'OrderTotalTax', 'OrderPaymentMethod', 'OrderPaymentMethodTitle', 'OrderCustomerID', 'WayBill', 'OrderItems', 'Company', 'OrderModified', 'OrderCreated'];
		$dawnwingapi = $this->model_api_dawnwingapi->find($id, $select_field);

		if (!$dawnwingapi) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['dawnwingapi'] = $dawnwingapi;
		if ($data['dawnwingapi']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Dawnwingapi',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Dawnwingapi not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /dawnwingapi/add Add Dawnwingapi.
	 * @apiVersion 0.1.0
	 * @apiName AddDawnwingapi
	 * @apiGroup dawnwingapi
	 * @apiHeader {String} X-Api-Key Dawnwingapis unique access-key.
	 * @apiPermission Dawnwingapi Cant be Accessed permission name : api_dawnwingapi_add
	 *
 	 * @apiParam {String} [Id] Optional id of Dawnwingapis. Input Id Max Length : 255. 
	 * @apiParam {String} [PostID] Optional PostID of Dawnwingapis. Input PostID Max Length : 255. 
	 * @apiParam {String} [WaybillNo] Optional WaybillNo of Dawnwingapis.  
	 * @apiParam {String} [SendAccNo] Optional SendAccNo of Dawnwingapis. Input SendAccNo Max Length : 255. 
	 * @apiParam {String} [SendSite] Optional SendSite of Dawnwingapis. Input SendSite Max Length : 255. 
	 * @apiParam {String} [SendCompany] Optional SendCompany of Dawnwingapis. Input SendCompany Max Length : 255. 
	 * @apiParam {String} [SendAdd1] Optional SendAdd1 of Dawnwingapis. Input SendAdd1 Max Length : 255. 
	 * @apiParam {String} [SendAdd2] Optional SendAdd2 of Dawnwingapis. Input SendAdd2 Max Length : 255. 
	 * @apiParam {String} [SendAdd3] Optional SendAdd3 of Dawnwingapis. Input SendAdd3 Max Length : 255. 
	 * @apiParam {String} [SendAdd4] Optional SendAdd4 of Dawnwingapis. Input SendAdd4 Max Length : 255. 
	 * @apiParam {String} [SendAdd5] Optional SendAdd5 of Dawnwingapis. Input SendAdd5 Max Length : 255. 
	 * @apiParam {String} [SendContactPerson] Optional SendContactPerson of Dawnwingapis. Input SendContactPerson Max Length : 255. 
	 * @apiParam {String} [SendHomeTel] Optional SendHomeTel of Dawnwingapis. Input SendHomeTel Max Length : 255. 
	 * @apiParam {String} [SendWorkTel] Optional SendWorkTel of Dawnwingapis. Input SendWorkTel Max Length : 255. 
	 * @apiParam {String} [SendCell] Optional SendCell of Dawnwingapis. Input SendCell Max Length : 255. 
	 * @apiParam {String} [RecCompany] Optional RecCompany of Dawnwingapis. Input RecCompany Max Length : 255. 
	 * @apiParam {String} [RecAdd1] Optional RecAdd1 of Dawnwingapis. Input RecAdd1 Max Length : 255. 
	 * @apiParam {String} [RecAdd2] Optional RecAdd2 of Dawnwingapis. Input RecAdd2 Max Length : 255. 
	 * @apiParam {String} [RecAdd3] Optional RecAdd3 of Dawnwingapis. Input RecAdd3 Max Length : 255. 
	 * @apiParam {String} [RecAdd4] Optional RecAdd4 of Dawnwingapis. Input RecAdd4 Max Length : 255. 
	 * @apiParam {String} [RecAdd5] Optional RecAdd5 of Dawnwingapis. Input RecAdd5 Max Length : 255. 
	 * @apiParam {String} [RecAdd6] Optional RecAdd6 of Dawnwingapis. Input RecAdd6 Max Length : 255. 
	 * @apiParam {String} [RecAdd7] Optional RecAdd7 of Dawnwingapis. Input RecAdd7 Max Length : 255. 
	 * @apiParam {String} [RecContactPerson] Optional RecContactPerson of Dawnwingapis. Input RecContactPerson Max Length : 255. 
	 * @apiParam {String} [RecHomeTel] Optional RecHomeTel of Dawnwingapis. Input RecHomeTel Max Length : 255. 
	 * @apiParam {String} [RecWorkTel] Optional RecWorkTel of Dawnwingapis. Input RecWorkTel Max Length : 255. 
	 * @apiParam {String} [RecCell] Optional RecCell of Dawnwingapis. Input RecCell Max Length : 255. 
	 * @apiParam {String} [SpecialInstructions] Optional SpecialInstructions of Dawnwingapis. Input SpecialInstructions Max Length : 255. 
	 * @apiParam {String} [ServiceType] Optional ServiceType of Dawnwingapis. Input ServiceType Max Length : 255. 
	 * @apiParam {String} [TotQTY] Optional TotQTY of Dawnwingapis. Input TotQTY Max Length : 255. 
	 * @apiParam {String} [TotMass] Optional TotMass of Dawnwingapis. Input TotMass Max Length : 255. 
	 * @apiParam {String} [Insurance] Optional Insurance of Dawnwingapis. Input Insurance Max Length : 255. 
	 * @apiParam {String} [InsuranceValue] Optional InsuranceValue of Dawnwingapis. Input InsuranceValue Max Length : 255. 
	 * @apiParam {String} [CustomerRef] Optional CustomerRef of Dawnwingapis. Input CustomerRef Max Length : 255. 
	 * @apiParam {String} [StoreCode] Optional StoreCode of Dawnwingapis. Input StoreCode Max Length : 255. 
	 * @apiParam {String} [SecurityStamp] Optional SecurityStamp of Dawnwingapis. Input SecurityStamp Max Length : 255. 
	 * @apiParam {String} [RequiredDocs] Optional RequiredDocs of Dawnwingapis. Input RequiredDocs Max Length : 255. 
	 * @apiParam {String} [WaybillInstructions] Optional WaybillInstructions of Dawnwingapis. Input WaybillInstructions Max Length : 255. 
	 * @apiParam {String} [InstructionCode] Optional InstructionCode of Dawnwingapis. Input InstructionCode Max Length : 255. 
	 * @apiParam {String} [IsSecureDelivery] Optional IsSecureDelivery of Dawnwingapis. Input IsSecureDelivery Max Length : 255. 
	 * @apiParam {String} [VerificationNumbers] Optional VerificationNumbers of Dawnwingapis. Input VerificationNumbers Max Length : 255. 
	 * @apiParam {String} [GenerateSecurePin] Optional GenerateSecurePin of Dawnwingapis. Input GenerateSecurePin Max Length : 255. 
	 * @apiParam {String} [CollectionNo] Optional CollectionNo of Dawnwingapis. Input CollectionNo Max Length : 255. 
	 * @apiParam {String} [InvoiceRef] Optional invoiceRef of Dawnwingapis. Input InvoiceRef Max Length : 255. 
	 * @apiParam {String} [CompleteWaybillAfterSave] Optional CompleteWaybillAfterSave of Dawnwingapis. Input CompleteWaybillAfterSave Max Length : 255. 
	 * @apiParam {String} [ParcelsWaybillNo] Optional ParcelsWaybillNo of Dawnwingapis. Input ParcelsWaybillNo Max Length : 255. 
	 * @apiParam {String} [ParcelsLength] Optional ParcelsLength of Dawnwingapis. Input ParcelsLength Max Length : 255. 
	 * @apiParam {String} [ParcelsHeight] Optional ParcelsHeight of Dawnwingapis. Input ParcelsHeight Max Length : 255. 
	 * @apiParam {String} [ParcelsWidth] Optional ParcelsWidth of Dawnwingapis. Input ParcelsWidth Max Length : 255. 
	 * @apiParam {String} [ParcelsMass] Optional ParcelsMass of Dawnwingapis. Input ParcelsMass Max Length : 255. 
	 * @apiParam {String} [ParcelDescription] Optional ParcelDescription of Dawnwingapis. Input ParcelDescription Max Length : 255. 
	 * @apiParam {String} [ParcelNo] Optional ParcelNo of Dawnwingapis. Input ParcelNo Max Length : 255. 
	 * @apiParam {String} [ParcelCount] Optional ParcelCount of Dawnwingapis. Input ParcelCount Max Length : 255. 
	 * @apiParam {String} [OrderStatus] Optional OrderStatus of Dawnwingapis. Input OrderStatus Max Length : 255. 
	 * @apiParam {String} [OrderDiscountTotal] Optional OrderDiscountTotal of Dawnwingapis. Input OrderDiscountTotal Max Length : 255. 
	 * @apiParam {String} [OrderDiscountTax] Optional OrderDiscountTax of Dawnwingapis. Input OrderDiscountTax Max Length : 255. 
	 * @apiParam {String} [OrderShippingTotal] Optional OrderShippingTotal of Dawnwingapis. Input OrderShippingTotal Max Length : 255. 
	 * @apiParam {String} [OrderShippingTax] Optional OrderShippingTax of Dawnwingapis. Input OrderShippingTax Max Length : 255. 
	 * @apiParam {String} [OrderTotal] Optional OrderTotal of Dawnwingapis. Input OrderTotal Max Length : 255. 
	 * @apiParam {String} [OrderTotalTax] Optional OrderTotalTax of Dawnwingapis. Input OrderTotalTax Max Length : 255. 
	 * @apiParam {String} [OrderPaymentMethod] Optional OrderPaymentMethod of Dawnwingapis. Input OrderPaymentMethod Max Length : 255. 
	 * @apiParam {String} [OrderPaymentMethodTitle] Optional OrderPaymentMethodTitle of Dawnwingapis. Input OrderPaymentMethodTitle Max Length : 255. 
	 * @apiParam {String} [OrderCustomerID] Optional OrderCustomerID of Dawnwingapis. Input OrderCustomerID Max Length : 255. 
	 * @apiParam {String} [WayBill] Optional WayBill of Dawnwingapis. Input WayBill Max Length : 255. 
	 * @apiParam {String} [OrderItems] Optional OrderItems of Dawnwingapis. Input OrderItems Max Length : 2555. 
	 * @apiParam {String} [Company] Optional Company of Dawnwingapis. Input Company Max Length : 255. 
	 * @apiParam {String} [OrderModified] Optional OrderModified of Dawnwingapis. Input OrderModified Max Length : 255. 
	 * @apiParam {String} [OrderCreated] Optional OrderCreated of Dawnwingapis. Input OrderCreated Max Length : 255. 
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function add_post()
	{
		$this->is_allowed('api_dawnwingapi_add', false);

		$this->form_validation->set_rules('id', 'Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('PostID', 'PostID', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAccNo', 'SendAccNo', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendSite', 'SendSite', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendCompany', 'SendCompany', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd1', 'SendAdd1', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd2', 'SendAdd2', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd3', 'SendAdd3', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd4', 'SendAdd4', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd5', 'SendAdd5', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendContactPerson', 'SendContactPerson', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendHomeTel', 'SendHomeTel', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendWorkTel', 'SendWorkTel', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendCell', 'SendCell', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecCompany', 'RecCompany', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd1', 'RecAdd1', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd2', 'RecAdd2', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd3', 'RecAdd3', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd4', 'RecAdd4', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd5', 'RecAdd5', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd6', 'RecAdd6', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd7', 'RecAdd7', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecContactPerson', 'RecContactPerson', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecHomeTel', 'RecHomeTel', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecWorkTel', 'RecWorkTel', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecCell', 'RecCell', 'trim|max_length[255]');
		$this->form_validation->set_rules('SpecialInstructions', 'SpecialInstructions', 'trim|max_length[255]');
		$this->form_validation->set_rules('ServiceType', 'ServiceType', 'trim|max_length[255]');
		$this->form_validation->set_rules('TotQTY', 'TotQTY', 'trim|max_length[255]');
		$this->form_validation->set_rules('TotMass', 'TotMass', 'trim|max_length[255]');
		$this->form_validation->set_rules('Insurance', 'Insurance', 'trim|max_length[255]');
		$this->form_validation->set_rules('InsuranceValue', 'InsuranceValue', 'trim|max_length[255]');
		$this->form_validation->set_rules('CustomerRef', 'CustomerRef', 'trim|max_length[255]');
		$this->form_validation->set_rules('StoreCode', 'StoreCode', 'trim|max_length[255]');
		$this->form_validation->set_rules('SecurityStamp', 'SecurityStamp', 'trim|max_length[255]');
		$this->form_validation->set_rules('RequiredDocs', 'RequiredDocs', 'trim|max_length[255]');
		$this->form_validation->set_rules('WaybillInstructions', 'WaybillInstructions', 'trim|max_length[255]');
		$this->form_validation->set_rules('InstructionCode', 'InstructionCode', 'trim|max_length[255]');
		$this->form_validation->set_rules('IsSecureDelivery', 'IsSecureDelivery', 'trim|max_length[255]');
		$this->form_validation->set_rules('VerificationNumbers', 'VerificationNumbers', 'trim|max_length[255]');
		$this->form_validation->set_rules('GenerateSecurePin', 'GenerateSecurePin', 'trim|max_length[255]');
		$this->form_validation->set_rules('CollectionNo', 'CollectionNo', 'trim|max_length[255]');
		$this->form_validation->set_rules('invoiceRef', 'InvoiceRef', 'trim|max_length[255]');
		$this->form_validation->set_rules('CompleteWaybillAfterSave', 'CompleteWaybillAfterSave', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsWaybillNo', 'ParcelsWaybillNo', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsLength', 'ParcelsLength', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsHeight', 'ParcelsHeight', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsWidth', 'ParcelsWidth', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsMass', 'ParcelsMass', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelDescription', 'ParcelDescription', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelNo', 'ParcelNo', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelCount', 'ParcelCount', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderStatus', 'OrderStatus', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderDiscountTotal', 'OrderDiscountTotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderDiscountTax', 'OrderDiscountTax', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderShippingTotal', 'OrderShippingTotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderShippingTax', 'OrderShippingTax', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderTotal', 'OrderTotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderTotalTax', 'OrderTotalTax', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderPaymentMethod', 'OrderPaymentMethod', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderPaymentMethodTitle', 'OrderPaymentMethodTitle', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderCustomerID', 'OrderCustomerID', 'trim|max_length[255]');
		$this->form_validation->set_rules('WayBill', 'WayBill', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderItems', 'OrderItems', 'trim|max_length[2555]');
		$this->form_validation->set_rules('Company', 'Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderModified', 'OrderModified', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderCreated', 'OrderCreated', 'trim|max_length[255]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'PostID' => $this->input->post('PostID'),
				'WaybillNo' => $this->input->post('WaybillNo'),
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
				'OrderTotalTax' => $this->input->post('OrderTotalTax'),
				'OrderPaymentMethod' => $this->input->post('OrderPaymentMethod'),
				'OrderPaymentMethodTitle' => $this->input->post('OrderPaymentMethodTitle'),
				'OrderCustomerID' => $this->input->post('OrderCustomerID'),
				'WayBill' => $this->input->post('WayBill'),
				'OrderItems' => $this->input->post('OrderItems'),
				'Company' => $this->input->post('Company'),
				'OrderModified' => $this->input->post('OrderModified'),
				'OrderCreated' => $this->input->post('OrderCreated'),
			];
			
			$save_dawnwingapi = $this->model_api_dawnwingapi->store($save_data);

			if ($save_dawnwingapi) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully stored into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> validation_errors()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	/**
	 * @api {post} /dawnwingapi/update Update Dawnwingapi.
	 * @apiVersion 0.1.0
	 * @apiName UpdateDawnwingapi
	 * @apiGroup dawnwingapi
	 * @apiHeader {String} X-Api-Key Dawnwingapis unique access-key.
	 * @apiPermission Dawnwingapi Cant be Accessed permission name : api_dawnwingapi_update
	 *
	 * @apiParam {String} [Id] Optional id of Dawnwingapis. Input Id Max Length : 255. 
	 * @apiParam {String} [PostID] Optional PostID of Dawnwingapis. Input PostID Max Length : 255. 
	 * @apiParam {String} [WaybillNo] Optional WaybillNo of Dawnwingapis.  
	 * @apiParam {String} [SendAccNo] Optional SendAccNo of Dawnwingapis. Input SendAccNo Max Length : 255. 
	 * @apiParam {String} [SendSite] Optional SendSite of Dawnwingapis. Input SendSite Max Length : 255. 
	 * @apiParam {String} [SendCompany] Optional SendCompany of Dawnwingapis. Input SendCompany Max Length : 255. 
	 * @apiParam {String} [SendAdd1] Optional SendAdd1 of Dawnwingapis. Input SendAdd1 Max Length : 255. 
	 * @apiParam {String} [SendAdd2] Optional SendAdd2 of Dawnwingapis. Input SendAdd2 Max Length : 255. 
	 * @apiParam {String} [SendAdd3] Optional SendAdd3 of Dawnwingapis. Input SendAdd3 Max Length : 255. 
	 * @apiParam {String} [SendAdd4] Optional SendAdd4 of Dawnwingapis. Input SendAdd4 Max Length : 255. 
	 * @apiParam {String} [SendAdd5] Optional SendAdd5 of Dawnwingapis. Input SendAdd5 Max Length : 255. 
	 * @apiParam {String} [SendContactPerson] Optional SendContactPerson of Dawnwingapis. Input SendContactPerson Max Length : 255. 
	 * @apiParam {String} [SendHomeTel] Optional SendHomeTel of Dawnwingapis. Input SendHomeTel Max Length : 255. 
	 * @apiParam {String} [SendWorkTel] Optional SendWorkTel of Dawnwingapis. Input SendWorkTel Max Length : 255. 
	 * @apiParam {String} [SendCell] Optional SendCell of Dawnwingapis. Input SendCell Max Length : 255. 
	 * @apiParam {String} [RecCompany] Optional RecCompany of Dawnwingapis. Input RecCompany Max Length : 255. 
	 * @apiParam {String} [RecAdd1] Optional RecAdd1 of Dawnwingapis. Input RecAdd1 Max Length : 255. 
	 * @apiParam {String} [RecAdd2] Optional RecAdd2 of Dawnwingapis. Input RecAdd2 Max Length : 255. 
	 * @apiParam {String} [RecAdd3] Optional RecAdd3 of Dawnwingapis. Input RecAdd3 Max Length : 255. 
	 * @apiParam {String} [RecAdd4] Optional RecAdd4 of Dawnwingapis. Input RecAdd4 Max Length : 255. 
	 * @apiParam {String} [RecAdd5] Optional RecAdd5 of Dawnwingapis. Input RecAdd5 Max Length : 255. 
	 * @apiParam {String} [RecAdd6] Optional RecAdd6 of Dawnwingapis. Input RecAdd6 Max Length : 255. 
	 * @apiParam {String} [RecAdd7] Optional RecAdd7 of Dawnwingapis. Input RecAdd7 Max Length : 255. 
	 * @apiParam {String} [RecContactPerson] Optional RecContactPerson of Dawnwingapis. Input RecContactPerson Max Length : 255. 
	 * @apiParam {String} [RecHomeTel] Optional RecHomeTel of Dawnwingapis. Input RecHomeTel Max Length : 255. 
	 * @apiParam {String} [RecWorkTel] Optional RecWorkTel of Dawnwingapis. Input RecWorkTel Max Length : 255. 
	 * @apiParam {String} [RecCell] Optional RecCell of Dawnwingapis. Input RecCell Max Length : 255. 
	 * @apiParam {String} [SpecialInstructions] Optional SpecialInstructions of Dawnwingapis. Input SpecialInstructions Max Length : 255. 
	 * @apiParam {String} [ServiceType] Optional ServiceType of Dawnwingapis. Input ServiceType Max Length : 255. 
	 * @apiParam {String} [TotQTY] Optional TotQTY of Dawnwingapis. Input TotQTY Max Length : 255. 
	 * @apiParam {String} [TotMass] Optional TotMass of Dawnwingapis. Input TotMass Max Length : 255. 
	 * @apiParam {String} [Insurance] Optional Insurance of Dawnwingapis. Input Insurance Max Length : 255. 
	 * @apiParam {String} [InsuranceValue] Optional InsuranceValue of Dawnwingapis. Input InsuranceValue Max Length : 255. 
	 * @apiParam {String} [CustomerRef] Optional CustomerRef of Dawnwingapis. Input CustomerRef Max Length : 255. 
	 * @apiParam {String} [StoreCode] Optional StoreCode of Dawnwingapis. Input StoreCode Max Length : 255. 
	 * @apiParam {String} [SecurityStamp] Optional SecurityStamp of Dawnwingapis. Input SecurityStamp Max Length : 255. 
	 * @apiParam {String} [RequiredDocs] Optional RequiredDocs of Dawnwingapis. Input RequiredDocs Max Length : 255. 
	 * @apiParam {String} [WaybillInstructions] Optional WaybillInstructions of Dawnwingapis. Input WaybillInstructions Max Length : 255. 
	 * @apiParam {String} [InstructionCode] Optional InstructionCode of Dawnwingapis. Input InstructionCode Max Length : 255. 
	 * @apiParam {String} [IsSecureDelivery] Optional IsSecureDelivery of Dawnwingapis. Input IsSecureDelivery Max Length : 255. 
	 * @apiParam {String} [VerificationNumbers] Optional VerificationNumbers of Dawnwingapis. Input VerificationNumbers Max Length : 255. 
	 * @apiParam {String} [GenerateSecurePin] Optional GenerateSecurePin of Dawnwingapis. Input GenerateSecurePin Max Length : 255. 
	 * @apiParam {String} [CollectionNo] Optional CollectionNo of Dawnwingapis. Input CollectionNo Max Length : 255. 
	 * @apiParam {String} [InvoiceRef] Optional invoiceRef of Dawnwingapis. Input InvoiceRef Max Length : 255. 
	 * @apiParam {String} [CompleteWaybillAfterSave] Optional CompleteWaybillAfterSave of Dawnwingapis. Input CompleteWaybillAfterSave Max Length : 255. 
	 * @apiParam {String} [ParcelsWaybillNo] Optional ParcelsWaybillNo of Dawnwingapis. Input ParcelsWaybillNo Max Length : 255. 
	 * @apiParam {String} [ParcelsLength] Optional ParcelsLength of Dawnwingapis. Input ParcelsLength Max Length : 255. 
	 * @apiParam {String} [ParcelsHeight] Optional ParcelsHeight of Dawnwingapis. Input ParcelsHeight Max Length : 255. 
	 * @apiParam {String} [ParcelsWidth] Optional ParcelsWidth of Dawnwingapis. Input ParcelsWidth Max Length : 255. 
	 * @apiParam {String} [ParcelsMass] Optional ParcelsMass of Dawnwingapis. Input ParcelsMass Max Length : 255. 
	 * @apiParam {String} [ParcelDescription] Optional ParcelDescription of Dawnwingapis. Input ParcelDescription Max Length : 255. 
	 * @apiParam {String} [ParcelNo] Optional ParcelNo of Dawnwingapis. Input ParcelNo Max Length : 255. 
	 * @apiParam {String} [ParcelCount] Optional ParcelCount of Dawnwingapis. Input ParcelCount Max Length : 255. 
	 * @apiParam {String} [OrderStatus] Optional OrderStatus of Dawnwingapis. Input OrderStatus Max Length : 255. 
	 * @apiParam {String} [OrderDiscountTotal] Optional OrderDiscountTotal of Dawnwingapis. Input OrderDiscountTotal Max Length : 255. 
	 * @apiParam {String} [OrderDiscountTax] Optional OrderDiscountTax of Dawnwingapis. Input OrderDiscountTax Max Length : 255. 
	 * @apiParam {String} [OrderShippingTotal] Optional OrderShippingTotal of Dawnwingapis. Input OrderShippingTotal Max Length : 255. 
	 * @apiParam {String} [OrderShippingTax] Optional OrderShippingTax of Dawnwingapis. Input OrderShippingTax Max Length : 255. 
	 * @apiParam {String} [OrderTotal] Optional OrderTotal of Dawnwingapis. Input OrderTotal Max Length : 255. 
	 * @apiParam {String} [OrderTotalTax] Optional OrderTotalTax of Dawnwingapis. Input OrderTotalTax Max Length : 255. 
	 * @apiParam {String} [OrderPaymentMethod] Optional OrderPaymentMethod of Dawnwingapis. Input OrderPaymentMethod Max Length : 255. 
	 * @apiParam {String} [OrderPaymentMethodTitle] Optional OrderPaymentMethodTitle of Dawnwingapis. Input OrderPaymentMethodTitle Max Length : 255. 
	 * @apiParam {String} [OrderCustomerID] Optional OrderCustomerID of Dawnwingapis. Input OrderCustomerID Max Length : 255. 
	 * @apiParam {String} [WayBill] Optional WayBill of Dawnwingapis. Input WayBill Max Length : 255. 
	 * @apiParam {String} [OrderItems] Optional OrderItems of Dawnwingapis. Input OrderItems Max Length : 2555. 
	 * @apiParam {String} [Company] Optional Company of Dawnwingapis. Input Company Max Length : 255. 
	 * @apiParam {String} [OrderCreated] Optional OrderCreated of Dawnwingapis. Input OrderCreated Max Length : 255. 
	 * @apiParam {Integer} WaybillNo Mandatory WaybillNo of Dawnwingapi.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function update_post()
	{
		$this->is_allowed('api_dawnwingapi_update', false);

		
		$this->form_validation->set_rules('id', 'Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('PostID', 'PostID', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAccNo', 'SendAccNo', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendSite', 'SendSite', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendCompany', 'SendCompany', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd1', 'SendAdd1', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd2', 'SendAdd2', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd3', 'SendAdd3', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd4', 'SendAdd4', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendAdd5', 'SendAdd5', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendContactPerson', 'SendContactPerson', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendHomeTel', 'SendHomeTel', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendWorkTel', 'SendWorkTel', 'trim|max_length[255]');
		$this->form_validation->set_rules('SendCell', 'SendCell', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecCompany', 'RecCompany', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd1', 'RecAdd1', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd2', 'RecAdd2', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd3', 'RecAdd3', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd4', 'RecAdd4', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd5', 'RecAdd5', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd6', 'RecAdd6', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecAdd7', 'RecAdd7', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecContactPerson', 'RecContactPerson', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecHomeTel', 'RecHomeTel', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecWorkTel', 'RecWorkTel', 'trim|max_length[255]');
		$this->form_validation->set_rules('RecCell', 'RecCell', 'trim|max_length[255]');
		$this->form_validation->set_rules('SpecialInstructions', 'SpecialInstructions', 'trim|max_length[255]');
		$this->form_validation->set_rules('ServiceType', 'ServiceType', 'trim|max_length[255]');
		$this->form_validation->set_rules('TotQTY', 'TotQTY', 'trim|max_length[255]');
		$this->form_validation->set_rules('TotMass', 'TotMass', 'trim|max_length[255]');
		$this->form_validation->set_rules('Insurance', 'Insurance', 'trim|max_length[255]');
		$this->form_validation->set_rules('InsuranceValue', 'InsuranceValue', 'trim|max_length[255]');
		$this->form_validation->set_rules('CustomerRef', 'CustomerRef', 'trim|max_length[255]');
		$this->form_validation->set_rules('StoreCode', 'StoreCode', 'trim|max_length[255]');
		$this->form_validation->set_rules('SecurityStamp', 'SecurityStamp', 'trim|max_length[255]');
		$this->form_validation->set_rules('RequiredDocs', 'RequiredDocs', 'trim|max_length[255]');
		$this->form_validation->set_rules('WaybillInstructions', 'WaybillInstructions', 'trim|max_length[255]');
		$this->form_validation->set_rules('InstructionCode', 'InstructionCode', 'trim|max_length[255]');
		$this->form_validation->set_rules('IsSecureDelivery', 'IsSecureDelivery', 'trim|max_length[255]');
		$this->form_validation->set_rules('VerificationNumbers', 'VerificationNumbers', 'trim|max_length[255]');
		$this->form_validation->set_rules('GenerateSecurePin', 'GenerateSecurePin', 'trim|max_length[255]');
		$this->form_validation->set_rules('CollectionNo', 'CollectionNo', 'trim|max_length[255]');
		$this->form_validation->set_rules('invoiceRef', 'InvoiceRef', 'trim|max_length[255]');
		$this->form_validation->set_rules('CompleteWaybillAfterSave', 'CompleteWaybillAfterSave', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsWaybillNo', 'ParcelsWaybillNo', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsLength', 'ParcelsLength', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsHeight', 'ParcelsHeight', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsWidth', 'ParcelsWidth', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelsMass', 'ParcelsMass', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelDescription', 'ParcelDescription', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelNo', 'ParcelNo', 'trim|max_length[255]');
		$this->form_validation->set_rules('ParcelCount', 'ParcelCount', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderStatus', 'OrderStatus', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderDiscountTotal', 'OrderDiscountTotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderDiscountTax', 'OrderDiscountTax', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderShippingTotal', 'OrderShippingTotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderShippingTax', 'OrderShippingTax', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderTotal', 'OrderTotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderTotalTax', 'OrderTotalTax', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderPaymentMethod', 'OrderPaymentMethod', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderPaymentMethodTitle', 'OrderPaymentMethodTitle', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderCustomerID', 'OrderCustomerID', 'trim|max_length[255]');
		$this->form_validation->set_rules('WayBill', 'WayBill', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderItems', 'OrderItems', 'trim|max_length[2555]');
		$this->form_validation->set_rules('Company', 'Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('OrderCreated', 'OrderCreated', 'trim|max_length[255]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'PostID' => $this->input->post('PostID'),
				'WaybillNo' => $this->input->post('WaybillNo'),
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
				'OrderTotalTax' => $this->input->post('OrderTotalTax'),
				'OrderPaymentMethod' => $this->input->post('OrderPaymentMethod'),
				'OrderPaymentMethodTitle' => $this->input->post('OrderPaymentMethodTitle'),
				'OrderCustomerID' => $this->input->post('OrderCustomerID'),
				'WayBill' => $this->input->post('WayBill'),
				'OrderItems' => $this->input->post('OrderItems'),
				'Company' => $this->input->post('Company'),
				'OrderCreated' => $this->input->post('OrderCreated'),
			];
			
			$save_dawnwingapi = $this->model_api_dawnwingapi->change($this->post('WaybillNo'), $save_data);

			if ($save_dawnwingapi) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully updated into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> validation_errors()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
	/**
	 * @api {post} /dawnwingapi/delete Delete Dawnwingapi. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteDawnwingapi
	 * @apiGroup dawnwingapi
	 * @apiHeader {String} X-Api-Key Dawnwingapis unique access-key.
	 	 * @apiPermission Dawnwingapi Cant be Accessed permission name : api_dawnwingapi_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Dawnwingapis .
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function delete_post()
	{
		$this->is_allowed('api_dawnwingapi_delete', false);

		$dawnwingapi = $this->model_api_dawnwingapi->find($this->post('WaybillNo'));

		if (!$dawnwingapi) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Dawnwingapi not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_dawnwingapi->remove($this->post('WaybillNo'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Dawnwingapi deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Dawnwingapi not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Dawnwingapi.php */
/* Location: ./application/controllers/api/Dawnwingapi.php */