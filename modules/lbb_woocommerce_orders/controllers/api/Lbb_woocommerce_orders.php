<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Lbb_woocommerce_orders extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_lbb_woocommerce_orders');
	}

	/**
	 * @api {get} /lbb_woocommerce_orders/all Get all lbb_woocommerce_orderss.
	 * @apiVersion 0.1.0
	 * @apiName AllLbbwoocommerceorders 
	 * @apiGroup lbb_woocommerce_orders
	 * @apiHeader {String} X-Api-Key Lbb woocommerce orderss unique access-key.
	 * @apiHeader {String} X-Token Lbb woocommerce orderss unique token.
	 * @apiPermission Lbb woocommerce orders Cant be Accessed permission name : api_lbb_woocommerce_orders_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Lbb woocommerce orderss.
	 * @apiParam {String} [Field="All Field"] Optional field of Lbb woocommerce orderss : order_id, order_key, customer_id, billing_index, billing_first_name, billing_last_name, billing_company, billing_address_1, billing_address_2, billing_city, billing_state, billing_postcode, billing_country, billing_email, billing_phone, shipping_index, shipping_first_name, shipping_last_name, shipping_company, shipping_address_1, shipping_address_2, shipping_city, shipping_state, shipping_postcode, shipping_country, payment_method, payment_method_title, discount_total, discount_tax, shipping_total, shipping_tax, cart_tax, total, version, currency, prices_include_tax, transaction_id, customer_ip_address, customer_user_agent, created_via, date_completed, date_paid, cart_hash, amount, refunded_by, reason.
	 * @apiParam {String} [Start=0] Optional start index of Lbb woocommerce orderss.
	 * @apiParam {String} [Limit=10] Optional limit data of Lbb woocommerce orderss.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of lbb_woocommerce_orders.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataLbb woocommerce orders Lbb woocommerce orders data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_lbb_woocommerce_orders_all');

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['order_id', 'order_key', 'customer_id', 'billing_index', 'billing_first_name', 'billing_last_name', 'billing_company', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'billing_country', 'billing_email', 'billing_phone', 'shipping_index', 'shipping_first_name', 'shipping_last_name', 'shipping_company', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_state', 'shipping_postcode', 'shipping_country', 'payment_method', 'payment_method_title', 'discount_total', 'discount_tax', 'shipping_total', 'shipping_tax', 'cart_tax', 'total', 'version', 'currency', 'prices_include_tax', 'transaction_id', 'customer_ip_address', 'customer_user_agent', 'created_via', 'date_completed', 'date_paid', 'cart_hash', 'amount', 'refunded_by', 'reason'];
		$lbb_woocommerce_orderss = $this->model_api_lbb_woocommerce_orders->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_lbb_woocommerce_orders->count_all($filter, $field);
		$lbb_woocommerce_orderss = array_map(function($row){
						
			return $row;
		}, $lbb_woocommerce_orderss);

		$data['lbb_woocommerce_orders'] = $lbb_woocommerce_orderss;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Lbb woocommerce orders',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /lbb_woocommerce_orders/detail Detail Lbb woocommerce orders.
	 * @apiVersion 0.1.0
	 * @apiName DetailLbb woocommerce orders
	 * @apiGroup lbb_woocommerce_orders
	 * @apiHeader {String} X-Api-Key Lbb woocommerce orderss unique access-key.
	 * @apiHeader {String} X-Token Lbb woocommerce orderss unique token.
	 * @apiPermission Lbb woocommerce orders Cant be Accessed permission name : api_lbb_woocommerce_orders_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Lbb woocommerce orderss.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of lbb_woocommerce_orders.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Lbb woocommerce ordersNotFound Lbb woocommerce orders data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_lbb_woocommerce_orders_detail');

		$this->requiredInput(['order_id']);

		$id = $this->get('order_id');

		$select_field = ['order_id', 'order_key', 'customer_id', 'billing_index', 'billing_first_name', 'billing_last_name', 'billing_company', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'billing_country', 'billing_email', 'billing_phone', 'shipping_index', 'shipping_first_name', 'shipping_last_name', 'shipping_company', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_state', 'shipping_postcode', 'shipping_country', 'payment_method', 'payment_method_title', 'discount_total', 'discount_tax', 'shipping_total', 'shipping_tax', 'cart_tax', 'total', 'version', 'currency', 'prices_include_tax', 'transaction_id', 'customer_ip_address', 'customer_user_agent', 'created_via', 'date_completed', 'date_paid', 'cart_hash', 'amount', 'refunded_by', 'reason'];
		$lbb_woocommerce_orders = $this->model_api_lbb_woocommerce_orders->find($id, $select_field);

		if (!$lbb_woocommerce_orders) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['lbb_woocommerce_orders'] = $lbb_woocommerce_orders;
		if ($data['lbb_woocommerce_orders']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Lbb woocommerce orders',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Lbb woocommerce orders not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /lbb_woocommerce_orders/add Add Lbb woocommerce orders.
	 * @apiVersion 0.1.0
	 * @apiName AddLbb woocommerce orders
	 * @apiGroup lbb_woocommerce_orders
	 * @apiHeader {String} X-Api-Key Lbb woocommerce orderss unique access-key.
	 * @apiHeader {String} X-Token Lbb woocommerce orderss unique token.
	 * @apiPermission Lbb woocommerce orders Cant be Accessed permission name : api_lbb_woocommerce_orders_add
	 *
 	 * @apiParam {String} [Order_id] Optional order_id of Lbb woocommerce orderss.  
	 * @apiParam {String} [Order_key] Optional order_key of Lbb woocommerce orderss. Input Order Key Max Length : 100. 
	 * @apiParam {String} [Customer_id] Optional customer_id of Lbb woocommerce orderss. Input Customer Id Max Length : 20. 
	 * @apiParam {String} [Billing_index] Optional billing_index of Lbb woocommerce orderss. Input Billing Index Max Length : 255. 
	 * @apiParam {String} [Billing_first_name] Optional billing_first_name of Lbb woocommerce orderss. Input Billing First Name Max Length : 100. 
	 * @apiParam {String} [Billing_last_name] Optional billing_last_name of Lbb woocommerce orderss. Input Billing Last Name Max Length : 100. 
	 * @apiParam {String} [Billing_company] Optional billing_company of Lbb woocommerce orderss. Input Billing Company Max Length : 100. 
	 * @apiParam {String} [Billing_address_1] Optional billing_address_1 of Lbb woocommerce orderss. Input Billing Address 1 Max Length : 255. 
	 * @apiParam {String} [Billing_address_2] Optional billing_address_2 of Lbb woocommerce orderss. Input Billing Address 2 Max Length : 200. 
	 * @apiParam {String} [Billing_city] Optional billing_city of Lbb woocommerce orderss. Input Billing City Max Length : 100. 
	 * @apiParam {String} [Billing_state] Optional billing_state of Lbb woocommerce orderss. Input Billing State Max Length : 100. 
	 * @apiParam {String} [Billing_postcode] Optional billing_postcode of Lbb woocommerce orderss. Input Billing Postcode Max Length : 20. 
	 * @apiParam {String} [Billing_country] Optional billing_country of Lbb woocommerce orderss. Input Billing Country Max Length : 2. 
	 * @apiParam {String} [Billing_email] Optional billing_email of Lbb woocommerce orderss. Input Billing Email Max Length : 200. 
	 * @apiParam {String} [Billing_phone] Optional billing_phone of Lbb woocommerce orderss. Input Billing Phone Max Length : 200. 
	 * @apiParam {String} [Shipping_index] Optional shipping_index of Lbb woocommerce orderss. Input Shipping Index Max Length : 255. 
	 * @apiParam {String} [Shipping_first_name] Optional shipping_first_name of Lbb woocommerce orderss. Input Shipping First Name Max Length : 100. 
	 * @apiParam {String} [Shipping_last_name] Optional shipping_last_name of Lbb woocommerce orderss. Input Shipping Last Name Max Length : 100. 
	 * @apiParam {String} [Shipping_company] Optional shipping_company of Lbb woocommerce orderss. Input Shipping Company Max Length : 100. 
	 * @apiParam {String} [Shipping_address_1] Optional shipping_address_1 of Lbb woocommerce orderss. Input Shipping Address 1 Max Length : 255. 
	 * @apiParam {String} [Shipping_address_2] Optional shipping_address_2 of Lbb woocommerce orderss. Input Shipping Address 2 Max Length : 200. 
	 * @apiParam {String} [Shipping_city] Optional shipping_city of Lbb woocommerce orderss. Input Shipping City Max Length : 100. 
	 * @apiParam {String} [Shipping_state] Optional shipping_state of Lbb woocommerce orderss. Input Shipping State Max Length : 100. 
	 * @apiParam {String} [Shipping_postcode] Optional shipping_postcode of Lbb woocommerce orderss. Input Shipping Postcode Max Length : 20. 
	 * @apiParam {String} [Shipping_country] Optional shipping_country of Lbb woocommerce orderss. Input Shipping Country Max Length : 2. 
	 * @apiParam {String} [Payment_method] Optional payment_method of Lbb woocommerce orderss. Input Payment Method Max Length : 100. 
	 * @apiParam {String} [Payment_method_title] Optional payment_method_title of Lbb woocommerce orderss. Input Payment Method Title Max Length : 100. 
	 * @apiParam {String} [Discount_total] Optional discount_total of Lbb woocommerce orderss. Input Discount Total Max Length : 100. 
	 * @apiParam {String} [Discount_tax] Optional discount_tax of Lbb woocommerce orderss. Input Discount Tax Max Length : 100. 
	 * @apiParam {String} [Shipping_total] Optional shipping_total of Lbb woocommerce orderss. Input Shipping Total Max Length : 100. 
	 * @apiParam {String} [Shipping_tax] Optional shipping_tax of Lbb woocommerce orderss. Input Shipping Tax Max Length : 100. 
	 * @apiParam {String} [Cart_tax] Optional cart_tax of Lbb woocommerce orderss. Input Cart Tax Max Length : 100. 
	 * @apiParam {String} [Total] Optional total of Lbb woocommerce orderss. Input Total Max Length : 100. 
	 * @apiParam {String} [Version] Optional version of Lbb woocommerce orderss. Input Version Max Length : 16. 
	 * @apiParam {String} [Currency] Optional currency of Lbb woocommerce orderss. Input Currency Max Length : 3. 
	 * @apiParam {String} [Prices_include_tax] Optional prices_include_tax of Lbb woocommerce orderss. Input Prices Include Tax Max Length : 3. 
	 * @apiParam {String} [Transaction_id] Optional transaction_id of Lbb woocommerce orderss. Input Transaction Id Max Length : 200. 
	 * @apiParam {String} [Customer_ip_address] Optional customer_ip_address of Lbb woocommerce orderss. Input Customer Ip Address Max Length : 40. 
	 * @apiParam {String} [Customer_user_agent] Optional customer_user_agent of Lbb woocommerce orderss.  
	 * @apiParam {String} [Created_via] Optional created_via of Lbb woocommerce orderss. Input Created Via Max Length : 200. 
	 * @apiParam {String} [Date_completed] Optional date_completed of Lbb woocommerce orderss. Input Date Completed Max Length : 20. 
	 * @apiParam {String} [Date_paid] Optional date_paid of Lbb woocommerce orderss. Input Date Paid Max Length : 20. 
	 * @apiParam {String} [Cart_hash] Optional cart_hash of Lbb woocommerce orderss. Input Cart Hash Max Length : 32. 
	 * @apiParam {String} [Amount] Optional amount of Lbb woocommerce orderss. Input Amount Max Length : 100. 
	 * @apiParam {String} [Refunded_by] Optional refunded_by of Lbb woocommerce orderss. Input Refunded By Max Length : 20. 
	 * @apiParam {String} [Reason] Optional reason of Lbb woocommerce orderss.  
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
		$this->is_allowed('api_lbb_woocommerce_orders_add');

		$this->form_validation->set_rules('order_key', 'Order Key', 'trim|max_length[100]');
		$this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('billing_index', 'Billing Index', 'trim|max_length[255]');
		$this->form_validation->set_rules('billing_first_name', 'Billing First Name', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_last_name', 'Billing Last Name', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_company', 'Billing Company', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_address_1', 'Billing Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('billing_address_2', 'Billing Address 2', 'trim|max_length[200]');
		$this->form_validation->set_rules('billing_city', 'Billing City', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_state', 'Billing State', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_postcode', 'Billing Postcode', 'trim|max_length[20]');
		$this->form_validation->set_rules('billing_country', 'Billing Country', 'trim|max_length[2]');
		$this->form_validation->set_rules('billing_email', 'Billing Email', 'trim|max_length[200]');
		$this->form_validation->set_rules('billing_phone', 'Billing Phone', 'trim|max_length[200]');
		$this->form_validation->set_rules('shipping_index', 'Shipping Index', 'trim|max_length[255]');
		$this->form_validation->set_rules('shipping_first_name', 'Shipping First Name', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_last_name', 'Shipping Last Name', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_company', 'Shipping Company', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_address_1', 'Shipping Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('shipping_address_2', 'Shipping Address 2', 'trim|max_length[200]');
		$this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_state', 'Shipping State', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_postcode', 'Shipping Postcode', 'trim|max_length[20]');
		$this->form_validation->set_rules('shipping_country', 'Shipping Country', 'trim|max_length[2]');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'trim|max_length[100]');
		$this->form_validation->set_rules('payment_method_title', 'Payment Method Title', 'trim|max_length[100]');
		$this->form_validation->set_rules('discount_total', 'Discount Total', 'trim|max_length[100]');
		$this->form_validation->set_rules('discount_tax', 'Discount Tax', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_total', 'Shipping Total', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_tax', 'Shipping Tax', 'trim|max_length[100]');
		$this->form_validation->set_rules('cart_tax', 'Cart Tax', 'trim|max_length[100]');
		$this->form_validation->set_rules('total', 'Total', 'trim|max_length[100]');
		$this->form_validation->set_rules('version', 'Version', 'trim|max_length[16]');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|max_length[3]');
		$this->form_validation->set_rules('prices_include_tax', 'Prices Include Tax', 'trim|max_length[3]');
		$this->form_validation->set_rules('transaction_id', 'Transaction Id', 'trim|max_length[200]');
		$this->form_validation->set_rules('customer_ip_address', 'Customer Ip Address', 'trim|max_length[40]');
		$this->form_validation->set_rules('created_via', 'Created Via', 'trim|max_length[200]');
		$this->form_validation->set_rules('date_completed', 'Date Completed', 'trim|max_length[20]');
		$this->form_validation->set_rules('date_paid', 'Date Paid', 'trim|max_length[20]');
		$this->form_validation->set_rules('cart_hash', 'Cart Hash', 'trim|max_length[32]');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|max_length[100]');
		$this->form_validation->set_rules('refunded_by', 'Refunded By', 'trim|max_length[20]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'order_id' => $this->input->post('order_id'),
				'order_key' => $this->input->post('order_key'),
				'customer_id' => $this->input->post('customer_id'),
				'billing_index' => $this->input->post('billing_index'),
				'billing_first_name' => $this->input->post('billing_first_name'),
				'billing_last_name' => $this->input->post('billing_last_name'),
				'billing_company' => $this->input->post('billing_company'),
				'billing_address_1' => $this->input->post('billing_address_1'),
				'billing_address_2' => $this->input->post('billing_address_2'),
				'billing_city' => $this->input->post('billing_city'),
				'billing_state' => $this->input->post('billing_state'),
				'billing_postcode' => $this->input->post('billing_postcode'),
				'billing_country' => $this->input->post('billing_country'),
				'billing_email' => $this->input->post('billing_email'),
				'billing_phone' => $this->input->post('billing_phone'),
				'shipping_index' => $this->input->post('shipping_index'),
				'shipping_first_name' => $this->input->post('shipping_first_name'),
				'shipping_last_name' => $this->input->post('shipping_last_name'),
				'shipping_company' => $this->input->post('shipping_company'),
				'shipping_address_1' => $this->input->post('shipping_address_1'),
				'shipping_address_2' => $this->input->post('shipping_address_2'),
				'shipping_city' => $this->input->post('shipping_city'),
				'shipping_state' => $this->input->post('shipping_state'),
				'shipping_postcode' => $this->input->post('shipping_postcode'),
				'shipping_country' => $this->input->post('shipping_country'),
				'payment_method' => $this->input->post('payment_method'),
				'payment_method_title' => $this->input->post('payment_method_title'),
				'discount_total' => $this->input->post('discount_total'),
				'discount_tax' => $this->input->post('discount_tax'),
				'shipping_total' => $this->input->post('shipping_total'),
				'shipping_tax' => $this->input->post('shipping_tax'),
				'cart_tax' => $this->input->post('cart_tax'),
				'total' => $this->input->post('total'),
				'version' => $this->input->post('version'),
				'currency' => $this->input->post('currency'),
				'prices_include_tax' => $this->input->post('prices_include_tax'),
				'transaction_id' => $this->input->post('transaction_id'),
				'customer_ip_address' => $this->input->post('customer_ip_address'),
				'customer_user_agent' => $this->input->post('customer_user_agent'),
				'created_via' => $this->input->post('created_via'),
				'date_completed' => $this->input->post('date_completed'),
				'date_paid' => $this->input->post('date_paid'),
				'cart_hash' => $this->input->post('cart_hash'),
				'amount' => $this->input->post('amount'),
				'refunded_by' => $this->input->post('refunded_by'),
				'reason' => $this->input->post('reason'),
			];
			
			$save_lbb_woocommerce_orders = $this->model_api_lbb_woocommerce_orders->store($save_data);

			if ($save_lbb_woocommerce_orders) {
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
	 * @api {post} /lbb_woocommerce_orders/update Update Lbb woocommerce orders.
	 * @apiVersion 0.1.0
	 * @apiName UpdateLbb woocommerce orders
	 * @apiGroup lbb_woocommerce_orders
	 * @apiHeader {String} X-Api-Key Lbb woocommerce orderss unique access-key.
	 * @apiHeader {String} X-Token Lbb woocommerce orderss unique token.
	 * @apiPermission Lbb woocommerce orders Cant be Accessed permission name : api_lbb_woocommerce_orders_update
	 *
	 * @apiParam {String} [Order_key] Optional order_key of Lbb woocommerce orderss. Input Order Key Max Length : 100. 
	 * @apiParam {String} [Customer_id] Optional customer_id of Lbb woocommerce orderss. Input Customer Id Max Length : 20. 
	 * @apiParam {String} [Billing_index] Optional billing_index of Lbb woocommerce orderss. Input Billing Index Max Length : 255. 
	 * @apiParam {String} [Billing_first_name] Optional billing_first_name of Lbb woocommerce orderss. Input Billing First Name Max Length : 100. 
	 * @apiParam {String} [Billing_last_name] Optional billing_last_name of Lbb woocommerce orderss. Input Billing Last Name Max Length : 100. 
	 * @apiParam {String} [Billing_company] Optional billing_company of Lbb woocommerce orderss. Input Billing Company Max Length : 100. 
	 * @apiParam {String} [Billing_address_1] Optional billing_address_1 of Lbb woocommerce orderss. Input Billing Address 1 Max Length : 255. 
	 * @apiParam {String} [Billing_address_2] Optional billing_address_2 of Lbb woocommerce orderss. Input Billing Address 2 Max Length : 200. 
	 * @apiParam {String} [Billing_city] Optional billing_city of Lbb woocommerce orderss. Input Billing City Max Length : 100. 
	 * @apiParam {String} [Billing_state] Optional billing_state of Lbb woocommerce orderss. Input Billing State Max Length : 100. 
	 * @apiParam {String} [Billing_postcode] Optional billing_postcode of Lbb woocommerce orderss. Input Billing Postcode Max Length : 20. 
	 * @apiParam {String} [Billing_country] Optional billing_country of Lbb woocommerce orderss. Input Billing Country Max Length : 2. 
	 * @apiParam {String} [Billing_email] Optional billing_email of Lbb woocommerce orderss. Input Billing Email Max Length : 200. 
	 * @apiParam {String} [Billing_phone] Optional billing_phone of Lbb woocommerce orderss. Input Billing Phone Max Length : 200. 
	 * @apiParam {String} [Shipping_index] Optional shipping_index of Lbb woocommerce orderss. Input Shipping Index Max Length : 255. 
	 * @apiParam {String} [Shipping_first_name] Optional shipping_first_name of Lbb woocommerce orderss. Input Shipping First Name Max Length : 100. 
	 * @apiParam {String} [Shipping_last_name] Optional shipping_last_name of Lbb woocommerce orderss. Input Shipping Last Name Max Length : 100. 
	 * @apiParam {String} [Shipping_company] Optional shipping_company of Lbb woocommerce orderss. Input Shipping Company Max Length : 100. 
	 * @apiParam {String} [Shipping_address_1] Optional shipping_address_1 of Lbb woocommerce orderss. Input Shipping Address 1 Max Length : 255. 
	 * @apiParam {String} [Shipping_address_2] Optional shipping_address_2 of Lbb woocommerce orderss. Input Shipping Address 2 Max Length : 200. 
	 * @apiParam {String} [Shipping_city] Optional shipping_city of Lbb woocommerce orderss. Input Shipping City Max Length : 100. 
	 * @apiParam {String} [Shipping_state] Optional shipping_state of Lbb woocommerce orderss. Input Shipping State Max Length : 100. 
	 * @apiParam {String} [Shipping_postcode] Optional shipping_postcode of Lbb woocommerce orderss. Input Shipping Postcode Max Length : 20. 
	 * @apiParam {String} [Shipping_country] Optional shipping_country of Lbb woocommerce orderss. Input Shipping Country Max Length : 2. 
	 * @apiParam {String} [Payment_method] Optional payment_method of Lbb woocommerce orderss. Input Payment Method Max Length : 100. 
	 * @apiParam {String} [Payment_method_title] Optional payment_method_title of Lbb woocommerce orderss. Input Payment Method Title Max Length : 100. 
	 * @apiParam {String} [Discount_total] Optional discount_total of Lbb woocommerce orderss. Input Discount Total Max Length : 100. 
	 * @apiParam {String} [Discount_tax] Optional discount_tax of Lbb woocommerce orderss. Input Discount Tax Max Length : 100. 
	 * @apiParam {String} [Shipping_total] Optional shipping_total of Lbb woocommerce orderss. Input Shipping Total Max Length : 100. 
	 * @apiParam {String} [Shipping_tax] Optional shipping_tax of Lbb woocommerce orderss. Input Shipping Tax Max Length : 100. 
	 * @apiParam {String} [Cart_tax] Optional cart_tax of Lbb woocommerce orderss. Input Cart Tax Max Length : 100. 
	 * @apiParam {String} [Total] Optional total of Lbb woocommerce orderss. Input Total Max Length : 100. 
	 * @apiParam {String} [Version] Optional version of Lbb woocommerce orderss. Input Version Max Length : 16. 
	 * @apiParam {String} [Currency] Optional currency of Lbb woocommerce orderss. Input Currency Max Length : 3. 
	 * @apiParam {String} [Prices_include_tax] Optional prices_include_tax of Lbb woocommerce orderss. Input Prices Include Tax Max Length : 3. 
	 * @apiParam {String} [Transaction_id] Optional transaction_id of Lbb woocommerce orderss. Input Transaction Id Max Length : 200. 
	 * @apiParam {String} [Customer_ip_address] Optional customer_ip_address of Lbb woocommerce orderss. Input Customer Ip Address Max Length : 40. 
	 * @apiParam {String} [Customer_user_agent] Optional customer_user_agent of Lbb woocommerce orderss.  
	 * @apiParam {String} [Created_via] Optional created_via of Lbb woocommerce orderss. Input Created Via Max Length : 200. 
	 * @apiParam {String} [Date_completed] Optional date_completed of Lbb woocommerce orderss. Input Date Completed Max Length : 20. 
	 * @apiParam {String} [Date_paid] Optional date_paid of Lbb woocommerce orderss. Input Date Paid Max Length : 20. 
	 * @apiParam {String} [Cart_hash] Optional cart_hash of Lbb woocommerce orderss. Input Cart Hash Max Length : 32. 
	 * @apiParam {String} [Amount] Optional amount of Lbb woocommerce orderss. Input Amount Max Length : 100. 
	 * @apiParam {String} [Refunded_by] Optional refunded_by of Lbb woocommerce orderss. Input Refunded By Max Length : 20. 
	 * @apiParam {String} [Reason] Optional reason of Lbb woocommerce orderss.  
	 * @apiParam {Integer} order_id Mandatory order_id of Lbb Woocommerce Orders.
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
		$this->is_allowed('api_lbb_woocommerce_orders_update');

		
		$this->form_validation->set_rules('order_key', 'Order Key', 'trim|max_length[100]');
		$this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('billing_index', 'Billing Index', 'trim|max_length[255]');
		$this->form_validation->set_rules('billing_first_name', 'Billing First Name', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_last_name', 'Billing Last Name', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_company', 'Billing Company', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_address_1', 'Billing Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('billing_address_2', 'Billing Address 2', 'trim|max_length[200]');
		$this->form_validation->set_rules('billing_city', 'Billing City', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_state', 'Billing State', 'trim|max_length[100]');
		$this->form_validation->set_rules('billing_postcode', 'Billing Postcode', 'trim|max_length[20]');
		$this->form_validation->set_rules('billing_country', 'Billing Country', 'trim|max_length[2]');
		$this->form_validation->set_rules('billing_email', 'Billing Email', 'trim|max_length[200]');
		$this->form_validation->set_rules('billing_phone', 'Billing Phone', 'trim|max_length[200]');
		$this->form_validation->set_rules('shipping_index', 'Shipping Index', 'trim|max_length[255]');
		$this->form_validation->set_rules('shipping_first_name', 'Shipping First Name', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_last_name', 'Shipping Last Name', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_company', 'Shipping Company', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_address_1', 'Shipping Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('shipping_address_2', 'Shipping Address 2', 'trim|max_length[200]');
		$this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_state', 'Shipping State', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_postcode', 'Shipping Postcode', 'trim|max_length[20]');
		$this->form_validation->set_rules('shipping_country', 'Shipping Country', 'trim|max_length[2]');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'trim|max_length[100]');
		$this->form_validation->set_rules('payment_method_title', 'Payment Method Title', 'trim|max_length[100]');
		$this->form_validation->set_rules('discount_total', 'Discount Total', 'trim|max_length[100]');
		$this->form_validation->set_rules('discount_tax', 'Discount Tax', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_total', 'Shipping Total', 'trim|max_length[100]');
		$this->form_validation->set_rules('shipping_tax', 'Shipping Tax', 'trim|max_length[100]');
		$this->form_validation->set_rules('cart_tax', 'Cart Tax', 'trim|max_length[100]');
		$this->form_validation->set_rules('total', 'Total', 'trim|max_length[100]');
		$this->form_validation->set_rules('version', 'Version', 'trim|max_length[16]');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|max_length[3]');
		$this->form_validation->set_rules('prices_include_tax', 'Prices Include Tax', 'trim|max_length[3]');
		$this->form_validation->set_rules('transaction_id', 'Transaction Id', 'trim|max_length[200]');
		$this->form_validation->set_rules('customer_ip_address', 'Customer Ip Address', 'trim|max_length[40]');
		$this->form_validation->set_rules('created_via', 'Created Via', 'trim|max_length[200]');
		$this->form_validation->set_rules('date_completed', 'Date Completed', 'trim|max_length[20]');
		$this->form_validation->set_rules('date_paid', 'Date Paid', 'trim|max_length[20]');
		$this->form_validation->set_rules('cart_hash', 'Cart Hash', 'trim|max_length[32]');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|max_length[100]');
		$this->form_validation->set_rules('refunded_by', 'Refunded By', 'trim|max_length[20]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'order_key' => $this->input->post('order_key'),
				'customer_id' => $this->input->post('customer_id'),
				'billing_index' => $this->input->post('billing_index'),
				'billing_first_name' => $this->input->post('billing_first_name'),
				'billing_last_name' => $this->input->post('billing_last_name'),
				'billing_company' => $this->input->post('billing_company'),
				'billing_address_1' => $this->input->post('billing_address_1'),
				'billing_address_2' => $this->input->post('billing_address_2'),
				'billing_city' => $this->input->post('billing_city'),
				'billing_state' => $this->input->post('billing_state'),
				'billing_postcode' => $this->input->post('billing_postcode'),
				'billing_country' => $this->input->post('billing_country'),
				'billing_email' => $this->input->post('billing_email'),
				'billing_phone' => $this->input->post('billing_phone'),
				'shipping_index' => $this->input->post('shipping_index'),
				'shipping_first_name' => $this->input->post('shipping_first_name'),
				'shipping_last_name' => $this->input->post('shipping_last_name'),
				'shipping_company' => $this->input->post('shipping_company'),
				'shipping_address_1' => $this->input->post('shipping_address_1'),
				'shipping_address_2' => $this->input->post('shipping_address_2'),
				'shipping_city' => $this->input->post('shipping_city'),
				'shipping_state' => $this->input->post('shipping_state'),
				'shipping_postcode' => $this->input->post('shipping_postcode'),
				'shipping_country' => $this->input->post('shipping_country'),
				'payment_method' => $this->input->post('payment_method'),
				'payment_method_title' => $this->input->post('payment_method_title'),
				'discount_total' => $this->input->post('discount_total'),
				'discount_tax' => $this->input->post('discount_tax'),
				'shipping_total' => $this->input->post('shipping_total'),
				'shipping_tax' => $this->input->post('shipping_tax'),
				'cart_tax' => $this->input->post('cart_tax'),
				'total' => $this->input->post('total'),
				'version' => $this->input->post('version'),
				'currency' => $this->input->post('currency'),
				'prices_include_tax' => $this->input->post('prices_include_tax'),
				'transaction_id' => $this->input->post('transaction_id'),
				'customer_ip_address' => $this->input->post('customer_ip_address'),
				'customer_user_agent' => $this->input->post('customer_user_agent'),
				'created_via' => $this->input->post('created_via'),
				'date_completed' => $this->input->post('date_completed'),
				'date_paid' => $this->input->post('date_paid'),
				'cart_hash' => $this->input->post('cart_hash'),
				'amount' => $this->input->post('amount'),
				'refunded_by' => $this->input->post('refunded_by'),
				'reason' => $this->input->post('reason'),
			];
			
			$save_lbb_woocommerce_orders = $this->model_api_lbb_woocommerce_orders->change($this->post('order_id'), $save_data);

			if ($save_lbb_woocommerce_orders) {
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
	 * @api {post} /lbb_woocommerce_orders/delete Delete Lbb woocommerce orders. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteLbb woocommerce orders
	 * @apiGroup lbb_woocommerce_orders
	 * @apiHeader {String} X-Api-Key Lbb woocommerce orderss unique access-key.
	 * @apiHeader {String} X-Token Lbb woocommerce orderss unique token.
	 	 * @apiPermission Lbb woocommerce orders Cant be Accessed permission name : api_lbb_woocommerce_orders_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Lbb woocommerce orderss .
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
		$this->is_allowed('api_lbb_woocommerce_orders_delete');

		$lbb_woocommerce_orders = $this->model_api_lbb_woocommerce_orders->find($this->post('order_id'));

		if (!$lbb_woocommerce_orders) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Lbb woocommerce orders not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_lbb_woocommerce_orders->remove($this->post('order_id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Lbb woocommerce orders deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Lbb woocommerce orders not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Lbb woocommerce orders.php */
/* Location: ./application/controllers/api/Lbb woocommerce orders.php */