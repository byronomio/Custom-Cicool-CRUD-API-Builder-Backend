<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Asc Products Controller
*| --------------------------------------------------------------------------
*| Asc Products site
*|
*/
class Asc_products extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_asc_products');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Asc Productss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('asc_products_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['asc_productss'] = $this->model_asc_products->get($filter, $field, $this->limit_page, $offset);
		$this->data['asc_products_counts'] = $this->model_asc_products->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/asc_products/index/',
			'total_rows'   => $this->model_asc_products->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Asc Products List');
		$this->render('backend/standart/administrator/asc_products/asc_products_list', $this->data);
	}
	
	/**
	* Add new asc_productss
	*
	*/
	public function add()
	{
		$this->is_allowed('asc_products_add');

		$this->template->title('Asc Products New');
		$this->render('backend/standart/administrator/asc_products/asc_products_add', $this->data);
	}

	/**
	* Add New Asc Productss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('asc_products_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('id', 'Id', 'trim|max_length[24]');
		$this->form_validation->set_rules('partno_1', 'Partno 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('fulldesc_1', 'Fulldesc 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('shortdes_1', 'Shortdes 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('price_1', 'Price 1', 'trim|max_length[20]');
		$this->form_validation->set_rules('sopfree_2', 'Sopfree 2', 'trim|max_length[24]');
		$this->form_validation->set_rules('prodanal_1', 'Prodanal 1', 'trim|max_length[24]');
		$this->form_validation->set_rules('status_1', 'Status 1', 'trim|max_length[24]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'partno_1' => $this->input->post('partno_1'),
				'fulldesc_1' => $this->input->post('fulldesc_1'),
				'shortdes_1' => $this->input->post('shortdes_1'),
				'price_1' => $this->input->post('price_1'),
				'sopfree_2' => $this->input->post('sopfree_2'),
				'prodanal_1' => $this->input->post('prodanal_1'),
				'status_1' => $this->input->post('status_1'),
			];

			
			$save_asc_products = $this->model_asc_products->store($save_data);
            

			if ($save_asc_products) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_asc_products;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/asc_products/edit/' . $save_asc_products, 'Edit Asc Products'),
						anchor('administrator/asc_products', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/asc_products/edit/' . $save_asc_products, 'Edit Asc Products')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/asc_products');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/asc_products');
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
	* Update view Asc Productss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('asc_products_update');

		$this->data['asc_products'] = $this->model_asc_products->find($id);

		$this->template->title('Asc Products Update');
		$this->render('backend/standart/administrator/asc_products/asc_products_update', $this->data);
	}

	/**
	* Update Asc Productss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('asc_products_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('id', 'Id', 'trim|max_length[24]');
		$this->form_validation->set_rules('partno_1', 'Partno 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('fulldesc_1', 'Fulldesc 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('shortdes_1', 'Shortdes 1', 'trim|max_length[600]');
		$this->form_validation->set_rules('price_1', 'Price 1', 'trim|max_length[20]');
		$this->form_validation->set_rules('sopfree_2', 'Sopfree 2', 'trim|max_length[24]');
		$this->form_validation->set_rules('prodanal_1', 'Prodanal 1', 'trim|max_length[24]');
		$this->form_validation->set_rules('status_1', 'Status 1', 'trim|max_length[24]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'partno_1' => $this->input->post('partno_1'),
				'fulldesc_1' => $this->input->post('fulldesc_1'),
				'shortdes_1' => $this->input->post('shortdes_1'),
				'price_1' => $this->input->post('price_1'),
				'sopfree_2' => $this->input->post('sopfree_2'),
				'prodanal_1' => $this->input->post('prodanal_1'),
				'status_1' => $this->input->post('status_1'),
			];

			
			$save_asc_products = $this->model_asc_products->change($id, $save_data);

			if ($save_asc_products) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/asc_products', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/asc_products');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/asc_products');
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
	* delete Asc Productss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('asc_products_delete');

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
            set_message(cclang('has_been_deleted', 'asc_products'), 'success');
        } else {
            set_message(cclang('error_delete', 'asc_products'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Asc Productss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('asc_products_view');

		$this->data['asc_products'] = $this->model_asc_products->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Asc Products Detail');
		$this->render('backend/standart/administrator/asc_products/asc_products_view', $this->data);
	}
	
	/**
	* delete Asc Productss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$asc_products = $this->model_asc_products->find($id);

		
		
		return $this->model_asc_products->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('asc_products_export');

		$this->model_asc_products->export('asc_products', 'asc_products');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('asc_products_export');

		$this->model_asc_products->pdf('asc_products', 'asc_products');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('asc_products_export');

		$table = $title = 'asc_products';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_asc_products->find($id);
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


/* End of file asc_products.php */
/* Location: ./application/controllers/administrator/Asc Products.php */