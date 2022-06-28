<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Add New Products For Approval Controller
*| --------------------------------------------------------------------------
*| Form Add New Products For Approval site
*|
*/
class Form_add_new_products_for_approval extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_add_new_products_for_approval');
	}

	/**
	* show all Form Add New Products For Approvals
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_add_new_products_for_approval_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_add_new_products_for_approvals'] = $this->model_form_add_new_products_for_approval->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_add_new_products_for_approval_counts'] = $this->model_form_add_new_products_for_approval->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/manage-form/form_add_new_products_for_approval/index/',
			'total_rows'   => $this->model_form_add_new_products_for_approval->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 5,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('New Products List');
		$this->render('backend/standart/administrator/form_builder/form_add_new_products_for_approval/form_add_new_products_for_approval_list', $this->data);
	}

	/**
	* Update view Form Add New Products For Approvals
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_add_new_products_for_approval_update');

		$this->data['form_add_new_products_for_approval'] = $this->model_form_add_new_products_for_approval->find($id);

		$this->template->title('New Products Update');
		$this->render('backend/standart/administrator/form_builder/form_add_new_products_for_approval/form_add_new_products_for_approval_update', $this->data);
	}

	/**
	* Update Form Add New Products For Approvals
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_add_new_products_for_approval_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('website[]', 'Website', 'trim|required');
		$this->form_validation->set_rules('main_category[]', 'Main Category', 'trim|required');
		$this->form_validation->set_rules('sub_category[]', 'Sub Category', 'trim|required');
		$this->form_validation->set_rules('brand[]', 'Brand', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'website' => implode(',', (array) $this->input->post('website')),
				'main_category' => implode(',', (array) $this->input->post('main_category')),
				'sub_category' => implode(',', (array) $this->input->post('sub_category')),
				'brand' => implode(',', (array) $this->input->post('brand')),
			];

			
			$save_form_add_new_products_for_approval = $this->model_form_add_new_products_for_approval->change($id, $save_data);

			if ($save_form_add_new_products_for_approval) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_add_new_products_for_approval', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_add_new_products_for_approval');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					set_message('Your data not change.', 'error');
					
            		$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_add_new_products_for_approval');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	/**
	* delete Form Add New Products For Approvals
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_add_new_products_for_approval_delete');

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
            set_message(cclang('has_been_deleted', 'Form Add New Products For Approval'), 'success');
        } else {
            set_message(cclang('error_delete', 'Form Add New Products For Approval'), 'error');
        }

		redirect_back();
	}

	/**
	* View view Form Add New Products For Approvals
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_add_new_products_for_approval_view');

		$this->data['form_add_new_products_for_approval'] = $this->model_form_add_new_products_for_approval->find($id);

		$this->template->title('New Products Detail');
		$this->render('backend/standart/administrator/form_builder/form_add_new_products_for_approval/form_add_new_products_for_approval_view', $this->data);
	}

	/**
	* delete Form Add New Products For Approvals
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_add_new_products_for_approval = $this->model_form_add_new_products_for_approval->find($id);

		
		return $this->model_form_add_new_products_for_approval->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_add_new_products_for_approval_export');

		$this->model_form_add_new_products_for_approval->export('form_add_new_products_for_approval', 'form_add_new_products_for_approval');
	}
}


/* End of file form_add_new_products_for_approval.php */
/* Location: ./application/controllers/administrator/Form Add New Products For Approval.php */