<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Category Main Controller
*| --------------------------------------------------------------------------
*| Category Main site
*|
*/
class Category_main extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_category_main');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Category Mains
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('category_main_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['category_mains'] = $this->model_category_main->get($filter, $field, $this->limit_page, $offset);
		$this->data['category_main_counts'] = $this->model_category_main->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/category_main/index/',
			'total_rows'   => $this->model_category_main->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Category Main List');
		$this->render('backend/standart/administrator/category_main/category_main_list', $this->data);
	}
	
	/**
	* Add new category_mains
	*
	*/
	public function add()
	{
		$this->is_allowed('category_main_add');

		$this->template->title('Category Main New');
		$this->render('backend/standart/administrator/category_main/category_main_add', $this->data);
	}

	/**
	* Add New Category Mains
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('category_main_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('category_desc', 'Category Desc', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'category_name' => $this->input->post('category_name'),
				'category_desc' => $this->input->post('category_desc'),
			];

			
			$save_category_main = $this->model_category_main->store($save_data);
            

			if ($save_category_main) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_category_main;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/category_main/edit/' . $save_category_main, 'Edit Category Main'),
						anchor('administrator/category_main', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/category_main/edit/' . $save_category_main, 'Edit Category Main')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/category_main');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/category_main');
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
	* Update view Category Mains
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('category_main_update');

		$this->data['category_main'] = $this->model_category_main->find($id);

		$this->template->title('Category Main Update');
		$this->render('backend/standart/administrator/category_main/category_main_update', $this->data);
	}

	/**
	* Update Category Mains
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('category_main_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('category_desc', 'Category Desc', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'category_name' => $this->input->post('category_name'),
				'category_desc' => $this->input->post('category_desc'),
			];

			
			$save_category_main = $this->model_category_main->change($id, $save_data);

			if ($save_category_main) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/category_main', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/category_main');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/category_main');
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
	* delete Category Mains
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('category_main_delete');

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
            set_message(cclang('has_been_deleted', 'category_main'), 'success');
        } else {
            set_message(cclang('error_delete', 'category_main'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Category Mains
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('category_main_view');

		$this->data['category_main'] = $this->model_category_main->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Category Main Detail');
		$this->render('backend/standart/administrator/category_main/category_main_view', $this->data);
	}
	
	/**
	* delete Category Mains
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$category_main = $this->model_category_main->find($id);

		
		
		return $this->model_category_main->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('category_main_export');

		$this->model_category_main->export('category_main', 'category_main');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('category_main_export');

		$this->model_category_main->pdf('category_main', 'category_main');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('category_main_export');

		$table = $title = 'category_main';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_category_main->find($id);
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


/* End of file category_main.php */
/* Location: ./application/controllers/administrator/Category Main.php */