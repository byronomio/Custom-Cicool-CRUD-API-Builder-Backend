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
	* Submit Form Add New Products For Approvals
	*
	*/
	public function submit()
	{
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

			
			$save_form_add_new_products_for_approval = $this->model_form_add_new_products_for_approval->store($save_data);

			$this->data['success'] = true;
			$this->data['id'] 	   = $save_form_add_new_products_for_approval;
			$this->data['message'] = cclang('your_data_has_been_successfully_submitted');
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	
}


/* End of file form_add_new_products_for_approval.php */
/* Location: ./application/controllers/administrator/Form Add New Products For Approval.php */