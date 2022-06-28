<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Wp Woocommerce Order Items Controller
*| --------------------------------------------------------------------------
*| Wp Woocommerce Order Items site
*|
*/
class Wp_woocommerce_order_items extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_wp_woocommerce_order_items');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Wp Woocommerce Order Itemss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('wp_woocommerce_order_items_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['wp_woocommerce_order_itemss'] = $this->model_wp_woocommerce_order_items->get($filter, $field, $this->limit_page, $offset);
		$this->data['wp_woocommerce_order_items_counts'] = $this->model_wp_woocommerce_order_items->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/wp_woocommerce_order_items/index/',
			'total_rows'   => $this->model_wp_woocommerce_order_items->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Wp Woocommerce Order Items List');
		$this->render('backend/standart/administrator/wp_woocommerce_order_items/wp_woocommerce_order_items_list', $this->data);
	}
	
	/**
	* Add new wp_woocommerce_order_itemss
	*
	*/
	public function add()
	{
		$this->is_allowed('wp_woocommerce_order_items_add');

		$this->template->title('Wp Woocommerce Order Items New');
		$this->render('backend/standart/administrator/wp_woocommerce_order_items/wp_woocommerce_order_items_add', $this->data);
	}

	/**
	* Add New Wp Woocommerce Order Itemss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('wp_woocommerce_order_items_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('order_item_type', 'Order Item Type', 'trim|max_length[200]');
		$this->form_validation->set_rules('order_id', 'Order Id', 'trim|max_length[20]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'order_item_id' => $this->input->post('order_item_id'),
				'order_item_name' => $this->input->post('order_item_name'),
				'order_item_type' => $this->input->post('order_item_type'),
				'order_id' => $this->input->post('order_id'),
			];

			
			$save_wp_woocommerce_order_items = $this->model_wp_woocommerce_order_items->store($save_data);
            

			if ($save_wp_woocommerce_order_items) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_wp_woocommerce_order_items;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/wp_woocommerce_order_items/edit/' . $save_wp_woocommerce_order_items, 'Edit Wp Woocommerce Order Items'),
						anchor('administrator/wp_woocommerce_order_items', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/wp_woocommerce_order_items/edit/' . $save_wp_woocommerce_order_items, 'Edit Wp Woocommerce Order Items')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/wp_woocommerce_order_items');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/wp_woocommerce_order_items');
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
	* Update view Wp Woocommerce Order Itemss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('wp_woocommerce_order_items_update');

		$this->data['wp_woocommerce_order_items'] = $this->model_wp_woocommerce_order_items->find($id);

		$this->template->title('Wp Woocommerce Order Items Update');
		$this->render('backend/standart/administrator/wp_woocommerce_order_items/wp_woocommerce_order_items_update', $this->data);
	}

	/**
	* Update Wp Woocommerce Order Itemss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('wp_woocommerce_order_items_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('order_item_type', 'Order Item Type', 'trim|max_length[200]');
		$this->form_validation->set_rules('order_id', 'Order Id', 'trim|max_length[20]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'order_item_id' => $this->input->post('order_item_id'),
				'order_item_name' => $this->input->post('order_item_name'),
				'order_item_type' => $this->input->post('order_item_type'),
				'order_id' => $this->input->post('order_id'),
			];

			
			$save_wp_woocommerce_order_items = $this->model_wp_woocommerce_order_items->change($id, $save_data);

			if ($save_wp_woocommerce_order_items) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/wp_woocommerce_order_items', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/wp_woocommerce_order_items');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/wp_woocommerce_order_items');
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
	* delete Wp Woocommerce Order Itemss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('wp_woocommerce_order_items_delete');

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
            set_message(cclang('has_been_deleted', 'wp_woocommerce_order_items'), 'success');
        } else {
            set_message(cclang('error_delete', 'wp_woocommerce_order_items'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Wp Woocommerce Order Itemss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('wp_woocommerce_order_items_view');

		$this->data['wp_woocommerce_order_items'] = $this->model_wp_woocommerce_order_items->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Wp Woocommerce Order Items Detail');
		$this->render('backend/standart/administrator/wp_woocommerce_order_items/wp_woocommerce_order_items_view', $this->data);
	}
	
	/**
	* delete Wp Woocommerce Order Itemss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$wp_woocommerce_order_items = $this->model_wp_woocommerce_order_items->find($id);

		
		
		return $this->model_wp_woocommerce_order_items->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('wp_woocommerce_order_items_export');

		$this->model_wp_woocommerce_order_items->export('wp_woocommerce_order_items', 'wp_woocommerce_order_items');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('wp_woocommerce_order_items_export');

		$this->model_wp_woocommerce_order_items->pdf('wp_woocommerce_order_items', 'wp_woocommerce_order_items');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('wp_woocommerce_order_items_export');

		$table = $title = 'wp_woocommerce_order_items';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_wp_woocommerce_order_items->find($id);
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


/* End of file wp_woocommerce_order_items.php */
/* Location: ./application/controllers/administrator/Wp Woocommerce Order Items.php */