<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Orders extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_orders');
	}

	/**
	 * @api {get} /orders/all Get all orderss.
	 * @apiVersion 0.1.0
	 * @apiName AllOrders 
	 * @apiGroup orders
	 * @apiHeader {String} X-Api-Key Orderss unique access-key.
	 * @apiHeader {String} X-Token Orderss unique token.
	 * @apiPermission Orders Cant be Accessed permission name : api_orders_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Orderss.
	 * @apiParam {String} [Field="All Field"] Optional field of Orderss : id, order_id, order_status, order_date, billing_last_name, billing_first_name, shipping_adress_1, shipping_adress_2, shipping_city, shipping_post_code, shipping_state, billing_phone, waybill, billing_email, product_1, product_2, product_3, product_4, product_5, product_6, product_7, product_8, product_9, product_10, product_11, product_12, price_1, price_2, price_3, price_4, price_5, price_6, price_7, price_8, price_9, price_10, price_11, price_12, product_sku_1, product_sku_2, product_sku_3, product_sku_4, product_sku_5, product_sku_6, product_sku_7, product_sku_8, product_sku_9, product_sku_10, product_sku_11, product_sku_12, item_quantity_1, item_quantity_2, item_quantity_3, item_quantity_4, item_quantity_5, item_quantity_6, item_quantity_7, item_quantity_8, item_quantity_9, item_quantity_10, item_quantity_11, item_quantity_12, shipping_method, shipping_cost, total_order, coupon_used, coupon_discount_amount, invoice, packing_slip, shipping_first_name, shipping_last_name, customer_note, note_content.
	 * @apiParam {String} [Start=0] Optional start index of Orderss.
	 * @apiParam {String} [Limit=10] Optional limit data of Orderss.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of orders.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataOrders Orders data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_orders_all');

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id', 'order_id', 'order_status', 'order_date', 'billing_last_name', 'billing_first_name', 'shipping_adress_1', 'shipping_adress_2', 'shipping_city', 'shipping_post_code', 'shipping_state', 'billing_phone', 'waybill', 'billing_email', 'product_1', 'product_2', 'product_3', 'product_4', 'product_5', 'product_6', 'product_7', 'product_8', 'product_9', 'product_10', 'product_11', 'product_12', 'price_1', 'price_2', 'price_3', 'price_4', 'price_5', 'price_6', 'price_7', 'price_8', 'price_9', 'price_10', 'price_11', 'price_12', 'product_sku_1', 'product_sku_2', 'product_sku_3', 'product_sku_4', 'product_sku_5', 'product_sku_6', 'product_sku_7', 'product_sku_8', 'product_sku_9', 'product_sku_10', 'product_sku_11', 'product_sku_12', 'item_quantity_1', 'item_quantity_2', 'item_quantity_3', 'item_quantity_4', 'item_quantity_5', 'item_quantity_6', 'item_quantity_7', 'item_quantity_8', 'item_quantity_9', 'item_quantity_10', 'item_quantity_11', 'item_quantity_12', 'shipping_method', 'shipping_cost', 'total_order', 'coupon_used', 'coupon_discount_amount', 'invoice', 'packing_slip', 'shipping_first_name', 'shipping_last_name', 'customer_note', 'note_content'];
		$orderss = $this->model_api_orders->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_orders->count_all($filter, $field);
		$orderss = array_map(function($row){
						
			return $row;
		}, $orderss);

		$data['orders'] = $orderss;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Orders',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /orders/detail Detail Orders.
	 * @apiVersion 0.1.0
	 * @apiName DetailOrders
	 * @apiGroup orders
	 * @apiHeader {String} X-Api-Key Orderss unique access-key.
	 * @apiHeader {String} X-Token Orderss unique token.
	 * @apiPermission Orders Cant be Accessed permission name : api_orders_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Orderss.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of orders.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError OrdersNotFound Orders data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_orders_detail');

		$this->requiredInput(['id']);

		$id = $this->get('id');

		$select_field = ['id', 'order_id', 'order_status', 'order_date', 'billing_last_name', 'billing_first_name', 'shipping_adress_1', 'shipping_adress_2', 'shipping_city', 'shipping_post_code', 'shipping_state', 'billing_phone', 'waybill', 'billing_email', 'product_1', 'product_2', 'product_3', 'product_4', 'product_5', 'product_6', 'product_7', 'product_8', 'product_9', 'product_10', 'product_11', 'product_12', 'price_1', 'price_2', 'price_3', 'price_4', 'price_5', 'price_6', 'price_7', 'price_8', 'price_9', 'price_10', 'price_11', 'price_12', 'product_sku_1', 'product_sku_2', 'product_sku_3', 'product_sku_4', 'product_sku_5', 'product_sku_6', 'product_sku_7', 'product_sku_8', 'product_sku_9', 'product_sku_10', 'product_sku_11', 'product_sku_12', 'item_quantity_1', 'item_quantity_2', 'item_quantity_3', 'item_quantity_4', 'item_quantity_5', 'item_quantity_6', 'item_quantity_7', 'item_quantity_8', 'item_quantity_9', 'item_quantity_10', 'item_quantity_11', 'item_quantity_12', 'shipping_method', 'shipping_cost', 'total_order', 'coupon_used', 'coupon_discount_amount', 'invoice', 'packing_slip', 'shipping_first_name', 'shipping_last_name', 'customer_note', 'note_content'];
		$orders = $this->model_api_orders->find($id, $select_field);

		if (!$orders) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['orders'] = $orders;
		if ($data['orders']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Orders',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Orders not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /orders/add Add Orders.
	 * @apiVersion 0.1.0
	 * @apiName AddOrders
	 * @apiGroup orders
	 * @apiHeader {String} X-Api-Key Orderss unique access-key.
	 * @apiHeader {String} X-Token Orderss unique token.
	 * @apiPermission Orders Cant be Accessed permission name : api_orders_add
	 *
 	 * @apiParam {String} Order_id Mandatory order_id of Orderss. Input Order Id Max Length : 200. 
	 * @apiParam {String} Order_status Mandatory order_status of Orderss. Input Order Status Max Length : 200. 
	 * @apiParam {String} Order_date Mandatory order_date of Orderss. Input Order Date Max Length : 200. 
	 * @apiParam {String} Billing_last_name Mandatory billing_last_name of Orderss. Input Billing Last Name Max Length : 200. 
	 * @apiParam {String} Billing_first_name Mandatory billing_first_name of Orderss. Input Billing First Name Max Length : 200. 
	 * @apiParam {String} Shipping_adress_1 Mandatory shipping_adress_1 of Orderss. Input Shipping Adress 1 Max Length : 200. 
	 * @apiParam {String} Shipping_adress_2 Mandatory shipping_adress_2 of Orderss. Input Shipping Adress 2 Max Length : 200. 
	 * @apiParam {String} Shipping_city Mandatory shipping_city of Orderss. Input Shipping City Max Length : 200. 
	 * @apiParam {String} Shipping_post_code Mandatory shipping_post_code of Orderss. Input Shipping Post Code Max Length : 200. 
	 * @apiParam {String} Shipping_state Mandatory shipping_state of Orderss. Input Shipping State Max Length : 200. 
	 * @apiParam {String} Billing_phone Mandatory billing_phone of Orderss. Input Billing Phone Max Length : 200. 
	 * @apiParam {String} Waybill Mandatory waybill of Orderss. Input Waybill Max Length : 200. 
	 * @apiParam {String} Billing_email Mandatory billing_email of Orderss. Input Billing Email Max Length : 200. 
	 * @apiParam {String} Product_1 Mandatory product_1 of Orderss. Input Product 1 Max Length : 200. 
	 * @apiParam {String} Product_2 Mandatory product_2 of Orderss. Input Product 2 Max Length : 200. 
	 * @apiParam {String} Product_3 Mandatory product_3 of Orderss. Input Product 3 Max Length : 200. 
	 * @apiParam {String} Product_4 Mandatory product_4 of Orderss. Input Product 4 Max Length : 200. 
	 * @apiParam {String} Product_5 Mandatory product_5 of Orderss. Input Product 5 Max Length : 200. 
	 * @apiParam {String} Product_6 Mandatory product_6 of Orderss. Input Product 6 Max Length : 200. 
	 * @apiParam {String} Product_7 Mandatory product_7 of Orderss. Input Product 7 Max Length : 200. 
	 * @apiParam {String} Product_8 Mandatory product_8 of Orderss. Input Product 8 Max Length : 200. 
	 * @apiParam {String} Product_9 Mandatory product_9 of Orderss. Input Product 9 Max Length : 200. 
	 * @apiParam {String} Product_10 Mandatory product_10 of Orderss. Input Product 10 Max Length : 200. 
	 * @apiParam {String} Product_11 Mandatory product_11 of Orderss. Input Product 11 Max Length : 200. 
	 * @apiParam {String} Product_12 Mandatory product_12 of Orderss. Input Product 12 Max Length : 200. 
	 * @apiParam {String} Price_1 Mandatory price_1 of Orderss. Input Price 1 Max Length : 200. 
	 * @apiParam {String} Price_2 Mandatory price_2 of Orderss. Input Price 2 Max Length : 200. 
	 * @apiParam {String} Price_3 Mandatory price_3 of Orderss. Input Price 3 Max Length : 200. 
	 * @apiParam {String} Price_4 Mandatory price_4 of Orderss. Input Price 4 Max Length : 200. 
	 * @apiParam {String} Price_5 Mandatory price_5 of Orderss. Input Price 5 Max Length : 200. 
	 * @apiParam {String} Price_6 Mandatory price_6 of Orderss. Input Price 6 Max Length : 200. 
	 * @apiParam {String} Price_7 Mandatory price_7 of Orderss. Input Price 7 Max Length : 200. 
	 * @apiParam {String} Price_8 Mandatory price_8 of Orderss. Input Price 8 Max Length : 200. 
	 * @apiParam {String} Price_9 Mandatory price_9 of Orderss. Input Price 9 Max Length : 200. 
	 * @apiParam {String} Price_10 Mandatory price_10 of Orderss. Input Price 10 Max Length : 200. 
	 * @apiParam {String} Price_11 Mandatory price_11 of Orderss. Input Price 11 Max Length : 200. 
	 * @apiParam {String} Price_12 Mandatory price_12 of Orderss. Input Price 12 Max Length : 200. 
	 * @apiParam {String} Product_sku_1 Mandatory product_sku_1 of Orderss. Input Product Sku 1 Max Length : 200. 
	 * @apiParam {String} Product_sku_2 Mandatory product_sku_2 of Orderss. Input Product Sku 2 Max Length : 200. 
	 * @apiParam {String} Product_sku_3 Mandatory product_sku_3 of Orderss. Input Product Sku 3 Max Length : 200. 
	 * @apiParam {String} Product_sku_4 Mandatory product_sku_4 of Orderss. Input Product Sku 4 Max Length : 200. 
	 * @apiParam {String} Product_sku_5 Mandatory product_sku_5 of Orderss. Input Product Sku 5 Max Length : 200. 
	 * @apiParam {String} Product_sku_6 Mandatory product_sku_6 of Orderss. Input Product Sku 6 Max Length : 200. 
	 * @apiParam {String} Product_sku_7 Mandatory product_sku_7 of Orderss. Input Product Sku 7 Max Length : 200. 
	 * @apiParam {String} Product_sku_8 Mandatory product_sku_8 of Orderss. Input Product Sku 8 Max Length : 200. 
	 * @apiParam {String} Product_sku_9 Mandatory product_sku_9 of Orderss. Input Product Sku 9 Max Length : 200. 
	 * @apiParam {String} Product_sku_10 Mandatory product_sku_10 of Orderss. Input Product Sku 10 Max Length : 200. 
	 * @apiParam {String} Product_sku_11 Mandatory product_sku_11 of Orderss. Input Product Sku 11 Max Length : 200. 
	 * @apiParam {String} Product_sku_12 Mandatory product_sku_12 of Orderss. Input Product Sku 12 Max Length : 200. 
	 * @apiParam {String} Item_quantity_1 Mandatory item_quantity_1 of Orderss. Input Item Quantity 1 Max Length : 10. 
	 * @apiParam {String} Item_quantity_2 Mandatory item_quantity_2 of Orderss. Input Item Quantity 2 Max Length : 10. 
	 * @apiParam {String} Item_quantity_3 Mandatory item_quantity_3 of Orderss. Input Item Quantity 3 Max Length : 10. 
	 * @apiParam {String} Item_quantity_4 Mandatory item_quantity_4 of Orderss. Input Item Quantity 4 Max Length : 10. 
	 * @apiParam {String} Item_quantity_5 Mandatory item_quantity_5 of Orderss. Input Item Quantity 5 Max Length : 10. 
	 * @apiParam {String} Item_quantity_6 Mandatory item_quantity_6 of Orderss. Input Item Quantity 6 Max Length : 10. 
	 * @apiParam {String} Item_quantity_7 Mandatory item_quantity_7 of Orderss. Input Item Quantity 7 Max Length : 10. 
	 * @apiParam {String} Item_quantity_8 Mandatory item_quantity_8 of Orderss. Input Item Quantity 8 Max Length : 10. 
	 * @apiParam {String} Item_quantity_9 Mandatory item_quantity_9 of Orderss. Input Item Quantity 9 Max Length : 10. 
	 * @apiParam {String} Item_quantity_10 Mandatory item_quantity_10 of Orderss. Input Item Quantity 10 Max Length : 10. 
	 * @apiParam {String} Item_quantity_11 Mandatory item_quantity_11 of Orderss. Input Item Quantity 11 Max Length : 10. 
	 * @apiParam {String} Item_quantity_12 Mandatory item_quantity_12 of Orderss. Input Item Quantity 12 Max Length : 10. 
	 * @apiParam {String} Shipping_method Mandatory shipping_method of Orderss. Input Shipping Method Max Length : 200. 
	 * @apiParam {String} Shipping_cost Mandatory shipping_cost of Orderss. Input Shipping Cost Max Length : 200. 
	 * @apiParam {String} Total_order Mandatory total_order of Orderss. Input Total Order Max Length : 200. 
	 * @apiParam {String} Coupon_used Mandatory coupon_used of Orderss. Input Coupon Used Max Length : 200. 
	 * @apiParam {String} Coupon_discount_amount Mandatory coupon_discount_amount of Orderss. Input Coupon Discount Amount Max Length : 200. 
	 * @apiParam {String} Invoice Mandatory invoice of Orderss. Input Invoice Max Length : 200. 
	 * @apiParam {String} Packing_slip Mandatory packing_slip of Orderss. Input Packing Slip Max Length : 200. 
	 * @apiParam {String} Shipping_first_name Mandatory shipping_first_name of Orderss. Input Shipping First Name Max Length : 200. 
	 * @apiParam {String} Shipping_last_name Mandatory shipping_last_name of Orderss. Input Shipping Last Name Max Length : 200. 
	 * @apiParam {String} Customer_note Mandatory customer_note of Orderss. Input Customer Note Max Length : 2000. 
	 * @apiParam {String} Note_content Mandatory note_content of Orderss. Input Note Content Max Length : 4000. 
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
		$this->is_allowed('api_orders_add');

		$this->form_validation->set_rules('order_id', 'Order Id', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('order_status', 'Order Status', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('order_date', 'Order Date', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_last_name', 'Billing Last Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_first_name', 'Billing First Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_adress_1', 'Shipping Adress 1', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_adress_2', 'Shipping Adress 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_post_code', 'Shipping Post Code', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_state', 'Shipping State', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_phone', 'Billing Phone', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('waybill', 'Waybill', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_email', 'Billing Email', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_1', 'Product 1', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_2', 'Product 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_3', 'Product 3', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_4', 'Product 4', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_5', 'Product 5', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_6', 'Product 6', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_7', 'Product 7', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_8', 'Product 8', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_9', 'Product 9', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_10', 'Product 10', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_11', 'Product 11', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_12', 'Product 12', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_1', 'Price 1', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_2', 'Price 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_3', 'Price 3', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_4', 'Price 4', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_5', 'Price 5', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_6', 'Price 6', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_7', 'Price 7', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_8', 'Price 8', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_9', 'Price 9', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_10', 'Price 10', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_11', 'Price 11', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_12', 'Price 12', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_1', 'Product Sku 1', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_2', 'Product Sku 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_3', 'Product Sku 3', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_4', 'Product Sku 4', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_5', 'Product Sku 5', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_6', 'Product Sku 6', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_7', 'Product Sku 7', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_8', 'Product Sku 8', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_9', 'Product Sku 9', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_10', 'Product Sku 10', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_11', 'Product Sku 11', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_12', 'Product Sku 12', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('item_quantity_1', 'Item Quantity 1', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_2', 'Item Quantity 2', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_3', 'Item Quantity 3', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_4', 'Item Quantity 4', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_5', 'Item Quantity 5', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_6', 'Item Quantity 6', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_7', 'Item Quantity 7', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_8', 'Item Quantity 8', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_9', 'Item Quantity 9', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_10', 'Item Quantity 10', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_11', 'Item Quantity 11', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_12', 'Item Quantity 12', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('shipping_method', 'Shipping Method', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_cost', 'Shipping Cost', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('total_order', 'Total Order', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('coupon_used', 'Coupon Used', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('coupon_discount_amount', 'Coupon Discount Amount', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('invoice', 'Invoice', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('packing_slip', 'Packing Slip', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_first_name', 'Shipping First Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_last_name', 'Shipping Last Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('customer_note', 'Customer Note', 'trim|required|max_length[2000]');
		$this->form_validation->set_rules('note_content', 'Note Content', 'trim|required|max_length[4000]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'order_id' => $this->input->post('order_id'),
				'order_status' => $this->input->post('order_status'),
				'order_date' => $this->input->post('order_date'),
				'billing_last_name' => $this->input->post('billing_last_name'),
				'billing_first_name' => $this->input->post('billing_first_name'),
				'shipping_adress_1' => $this->input->post('shipping_adress_1'),
				'shipping_adress_2' => $this->input->post('shipping_adress_2'),
				'shipping_city' => $this->input->post('shipping_city'),
				'shipping_post_code' => $this->input->post('shipping_post_code'),
				'shipping_state' => $this->input->post('shipping_state'),
				'billing_phone' => $this->input->post('billing_phone'),
				'waybill' => $this->input->post('waybill'),
				'billing_email' => $this->input->post('billing_email'),
				'product_1' => $this->input->post('product_1'),
				'product_2' => $this->input->post('product_2'),
				'product_3' => $this->input->post('product_3'),
				'product_4' => $this->input->post('product_4'),
				'product_5' => $this->input->post('product_5'),
				'product_6' => $this->input->post('product_6'),
				'product_7' => $this->input->post('product_7'),
				'product_8' => $this->input->post('product_8'),
				'product_9' => $this->input->post('product_9'),
				'product_10' => $this->input->post('product_10'),
				'product_11' => $this->input->post('product_11'),
				'product_12' => $this->input->post('product_12'),
				'price_1' => $this->input->post('price_1'),
				'price_2' => $this->input->post('price_2'),
				'price_3' => $this->input->post('price_3'),
				'price_4' => $this->input->post('price_4'),
				'price_5' => $this->input->post('price_5'),
				'price_6' => $this->input->post('price_6'),
				'price_7' => $this->input->post('price_7'),
				'price_8' => $this->input->post('price_8'),
				'price_9' => $this->input->post('price_9'),
				'price_10' => $this->input->post('price_10'),
				'price_11' => $this->input->post('price_11'),
				'price_12' => $this->input->post('price_12'),
				'product_sku_1' => $this->input->post('product_sku_1'),
				'product_sku_2' => $this->input->post('product_sku_2'),
				'product_sku_3' => $this->input->post('product_sku_3'),
				'product_sku_4' => $this->input->post('product_sku_4'),
				'product_sku_5' => $this->input->post('product_sku_5'),
				'product_sku_6' => $this->input->post('product_sku_6'),
				'product_sku_7' => $this->input->post('product_sku_7'),
				'product_sku_8' => $this->input->post('product_sku_8'),
				'product_sku_9' => $this->input->post('product_sku_9'),
				'product_sku_10' => $this->input->post('product_sku_10'),
				'product_sku_11' => $this->input->post('product_sku_11'),
				'product_sku_12' => $this->input->post('product_sku_12'),
				'item_quantity_1' => $this->input->post('item_quantity_1'),
				'item_quantity_2' => $this->input->post('item_quantity_2'),
				'item_quantity_3' => $this->input->post('item_quantity_3'),
				'item_quantity_4' => $this->input->post('item_quantity_4'),
				'item_quantity_5' => $this->input->post('item_quantity_5'),
				'item_quantity_6' => $this->input->post('item_quantity_6'),
				'item_quantity_7' => $this->input->post('item_quantity_7'),
				'item_quantity_8' => $this->input->post('item_quantity_8'),
				'item_quantity_9' => $this->input->post('item_quantity_9'),
				'item_quantity_10' => $this->input->post('item_quantity_10'),
				'item_quantity_11' => $this->input->post('item_quantity_11'),
				'item_quantity_12' => $this->input->post('item_quantity_12'),
				'shipping_method' => $this->input->post('shipping_method'),
				'shipping_cost' => $this->input->post('shipping_cost'),
				'total_order' => $this->input->post('total_order'),
				'coupon_used' => $this->input->post('coupon_used'),
				'coupon_discount_amount' => $this->input->post('coupon_discount_amount'),
				'invoice' => $this->input->post('invoice'),
				'packing_slip' => $this->input->post('packing_slip'),
				'shipping_first_name' => $this->input->post('shipping_first_name'),
				'shipping_last_name' => $this->input->post('shipping_last_name'),
				'customer_note' => $this->input->post('customer_note'),
				'note_content' => $this->input->post('note_content'),
			];
			
			$save_orders = $this->model_api_orders->store($save_data);

			if ($save_orders) {
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
	 * @api {post} /orders/update Update Orders.
	 * @apiVersion 0.1.0
	 * @apiName UpdateOrders
	 * @apiGroup orders
	 * @apiHeader {String} X-Api-Key Orderss unique access-key.
	 * @apiHeader {String} X-Token Orderss unique token.
	 * @apiPermission Orders Cant be Accessed permission name : api_orders_update
	 *
	 * @apiParam {String} Order_id Mandatory order_id of Orderss. Input Order Id Max Length : 200. 
	 * @apiParam {String} Order_status Mandatory order_status of Orderss. Input Order Status Max Length : 200. 
	 * @apiParam {String} Order_date Mandatory order_date of Orderss. Input Order Date Max Length : 200. 
	 * @apiParam {String} Billing_last_name Mandatory billing_last_name of Orderss. Input Billing Last Name Max Length : 200. 
	 * @apiParam {String} Billing_first_name Mandatory billing_first_name of Orderss. Input Billing First Name Max Length : 200. 
	 * @apiParam {String} Shipping_adress_1 Mandatory shipping_adress_1 of Orderss. Input Shipping Adress 1 Max Length : 200. 
	 * @apiParam {String} Shipping_adress_2 Mandatory shipping_adress_2 of Orderss. Input Shipping Adress 2 Max Length : 200. 
	 * @apiParam {String} Shipping_city Mandatory shipping_city of Orderss. Input Shipping City Max Length : 200. 
	 * @apiParam {String} Shipping_post_code Mandatory shipping_post_code of Orderss. Input Shipping Post Code Max Length : 200. 
	 * @apiParam {String} Shipping_state Mandatory shipping_state of Orderss. Input Shipping State Max Length : 200. 
	 * @apiParam {String} Billing_phone Mandatory billing_phone of Orderss. Input Billing Phone Max Length : 200. 
	 * @apiParam {String} Waybill Mandatory waybill of Orderss. Input Waybill Max Length : 200. 
	 * @apiParam {String} Billing_email Mandatory billing_email of Orderss. Input Billing Email Max Length : 200. 
	 * @apiParam {String} Product_1 Mandatory product_1 of Orderss. Input Product 1 Max Length : 200. 
	 * @apiParam {String} Product_2 Mandatory product_2 of Orderss. Input Product 2 Max Length : 200. 
	 * @apiParam {String} Product_3 Mandatory product_3 of Orderss. Input Product 3 Max Length : 200. 
	 * @apiParam {String} Product_4 Mandatory product_4 of Orderss. Input Product 4 Max Length : 200. 
	 * @apiParam {String} Product_5 Mandatory product_5 of Orderss. Input Product 5 Max Length : 200. 
	 * @apiParam {String} Product_6 Mandatory product_6 of Orderss. Input Product 6 Max Length : 200. 
	 * @apiParam {String} Product_7 Mandatory product_7 of Orderss. Input Product 7 Max Length : 200. 
	 * @apiParam {String} Product_8 Mandatory product_8 of Orderss. Input Product 8 Max Length : 200. 
	 * @apiParam {String} Product_9 Mandatory product_9 of Orderss. Input Product 9 Max Length : 200. 
	 * @apiParam {String} Product_10 Mandatory product_10 of Orderss. Input Product 10 Max Length : 200. 
	 * @apiParam {String} Product_11 Mandatory product_11 of Orderss. Input Product 11 Max Length : 200. 
	 * @apiParam {String} Product_12 Mandatory product_12 of Orderss. Input Product 12 Max Length : 200. 
	 * @apiParam {String} Price_1 Mandatory price_1 of Orderss. Input Price 1 Max Length : 200. 
	 * @apiParam {String} Price_2 Mandatory price_2 of Orderss. Input Price 2 Max Length : 200. 
	 * @apiParam {String} Price_3 Mandatory price_3 of Orderss. Input Price 3 Max Length : 200. 
	 * @apiParam {String} Price_4 Mandatory price_4 of Orderss. Input Price 4 Max Length : 200. 
	 * @apiParam {String} Price_5 Mandatory price_5 of Orderss. Input Price 5 Max Length : 200. 
	 * @apiParam {String} Price_6 Mandatory price_6 of Orderss. Input Price 6 Max Length : 200. 
	 * @apiParam {String} Price_7 Mandatory price_7 of Orderss. Input Price 7 Max Length : 200. 
	 * @apiParam {String} Price_8 Mandatory price_8 of Orderss. Input Price 8 Max Length : 200. 
	 * @apiParam {String} Price_9 Mandatory price_9 of Orderss. Input Price 9 Max Length : 200. 
	 * @apiParam {String} Price_10 Mandatory price_10 of Orderss. Input Price 10 Max Length : 200. 
	 * @apiParam {String} Price_11 Mandatory price_11 of Orderss. Input Price 11 Max Length : 200. 
	 * @apiParam {String} Price_12 Mandatory price_12 of Orderss. Input Price 12 Max Length : 200. 
	 * @apiParam {String} Product_sku_1 Mandatory product_sku_1 of Orderss. Input Product Sku 1 Max Length : 200. 
	 * @apiParam {String} Product_sku_2 Mandatory product_sku_2 of Orderss. Input Product Sku 2 Max Length : 200. 
	 * @apiParam {String} Product_sku_3 Mandatory product_sku_3 of Orderss. Input Product Sku 3 Max Length : 200. 
	 * @apiParam {String} Product_sku_4 Mandatory product_sku_4 of Orderss. Input Product Sku 4 Max Length : 200. 
	 * @apiParam {String} Product_sku_5 Mandatory product_sku_5 of Orderss. Input Product Sku 5 Max Length : 200. 
	 * @apiParam {String} Product_sku_6 Mandatory product_sku_6 of Orderss. Input Product Sku 6 Max Length : 200. 
	 * @apiParam {String} Product_sku_7 Mandatory product_sku_7 of Orderss. Input Product Sku 7 Max Length : 200. 
	 * @apiParam {String} Product_sku_8 Mandatory product_sku_8 of Orderss. Input Product Sku 8 Max Length : 200. 
	 * @apiParam {String} Product_sku_9 Mandatory product_sku_9 of Orderss. Input Product Sku 9 Max Length : 200. 
	 * @apiParam {String} Product_sku_10 Mandatory product_sku_10 of Orderss. Input Product Sku 10 Max Length : 200. 
	 * @apiParam {String} Product_sku_11 Mandatory product_sku_11 of Orderss. Input Product Sku 11 Max Length : 200. 
	 * @apiParam {String} Product_sku_12 Mandatory product_sku_12 of Orderss. Input Product Sku 12 Max Length : 200. 
	 * @apiParam {String} Item_quantity_1 Mandatory item_quantity_1 of Orderss. Input Item Quantity 1 Max Length : 10. 
	 * @apiParam {String} Item_quantity_2 Mandatory item_quantity_2 of Orderss. Input Item Quantity 2 Max Length : 10. 
	 * @apiParam {String} Item_quantity_3 Mandatory item_quantity_3 of Orderss. Input Item Quantity 3 Max Length : 10. 
	 * @apiParam {String} Item_quantity_4 Mandatory item_quantity_4 of Orderss. Input Item Quantity 4 Max Length : 10. 
	 * @apiParam {String} Item_quantity_5 Mandatory item_quantity_5 of Orderss. Input Item Quantity 5 Max Length : 10. 
	 * @apiParam {String} Item_quantity_6 Mandatory item_quantity_6 of Orderss. Input Item Quantity 6 Max Length : 10. 
	 * @apiParam {String} Item_quantity_7 Mandatory item_quantity_7 of Orderss. Input Item Quantity 7 Max Length : 10. 
	 * @apiParam {String} Item_quantity_8 Mandatory item_quantity_8 of Orderss. Input Item Quantity 8 Max Length : 10. 
	 * @apiParam {String} Item_quantity_9 Mandatory item_quantity_9 of Orderss. Input Item Quantity 9 Max Length : 10. 
	 * @apiParam {String} Item_quantity_10 Mandatory item_quantity_10 of Orderss. Input Item Quantity 10 Max Length : 10. 
	 * @apiParam {String} Item_quantity_11 Mandatory item_quantity_11 of Orderss. Input Item Quantity 11 Max Length : 10. 
	 * @apiParam {String} Item_quantity_12 Mandatory item_quantity_12 of Orderss. Input Item Quantity 12 Max Length : 10. 
	 * @apiParam {String} Shipping_method Mandatory shipping_method of Orderss. Input Shipping Method Max Length : 200. 
	 * @apiParam {String} Shipping_cost Mandatory shipping_cost of Orderss. Input Shipping Cost Max Length : 200. 
	 * @apiParam {String} Total_order Mandatory total_order of Orderss. Input Total Order Max Length : 200. 
	 * @apiParam {String} Coupon_used Mandatory coupon_used of Orderss. Input Coupon Used Max Length : 200. 
	 * @apiParam {String} Coupon_discount_amount Mandatory coupon_discount_amount of Orderss. Input Coupon Discount Amount Max Length : 200. 
	 * @apiParam {String} Invoice Mandatory invoice of Orderss. Input Invoice Max Length : 200. 
	 * @apiParam {String} Packing_slip Mandatory packing_slip of Orderss. Input Packing Slip Max Length : 200. 
	 * @apiParam {String} Shipping_first_name Mandatory shipping_first_name of Orderss. Input Shipping First Name Max Length : 200. 
	 * @apiParam {String} Shipping_last_name Mandatory shipping_last_name of Orderss. Input Shipping Last Name Max Length : 200. 
	 * @apiParam {String} Customer_note Mandatory customer_note of Orderss. Input Customer Note Max Length : 2000. 
	 * @apiParam {String} Note_content Mandatory note_content of Orderss. Input Note Content Max Length : 4000. 
	 * @apiParam {Integer} id Mandatory id of Orders.
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
		$this->is_allowed('api_orders_update');

		
		$this->form_validation->set_rules('order_id', 'Order Id', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('order_status', 'Order Status', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('order_date', 'Order Date', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_last_name', 'Billing Last Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_first_name', 'Billing First Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_adress_1', 'Shipping Adress 1', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_adress_2', 'Shipping Adress 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_post_code', 'Shipping Post Code', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_state', 'Shipping State', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_phone', 'Billing Phone', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('waybill', 'Waybill', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_email', 'Billing Email', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_1', 'Product 1', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_2', 'Product 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_3', 'Product 3', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_4', 'Product 4', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_5', 'Product 5', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_6', 'Product 6', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_7', 'Product 7', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_8', 'Product 8', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_9', 'Product 9', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_10', 'Product 10', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_11', 'Product 11', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_12', 'Product 12', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_1', 'Price 1', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_2', 'Price 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_3', 'Price 3', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_4', 'Price 4', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_5', 'Price 5', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_6', 'Price 6', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_7', 'Price 7', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_8', 'Price 8', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_9', 'Price 9', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_10', 'Price 10', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_11', 'Price 11', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('price_12', 'Price 12', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_1', 'Product Sku 1', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_2', 'Product Sku 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_3', 'Product Sku 3', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_4', 'Product Sku 4', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_5', 'Product Sku 5', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_6', 'Product Sku 6', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_7', 'Product Sku 7', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_8', 'Product Sku 8', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_9', 'Product Sku 9', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_10', 'Product Sku 10', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_11', 'Product Sku 11', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('product_sku_12', 'Product Sku 12', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('item_quantity_1', 'Item Quantity 1', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_2', 'Item Quantity 2', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_3', 'Item Quantity 3', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_4', 'Item Quantity 4', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_5', 'Item Quantity 5', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_6', 'Item Quantity 6', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_7', 'Item Quantity 7', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_8', 'Item Quantity 8', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_9', 'Item Quantity 9', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_10', 'Item Quantity 10', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_11', 'Item Quantity 11', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('item_quantity_12', 'Item Quantity 12', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('shipping_method', 'Shipping Method', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_cost', 'Shipping Cost', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('total_order', 'Total Order', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('coupon_used', 'Coupon Used', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('coupon_discount_amount', 'Coupon Discount Amount', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('invoice', 'Invoice', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('packing_slip', 'Packing Slip', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_first_name', 'Shipping First Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_last_name', 'Shipping Last Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('customer_note', 'Customer Note', 'trim|required|max_length[2000]');
		$this->form_validation->set_rules('note_content', 'Note Content', 'trim|required|max_length[4000]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'order_id' => $this->input->post('order_id'),
				'order_status' => $this->input->post('order_status'),
				'order_date' => $this->input->post('order_date'),
				'billing_last_name' => $this->input->post('billing_last_name'),
				'billing_first_name' => $this->input->post('billing_first_name'),
				'shipping_adress_1' => $this->input->post('shipping_adress_1'),
				'shipping_adress_2' => $this->input->post('shipping_adress_2'),
				'shipping_city' => $this->input->post('shipping_city'),
				'shipping_post_code' => $this->input->post('shipping_post_code'),
				'shipping_state' => $this->input->post('shipping_state'),
				'billing_phone' => $this->input->post('billing_phone'),
				'waybill' => $this->input->post('waybill'),
				'billing_email' => $this->input->post('billing_email'),
				'product_1' => $this->input->post('product_1'),
				'product_2' => $this->input->post('product_2'),
				'product_3' => $this->input->post('product_3'),
				'product_4' => $this->input->post('product_4'),
				'product_5' => $this->input->post('product_5'),
				'product_6' => $this->input->post('product_6'),
				'product_7' => $this->input->post('product_7'),
				'product_8' => $this->input->post('product_8'),
				'product_9' => $this->input->post('product_9'),
				'product_10' => $this->input->post('product_10'),
				'product_11' => $this->input->post('product_11'),
				'product_12' => $this->input->post('product_12'),
				'price_1' => $this->input->post('price_1'),
				'price_2' => $this->input->post('price_2'),
				'price_3' => $this->input->post('price_3'),
				'price_4' => $this->input->post('price_4'),
				'price_5' => $this->input->post('price_5'),
				'price_6' => $this->input->post('price_6'),
				'price_7' => $this->input->post('price_7'),
				'price_8' => $this->input->post('price_8'),
				'price_9' => $this->input->post('price_9'),
				'price_10' => $this->input->post('price_10'),
				'price_11' => $this->input->post('price_11'),
				'price_12' => $this->input->post('price_12'),
				'product_sku_1' => $this->input->post('product_sku_1'),
				'product_sku_2' => $this->input->post('product_sku_2'),
				'product_sku_3' => $this->input->post('product_sku_3'),
				'product_sku_4' => $this->input->post('product_sku_4'),
				'product_sku_5' => $this->input->post('product_sku_5'),
				'product_sku_6' => $this->input->post('product_sku_6'),
				'product_sku_7' => $this->input->post('product_sku_7'),
				'product_sku_8' => $this->input->post('product_sku_8'),
				'product_sku_9' => $this->input->post('product_sku_9'),
				'product_sku_10' => $this->input->post('product_sku_10'),
				'product_sku_11' => $this->input->post('product_sku_11'),
				'product_sku_12' => $this->input->post('product_sku_12'),
				'item_quantity_1' => $this->input->post('item_quantity_1'),
				'item_quantity_2' => $this->input->post('item_quantity_2'),
				'item_quantity_3' => $this->input->post('item_quantity_3'),
				'item_quantity_4' => $this->input->post('item_quantity_4'),
				'item_quantity_5' => $this->input->post('item_quantity_5'),
				'item_quantity_6' => $this->input->post('item_quantity_6'),
				'item_quantity_7' => $this->input->post('item_quantity_7'),
				'item_quantity_8' => $this->input->post('item_quantity_8'),
				'item_quantity_9' => $this->input->post('item_quantity_9'),
				'item_quantity_10' => $this->input->post('item_quantity_10'),
				'item_quantity_11' => $this->input->post('item_quantity_11'),
				'item_quantity_12' => $this->input->post('item_quantity_12'),
				'shipping_method' => $this->input->post('shipping_method'),
				'shipping_cost' => $this->input->post('shipping_cost'),
				'total_order' => $this->input->post('total_order'),
				'coupon_used' => $this->input->post('coupon_used'),
				'coupon_discount_amount' => $this->input->post('coupon_discount_amount'),
				'invoice' => $this->input->post('invoice'),
				'packing_slip' => $this->input->post('packing_slip'),
				'shipping_first_name' => $this->input->post('shipping_first_name'),
				'shipping_last_name' => $this->input->post('shipping_last_name'),
				'customer_note' => $this->input->post('customer_note'),
				'note_content' => $this->input->post('note_content'),
			];
			
			$save_orders = $this->model_api_orders->change($this->post('id'), $save_data);

			if ($save_orders) {
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
	 * @api {post} /orders/delete Delete Orders. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteOrders
	 * @apiGroup orders
	 * @apiHeader {String} X-Api-Key Orderss unique access-key.
	 * @apiHeader {String} X-Token Orderss unique token.
	 	 * @apiPermission Orders Cant be Accessed permission name : api_orders_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Orderss .
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
		$this->is_allowed('api_orders_delete');

		$orders = $this->model_api_orders->find($this->post('id'));

		if (!$orders) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Orders not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_orders->remove($this->post('id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Orders deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Orders not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Orders.php */
/* Location: ./application/controllers/api/Orders.php */