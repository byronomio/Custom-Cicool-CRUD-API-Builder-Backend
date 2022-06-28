<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Api Orders Products Controller
*| --------------------------------------------------------------------------
*| Api Orders Products site
*|
*/
class Api_orders_products extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_api_orders_products');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Api Orders Productss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('api_orders_products_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['api_orders_productss'] = $this->model_api_orders_products->get($filter, $field, $this->limit_page, $offset);
		$this->data['api_orders_products_counts'] = $this->model_api_orders_products->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/api_orders_products/index/',
			'total_rows'   => $this->model_api_orders_products->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Api Orders Products List');
		$this->render('backend/standart/administrator/api_orders_products/api_orders_products_list', $this->data);
	}
	
	/**
	* Add new api_orders_productss
	*
	*/
	public function add()
	{
		$this->is_allowed('api_orders_products_add');

		$this->template->title('Api Orders Products New');
		$this->render('backend/standart/administrator/api_orders_products/api_orders_products_add', $this->data);
	}

	/**
	* Add New Api Orders Productss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('api_orders_products_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('id', 'Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('item_id', 'Item Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('item_name', 'Item Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('item_type', 'Item Type', 'trim|max_length[255]');
		$this->form_validation->set_rules('item_data', 'Item Data', 'trim|max_length[255]');
		$this->form_validation->set_rules('variation_id', 'Variation Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|max_length[255]');
		$this->form_validation->set_rules('tax_class', 'Tax Class', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_subtotal', 'Line Subtotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_subtotal_tax', 'Line Subtotal Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_total', 'Line Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_total_tax', 'Line Total Tax', 'trim|max_length[255]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'item_id' => $this->input->post('item_id'),
				'item_name' => $this->input->post('item_name'),
				'item_type' => $this->input->post('item_type'),
				'item_data' => $this->input->post('item_data'),
				'variation_id' => $this->input->post('variation_id'),
				'quantity' => $this->input->post('quantity'),
				'tax_class' => $this->input->post('tax_class'),
				'line_subtotal' => $this->input->post('line_subtotal'),
				'line_subtotal_tax' => $this->input->post('line_subtotal_tax'),
				'line_total' => $this->input->post('line_total'),
				'line_total_tax' => $this->input->post('line_total_tax'),
			];

			
			$save_api_orders_products = $this->model_api_orders_products->store($save_data);
            

			if ($save_api_orders_products) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_api_orders_products;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/api_orders_products/edit/' . $save_api_orders_products, 'Edit Api Orders Products'),
						anchor('administrator/api_orders_products', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/api_orders_products/edit/' . $save_api_orders_products, 'Edit Api Orders Products')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/api_orders_products');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/api_orders_products');
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
	* Update view Api Orders Productss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('api_orders_products_update');

		$this->data['api_orders_products'] = $this->model_api_orders_products->find($id);

		$this->template->title('Api Orders Products Update');
		$this->render('backend/standart/administrator/api_orders_products/api_orders_products_update', $this->data);
	}

	/**
	* Update Api Orders Productss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('api_orders_products_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('id', 'Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('item_id', 'Item Id', 'trim|max_length[20]');
		$this->form_validation->set_rules('item_name', 'Item Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('item_type', 'Item Type', 'trim|max_length[255]');
		$this->form_validation->set_rules('item_data', 'Item Data', 'trim|max_length[255]');
		$this->form_validation->set_rules('variation_id', 'Variation Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|max_length[255]');
		$this->form_validation->set_rules('tax_class', 'Tax Class', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_subtotal', 'Line Subtotal', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_subtotal_tax', 'Line Subtotal Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_total', 'Line Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('line_total_tax', 'Line Total Tax', 'trim|max_length[255]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'item_id' => $this->input->post('item_id'),
				'item_name' => $this->input->post('item_name'),
				'item_type' => $this->input->post('item_type'),
				'item_data' => $this->input->post('item_data'),
				'variation_id' => $this->input->post('variation_id'),
				'quantity' => $this->input->post('quantity'),
				'tax_class' => $this->input->post('tax_class'),
				'line_subtotal' => $this->input->post('line_subtotal'),
				'line_subtotal_tax' => $this->input->post('line_subtotal_tax'),
				'line_total' => $this->input->post('line_total'),
				'line_total_tax' => $this->input->post('line_total_tax'),
			];

			
			$save_api_orders_products = $this->model_api_orders_products->change($id, $save_data);

			if ($save_api_orders_products) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/api_orders_products', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/api_orders_products');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/api_orders_products');
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
	* delete Api Orders Productss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('api_orders_products_delete');

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
            set_message(cclang('has_been_deleted', 'api_orders_products'), 'success');
        } else {
            set_message(cclang('error_delete', 'api_orders_products'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Api Orders Productss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('api_orders_products_view');

		$this->data['api_orders_products'] = $this->model_api_orders_products->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Api Orders Products Detail');
		$this->render('backend/standart/administrator/api_orders_products/api_orders_products_view', $this->data);
	}
	
	/**
	* delete Api Orders Productss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$api_orders_products = $this->model_api_orders_products->find($id);

		
		
		return $this->model_api_orders_products->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('api_orders_products_export');

		$this->model_api_orders_products->export('api_orders_products', 'api_orders_products');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('api_orders_products_export');

		$this->model_api_orders_products->pdf('api_orders_products', 'api_orders_products');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('api_orders_products_export');

		$table = $title = 'api_orders_products';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_api_orders_products->find($id);
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


/* End of file api_orders_products.php */
/* Location: ./application/controllers/administrator/Api Orders Products.php */