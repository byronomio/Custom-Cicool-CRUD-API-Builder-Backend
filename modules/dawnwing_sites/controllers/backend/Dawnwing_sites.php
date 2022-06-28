<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dawnwing Sites Controller
*| --------------------------------------------------------------------------
*| Dawnwing Sites site
*|
*/
class Dawnwing_sites extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_dawnwing_sites');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Dawnwing Sitess
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('dawnwing_sites_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['dawnwing_sitess'] = $this->model_dawnwing_sites->get($filter, $field, $this->limit_page, $offset);
		$this->data['dawnwing_sites_counts'] = $this->model_dawnwing_sites->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/dawnwing_sites/index/',
			'total_rows'   => $this->model_dawnwing_sites->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Dawnwing Sites List');
		$this->render('backend/standart/administrator/dawnwing_sites/dawnwing_sites_list', $this->data);
	}
	
	/**
	* Add new dawnwing_sitess
	*
	*/
	public function add()
	{
		$this->is_allowed('dawnwing_sites_add');

		$this->template->title('Dawnwing Sites New');
		$this->render('backend/standart/administrator/dawnwing_sites/dawnwing_sites_add', $this->data);
	}

	/**
	* Add New Dawnwing Sitess
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('dawnwing_sites_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('company', 'Company', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('phpcode', 'Phpcode', 'trim|required|max_length[50000]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'company' => $this->input->post('company'),
				'phpcode' => $this->input->post('phpcode'),
			];

			
			$save_dawnwing_sites = $this->model_dawnwing_sites->store($save_data);
            

			if ($save_dawnwing_sites) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_dawnwing_sites;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/dawnwing_sites/edit/' . $save_dawnwing_sites, 'Edit Dawnwing Sites'),
						anchor('administrator/dawnwing_sites', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/dawnwing_sites/edit/' . $save_dawnwing_sites, 'Edit Dawnwing Sites')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/dawnwing_sites');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/dawnwing_sites');
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
	* Update view Dawnwing Sitess
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('dawnwing_sites_update');

		$this->data['dawnwing_sites'] = $this->model_dawnwing_sites->find($id);

		$this->template->title('Dawnwing Sites Update');
		$this->render('backend/standart/administrator/dawnwing_sites/dawnwing_sites_update', $this->data);
	}

	/**
	* Update Dawnwing Sitess
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('dawnwing_sites_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('company', 'Company', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('phpcode', 'Phpcode', 'trim|required|max_length[50000]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'company' => $this->input->post('company'),
				'phpcode' => $this->input->post('phpcode'),
			];

			
			$save_dawnwing_sites = $this->model_dawnwing_sites->change($id, $save_data);

			if ($save_dawnwing_sites) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/dawnwing_sites', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/dawnwing_sites');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/dawnwing_sites');
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
	* delete Dawnwing Sitess
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('dawnwing_sites_delete');

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
            set_message(cclang('has_been_deleted', 'dawnwing_sites'), 'success');
        } else {
            set_message(cclang('error_delete', 'dawnwing_sites'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Dawnwing Sitess
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('dawnwing_sites_view');

		$this->data['dawnwing_sites'] = $this->model_dawnwing_sites->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Dawnwing Sites Detail');
		$this->render('backend/standart/administrator/dawnwing_sites/dawnwing_sites_view', $this->data);
	}
	
	/**
	* delete Dawnwing Sitess
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$dawnwing_sites = $this->model_dawnwing_sites->find($id);

		
		
		return $this->model_dawnwing_sites->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('dawnwing_sites_export');

		$this->model_dawnwing_sites->export('dawnwing_sites', 'dawnwing_sites');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('dawnwing_sites_export');

		$this->model_dawnwing_sites->pdf('dawnwing_sites', 'dawnwing_sites');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('dawnwing_sites_export');

		$table = $title = 'dawnwing_sites';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_dawnwing_sites->find($id);
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


/* End of file dawnwing_sites.php */
/* Location: ./application/controllers/administrator/Dawnwing Sites.php */