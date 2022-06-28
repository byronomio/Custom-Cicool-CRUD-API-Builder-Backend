<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Status Controller
*| --------------------------------------------------------------------------
*| Status site
*|
*/
class Status extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_status');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Statuss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('status_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['statuss'] = $this->model_status->get($filter, $field, $this->limit_page, $offset);
		$this->data['status_counts'] = $this->model_status->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/status/index/',
			'total_rows'   => $this->model_status->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Status List');
		$this->render('backend/standart/administrator/status/status_list', $this->data);
	}
	
	/**
	* Add new statuss
	*
	*/
	public function add()
	{
		$this->is_allowed('status_add');

		$this->template->title('Status New');
		$this->render('backend/standart/administrator/status/status_add', $this->data);
	}

	/**
	* Add New Statuss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('status_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('status_name', 'Status Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('status_desc', 'Status Desc', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'status_name' => $this->input->post('status_name'),
				'status_desc' => $this->input->post('status_desc'),
			];

			
			$save_status = $this->model_status->store($save_data);
            

			if ($save_status) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_status;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/status/edit/' . $save_status, 'Edit Status'),
						anchor('administrator/status', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/status/edit/' . $save_status, 'Edit Status')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/status');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/status');
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
	* Update view Statuss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('status_update');

		$this->data['status'] = $this->model_status->find($id);

		$this->template->title('Status Update');
		$this->render('backend/standart/administrator/status/status_update', $this->data);
	}

	/**
	* Update Statuss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('status_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('status_name', 'Status Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('status_desc', 'Status Desc', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'status_name' => $this->input->post('status_name'),
				'status_desc' => $this->input->post('status_desc'),
			];

			
			$save_status = $this->model_status->change($id, $save_data);

			if ($save_status) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/status', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/status');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/status');
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
	* delete Statuss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('status_delete');

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
            set_message(cclang('has_been_deleted', 'status'), 'success');
        } else {
            set_message(cclang('error_delete', 'status'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Statuss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('status_view');

		$this->data['status'] = $this->model_status->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Status Detail');
		$this->render('backend/standart/administrator/status/status_view', $this->data);
	}
	
	/**
	* delete Statuss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$status = $this->model_status->find($id);

		
		
		return $this->model_status->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('status_export');

		$this->model_status->export('status', 'status');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('status_export');

		$this->model_status->pdf('status', 'status');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('status_export');

		$table = $title = 'status';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_status->find($id);
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


/* End of file status.php */
/* Location: ./application/controllers/administrator/Status.php */