<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Asc_products extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_asc_products');
	}

	/**
	 * @api {get} /asc_products/all Get all asc_productss.
	 * @apiVersion 0.1.0
	 * @apiName AllAscproducts 
	 * @apiGroup asc_products
	 * @apiHeader {String} X-Api-Key Asc productss unique access-key.
	 * @apiPermission Asc products Cant be Accessed permission name : api_asc_products_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Asc productss.
	 * @apiParam {String} [Field="All Field"] Optional field of Asc productss : id, partno_1, fulldesc_1, shortdes_1, price_1, sopfree_2, prodanal_1, status_1.
	 * @apiParam {String} [Start=0] Optional start index of Asc productss.
	 * @apiParam {String} [Limit=10] Optional limit data of Asc productss.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of asc_products.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataAsc products Asc products data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_asc_products_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id', 'partno_1', 'fulldesc_1', 'shortdes_1', 'price_1', 'sopfree_2', 'prodanal_1', 'status_1'];
		$asc_productss = $this->model_api_asc_products->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_asc_products->count_all($filter, $field);
		$asc_productss = array_map(function($row){
						
			return $row;
		}, $asc_productss);

		$data['asc_products'] = $asc_productss;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Asc products',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /asc_products/detail Detail Asc products.
	 * @apiVersion 0.1.0
	 * @apiName DetailAsc products
	 * @apiGroup asc_products
	 * @apiHeader {String} X-Api-Key Asc productss unique access-key.
	 * @apiPermission Asc products Cant be Accessed permission name : api_asc_products_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Asc productss.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of asc_products.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Asc productsNotFound Asc products data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_asc_products_detail', false);

		$this->requiredInput(['id']);

		$id = $this->get('id');

		$select_field = ['id', 'partno_1', 'fulldesc_1', 'shortdes_1', 'price_1', 'sopfree_2', 'prodanal_1', 'status_1'];
		$asc_products = $this->model_api_asc_products->find($id, $select_field);

		if (!$asc_products) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['asc_products'] = $asc_products;
		if ($data['asc_products']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Asc products',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Asc products not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /asc_products/add Add Asc products.
	 * @apiVersion 0.1.0
	 * @apiName AddAsc products
	 * @apiGroup asc_products
	 * @apiHeader {String} X-Api-Key Asc productss unique access-key.
	 * @apiPermission Asc products Cant be Accessed permission name : api_asc_products_add
	 *
 	 * @apiParam {String} [Id] Optional id of Asc productss.  
	 * @apiParam {String} [Partno_1] Optional partno_1 of Asc productss. Input Partno 1 Max Length : 24. 
	 * @apiParam {String} [Fulldesc_1] Optional fulldesc_1 of Asc productss. Input Fulldesc 1 Max Length : 600. 
	 * @apiParam {String} [Shortdes_1] Optional shortdes_1 of Asc productss. Input Shortdes 1 Max Length : 600. 
	 * @apiParam {String} [Price_1] Optional price_1 of Asc productss. Input Price 1 Max Length : 20. 
	 * @apiParam {String} [Sopfree_2] Optional sopfree_2 of Asc productss. Input Sopfree 2 Max Length : 20. 
	 * @apiParam {String} [Prodanal_1] Optional prodanal_1 of Asc productss. Input Prodanal 1 Max Length : 24. 
	 * @apiParam {String} [Status_1] Optional status_1 of Asc productss. Input Status 1 Max Length : 20. 
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
		$this->is_allowed('api_asc_products_add', false);

		$this->form_validation->set_rules('partno_1', 'Partno 1', 'trim|max_length[24]');
		$this->form_validation->set_rules('fulldesc_1', 'Fulldesc 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('shortdes_1', 'Shortdes 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('price_1', 'Price 1', 'trim|max_length[20]');
		$this->form_validation->set_rules('sopfree_2', 'Sopfree 2', 'trim|max_length[20]');
		$this->form_validation->set_rules('prodanal_1', 'Prodanal 1', 'trim|max_length[24]');
		$this->form_validation->set_rules('status_1', 'Status 1', 'trim|max_length[20]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'partno_1' => $this->input->post('partno_1'),
				'fulldesc_1' => $this->input->post('fulldesc_1'),
				'shortdes_1' => $this->input->post('shortdes_1'),
				'price_1' => $this->input->post('price_1'),
				'sopfree_2' => $this->input->post('sopfree_2'),
				'prodanal_1' => $this->input->post('prodanal_1'),
				'status_1' => $this->input->post('status_1'),
			];
			
			$save_asc_products = $this->model_api_asc_products->store($save_data);

			if ($save_asc_products) {
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
	 * @api {post} /asc_products/update Update Asc products.
	 * @apiVersion 0.1.0
	 * @apiName UpdateAsc products
	 * @apiGroup asc_products
	 * @apiHeader {String} X-Api-Key Asc productss unique access-key.
	 * @apiPermission Asc products Cant be Accessed permission name : api_asc_products_update
	 *
	 * @apiParam {String} [Id] Optional id of Asc productss.  
	 * @apiParam {String} [Partno_1] Optional partno_1 of Asc productss. Input Partno 1 Max Length : 24. 
	 * @apiParam {String} [Fulldesc_1] Optional fulldesc_1 of Asc productss. Input Fulldesc 1 Max Length : 600. 
	 * @apiParam {String} [Shortdes_1] Optional shortdes_1 of Asc productss. Input Shortdes 1 Max Length : 600. 
	 * @apiParam {String} [Price_1] Optional price_1 of Asc productss. Input Price 1 Max Length : 20. 
	 * @apiParam {String} [Sopfree_2] Optional sopfree_2 of Asc productss. Input Sopfree 2 Max Length : 20. 
	 * @apiParam {String} [Prodanal_1] Optional prodanal_1 of Asc productss. Input Prodanal 1 Max Length : 24. 
	 * @apiParam {String} [Status_1] Optional status_1 of Asc productss. Input Status 1 Max Length : 20. 
	 * @apiParam {Integer} id Mandatory id of Asc Products.
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
		$this->is_allowed('api_asc_products_update', false);

		
		$this->form_validation->set_rules('partno_1', 'Partno 1', 'trim|max_length[24]');
		$this->form_validation->set_rules('fulldesc_1', 'Fulldesc 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('shortdes_1', 'Shortdes 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('price_1', 'Price 1', 'trim|max_length[20]');
		$this->form_validation->set_rules('sopfree_2', 'Sopfree 2', 'trim|max_length[20]');
		$this->form_validation->set_rules('prodanal_1', 'Prodanal 1', 'trim|max_length[24]');
		$this->form_validation->set_rules('status_1', 'Status 1', 'trim|max_length[20]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'partno_1' => $this->input->post('partno_1'),
				'fulldesc_1' => $this->input->post('fulldesc_1'),
				'shortdes_1' => $this->input->post('shortdes_1'),
				'price_1' => $this->input->post('price_1'),
				'sopfree_2' => $this->input->post('sopfree_2'),
				'prodanal_1' => $this->input->post('prodanal_1'),
				'status_1' => $this->input->post('status_1'),
			];
			
			$save_asc_products = $this->model_api_asc_products->change($this->post('id'), $save_data);

			if ($save_asc_products) {
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
	 * @api {post} /asc_products/delete Delete Asc products. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteAsc products
	 * @apiGroup asc_products
	 * @apiHeader {String} X-Api-Key Asc productss unique access-key.
	 	 * @apiPermission Asc products Cant be Accessed permission name : api_asc_products_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Asc productss .
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
		$this->is_allowed('api_asc_products_delete', false);

		$asc_products = $this->model_api_asc_products->find($this->post('id'));

		if (!$asc_products) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Asc products not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_asc_products->remove($this->post('id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Asc products deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Asc products not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Asc products.php */
/* Location: ./application/controllers/api/Asc products.php */