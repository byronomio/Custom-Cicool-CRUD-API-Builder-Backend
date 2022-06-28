<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Dawnwing_sites extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_dawnwing_sites');
	}

	/**
	 * @api {get} /dawnwing_sites/all Get all dawnwing_sitess.
	 * @apiVersion 0.1.0
	 * @apiName AllDawnwingsites 
	 * @apiGroup dawnwing_sites
	 * @apiHeader {String} X-Api-Key Dawnwing sitess unique access-key.
	 * @apiPermission Dawnwing sites Cant be Accessed permission name : api_dawnwing_sites_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Dawnwing sitess.
	 * @apiParam {String} [Field="All Field"] Optional field of Dawnwing sitess : phpcode.
	 * @apiParam {String} [Start=0] Optional start index of Dawnwing sitess.
	 * @apiParam {String} [Limit=10] Optional limit data of Dawnwing sitess.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of dawnwing_sites.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataDawnwing sites Dawnwing sites data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_dawnwing_sites_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['phpcode'];
		$dawnwing_sitess = $this->model_api_dawnwing_sites->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_dawnwing_sites->count_all($filter, $field);
		$dawnwing_sitess = array_map(function($row){
						
			return $row;
		}, $dawnwing_sitess);

		$data['dawnwing_sites'] = $dawnwing_sitess;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Dawnwing sites',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /dawnwing_sites/detail Detail Dawnwing sites.
	 * @apiVersion 0.1.0
	 * @apiName DetailDawnwing sites
	 * @apiGroup dawnwing_sites
	 * @apiHeader {String} X-Api-Key Dawnwing sitess unique access-key.
	 * @apiPermission Dawnwing sites Cant be Accessed permission name : api_dawnwing_sites_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Dawnwing sitess.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of dawnwing_sites.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Dawnwing sitesNotFound Dawnwing sites data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_dawnwing_sites_detail', false);

		$this->requiredInput(['id']);

		$id = $this->get('id');

		$select_field = ['phpcode'];
		$dawnwing_sites = $this->model_api_dawnwing_sites->find($id, $select_field);

		if (!$dawnwing_sites) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['dawnwing_sites'] = $dawnwing_sites;
		if ($data['dawnwing_sites']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Dawnwing sites',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Dawnwing sites not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /dawnwing_sites/add Add Dawnwing sites.
	 * @apiVersion 0.1.0
	 * @apiName AddDawnwing sites
	 * @apiGroup dawnwing_sites
	 * @apiHeader {String} X-Api-Key Dawnwing sitess unique access-key.
	 * @apiPermission Dawnwing sites Cant be Accessed permission name : api_dawnwing_sites_add
	 *
 	 * @apiParam {String} Phpcode Mandatory phpcode of Dawnwing sitess.  
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
		$this->is_allowed('api_dawnwing_sites_add', false);

		$this->form_validation->set_rules('phpcode', 'Phpcode', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'phpcode' => $this->input->post('phpcode'),
			];
			
			$save_dawnwing_sites = $this->model_api_dawnwing_sites->store($save_data);

			if ($save_dawnwing_sites) {
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
	 * @api {post} /dawnwing_sites/update Update Dawnwing sites.
	 * @apiVersion 0.1.0
	 * @apiName UpdateDawnwing sites
	 * @apiGroup dawnwing_sites
	 * @apiHeader {String} X-Api-Key Dawnwing sitess unique access-key.
	 * @apiPermission Dawnwing sites Cant be Accessed permission name : api_dawnwing_sites_update
	 *
	 * @apiParam {String} Phpcode Mandatory phpcode of Dawnwing sitess.  
	 * @apiParam {Integer} id Mandatory id of Dawnwing Sites.
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
		$this->is_allowed('api_dawnwing_sites_update', false);

		
		$this->form_validation->set_rules('phpcode', 'Phpcode', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'phpcode' => $this->input->post('phpcode'),
			];
			
			$save_dawnwing_sites = $this->model_api_dawnwing_sites->change($this->post('id'), $save_data);

			if ($save_dawnwing_sites) {
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
	 * @api {post} /dawnwing_sites/delete Delete Dawnwing sites. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteDawnwing sites
	 * @apiGroup dawnwing_sites
	 * @apiHeader {String} X-Api-Key Dawnwing sitess unique access-key.
	 	 * @apiPermission Dawnwing sites Cant be Accessed permission name : api_dawnwing_sites_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Dawnwing sitess .
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
		$this->is_allowed('api_dawnwing_sites_delete', false);

		$dawnwing_sites = $this->model_api_dawnwing_sites->find($this->post('id'));

		if (!$dawnwing_sites) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Dawnwing sites not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_dawnwing_sites->remove($this->post('id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Dawnwing sites deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Dawnwing sites not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Dawnwing sites.php */
/* Location: ./application/controllers/api/Dawnwing sites.php */