<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Api_orders_products extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_api_orders_products');
	}

	/**
	 * @api {get} /api_orders_products/all Get all api_orders_productss.
	 * @apiVersion 0.1.0
	 * @apiName AllApiordersproducts 
	 * @apiGroup api_orders_products
	 * @apiHeader {String} X-Api-Key Api orders productss unique access-key.
	 * @apiPermission Api orders products Cant be Accessed permission name : api_api_orders_products_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Api orders productss.
	 * @apiParam {String} [Field="All Field"] Optional field of Api orders productss : id, item_id, item_name, item_type, item_data, variation_id, quantity, tax_class, line_subtotal, line_subtotal_tax, line_total, line_total_tax.
	 * @apiParam {String} [Start=0] Optional start index of Api orders productss.
	 * @apiParam {String} [Limit=10] Optional limit data of Api orders productss.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of api_orders_products.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataApi orders products Api orders products data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_api_orders_products_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id', 'item_id', 'item_name', 'item_type', 'item_data', 'variation_id', 'quantity', 'tax_class', 'line_subtotal', 'line_subtotal_tax', 'line_total', 'line_total_tax'];
		$api_orders_productss = $this->model_api_api_orders_products->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_api_orders_products->count_all($filter, $field);
		$api_orders_productss = array_map(function($row){
						
			return $row;
		}, $api_orders_productss);

		$data['api_orders_products'] = $api_orders_productss;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Api orders products',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /api_orders_products/detail Detail Api orders products.
	 * @apiVersion 0.1.0
	 * @apiName DetailApi orders products
	 * @apiGroup api_orders_products
	 * @apiHeader {String} X-Api-Key Api orders productss unique access-key.
	 * @apiPermission Api orders products Cant be Accessed permission name : api_api_orders_products_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Api orders productss.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of api_orders_products.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Api orders productsNotFound Api orders products data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_api_orders_products_detail', false);

		$this->requiredInput(['id']);

		$id = $this->get('id');

		$select_field = ['id', 'item_id', 'item_name', 'item_type', 'item_data', 'variation_id', 'quantity', 'tax_class', 'line_subtotal', 'line_subtotal_tax', 'line_total', 'line_total_tax'];
		$api_orders_products = $this->model_api_api_orders_products->find($id, $select_field);

		if (!$api_orders_products) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['api_orders_products'] = $api_orders_products;
		if ($data['api_orders_products']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Api orders products',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Api orders products not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /api_orders_products/add Add Api orders products.
	 * @apiVersion 0.1.0
	 * @apiName AddApi orders products
	 * @apiGroup api_orders_products
	 * @apiHeader {String} X-Api-Key Api orders productss unique access-key.
	 * @apiPermission Api orders products Cant be Accessed permission name : api_api_orders_products_add
	 *
 	 * @apiParam {String} Id Mandatory id of Api orders productss. Input Id Max Length : 20. 
	 * @apiParam {String} [Item_id] Optional item_id of Api orders productss. Input Item Id Max Length : 20. 
	 * @apiParam {String} [Item_name] Optional item_name of Api orders productss. Input Item Name Max Length : 255. 
	 * @apiParam {String} [Item_type] Optional item_type of Api orders productss. Input Item Type Max Length : 255. 
	 * @apiParam {String} [Item_data] Optional item_data of Api orders productss. Input Item Data Max Length : 5000. 
	 * @apiParam {String} [Variation_id] Optional variation_id of Api orders productss. Input Variation Id Max Length : 255. 
	 * @apiParam {String} [Quantity] Optional quantity of Api orders productss. Input Quantity Max Length : 255. 
	 * @apiParam {String} [Tax_class] Optional tax_class of Api orders productss. Input Tax Class Max Length : 255. 
	 * @apiParam {String} [Line_subtotal] Optional line_subtotal of Api orders productss. Input Line Subtotal Max Length : 255. 
	 * @apiParam {String} [Line_subtotal_tax] Optional line_subtotal_tax of Api orders productss. Input Line Subtotal Tax Max Length : 255. 
	 * @apiParam {String} [Line_total] Optional line_total of Api orders productss. Input Line Total Max Length : 255. 
	 * @apiParam {String} Line_total_tax Mandatory line_total_tax of Api orders productss. Input Line Total Tax Max Length : 255. 
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
		$this->is_allowed('api_api_orders_products_add', false);

		$this->form_validation->set_rules('id', 'Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('item_id', 'Item Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('item_name', 'Item Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('item_type', 'Item Type', 'trim|max_length[255]');
		$this->form_validation->set_rules('item_data', 'Item Data', 'trim|max_length[5000]');
		$this->form_validation->set_rules('variation_id', 'Variation Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|max_length[255]');
		$this->form_validation->set_rules('tax_class', 'Tax Class', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_subtotal', 'Line Subtotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_subtotal_tax', 'Line Subtotal Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_total', 'Line Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_total_tax', 'Line Total Tax', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'item_id' => $this->input->post('item_id'),
				'item_name' => $this->input->post('item_name'),
				'item_type' => $this->input->post('item_type'),
				'item_data' => $this->input->post('item_data'),
				'variation_id' => $this->input->post('variation_id'),
				'quantity' => $this->input->post('quantity'),
				'tax_class' => $this->input->post('tax_class'),
				'line_subtotal' => $this->input->post('line_subtotal'),
				'line_subtotal_tax' => $this->input->post('line_subtotal_tax'),
				'line_total' => $this->input->post('line_total'),
				'line_total_tax' => $this->input->post('line_total_tax'),
			];
			
			$save_api_orders_products = $this->model_api_api_orders_products->store($save_data);

			if ($save_api_orders_products) {
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
	 * @api {post} /api_orders_products/update Update Api orders products.
	 * @apiVersion 0.1.0
	 * @apiName UpdateApi orders products
	 * @apiGroup api_orders_products
	 * @apiHeader {String} X-Api-Key Api orders productss unique access-key.
	 * @apiPermission Api orders products Cant be Accessed permission name : api_api_orders_products_update
	 *
	 * @apiParam {String} Id Mandatory id of Api orders productss. Input Id Max Length : 20. 
	 * @apiParam {String} [Item_id] Optional item_id of Api orders productss. Input Item Id Max Length : 20. 
	 * @apiParam {String} [Item_name] Optional item_name of Api orders productss. Input Item Name Max Length : 255. 
	 * @apiParam {String} [Item_type] Optional item_type of Api orders productss. Input Item Type Max Length : 255. 
	 * @apiParam {String} [Item_data] Optional item_data of Api orders productss. Input Item Data Max Length : 5000. 
	 * @apiParam {String} [Variation_id] Optional variation_id of Api orders productss. Input Variation Id Max Length : 255. 
	 * @apiParam {String} [Quantity] Optional quantity of Api orders productss. Input Quantity Max Length : 255. 
	 * @apiParam {String} [Tax_class] Optional tax_class of Api orders productss. Input Tax Class Max Length : 255. 
	 * @apiParam {String} [Line_subtotal] Optional line_subtotal of Api orders productss. Input Line Subtotal Max Length : 255. 
	 * @apiParam {String} [Line_subtotal_tax] Optional line_subtotal_tax of Api orders productss. Input Line Subtotal Tax Max Length : 255. 
	 * @apiParam {String} [Line_total] Optional line_total of Api orders productss. Input Line Total Max Length : 255. 
	 * @apiParam {String} Line_total_tax Mandatory line_total_tax of Api orders productss. Input Line Total Tax Max Length : 255. 
	 * @apiParam {Integer} id Mandatory id of Api Orders Products.
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
		$this->is_allowed('api_api_orders_products_update', false);

		
		$this->form_validation->set_rules('id', 'Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('item_id', 'Item Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('item_name', 'Item Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('item_type', 'Item Type', 'trim|max_length[255]');
		$this->form_validation->set_rules('item_data', 'Item Data', 'trim|max_length[5000]');
		$this->form_validation->set_rules('variation_id', 'Variation Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|max_length[255]');
		$this->form_validation->set_rules('tax_class', 'Tax Class', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_subtotal', 'Line Subtotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_subtotal_tax', 'Line Subtotal Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_total', 'Line Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_total_tax', 'Line Total Tax', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'item_id' => $this->input->post('item_id'),
				'item_name' => $this->input->post('item_name'),
				'item_type' => $this->input->post('item_type'),
				'item_data' => $this->input->post('item_data'),
				'variation_id' => $this->input->post('variation_id'),
				'quantity' => $this->input->post('quantity'),
				'tax_class' => $this->input->post('tax_class'),
				'line_subtotal' => $this->input->post('line_subtotal'),
				'line_subtotal_tax' => $this->input->post('line_subtotal_tax'),
				'line_total' => $this->input->post('line_total'),
				'line_total_tax' => $this->input->post('line_total_tax'),
			];
			
			$save_api_orders_products = $this->model_api_api_orders_products->change($this->post('id'), $save_data);

			if ($save_api_orders_products) {
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
	 * @api {post} /api_orders_products/delete Delete Api orders products. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteApi orders products
	 * @apiGroup api_orders_products
	 * @apiHeader {String} X-Api-Key Api orders productss unique access-key.
	 	 * @apiPermission Api orders products Cant be Accessed permission name : api_api_orders_products_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Api orders productss .
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
		$this->is_allowed('api_api_orders_products_delete', false);

		$api_orders_products = $this->model_api_api_orders_products->find($this->post('id'));

		if (!$api_orders_products) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Api orders products not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_api_orders_products->remove($this->post('id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Api orders products deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Api orders products not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Api orders products.php */
/* Location: ./application/controllers/api/Api orders products.php */