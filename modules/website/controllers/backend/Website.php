<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Website Controller
*| --------------------------------------------------------------------------
*| Website site
*|
*/
class Website extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_website');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Websites
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('website_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['websites'] = $this->model_website->get($filter, $field, $this->limit_page, $offset);
		$this->data['website_counts'] = $this->model_website->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/website/index/',
			'total_rows'   => $this->model_website->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Website List');
		$this->render('backend/standart/administrator/website/website_list', $this->data);
	}
	
	/**
	* Add new websites
	*
	*/
	public function add()
	{
		$this->is_allowed('website_add');

		$this->template->title('Website New');
		$this->render('backend/standart/administrator/website/website_add', $this->data);
	}

	/**
	* Add New Websites
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('website_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('website_name', 'Website Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('website_desc', 'Website Desc', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'website_name' => $this->input->post('website_name'),
				'website_desc' => $this->input->post('website_desc'),
			];

			
			$save_website = $this->model_website->store($save_data);
            

			if ($save_website) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_website;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/website/edit/' . $save_website, 'Edit Website'),
						anchor('administrator/website', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/website/edit/' . $save_website, 'Edit Website')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/website');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/website');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Websites
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('website_update');

		$this->data['website'] = $this->model_website->find($id);

		$this->template->title('Website Update');
		$this->render('backend/standart/administrator/website/website_update', $this->data);
	}

	/**
	* Update Websites
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('website_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('website_name', 'Website Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('website_desc', 'Website Desc', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'website_name' => $this->input->post('website_name'),
				'website_desc' => $this->input->post('website_desc'),
			];

			
			$save_website = $this->model_website->change($id, $save_data);

			if ($save_website) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/website', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/website');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/website');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Websites
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('website_delete');

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
            set_message(cclang('has_been_deleted', 'website'), 'success');
        } else {
            set_message(cclang('error_delete', 'website'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Websites
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('website_view');

		$this->data['website'] = $this->model_website->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Website Detail');
		$this->render('backend/standart/administrator/website/website_view', $this->data);
	}
	
	/**
	* delete Websites
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$website = $this->model_website->find($id);

		
		
		return $this->model_website->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('website_export');

		$this->model_website->export('website', 'website');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('website_export');

		$this->model_website->pdf('website', 'website');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('website_export');

		$table = $title = 'website';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_website->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file website.php */
/* Location: ./application/controllers/administrator/Website.php */