<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Api_orders extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_api_orders');
	}

	/**
	 * @api {get} /api_orders/all Get all api_orderss.
	 * @apiVersion 0.1.0
	 * @apiName AllApiorders 
	 * @apiGroup api_orders
	 * @apiHeader {String} X-Api-Key Api orderss unique access-key.
	 * @apiPermission Api orders Cant be Accessed permission name : api_api_orders_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Api orderss.
	 * @apiParam {String} [Field="All Field"] Optional field of Api orderss : id, order_id, user_id, order_number, order_parent_id, order_status, order_currency, order_version, order_payment_method, order_payment_method_title, order_date_created, order_date_modified, order_timestamp_created, order_timestamp_modified, order_discount_total, order_discount_tax, order_shipping_total, order_shipping_tax, order_total_tax, order_customer_id, order_billing_first_name, order_billing_last_name, order_billing_company, order_billing_address_1, order_billing_city, order_billing_state, order_billing_postcode, order_billing_country, order_billing_email, order_billing_phone, order_shipping_first_name, order_shipping_last_name, order_shipping_company, order_shipping_address_1, order_shipping_address_2, order_shipping_city, order_shipping_state, order_shipping_postcode, order_shipping_country.
	 * @apiParam {String} [Start=0] Optional start index of Api orderss.
	 * @apiParam {String} [Limit=10] Optional limit data of Api orderss.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of api_orders.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataApi orders Api orders data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_api_orders_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id', 'order_id', 'user_id', 'order_number', 'order_parent_id', 'order_status', 'order_currency', 'order_version', 'order_payment_method', 'order_payment_method_title', 'order_date_created', 'order_date_modified', 'order_timestamp_created', 'order_timestamp_modified', 'order_discount_total', 'order_discount_tax', 'order_shipping_total', 'order_shipping_tax', 'order_total_tax', 'order_customer_id', 'order_billing_first_name', 'order_billing_last_name', 'order_billing_company', 'order_billing_address_1', 'order_billing_city', 'order_billing_state', 'order_billing_postcode', 'order_billing_country', 'order_billing_email', 'order_billing_phone', 'order_shipping_first_name', 'order_shipping_last_name', 'order_shipping_company', 'order_shipping_address_1', 'order_shipping_address_2', 'order_shipping_city', 'order_shipping_state', 'order_shipping_postcode', 'order_shipping_country'];
		$api_orderss = $this->model_api_api_orders->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_api_orders->count_all($filter, $field);
		$api_orderss = array_map(function($row){
						
			return $row;
		}, $api_orderss);

		$data['api_orders'] = $api_orderss;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Api orders',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /api_orders/detail Detail Api orders.
	 * @apiVersion 0.1.0
	 * @apiName DetailApi orders
	 * @apiGroup api_orders
	 * @apiHeader {String} X-Api-Key Api orderss unique access-key.
	 * @apiPermission Api orders Cant be Accessed permission name : api_api_orders_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Api orderss.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of api_orders.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Api ordersNotFound Api orders data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_api_orders_detail', false);

		$this->requiredInput(['id']);

		$id = $this->get('id');

		$select_field = ['id', 'order_id', 'user_id', 'order_number', 'order_parent_id', 'order_status', 'order_currency', 'order_version', 'order_payment_method', 'order_payment_method_title', 'order_date_created', 'order_date_modified', 'order_timestamp_created', 'order_timestamp_modified', 'order_discount_total', 'order_discount_tax', 'order_shipping_total', 'order_shipping_tax', 'order_total_tax', 'order_customer_id', 'order_billing_first_name', 'order_billing_last_name', 'order_billing_company', 'order_billing_address_1', 'order_billing_city', 'order_billing_state', 'order_billing_postcode', 'order_billing_country', 'order_billing_email', 'order_billing_phone', 'order_shipping_first_name', 'order_shipping_last_name', 'order_shipping_company', 'order_shipping_address_1', 'order_shipping_address_2', 'order_shipping_city', 'order_shipping_state', 'order_shipping_postcode', 'order_shipping_country'];
		$api_orders = $this->model_api_api_orders->find($id, $select_field);

		if (!$api_orders) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['api_orders'] = $api_orders;
		if ($data['api_orders']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Api orders',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Api orders not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /api_orders/add Add Api orders.
	 * @apiVersion 0.1.0
	 * @apiName AddApi orders
	 * @apiGroup api_orders
	 * @apiHeader {String} X-Api-Key Api orderss unique access-key.
	 * @apiPermission Api orders Cant be Accessed permission name : api_api_orders_add
	 *
 	 * @apiParam {String} Id Mandatory id of Api orderss. Input Id Max Length : 20. 
	 * @apiParam {String} [Order_id] Optional order_id of Api orderss. Input Order Id Max Length : 20. 
	 * @apiParam {String} [User_id] Optional user_id of Api orderss. Input User Id Max Length : 20. 
	 * @apiParam {String} [Order_number] Optional order_number of Api orderss. Input Order Number Max Length : 255. 
	 * @apiParam {String} [Order_parent_id] Optional order_parent_id of Api orderss. Input Order Parent Id Max Length : 255. 
	 * @apiParam {String} [Order_status] Optional order_status of Api orderss. Input Order Status Max Length : 255. 
	 * @apiParam {String} [Order_currency] Optional order_currency of Api orderss. Input Order Currency Max Length : 255. 
	 * @apiParam {String} [Order_version] Optional order_version of Api orderss. Input Order Version Max Length : 255. 
	 * @apiParam {String} [Order_payment_method] Optional order_payment_method of Api orderss. Input Order Payment Method Max Length : 255. 
	 * @apiParam {String} [Order_payment_method_title] Optional order_payment_method_title of Api orderss. Input Order Payment Method Title Max Length : 255. 
	 * @apiParam {String} [Order_date_created] Optional order_date_created of Api orderss. Input Order Date Created Max Length : 255. 
	 * @apiParam {String} [Order_date_modified] Optional order_date_modified of Api orderss. Input Order Date Modified Max Length : 255. 
	 * @apiParam {String} [Order_timestamp_created] Optional order_timestamp_created of Api orderss. Input Order Timestamp Created Max Length : 255. 
	 * @apiParam {String} [Order_timestamp_modified] Optional order_timestamp_modified of Api orderss. Input Order Timestamp Modified Max Length : 255. 
	 * @apiParam {String} [Order_discount_total] Optional order_discount_total of Api orderss. Input Order Discount Total Max Length : 255. 
	 * @apiParam {String} [Order_discount_tax] Optional order_discount_tax of Api orderss. Input Order Discount Tax Max Length : 255. 
	 * @apiParam {String} [Order_shipping_total] Optional order_shipping_total of Api orderss. Input Order Shipping Total Max Length : 255. 
	 * @apiParam {String} [Order_shipping_tax] Optional order_shipping_tax of Api orderss. Input Order Shipping Tax Max Length : 255. 
	 * @apiParam {String} [Order_total_tax] Optional order_total_tax of Api orderss. Input Order Total Tax Max Length : 255. 
	 * @apiParam {String} [Order_customer_id] Optional order_customer_id of Api orderss. Input Order Customer Id Max Length : 255. 
	 * @apiParam {String} [Order_billing_first_name] Optional order_billing_first_name of Api orderss. Input Order Billing First Name Max Length : 255. 
	 * @apiParam {String} [Order_billing_last_name] Optional order_billing_last_name of Api orderss. Input Order Billing Last Name Max Length : 255. 
	 * @apiParam {String} [Order_billing_company] Optional order_billing_company of Api orderss. Input Order Billing Company Max Length : 255. 
	 * @apiParam {String} [Order_billing_address_1] Optional order_billing_address_1 of Api orderss. Input Order Billing Address 1 Max Length : 255. 
	 * @apiParam {String} [Order_billing_city] Optional order_billing_city of Api orderss. Input Order Billing City Max Length : 255. 
	 * @apiParam {String} [Order_billing_state] Optional order_billing_state of Api orderss. Input Order Billing State Max Length : 255. 
	 * @apiParam {String} [Order_billing_postcode] Optional order_billing_postcode of Api orderss. Input Order Billing Postcode Max Length : 255. 
	 * @apiParam {String} [Order_billing_country] Optional order_billing_country of Api orderss. Input Order Billing Country Max Length : 255. 
	 * @apiParam {String} [Order_billing_email] Optional order_billing_email of Api orderss. Input Order Billing Email Max Length : 255. 
	 * @apiParam {String} [Order_billing_phone] Optional order_billing_phone of Api orderss. Input Order Billing Phone Max Length : 255. 
	 * @apiParam {String} [Order_shipping_first_name] Optional order_shipping_first_name of Api orderss. Input Order Shipping First Name Max Length : 255. 
	 * @apiParam {String} [Order_shipping_last_name] Optional order_shipping_last_name of Api orderss. Input Order Shipping Last Name Max Length : 255. 
	 * @apiParam {String} [Order_shipping_company] Optional order_shipping_company of Api orderss. Input Order Shipping Company Max Length : 255. 
	 * @apiParam {String} [Order_shipping_address_1] Optional order_shipping_address_1 of Api orderss. Input Order Shipping Address 1 Max Length : 255. 
	 * @apiParam {String} [Order_shipping_address_2] Optional order_shipping_address_2 of Api orderss. Input Order Shipping Address 2 Max Length : 255. 
	 * @apiParam {String} [Order_shipping_city] Optional order_shipping_city of Api orderss. Input Order Shipping City Max Length : 255. 
	 * @apiParam {String} [Order_shipping_state] Optional order_shipping_state of Api orderss. Input Order Shipping State Max Length : 255. 
	 * @apiParam {String} [Order_shipping_postcode] Optional order_shipping_postcode of Api orderss. Input Order Shipping Postcode Max Length : 255. 
	 * @apiParam {String} [Order_shipping_country] Optional order_shipping_country of Api orderss. Input Order Shipping Country Max Length : 255. 
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
		$this->is_allowed('api_api_orders_add', false);

		$this->form_validation->set_rules('id', 'Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('order_id', 'Order Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('user_id', 'User Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('order_number', 'Order Number', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_parent_id', 'Order Parent Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_status', 'Order Status', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_currency', 'Order Currency', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_version', 'Order Version', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_payment_method', 'Order Payment Method', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_payment_method_title', 'Order Payment Method Title', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_date_created', 'Order Date Created', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_date_modified', 'Order Date Modified', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_timestamp_created', 'Order Timestamp Created', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_timestamp_modified', 'Order Timestamp Modified', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_discount_total', 'Order Discount Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_discount_tax', 'Order Discount Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_total', 'Order Shipping Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_tax', 'Order Shipping Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_total_tax', 'Order Total Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_customer_id', 'Order Customer Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_first_name', 'Order Billing First Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_last_name', 'Order Billing Last Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_company', 'Order Billing Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_address_1', 'Order Billing Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_city', 'Order Billing City', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_state', 'Order Billing State', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_postcode', 'Order Billing Postcode', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_country', 'Order Billing Country', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_email', 'Order Billing Email', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_phone', 'Order Billing Phone', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_first_name', 'Order Shipping First Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_last_name', 'Order Shipping Last Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_company', 'Order Shipping Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_address_1', 'Order Shipping Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_address_2', 'Order Shipping Address 2', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_city', 'Order Shipping City', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_state', 'Order Shipping State', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_postcode', 'Order Shipping Postcode', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_country', 'Order Shipping Country', 'trim|max_length[255]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'order_id' => $this->input->post('order_id'),
				'user_id' => $this->input->post('user_id'),
				'order_number' => $this->input->post('order_number'),
				'order_parent_id' => $this->input->post('order_parent_id'),
				'order_status' => $this->input->post('order_status'),
				'order_currency' => $this->input->post('order_currency'),
				'order_version' => $this->input->post('order_version'),
				'order_payment_method' => $this->input->post('order_payment_method'),
				'order_payment_method_title' => $this->input->post('order_payment_method_title'),
				'order_date_created' => $this->input->post('order_date_created'),
				'order_date_modified' => $this->input->post('order_date_modified'),
				'order_timestamp_created' => $this->input->post('order_timestamp_created'),
				'order_timestamp_modified' => $this->input->post('order_timestamp_modified'),
				'order_discount_total' => $this->input->post('order_discount_total'),
				'order_discount_tax' => $this->input->post('order_discount_tax'),
				'order_shipping_total' => $this->input->post('order_shipping_total'),
				'order_shipping_tax' => $this->input->post('order_shipping_tax'),
				'order_total_tax' => $this->input->post('order_total_tax'),
				'order_customer_id' => $this->input->post('order_customer_id'),
				'order_billing_first_name' => $this->input->post('order_billing_first_name'),
				'order_billing_last_name' => $this->input->post('order_billing_last_name'),
				'order_billing_company' => $this->input->post('order_billing_company'),
				'order_billing_address_1' => $this->input->post('order_billing_address_1'),
				'order_billing_city' => $this->input->post('order_billing_city'),
				'order_billing_state' => $this->input->post('order_billing_state'),
				'order_billing_postcode' => $this->input->post('order_billing_postcode'),
				'order_billing_country' => $this->input->post('order_billing_country'),
				'order_billing_email' => $this->input->post('order_billing_email'),
				'order_billing_phone' => $this->input->post('order_billing_phone'),
				'order_shipping_first_name' => $this->input->post('order_shipping_first_name'),
				'order_shipping_last_name' => $this->input->post('order_shipping_last_name'),
				'order_shipping_company' => $this->input->post('order_shipping_company'),
				'order_shipping_address_1' => $this->input->post('order_shipping_address_1'),
				'order_shipping_address_2' => $this->input->post('order_shipping_address_2'),
				'order_shipping_city' => $this->input->post('order_shipping_city'),
				'order_shipping_state' => $this->input->post('order_shipping_state'),
				'order_shipping_postcode' => $this->input->post('order_shipping_postcode'),
				'order_shipping_country' => $this->input->post('order_shipping_country'),
			];
			
			$save_api_orders = $this->model_api_api_orders->store($save_data);

			if ($save_api_orders) {
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
	 * @api {post} /api_orders/update Update Api orders.
	 * @apiVersion 0.1.0
	 * @apiName UpdateApi orders
	 * @apiGroup api_orders
	 * @apiHeader {String} X-Api-Key Api orderss unique access-key.
	 * @apiPermission Api orders Cant be Accessed permission name : api_api_orders_update
	 *
	 * @apiParam {String} Id Mandatory id of Api orderss. Input Id Max Length : 20. 
	 * @apiParam {String} [Order_id] Optional order_id of Api orderss. Input Order Id Max Length : 20. 
	 * @apiParam {String} [User_id] Optional user_id of Api orderss. Input User Id Max Length : 20. 
	 * @apiParam {String} [Order_number] Optional order_number of Api orderss. Input Order Number Max Length : 255. 
	 * @apiParam {String} [Order_parent_id] Optional order_parent_id of Api orderss. Input Order Parent Id Max Length : 255. 
	 * @apiParam {String} [Order_status] Optional order_status of Api orderss. Input Order Status Max Length : 255. 
	 * @apiParam {String} [Order_currency] Optional order_currency of Api orderss. Input Order Currency Max Length : 255. 
	 * @apiParam {String} [Order_version] Optional order_version of Api orderss. Input Order Version Max Length : 255. 
	 * @apiParam {String} [Order_payment_method] Optional order_payment_method of Api orderss. Input Order Payment Method Max Length : 255. 
	 * @apiParam {String} [Order_payment_method_title] Optional order_payment_method_title of Api orderss. Input Order Payment Method Title Max Length : 255. 
	 * @apiParam {String} [Order_date_created] Optional order_date_created of Api orderss. Input Order Date Created Max Length : 255. 
	 * @apiParam {String} [Order_date_modified] Optional order_date_modified of Api orderss. Input Order Date Modified Max Length : 255. 
	 * @apiParam {String} [Order_timestamp_created] Optional order_timestamp_created of Api orderss. Input Order Timestamp Created Max Length : 255. 
	 * @apiParam {String} [Order_timestamp_modified] Optional order_timestamp_modified of Api orderss. Input Order Timestamp Modified Max Length : 255. 
	 * @apiParam {String} [Order_discount_total] Optional order_discount_total of Api orderss. Input Order Discount Total Max Length : 255. 
	 * @apiParam {String} [Order_discount_tax] Optional order_discount_tax of Api orderss. Input Order Discount Tax Max Length : 255. 
	 * @apiParam {String} [Order_shipping_total] Optional order_shipping_total of Api orderss. Input Order Shipping Total Max Length : 255. 
	 * @apiParam {String} [Order_shipping_tax] Optional order_shipping_tax of Api orderss. Input Order Shipping Tax Max Length : 255. 
	 * @apiParam {String} [Order_total_tax] Optional order_total_tax of Api orderss. Input Order Total Tax Max Length : 255. 
	 * @apiParam {String} [Order_customer_id] Optional order_customer_id of Api orderss. Input Order Customer Id Max Length : 255. 
	 * @apiParam {String} [Order_billing_first_name] Optional order_billing_first_name of Api orderss. Input Order Billing First Name Max Length : 255. 
	 * @apiParam {String} [Order_billing_last_name] Optional order_billing_last_name of Api orderss. Input Order Billing Last Name Max Length : 255. 
	 * @apiParam {String} [Order_billing_company] Optional order_billing_company of Api orderss. Input Order Billing Company Max Length : 255. 
	 * @apiParam {String} [Order_billing_address_1] Optional order_billing_address_1 of Api orderss. Input Order Billing Address 1 Max Length : 255. 
	 * @apiParam {String} [Order_billing_city] Optional order_billing_city of Api orderss. Input Order Billing City Max Length : 255. 
	 * @apiParam {String} [Order_billing_state] Optional order_billing_state of Api orderss. Input Order Billing State Max Length : 255. 
	 * @apiParam {String} [Order_billing_postcode] Optional order_billing_postcode of Api orderss. Input Order Billing Postcode Max Length : 255. 
	 * @apiParam {String} [Order_billing_country] Optional order_billing_country of Api orderss. Input Order Billing Country Max Length : 255. 
	 * @apiParam {String} [Order_billing_email] Optional order_billing_email of Api orderss. Input Order Billing Email Max Length : 255. 
	 * @apiParam {String} [Order_billing_phone] Optional order_billing_phone of Api orderss. Input Order Billing Phone Max Length : 255. 
	 * @apiParam {String} [Order_shipping_first_name] Optional order_shipping_first_name of Api orderss. Input Order Shipping First Name Max Length : 255. 
	 * @apiParam {String} [Order_shipping_last_name] Optional order_shipping_last_name of Api orderss. Input Order Shipping Last Name Max Length : 255. 
	 * @apiParam {String} [Order_shipping_company] Optional order_shipping_company of Api orderss. Input Order Shipping Company Max Length : 255. 
	 * @apiParam {String} [Order_shipping_address_1] Optional order_shipping_address_1 of Api orderss. Input Order Shipping Address 1 Max Length : 255. 
	 * @apiParam {String} [Order_shipping_address_2] Optional order_shipping_address_2 of Api orderss. Input Order Shipping Address 2 Max Length : 255. 
	 * @apiParam {String} [Order_shipping_city] Optional order_shipping_city of Api orderss. Input Order Shipping City Max Length : 255. 
	 * @apiParam {String} [Order_shipping_state] Optional order_shipping_state of Api orderss. Input Order Shipping State Max Length : 255. 
	 * @apiParam {String} [Order_shipping_postcode] Optional order_shipping_postcode of Api orderss. Input Order Shipping Postcode Max Length : 255. 
	 * @apiParam {String} [Order_shipping_country] Optional order_shipping_country of Api orderss. Input Order Shipping Country Max Length : 255. 
	 * @apiParam {Integer} id Mandatory id of Api Orders.
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
		$this->is_allowed('api_api_orders_update', false);

		
		$this->form_validation->set_rules('id', 'Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('order_id', 'Order Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('user_id', 'User Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('order_number', 'Order Number', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_parent_id', 'Order Parent Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_status', 'Order Status', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_currency', 'Order Currency', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_version', 'Order Version', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_payment_method', 'Order Payment Method', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_payment_method_title', 'Order Payment Method Title', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_date_created', 'Order Date Created', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_date_modified', 'Order Date Modified', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_timestamp_created', 'Order Timestamp Created', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_timestamp_modified', 'Order Timestamp Modified', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_discount_total', 'Order Discount Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_discount_tax', 'Order Discount Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_total', 'Order Shipping Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_tax', 'Order Shipping Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_total_tax', 'Order Total Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_customer_id', 'Order Customer Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_first_name', 'Order Billing First Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_last_name', 'Order Billing Last Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_company', 'Order Billing Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_address_1', 'Order Billing Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_city', 'Order Billing City', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_state', 'Order Billing State', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_postcode', 'Order Billing Postcode', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_country', 'Order Billing Country', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_email', 'Order Billing Email', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_phone', 'Order Billing Phone', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_first_name', 'Order Shipping First Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_last_name', 'Order Shipping Last Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_company', 'Order Shipping Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_address_1', 'Order Shipping Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_address_2', 'Order Shipping Address 2', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_city', 'Order Shipping City', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_state', 'Order Shipping State', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_postcode', 'Order Shipping Postcode', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_country', 'Order Shipping Country', 'trim|max_length[255]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'order_id' => $this->input->post('order_id'),
				'user_id' => $this->input->post('user_id'),
				'order_number' => $this->input->post('order_number'),
				'order_parent_id' => $this->input->post('order_parent_id'),
				'order_status' => $this->input->post('order_status'),
				'order_currency' => $this->input->post('order_currency'),
				'order_version' => $this->input->post('order_version'),
				'order_payment_method' => $this->input->post('order_payment_method'),
				'order_payment_method_title' => $this->input->post('order_payment_method_title'),
				'order_date_created' => $this->input->post('order_date_created'),
				'order_date_modified' => $this->input->post('order_date_modified'),
				'order_timestamp_created' => $this->input->post('order_timestamp_created'),
				'order_timestamp_modified' => $this->input->post('order_timestamp_modified'),
				'order_discount_total' => $this->input->post('order_discount_total'),
				'order_discount_tax' => $this->input->post('order_discount_tax'),
				'order_shipping_total' => $this->input->post('order_shipping_total'),
				'order_shipping_tax' => $this->input->post('order_shipping_tax'),
				'order_total_tax' => $this->input->post('order_total_tax'),
				'order_customer_id' => $this->input->post('order_customer_id'),
				'order_billing_first_name' => $this->input->post('order_billing_first_name'),
				'order_billing_last_name' => $this->input->post('order_billing_last_name'),
				'order_billing_company' => $this->input->post('order_billing_company'),
				'order_billing_address_1' => $this->input->post('order_billing_address_1'),
				'order_billing_city' => $this->input->post('order_billing_city'),
				'order_billing_state' => $this->input->post('order_billing_state'),
				'order_billing_postcode' => $this->input->post('order_billing_postcode'),
				'order_billing_country' => $this->input->post('order_billing_country'),
				'order_billing_email' => $this->input->post('order_billing_email'),
				'order_billing_phone' => $this->input->post('order_billing_phone'),
				'order_shipping_first_name' => $this->input->post('order_shipping_first_name'),
				'order_shipping_last_name' => $this->input->post('order_shipping_last_name'),
				'order_shipping_company' => $this->input->post('order_shipping_company'),
				'order_shipping_address_1' => $this->input->post('order_shipping_address_1'),
				'order_shipping_address_2' => $this->input->post('order_shipping_address_2'),
				'order_shipping_city' => $this->input->post('order_shipping_city'),
				'order_shipping_state' => $this->input->post('order_shipping_state'),
				'order_shipping_postcode' => $this->input->post('order_shipping_postcode'),
				'order_shipping_country' => $this->input->post('order_shipping_country'),
			];
			
			$save_api_orders = $this->model_api_api_orders->change($this->post('id'), $save_data);

			if ($save_api_orders) {
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
	 * @api {post} /api_orders/delete Delete Api orders. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteApi orders
	 * @apiGroup api_orders
	 * @apiHeader {String} X-Api-Key Api orderss unique access-key.
	 	 * @apiPermission Api orders Cant be Accessed permission name : api_api_orders_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Api orderss .
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
		$this->is_allowed('api_api_orders_delete', false);

		$api_orders = $this->model_api_api_orders->find($this->post('id'));

		if (!$api_orders) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Api orders not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_api_orders->remove($this->post('id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Api orders deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Api orders not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Api orders.php */
/* Location: ./application/controllers/api/Api orders.php */