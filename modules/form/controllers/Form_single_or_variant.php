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
	* Submit Form Single Or Variants
	*
	*/
	public function submit()
	{
		$this->form_validation->set_rules('select', 'Select', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'select' => $this->input->post('select'),
			];

			
			$save_form_single_or_variant = $this->model_form_single_or_variant->store($save_data);

			$this->data['success'] = true;
			$this->data['id'] 	   = $save_form_single_or_variant;
			$this->data['message'] = cclang('your_data_has_been_successfully_submitted');
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	
}


/* End of file form_single_or_variant.php */
/* Location: ./application/controllers/administrator/Form Single Or Variant.php */