<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Wp Woocommerce Order Itemmeta Controller
*| --------------------------------------------------------------------------
*| Wp Woocommerce Order Itemmeta site
*|
*/
class Wp_woocommerce_order_itemmeta extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_wp_woocommerce_order_itemmeta');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Wp Woocommerce Order Itemmetas
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('wp_woocommerce_order_itemmeta_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['wp_woocommerce_order_itemmetas'] = $this->model_wp_woocommerce_order_itemmeta->get($filter, $field, $this->limit_page, $offset);
		$this->data['wp_woocommerce_order_itemmeta_counts'] = $this->model_wp_woocommerce_order_itemmeta->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/wp_woocommerce_order_itemmeta/index/',
			'total_rows'   => $this->model_wp_woocommerce_order_itemmeta->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Wp Woocommerce Order Itemmeta List');
		$this->render('backend/standart/administrator/wp_woocommerce_order_itemmeta/wp_woocommerce_order_itemmeta_list', $this->data);
	}
	
	/**
	* Add new wp_woocommerce_order_itemmetas
	*
	*/
	public function add()
	{
		$this->is_allowed('wp_woocommerce_order_itemmeta_add');

		$this->template->title('Wp Woocommerce Order Itemmeta New');
		$this->render('backend/standart/administrator/wp_woocommerce_order_itemmeta/wp_woocommerce_order_itemmeta_add', $this->data);
	}

	/**
	* Add New Wp Woocommerce Order Itemmetas
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('wp_woocommerce_order_itemmeta_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('order_item_id', 'Order Item Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('meta_key', 'Meta Key', 'trim|max_length[255]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'meta_id' => $this->input->post('meta_id'),
				'order_item_id' => $this->input->post('order_item_id'),
				'meta_key' => $this->input->post('meta_key'),
				'meta_value' => $this->input->post('meta_value'),
			];

			
			$save_wp_woocommerce_order_itemmeta = $this->model_wp_woocommerce_order_itemmeta->store($save_data);
            

			if ($save_wp_woocommerce_order_itemmeta) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_wp_woocommerce_order_itemmeta;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/wp_woocommerce_order_itemmeta/edit/' . $save_wp_woocommerce_order_itemmeta, 'Edit Wp Woocommerce Order Itemmeta'),
						anchor('administrator/wp_woocommerce_order_itemmeta', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/wp_woocommerce_order_itemmeta/edit/' . $save_wp_woocommerce_order_itemmeta, 'Edit Wp Woocommerce Order Itemmeta')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/wp_woocommerce_order_itemmeta');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/wp_woocommerce_order_itemmeta');
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
	* Update view Wp Woocommerce Order Itemmetas
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('wp_woocommerce_order_itemmeta_update');

		$this->data['wp_woocommerce_order_itemmeta'] = $this->model_wp_woocommerce_order_itemmeta->find($id);

		$this->template->title('Wp Woocommerce Order Itemmeta Update');
		$this->render('backend/standart/administrator/wp_woocommerce_order_itemmeta/wp_woocommerce_order_itemmeta_update', $this->data);
	}

	/**
	* Update Wp Woocommerce Order Itemmetas
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('wp_woocommerce_order_itemmeta_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('order_item_id', 'Order Item Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('meta_key', 'Meta Key', 'trim|max_length[255]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'meta_id' => $this->input->post('meta_id'),
				'order_item_id' => $this->input->post('order_item_id'),
				'meta_key' => $this->input->post('meta_key'),
				'meta_value' => $this->input->post('meta_value'),
			];

			
			$save_wp_woocommerce_order_itemmeta = $this->model_wp_woocommerce_order_itemmeta->change($id, $save_data);

			if ($save_wp_woocommerce_order_itemmeta) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/wp_woocommerce_order_itemmeta', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/wp_woocommerce_order_itemmeta');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/wp_woocommerce_order_itemmeta');
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
	* delete Wp Woocommerce Order Itemmetas
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('wp_woocommerce_order_itemmeta_delete');

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
            set_message(cclang('has_been_deleted', 'wp_woocommerce_order_itemmeta'), 'success');
        } else {
            set_message(cclang('error_delete', 'wp_woocommerce_order_itemmeta'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Wp Woocommerce Order Itemmetas
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('wp_woocommerce_order_itemmeta_view');

		$this->data['wp_woocommerce_order_itemmeta'] = $this->model_wp_woocommerce_order_itemmeta->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Wp Woocommerce Order Itemmeta Detail');
		$this->render('backend/standart/administrator/wp_woocommerce_order_itemmeta/wp_woocommerce_order_itemmeta_view', $this->data);
	}
	
	/**
	* delete Wp Woocommerce Order Itemmetas
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$wp_woocommerce_order_itemmeta = $this->model_wp_woocommerce_order_itemmeta->find($id);

		
		
		return $this->model_wp_woocommerce_order_itemmeta->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('wp_woocommerce_order_itemmeta_export');

		$this->model_wp_woocommerce_order_itemmeta->export('wp_woocommerce_order_itemmeta', 'wp_woocommerce_order_itemmeta');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('wp_woocommerce_order_itemmeta_export');

		$this->model_wp_woocommerce_order_itemmeta->pdf('wp_woocommerce_order_itemmeta', 'wp_woocommerce_order_itemmeta');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('wp_woocommerce_order_itemmeta_export');

		$table = $title = 'wp_woocommerce_order_itemmeta';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_wp_woocommerce_order_itemmeta->find($id);
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


/* End of file wp_woocommerce_order_itemmeta.php */
/* Location: ./application/controllers/administrator/Wp Woocommerce Order Itemmeta.php */