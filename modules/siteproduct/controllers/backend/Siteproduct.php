<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Siteproduct Controller
*| --------------------------------------------------------------------------
*| Siteproduct site
*|
*/
class Siteproduct extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_siteproduct');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Siteproducts
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('siteproduct_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['siteproducts'] = $this->model_siteproduct->get($filter, $field, $this->limit_page, $offset);
		$this->data['siteproduct_counts'] = $this->model_siteproduct->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/siteproduct/index/',
			'total_rows'   => $this->model_siteproduct->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Products List');
		$this->render('backend/standart/administrator/siteproduct/siteproduct_list', $this->data);
	}
	
	/**
	* Add new siteproducts
	*
	*/
	public function add()
	{
		$this->is_allowed('siteproduct_add');

		$this->template->title('Products New');
		$this->render('backend/standart/administrator/siteproduct/siteproduct_add', $this->data);
	}

	/**
	* Add New Siteproducts
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('siteproduct_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('product_name', 'Name', 'trim|max_length[250]');
		$this->form_validation->set_rules('sku', 'SKU', 'trim|max_length[250]');
		$this->form_validation->set_rules('category_main[]', 'Parent', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('category_sub[]', 'Child', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('brand[]', 'Brands', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('simpleorvariant[]', 'Type', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[39]');
		$this->form_validation->set_rules('description', 'Desc', 'trim|required');
		$this->form_validation->set_rules('siteproduct_first_image_name', 'First', 'trim|required');
		$this->form_validation->set_rules('website[]', 'Websites', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('status[]', 'Status', 'trim|required|max_length[250]');
		

		if ($this->form_validation->run()) {
			$siteproduct_first_image_uuid = $this->input->post('siteproduct_first_image_uuid');
			$siteproduct_first_image_name = $this->input->post('siteproduct_first_image_name');
			$siteproduct_second_image_uuid = $this->input->post('siteproduct_second_image_uuid');
			$siteproduct_second_image_name = $this->input->post('siteproduct_second_image_name');
		
			$save_data = [
				'id' => $this->input->post('id'),
				'product_name' => $this->input->post('product_name'),
				'sku' => $this->input->post('sku'),
				'category_main' => implode(',', (array) $this->input->post('category_main')),
				'category_sub' => implode(',', (array) $this->input->post('category_sub')),
				'brand' => implode(',', (array) $this->input->post('brand')),
				'simpleorvariant' => implode(',', (array) $this->input->post('simpleorvariant')),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'whatsinthebox' => $this->input->post('whatsinthebox'),
				'website' => implode(',', (array) $this->input->post('website')),
				'status' => implode(',', (array) $this->input->post('status')),
				'created_at' => date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/siteproduct/')) {
				mkdir(FCPATH . '/uploads/siteproduct/');
			}

			if (!empty($siteproduct_first_image_name)) {
				$siteproduct_first_image_name_copy = date('YmdHis') . '-' . $siteproduct_first_image_name;

				rename(FCPATH . 'uploads/tmp/' . $siteproduct_first_image_uuid . '/' . $siteproduct_first_image_name, 
						FCPATH . 'uploads/siteproduct/' . $siteproduct_first_image_name_copy);

				if (!is_file(FCPATH . '/uploads/siteproduct/' . $siteproduct_first_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['first_image'] = $siteproduct_first_image_name_copy;
			}
		
			if (!empty($siteproduct_second_image_name)) {
				$siteproduct_second_image_name_copy = date('YmdHis') . '-' . $siteproduct_second_image_name;

				rename(FCPATH . 'uploads/tmp/' . $siteproduct_second_image_uuid . '/' . $siteproduct_second_image_name, 
						FCPATH . 'uploads/siteproduct/' . $siteproduct_second_image_name_copy);

				if (!is_file(FCPATH . '/uploads/siteproduct/' . $siteproduct_second_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['second_image'] = $siteproduct_second_image_name_copy;
			}
		
			if (count((array) $this->input->post('siteproduct_gallery_name'))) {
				foreach ((array) $_POST['siteproduct_gallery_name'] as $idx => $file_name) {
					$siteproduct_gallery_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['siteproduct_gallery_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/siteproduct/' . $siteproduct_gallery_name_copy);

					$listed_image[] = $siteproduct_gallery_name_copy;

					if (!is_file(FCPATH . '/uploads/siteproduct/' . $siteproduct_gallery_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['gallery'] = implode($listed_image, ',');
			}
		
			
			$save_siteproduct = $this->model_siteproduct->store($save_data);
            

			if ($save_siteproduct) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_siteproduct;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/siteproduct/edit/' . $save_siteproduct, 'Edit Siteproduct'),
						anchor('administrator/siteproduct', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/siteproduct/edit/' . $save_siteproduct, 'Edit Siteproduct')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/siteproduct');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/siteproduct');
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
	* Update view Siteproducts
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('siteproduct_update');

		$this->data['siteproduct'] = $this->model_siteproduct->find($id);

		$this->template->title('Products Update');
		$this->render('backend/standart/administrator/siteproduct/siteproduct_update', $this->data);
	}

	/**
	* Update Siteproducts
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('siteproduct_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('product_name', 'Name', 'trim|max_length[250]');
		$this->form_validation->set_rules('sku', 'SKU', 'trim|max_length[250]');
		$this->form_validation->set_rules('category_main[]', 'Parent', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('category_sub[]', 'Child', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('brand[]', 'Brands', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('simpleorvariant[]', 'Type', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[39]');
		$this->form_validation->set_rules('description', 'Desc', 'trim|required');
		$this->form_validation->set_rules('siteproduct_first_image_name', 'First', 'trim|required');
		$this->form_validation->set_rules('website[]', 'Websites', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('status[]', 'Status', 'trim|required|max_length[250]');
		
		if ($this->form_validation->run()) {
			$siteproduct_first_image_uuid = $this->input->post('siteproduct_first_image_uuid');
			$siteproduct_first_image_name = $this->input->post('siteproduct_first_image_name');
			$siteproduct_second_image_uuid = $this->input->post('siteproduct_second_image_uuid');
			$siteproduct_second_image_name = $this->input->post('siteproduct_second_image_name');
		
			$save_data = [
				'id' => $this->input->post('id'),
				'product_name' => $this->input->post('product_name'),
				'sku' => $this->input->post('sku'),
				'category_main' => implode(',', (array) $this->input->post('category_main')),
				'category_sub' => implode(',', (array) $this->input->post('category_sub')),
				'brand' => implode(',', (array) $this->input->post('brand')),
				'simpleorvariant' => implode(',', (array) $this->input->post('simpleorvariant')),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'whatsinthebox' => $this->input->post('whatsinthebox'),
				'website' => implode(',', (array) $this->input->post('website')),
				'status' => implode(',', (array) $this->input->post('status')),
				'created_at' => date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/siteproduct/')) {
				mkdir(FCPATH . '/uploads/siteproduct/');
			}

			if (!empty($siteproduct_first_image_uuid)) {
				$siteproduct_first_image_name_copy = date('YmdHis') . '-' . $siteproduct_first_image_name;

				rename(FCPATH . 'uploads/tmp/' . $siteproduct_first_image_uuid . '/' . $siteproduct_first_image_name, 
						FCPATH . 'uploads/siteproduct/' . $siteproduct_first_image_name_copy);

				if (!is_file(FCPATH . '/uploads/siteproduct/' . $siteproduct_first_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['first_image'] = $siteproduct_first_image_name_copy;
			}
		
			if (!empty($siteproduct_second_image_uuid)) {
				$siteproduct_second_image_name_copy = date('YmdHis') . '-' . $siteproduct_second_image_name;

				rename(FCPATH . 'uploads/tmp/' . $siteproduct_second_image_uuid . '/' . $siteproduct_second_image_name, 
						FCPATH . 'uploads/siteproduct/' . $siteproduct_second_image_name_copy);

				if (!is_file(FCPATH . '/uploads/siteproduct/' . $siteproduct_second_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['second_image'] = $siteproduct_second_image_name_copy;
			}
		
			$listed_image = [];
			if (count((array) $this->input->post('siteproduct_gallery_name'))) {
				foreach ((array) $_POST['siteproduct_gallery_name'] as $idx => $file_name) {
					if (isset($_POST['siteproduct_gallery_uuid'][$idx]) AND !empty($_POST['siteproduct_gallery_uuid'][$idx])) {
						$siteproduct_gallery_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['siteproduct_gallery_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/siteproduct/' . $siteproduct_gallery_name_copy);

						$listed_image[] = $siteproduct_gallery_name_copy;

						if (!is_file(FCPATH . '/uploads/siteproduct/' . $siteproduct_gallery_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['gallery'] = implode($listed_image, ',');
		
			
			$save_siteproduct = $this->model_siteproduct->change($id, $save_data);

			if ($save_siteproduct) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/siteproduct', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/siteproduct');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/siteproduct');
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
	* delete Siteproducts
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('siteproduct_delete');

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
            set_message(cclang('has_been_deleted', 'siteproduct'), 'success');
        } else {
            set_message(cclang('error_delete', 'siteproduct'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Siteproducts
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('siteproduct_view');

		$this->data['siteproduct'] = $this->model_siteproduct->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Products Detail');
		$this->render('backend/standart/administrator/siteproduct/siteproduct_view', $this->data);
	}
	
	/**
	* delete Siteproducts
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$siteproduct = $this->model_siteproduct->find($id);

		if (!empty($siteproduct->first_image)) {
			$path = FCPATH . '/uploads/siteproduct/' . $siteproduct->first_image;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($siteproduct->second_image)) {
			$path = FCPATH . '/uploads/siteproduct/' . $siteproduct->second_image;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		if (!empty($siteproduct->gallery)) {
			foreach ((array) explode(',', $siteproduct->gallery) as $filename) {
				$path = FCPATH . '/uploads/siteproduct/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_siteproduct->remove($id);
	}
	
	/**
	* Upload Image Siteproduct	* 
	* @return JSON
	*/
	public function upload_first_image_file()
	{
		if (!$this->is_allowed('siteproduct_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'siteproduct',
		]);
	}

	/**
	* Delete Image Siteproduct	* 
	* @return JSON
	*/
	public function delete_first_image_file($uuid)
	{
		if (!$this->is_allowed('siteproduct_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'first_image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'siteproduct',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/siteproduct/'
        ]);
	}

	/**
	* Get Image Siteproduct	* 
	* @return JSON
	*/
	public function get_first_image_file($id)
	{
		if (!$this->is_allowed('siteproduct_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$siteproduct = $this->model_siteproduct->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'first_image', 
            'table_name'        => 'siteproduct',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/siteproduct/',
            'delete_endpoint'   => 'administrator/siteproduct/delete_first_image_file'
        ]);
	}
	
	/**
	* Upload Image Siteproduct	* 
	* @return JSON
	*/
	public function upload_second_image_file()
	{
		if (!$this->is_allowed('siteproduct_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'siteproduct',
		]);
	}

	/**
	* Delete Image Siteproduct	* 
	* @return JSON
	*/
	public function delete_second_image_file($uuid)
	{
		if (!$this->is_allowed('siteproduct_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'second_image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'siteproduct',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/siteproduct/'
        ]);
	}

	/**
	* Get Image Siteproduct	* 
	* @return JSON
	*/
	public function get_second_image_file($id)
	{
		if (!$this->is_allowed('siteproduct_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$siteproduct = $this->model_siteproduct->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'second_image', 
            'table_name'        => 'siteproduct',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/siteproduct/',
            'delete_endpoint'   => 'administrator/siteproduct/delete_second_image_file'
        ]);
	}
	
	
	/**
	* Upload Image Siteproduct	* 
	* @return JSON
	*/
	public function upload_gallery_file()
	{
		if (!$this->is_allowed('siteproduct_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'siteproduct',
		]);
	}

	/**
	* Delete Image Siteproduct	* 
	* @return JSON
	*/
	public function delete_gallery_file($uuid)
	{
		if (!$this->is_allowed('siteproduct_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'gallery', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'siteproduct',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/siteproduct/'
        ]);
	}

	/**
	* Get Image Siteproduct	* 
	* @return JSON
	*/
	public function get_gallery_file($id)
	{
		if (!$this->is_allowed('siteproduct_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$siteproduct = $this->model_siteproduct->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'gallery', 
            'table_name'        => 'siteproduct',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/siteproduct/',
            'delete_endpoint'   => 'administrator/siteproduct/delete_gallery_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('siteproduct_export');

		$this->model_siteproduct->export('siteproduct', 'siteproduct');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('siteproduct_export');

		$this->model_siteproduct->pdf('siteproduct', 'siteproduct');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('siteproduct_export');

		$table = $title = 'siteproduct';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_siteproduct->find($id);
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


/* End of file siteproduct.php */
/* Location: ./application/controllers/administrator/Siteproduct.php */