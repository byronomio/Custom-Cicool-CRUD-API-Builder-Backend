<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Api Orders Controller
*| --------------------------------------------------------------------------
*| Api Orders site
*|
*/
class Api_orders extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_api_orders');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Api Orderss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('api_orders_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['api_orderss'] = $this->model_api_orders->get($filter, $field, $this->limit_page, $offset);
		$this->data['api_orders_counts'] = $this->model_api_orders->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/api_orders/index/',
			'total_rows'   => $this->model_api_orders->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Api Orders List');
		$this->render('backend/standart/administrator/api_orders/api_orders_list', $this->data);
	}
	
	/**
	* Add new api_orderss
	*
	*/
	public function add()
	{
		$this->is_allowed('api_orders_add');

		$this->template->title('Api Orders New');
		$this->render('backend/standart/administrator/api_orders/api_orders_add', $this->data);
	}

	/**
	* Add New Api Orderss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('api_orders_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('user_id', 'User Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('order_number', 'Order Number', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('order_parent_id', 'Order Parent Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_status', 'Order Status', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_currency', 'Order Currency', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_version', 'Order Version', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_payment_method', 'Order Payment Method', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_payment_method_title', 'Order Payment Method Title', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_date_created', 'Order Date Created', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_date_modified', 'Order Date Modified', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_timestamp_created', 'Order Timestamp Created', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_timestamp_modified', 'Order Timestamp Modified', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_discount_total', 'Order Discount Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_discount_tax', 'Order Discount Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_total', 'Order Shipping Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_tax', 'Order Shipping Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_total_tax', 'Order Total Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_customer_id', 'Order Customer Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_first_name', 'Order Billing First Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_last_name', 'Order Billing Last Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_company', 'Order Billing Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_address_1', 'Order Billing Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_city', 'Order Billing City', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_state', 'Order Billing State', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_postcode', 'Order Billing Postcode', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_country', 'Order Billing Country', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_email', 'Order Billing Email', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_phone', 'Order Billing Phone', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_first_name', 'Order Shipping First Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_last_name', 'Order Shipping Last Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_company', 'Order Shipping Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_address_1', 'Order Shipping Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_address_2', 'Order Shipping Address 2', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_city', 'Order Shipping City', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_state', 'Order Shipping State', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_postcode', 'Order Shipping Postcode', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_country', 'Order Shipping Country', 'trim|max_length[255]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'user_id' => $this->input->post('user_id'),
				'order_number' => $this->input->post('order_number'),
				'order_parent_id' => $this->input->post('order_parent_id'),
				'order_status' => $this->input->post('order_status'),
				'order_currency' => $this->input->post('order_currency'),
				'order_version' => $this->input->post('order_version'),
				'order_payment_method' => $this->input->post('order_payment_method'),
				'order_payment_method_title' => $this->input->post('order_payment_method_title'),
				'order_date_created' => $this->input->post('order_date_created'),
				'order_date_modified' => $this->input->post('order_date_modified'),
				'order_timestamp_created' => $this->input->post('order_timestamp_created'),
				'order_timestamp_modified' => $this->input->post('order_timestamp_modified'),
				'order_discount_total' => $this->input->post('order_discount_total'),
				'order_discount_tax' => $this->input->post('order_discount_tax'),
				'order_shipping_total' => $this->input->post('order_shipping_total'),
				'order_shipping_tax' => $this->input->post('order_shipping_tax'),
				'order_total_tax' => $this->input->post('order_total_tax'),
				'order_customer_id' => $this->input->post('order_customer_id'),
				'order_billing_first_name' => $this->input->post('order_billing_first_name'),
				'order_billing_last_name' => $this->input->post('order_billing_last_name'),
				'order_billing_company' => $this->input->post('order_billing_company'),
				'order_billing_address_1' => $this->input->post('order_billing_address_1'),
				'order_billing_city' => $this->input->post('order_billing_city'),
				'order_billing_state' => $this->input->post('order_billing_state'),
				'order_billing_postcode' => $this->input->post('order_billing_postcode'),
				'order_billing_country' => $this->input->post('order_billing_country'),
				'order_billing_email' => $this->input->post('order_billing_email'),
				'order_billing_phone' => $this->input->post('order_billing_phone'),
				'order_shipping_first_name' => $this->input->post('order_shipping_first_name'),
				'order_shipping_last_name' => $this->input->post('order_shipping_last_name'),
				'order_shipping_company' => $this->input->post('order_shipping_company'),
				'order_shipping_address_1' => $this->input->post('order_shipping_address_1'),
				'order_shipping_address_2' => $this->input->post('order_shipping_address_2'),
				'order_shipping_city' => $this->input->post('order_shipping_city'),
				'order_shipping_state' => $this->input->post('order_shipping_state'),
				'order_shipping_postcode' => $this->input->post('order_shipping_postcode'),
				'order_shipping_country' => $this->input->post('order_shipping_country'),
			];

			
			$save_api_orders = $this->model_api_orders->store($save_data);
            

			if ($save_api_orders) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_api_orders;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/api_orders/edit/' . $save_api_orders, 'Edit Api Orders'),
						anchor('administrator/api_orders', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/api_orders/edit/' . $save_api_orders, 'Edit Api Orders')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/api_orders');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/api_orders');
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
	* Update view Api Orderss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('api_orders_update');

		$this->data['api_orders'] = $this->model_api_orders->find($id);

		$this->template->title('Api Orders Update');
		$this->render('backend/standart/administrator/api_orders/api_orders_update', $this->data);
	}

	/**
	* Update Api Orderss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('api_orders_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('user_id', 'User Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('order_number', 'Order Number', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('order_parent_id', 'Order Parent Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_status', 'Order Status', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_currency', 'Order Currency', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_version', 'Order Version', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_payment_method', 'Order Payment Method', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_payment_method_title', 'Order Payment Method Title', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_date_created', 'Order Date Created', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_date_modified', 'Order Date Modified', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_timestamp_created', 'Order Timestamp Created', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_timestamp_modified', 'Order Timestamp Modified', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_discount_total', 'Order Discount Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_discount_tax', 'Order Discount Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_total', 'Order Shipping Total', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_tax', 'Order Shipping Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_total_tax', 'Order Total Tax', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_customer_id', 'Order Customer Id', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_first_name', 'Order Billing First Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_last_name', 'Order Billing Last Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_company', 'Order Billing Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_address_1', 'Order Billing Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_city', 'Order Billing City', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_state', 'Order Billing State', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_postcode', 'Order Billing Postcode', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_country', 'Order Billing Country', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_email', 'Order Billing Email', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_billing_phone', 'Order Billing Phone', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_first_name', 'Order Shipping First Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_last_name', 'Order Shipping Last Name', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_company', 'Order Shipping Company', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_address_1', 'Order Shipping Address 1', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_address_2', 'Order Shipping Address 2', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_city', 'Order Shipping City', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_state', 'Order Shipping State', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_postcode', 'Order Shipping Postcode', 'trim|max_length[255]');
		$this->form_validation->set_rules('order_shipping_country', 'Order Shipping Country', 'trim|max_length[255]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'user_id' => $this->input->post('user_id'),
				'order_number' => $this->input->post('order_number'),
				'order_parent_id' => $this->input->post('order_parent_id'),
				'order_status' => $this->input->post('order_status'),
				'order_currency' => $this->input->post('order_currency'),
				'order_version' => $this->input->post('order_version'),
				'order_payment_method' => $this->input->post('order_payment_method'),
				'order_payment_method_title' => $this->input->post('order_payment_method_title'),
				'order_date_created' => $this->input->post('order_date_created'),
				'order_date_modified' => $this->input->post('order_date_modified'),
				'order_timestamp_created' => $this->input->post('order_timestamp_created'),
				'order_timestamp_modified' => $this->input->post('order_timestamp_modified'),
				'order_discount_total' => $this->input->post('order_discount_total'),
				'order_discount_tax' => $this->input->post('order_discount_tax'),
				'order_shipping_total' => $this->input->post('order_shipping_total'),
				'order_shipping_tax' => $this->input->post('order_shipping_tax'),
				'order_total_tax' => $this->input->post('order_total_tax'),
				'order_customer_id' => $this->input->post('order_customer_id'),
				'order_billing_first_name' => $this->input->post('order_billing_first_name'),
				'order_billing_last_name' => $this->input->post('order_billing_last_name'),
				'order_billing_company' => $this->input->post('order_billing_company'),
				'order_billing_address_1' => $this->input->post('order_billing_address_1'),
				'order_billing_city' => $this->input->post('order_billing_city'),
				'order_billing_state' => $this->input->post('order_billing_state'),
				'order_billing_postcode' => $this->input->post('order_billing_postcode'),
				'order_billing_country' => $this->input->post('order_billing_country'),
				'order_billing_email' => $this->input->post('order_billing_email'),
				'order_billing_phone' => $this->input->post('order_billing_phone'),
				'order_shipping_first_name' => $this->input->post('order_shipping_first_name'),
				'order_shipping_last_name' => $this->input->post('order_shipping_last_name'),
				'order_shipping_company' => $this->input->post('order_shipping_company'),
				'order_shipping_address_1' => $this->input->post('order_shipping_address_1'),
				'order_shipping_address_2' => $this->input->post('order_shipping_address_2'),
				'order_shipping_city' => $this->input->post('order_shipping_city'),
				'order_shipping_state' => $this->input->post('order_shipping_state'),
				'order_shipping_postcode' => $this->input->post('order_shipping_postcode'),
				'order_shipping_country' => $this->input->post('order_shipping_country'),
			];

			
			$save_api_orders = $this->model_api_orders->change($id, $save_data);

			if ($save_api_orders) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/api_orders', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/api_orders');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/api_orders');
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
	* delete Api Orderss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('api_orders_delete');

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
            set_message(cclang('has_been_deleted', 'api_orders'), 'success');
        } else {
            set_message(cclang('error_delete', 'api_orders'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Api Orderss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('api_orders_view');

		$this->data['api_orders'] = $this->model_api_orders->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Api Orders Detail');
		$this->render('backend/standart/administrator/api_orders/api_orders_view', $this->data);
	}
	
	/**
	* delete Api Orderss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$api_orders = $this->model_api_orders->find($id);

		
		
		return $this->model_api_orders->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('api_orders_export');

		$this->model_api_orders->export('api_orders', 'api_orders');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('api_orders_export');

		$this->model_api_orders->pdf('api_orders', 'api_orders');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('api_orders_export');

		$table = $title = 'api_orders';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_api_orders->find($id);
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


/* End of file api_orders.php */
/* Location: ./application/controllers/administrator/Api Orders.php */