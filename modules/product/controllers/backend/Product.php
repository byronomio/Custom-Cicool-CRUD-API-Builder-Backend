<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Product Controller
*| --------------------------------------------------------------------------
*| Product site
*|
*/
class Product extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_product');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Products
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('product_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['products'] = $this->model_product->get($filter, $field, $this->limit_page, $offset);
		$this->data['product_counts'] = $this->model_product->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/product/index/',
			'total_rows'   => $this->model_product->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Product List');
		$this->render('backend/standart/administrator/product/product_list', $this->data);
	}
	
	/**
	* Add new products
	*
	*/
	public function add()
	{
		$this->is_allowed('product_add');

		$this->template->title('Product New');
		$this->render('backend/standart/administrator/product/product_add', $this->data);
	}

	/**
	* Add New Products
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('product_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('sku', 'Sku', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('url', 'Url', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('weight', 'Weight', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[39]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('product_image_name', 'Image', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('stock', 'Stock', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('variant', 'Variant', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('created_at', 'Created At', 'trim|required');
		

		if ($this->form_validation->run()) {
			$product_image_uuid = $this->input->post('product_image_uuid');
			$product_image_name = $this->input->post('product_image_name');
		
			$save_data = [
				'product_name' => $this->input->post('product_name'),
				'sku' => $this->input->post('sku'),
				'url' => $this->input->post('url'),
				'weight' => $this->input->post('weight'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'stock' => $this->input->post('stock'),
				'variant' => $this->input->post('variant'),
				'created_at' => $this->input->post('created_at'),
			];

			if (!is_dir(FCPATH . '/uploads/product/')) {
				mkdir(FCPATH . '/uploads/product/');
			}

			if (!empty($product_image_name)) {
				$product_image_name_copy = date('YmdHis') . '-' . $product_image_name;

				rename(FCPATH . 'uploads/tmp/' . $product_image_uuid . '/' . $product_image_name, 
						FCPATH . 'uploads/product/' . $product_image_name_copy);

				if (!is_file(FCPATH . '/uploads/product/' . $product_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['image'] = $product_image_name_copy;
			}
		
			
			$save_product = $this->model_product->store($save_data);
            

			if ($save_product) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_product;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/product/edit/' . $save_product, 'Edit Product'),
						anchor('administrator/product', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/product/edit/' . $save_product, 'Edit Product')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/product');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/product');
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
	* Update view Products
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('product_update');

		$this->data['product'] = $this->model_product->find($id);

		$this->template->title('Product Update');
		$this->render('backend/standart/administrator/product/product_update', $this->data);
	}

	/**
	* Update Products
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('product_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('sku', 'Sku', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('url', 'Url', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('weight', 'Weight', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[39]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('product_image_name', 'Image', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('stock', 'Stock', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('variant', 'Variant', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('created_at', 'Created At', 'trim|required');
		
		if ($this->form_validation->run()) {
			$product_image_uuid = $this->input->post('product_image_uuid');
			$product_image_name = $this->input->post('product_image_name');
		
			$save_data = [
				'product_name' => $this->input->post('product_name'),
				'sku' => $this->input->post('sku'),
				'url' => $this->input->post('url'),
				'weight' => $this->input->post('weight'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'stock' => $this->input->post('stock'),
				'variant' => $this->input->post('variant'),
				'created_at' => $this->input->post('created_at'),
			];

			if (!is_dir(FCPATH . '/uploads/product/')) {
				mkdir(FCPATH . '/uploads/product/');
			}

			if (!empty($product_image_uuid)) {
				$product_image_name_copy = date('YmdHis') . '-' . $product_image_name;

				rename(FCPATH . 'uploads/tmp/' . $product_image_uuid . '/' . $product_image_name, 
						FCPATH . 'uploads/product/' . $product_image_name_copy);

				if (!is_file(FCPATH . '/uploads/product/' . $product_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['image'] = $product_image_name_copy;
			}
		
			
			$save_product = $this->model_product->change($id, $save_data);

			if ($save_product) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/product', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/product');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/product');
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
	* delete Products
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('product_delete');

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
            set_message(cclang('has_been_deleted', 'product'), 'success');
        } else {
            set_message(cclang('error_delete', 'product'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Products
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('product_view');

		$this->data['product'] = $this->model_product->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Product Detail');
		$this->render('backend/standart/administrator/product/product_view', $this->data);
	}
	
	/**
	* delete Products
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$product = $this->model_product->find($id);

		if (!empty($product->image)) {
			$path = FCPATH . '/uploads/product/' . $product->image;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_product->remove($id);
	}
	
	/**
	* Upload Image Product	* 
	* @return JSON
	*/
	public function upload_image_file()
	{
		if (!$this->is_allowed('product_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'product',
		]);
	}

	/**
	* Delete Image Product	* 
	* @return JSON
	*/
	public function delete_image_file($uuid)
	{
		if (!$this->is_allowed('product_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'product',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/product/'
        ]);
	}

	/**
	* Get Image Product	* 
	* @return JSON
	*/
	public function get_image_file($id)
	{
		if (!$this->is_allowed('product_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$product = $this->model_product->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'image', 
            'table_name'        => 'product',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/product/',
            'delete_endpoint'   => 'administrator/product/delete_image_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('product_export');

		$this->model_product->export('product', 'product');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('product_export');

		$this->model_product->pdf('product', 'product');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('product_export');

		$table = $title = 'product';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_product->find($id);
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


/* End of file product.php */
/* Location: ./application/controllers/administrator/Product.php */