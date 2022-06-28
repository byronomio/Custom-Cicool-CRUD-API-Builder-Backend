<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Single Or Variant Controller
*| --------------------------------------------------------------------------
*| Form Single Or Variant site
*|
*/
class Form_single_or_variant extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_single_or_variant');
	}

	/**
	* show all Form Single Or Variants
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_single_or_variant_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_single_or_variants'] = $this->model_form_single_or_variant->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_single_or_variant_counts'] = $this->model_form_single_or_variant->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/manage-form/form_single_or_variant/index/',
			'total_rows'   => $this->model_form_single_or_variant->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 5,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Product Type List');
		$this->render('backend/standart/administrator/form_builder/form_single_or_variant/form_single_or_variant_list', $this->data);
	}

	/**
	* Update view Form Single Or Variants
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_single_or_variant_update');

		$this->data['form_single_or_variant'] = $this->model_form_single_or_variant->find($id);

		$this->template->title('Product Type Update');
		$this->render('backend/standart/administrator/form_builder/form_single_or_variant/form_single_or_variant_update', $this->data);
	}

	/**
	* Update Form Single Or Variants
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_single_or_variant_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('select', 'Select', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'select' => $this->input->post('select'),
			];

			
			$save_form_single_or_variant = $this->model_form_single_or_variant->change($id, $save_data);

			if ($save_form_single_or_variant) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_single_or_variant', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_single_or_variant');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					set_message('Your data not change.', 'error');
					
            		$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_single_or_variant');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	/**
	* delete Form Single Or Variants
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_single_or_variant_delete');

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
            set_message(cclang('has_been_deleted', 'Form Single Or Variant'), 'success');
        } else {
            set_message(cclang('error_delete', 'Form Single Or Variant'), 'error');
        }

		redirect_back();
	}

	/**
	* View view Form Single Or Variants
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_single_or_variant_view');

		$this->data['form_single_or_variant'] = $this->model_form_single_or_variant->find($id);

		$this->template->title('Product Type Detail');
		$this->render('backend/standart/administrator/form_builder/form_single_or_variant/form_single_or_variant_view', $this->data);
	}

	/**
	* delete Form Single Or Variants
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_single_or_variant = $this->model_form_single_or_variant->find($id);

		
		return $this->model_form_single_or_variant->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_single_or_variant_export');

		$this->model_form_single_or_variant->export('form_single_or_variant', 'form_single_or_variant');
	}
}


/* End of file form_single_or_variant.php */
/* Location: ./application/controllers/administrator/Form Single Or Variant.php */