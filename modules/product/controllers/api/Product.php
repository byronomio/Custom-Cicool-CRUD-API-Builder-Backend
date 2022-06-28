<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Product extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_product');
	}

	/**
	 * @api {get} /product/all Get all products.
	 * @apiVersion 0.1.0
	 * @apiName AllProduct 
	 * @apiGroup product
	 * @apiHeader {String} X-Api-Key Products unique access-key.
	 * @apiHeader {String} X-Token Products unique token.
	 * @apiPermission Product Cant be Accessed permission name : api_product_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Products.
	 * @apiParam {String} [Field="All Field"] Optional field of Products : id, product_name, sku, url, weight, price, description, image, stock, variant, created_at.
	 * @apiParam {String} [Start=0] Optional start index of Products.
	 * @apiParam {String} [Limit=10] Optional limit data of Products.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of product.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataProduct Product data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_product_all');

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id', 'product_name', 'sku', 'url', 'weight', 'price', 'description', 'image', 'stock', 'variant', 'created_at'];
		$products = $this->model_api_product->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_product->count_all($filter, $field);
		$products = array_map(function($row){
						
			return $row;
		}, $products);

		$data['product'] = $products;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Product',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /product/detail Detail Product.
	 * @apiVersion 0.1.0
	 * @apiName DetailProduct
	 * @apiGroup product
	 * @apiHeader {String} X-Api-Key Products unique access-key.
	 * @apiHeader {String} X-Token Products unique token.
	 * @apiPermission Product Cant be Accessed permission name : api_product_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Products.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of product.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ProductNotFound Product data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_product_detail');

		$this->requiredInput(['id']);

		$id = $this->get('id');

		$select_field = ['id', 'product_name', 'sku', 'url', 'weight', 'price', 'description', 'image', 'stock', 'variant', 'created_at'];
		$product = $this->model_api_product->find($id, $select_field);

		if (!$product) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['product'] = $product;
		if ($data['product']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Product',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Product not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /product/add Add Product.
	 * @apiVersion 0.1.0
	 * @apiName AddProduct
	 * @apiGroup product
	 * @apiHeader {String} X-Api-Key Products unique access-key.
	 * @apiHeader {String} X-Token Products unique token.
	 * @apiPermission Product Cant be Accessed permission name : api_product_add
	 *
 	 * @apiParam {String} Product_name Mandatory product_name of Products. Input Product Name Max Length : 250. 
	 * @apiParam {String} Sku Mandatory sku of Products. Input Sku Max Length : 250. 
	 * @apiParam {String} Url Mandatory url of Products. Input Url Max Length : 250. 
	 * @apiParam {String} Weight Mandatory weight of Products.  
	 * @apiParam {String} Price Mandatory price of Products. Input Price Max Length : 39. 
	 * @apiParam {String} Description Mandatory description of Products.  
	 * @apiParam {String} Image Mandatory image of Products. Input Image Max Length : 250. 
	 * @apiParam {String} Stock Mandatory stock of Products. Input Stock Max Length : 11. 
	 * @apiParam {String} Variant Mandatory variant of Products. Input Variant Max Length : 250. 
	 * @apiParam {String} Created_at Mandatory created_at of Products.  
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
		$this->is_allowed('api_product_add');

		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('sku', 'Sku', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('url', 'Url', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('weight', 'Weight', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[39]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('image', 'Image', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('stock', 'Stock', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('variant', 'Variant', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('created_at', 'Created At', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'product_name' => $this->input->post('product_name'),
				'sku' => $this->input->post('sku'),
				'url' => $this->input->post('url'),
				'weight' => $this->input->post('weight'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'image' => $this->input->post('image'),
				'stock' => $this->input->post('stock'),
				'variant' => $this->input->post('variant'),
				'created_at' => $this->input->post('created_at'),
			];
			
			$save_product = $this->model_api_product->store($save_data);

			if ($save_product) {
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
	 * @api {post} /product/update Update Product.
	 * @apiVersion 0.1.0
	 * @apiName UpdateProduct
	 * @apiGroup product
	 * @apiHeader {String} X-Api-Key Products unique access-key.
	 * @apiHeader {String} X-Token Products unique token.
	 * @apiPermission Product Cant be Accessed permission name : api_product_update
	 *
	 * @apiParam {String} Product_name Mandatory product_name of Products. Input Product Name Max Length : 250. 
	 * @apiParam {String} Sku Mandatory sku of Products. Input Sku Max Length : 250. 
	 * @apiParam {String} Url Mandatory url of Products. Input Url Max Length : 250. 
	 * @apiParam {String} Weight Mandatory weight of Products.  
	 * @apiParam {String} Price Mandatory price of Products. Input Price Max Length : 39. 
	 * @apiParam {String} Description Mandatory description of Products.  
	 * @apiParam {String} Image Mandatory image of Products. Input Image Max Length : 250. 
	 * @apiParam {String} Stock Mandatory stock of Products. Input Stock Max Length : 11. 
	 * @apiParam {String} Variant Mandatory variant of Products. Input Variant Max Length : 250. 
	 * @apiParam {String} Created_at Mandatory created_at of Products.  
	 * @apiParam {Integer} id Mandatory id of Product.
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
		$this->is_allowed('api_product_update');

		
		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('sku', 'Sku', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('url', 'Url', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('weight', 'Weight', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[39]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('image', 'Image', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('stock', 'Stock', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('variant', 'Variant', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('created_at', 'Created At', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'product_name' => $this->input->post('product_name'),
				'sku' => $this->input->post('sku'),
				'url' => $this->input->post('url'),
				'weight' => $this->input->post('weight'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'image' => $this->input->post('image'),
				'stock' => $this->input->post('stock'),
				'variant' => $this->input->post('variant'),
				'created_at' => $this->input->post('created_at'),
			];
			
			$save_product = $this->model_api_product->change($this->post('id'), $save_data);

			if ($save_product) {
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
	 * @api {post} /product/delete Delete Product. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteProduct
	 * @apiGroup product
	 * @apiHeader {String} X-Api-Key Products unique access-key.
	 * @apiHeader {String} X-Token Products unique token.
	 	 * @apiPermission Product Cant be Accessed permission name : api_product_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Products .
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
		$this->is_allowed('api_product_delete');

		$product = $this->model_api_product->find($this->post('id'));

		if (!$product) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Product not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_product->remove($this->post('id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Product deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Product not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Product.php */
/* Location: ./application/controllers/api/Product.php */