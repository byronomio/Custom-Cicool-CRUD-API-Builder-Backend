<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Lbb Woocommerce Orders Controller
*| --------------------------------------------------------------------------
*| Lbb Woocommerce Orders site
*|
*/
class Lbb_woocommerce_orders extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_lbb_woocommerce_orders');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Lbb Woocommerce Orderss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('lbb_woocommerce_orders_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['lbb_woocommerce_orderss'] = $this->model_lbb_woocommerce_orders->get($filter, $field, $this->limit_page, $offset);
		$this->data['lbb_woocommerce_orders_counts'] = $this->model_lbb_woocommerce_orders->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/lbb_woocommerce_orders/index/',
			'total_rows'   => $this->model_lbb_woocommerce_orders->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Lbb Woocommerce Orders List');
		$this->render('backend/standart/administrator/lbb_woocommerce_orders/lbb_woocommerce_orders_list', $this->data);
	}
	
	/**
	* Add new lbb_woocommerce_orderss
	*
	*/
	public function add()
	{
		$this->is_allowed('lbb_woocommerce_orders_add');

		$this->template->title('Lbb Woocommerce Orders New');
		$this->render('backend/standart/administrator/lbb_woocommerce_orders/lbb_woocommerce_orders_add', $this->data);
	}

	/**
	* Add New Lbb Woocommerce Orderss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('lbb_woocommerce_orders_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('order_key', 'Order Key', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('billing_index', 'Billing Index', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('billing_first_name', 'Billing First Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_last_name', 'Billing Last Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_company', 'Billing Company', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_address_1', 'Billing Address 1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('billing_address_2', 'Billing Address 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_city', 'Billing City', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_state', 'Billing State', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_postcode', 'Billing Postcode', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('billing_country', 'Billing Country', 'trim|required|max_length[2]');
		$this->form_validation->set_rules('billing_email', 'Billing Email', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_phone', 'Billing Phone', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_index', 'Shipping Index', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('shipping_first_name', 'Shipping First Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_last_name', 'Shipping Last Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_company', 'Shipping Company', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_address_1', 'Shipping Address 1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('shipping_address_2', 'Shipping Address 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_state', 'Shipping State', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_postcode', 'Shipping Postcode', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('shipping_country', 'Shipping Country', 'trim|required|max_length[2]');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('payment_method_title', 'Payment Method Title', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('discount_total', 'Discount Total', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('discount_tax', 'Discount Tax', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_total', 'Shipping Total', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_tax', 'Shipping Tax', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('cart_tax', 'Cart Tax', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('total', 'Total', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('version', 'Version', 'trim|required|max_length[16]');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required|max_length[3]');
		$this->form_validation->set_rules('prices_include_tax', 'Prices Include Tax', 'trim|required|max_length[3]');
		$this->form_validation->set_rules('transaction_id', 'Transaction Id', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('customer_ip_address', 'Customer Ip Address', 'trim|required|max_length[40]');
		$this->form_validation->set_rules('customer_user_agent', 'Customer User Agent', 'trim|required');
		$this->form_validation->set_rules('created_via', 'Created Via', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('date_completed', 'Date Completed', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('date_paid', 'Date Paid', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('cart_hash', 'Cart Hash', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('refunded_by', 'Refunded By', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('reason', 'Reason', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'order_key' => $this->input->post('order_key'),
				'customer_id' => $this->input->post('customer_id'),
				'billing_index' => $this->input->post('billing_index'),
				'billing_first_name' => $this->input->post('billing_first_name'),
				'billing_last_name' => $this->input->post('billing_last_name'),
				'billing_company' => $this->input->post('billing_company'),
				'billing_address_1' => $this->input->post('billing_address_1'),
				'billing_address_2' => $this->input->post('billing_address_2'),
				'billing_city' => $this->input->post('billing_city'),
				'billing_state' => $this->input->post('billing_state'),
				'billing_postcode' => $this->input->post('billing_postcode'),
				'billing_country' => $this->input->post('billing_country'),
				'billing_email' => $this->input->post('billing_email'),
				'billing_phone' => $this->input->post('billing_phone'),
				'shipping_index' => $this->input->post('shipping_index'),
				'shipping_first_name' => $this->input->post('shipping_first_name'),
				'shipping_last_name' => $this->input->post('shipping_last_name'),
				'shipping_company' => $this->input->post('shipping_company'),
				'shipping_address_1' => $this->input->post('shipping_address_1'),
				'shipping_address_2' => $this->input->post('shipping_address_2'),
				'shipping_city' => $this->input->post('shipping_city'),
				'shipping_state' => $this->input->post('shipping_state'),
				'shipping_postcode' => $this->input->post('shipping_postcode'),
				'shipping_country' => $this->input->post('shipping_country'),
				'payment_method' => $this->input->post('payment_method'),
				'payment_method_title' => $this->input->post('payment_method_title'),
				'discount_total' => $this->input->post('discount_total'),
				'discount_tax' => $this->input->post('discount_tax'),
				'shipping_total' => $this->input->post('shipping_total'),
				'shipping_tax' => $this->input->post('shipping_tax'),
				'cart_tax' => $this->input->post('cart_tax'),
				'total' => $this->input->post('total'),
				'version' => $this->input->post('version'),
				'currency' => $this->input->post('currency'),
				'prices_include_tax' => $this->input->post('prices_include_tax'),
				'transaction_id' => $this->input->post('transaction_id'),
				'customer_ip_address' => $this->input->post('customer_ip_address'),
				'customer_user_agent' => $this->input->post('customer_user_agent'),
				'created_via' => $this->input->post('created_via'),
				'date_completed' => $this->input->post('date_completed'),
				'date_paid' => $this->input->post('date_paid'),
				'cart_hash' => $this->input->post('cart_hash'),
				'amount' => $this->input->post('amount'),
				'refunded_by' => $this->input->post('refunded_by'),
				'reason' => $this->input->post('reason'),
			];

			
			$save_lbb_woocommerce_orders = $this->model_lbb_woocommerce_orders->store($save_data);
            

			if ($save_lbb_woocommerce_orders) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_lbb_woocommerce_orders;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/lbb_woocommerce_orders/edit/' . $save_lbb_woocommerce_orders, 'Edit Lbb Woocommerce Orders'),
						anchor('administrator/lbb_woocommerce_orders', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/lbb_woocommerce_orders/edit/' . $save_lbb_woocommerce_orders, 'Edit Lbb Woocommerce Orders')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/lbb_woocommerce_orders');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/lbb_woocommerce_orders');
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
	* Update view Lbb Woocommerce Orderss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('lbb_woocommerce_orders_update');

		$this->data['lbb_woocommerce_orders'] = $this->model_lbb_woocommerce_orders->find($id);

		$this->template->title('Lbb Woocommerce Orders Update');
		$this->render('backend/standart/administrator/lbb_woocommerce_orders/lbb_woocommerce_orders_update', $this->data);
	}

	/**
	* Update Lbb Woocommerce Orderss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('lbb_woocommerce_orders_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('order_key', 'Order Key', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('billing_index', 'Billing Index', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('billing_first_name', 'Billing First Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_last_name', 'Billing Last Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_company', 'Billing Company', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_address_1', 'Billing Address 1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('billing_address_2', 'Billing Address 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_city', 'Billing City', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_state', 'Billing State', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('billing_postcode', 'Billing Postcode', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('billing_country', 'Billing Country', 'trim|required|max_length[2]');
		$this->form_validation->set_rules('billing_email', 'Billing Email', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('billing_phone', 'Billing Phone', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_index', 'Shipping Index', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('shipping_first_name', 'Shipping First Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_last_name', 'Shipping Last Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_company', 'Shipping Company', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_address_1', 'Shipping Address 1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('shipping_address_2', 'Shipping Address 2', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_state', 'Shipping State', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_postcode', 'Shipping Postcode', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('shipping_country', 'Shipping Country', 'trim|required|max_length[2]');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('payment_method_title', 'Payment Method Title', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('discount_total', 'Discount Total', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('discount_tax', 'Discount Tax', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_total', 'Shipping Total', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('shipping_tax', 'Shipping Tax', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('cart_tax', 'Cart Tax', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('total', 'Total', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('version', 'Version', 'trim|required|max_length[16]');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required|max_length[3]');
		$this->form_validation->set_rules('prices_include_tax', 'Prices Include Tax', 'trim|required|max_length[3]');
		$this->form_validation->set_rules('transaction_id', 'Transaction Id', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('customer_ip_address', 'Customer Ip Address', 'trim|required|max_length[40]');
		$this->form_validation->set_rules('customer_user_agent', 'Customer User Agent', 'trim|required');
		$this->form_validation->set_rules('created_via', 'Created Via', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('date_completed', 'Date Completed', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('date_paid', 'Date Paid', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('cart_hash', 'Cart Hash', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('refunded_by', 'Refunded By', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('reason', 'Reason', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'order_key' => $this->input->post('order_key'),
				'customer_id' => $this->input->post('customer_id'),
				'billing_index' => $this->input->post('billing_index'),
				'billing_first_name' => $this->input->post('billing_first_name'),
				'billing_last_name' => $this->input->post('billing_last_name'),
				'billing_company' => $this->input->post('billing_company'),
				'billing_address_1' => $this->input->post('billing_address_1'),
				'billing_address_2' => $this->input->post('billing_address_2'),
				'billing_city' => $this->input->post('billing_city'),
				'billing_state' => $this->input->post('billing_state'),
				'billing_postcode' => $this->input->post('billing_postcode'),
				'billing_country' => $this->input->post('billing_country'),
				'billing_email' => $this->input->post('billing_email'),
				'billing_phone' => $this->input->post('billing_phone'),
				'shipping_index' => $this->input->post('shipping_index'),
				'shipping_first_name' => $this->input->post('shipping_first_name'),
				'shipping_last_name' => $this->input->post('shipping_last_name'),
				'shipping_company' => $this->input->post('shipping_company'),
				'shipping_address_1' => $this->input->post('shipping_address_1'),
				'shipping_address_2' => $this->input->post('shipping_address_2'),
				'shipping_city' => $this->input->post('shipping_city'),
				'shipping_state' => $this->input->post('shipping_state'),
				'shipping_postcode' => $this->input->post('shipping_postcode'),
				'shipping_country' => $this->input->post('shipping_country'),
				'payment_method' => $this->input->post('payment_method'),
				'payment_method_title' => $this->input->post('payment_method_title'),
				'discount_total' => $this->input->post('discount_total'),
				'discount_tax' => $this->input->post('discount_tax'),
				'shipping_total' => $this->input->post('shipping_total'),
				'shipping_tax' => $this->input->post('shipping_tax'),
				'cart_tax' => $this->input->post('cart_tax'),
				'total' => $this->input->post('total'),
				'version' => $this->input->post('version'),
				'currency' => $this->input->post('currency'),
				'prices_include_tax' => $this->input->post('prices_include_tax'),
				'transaction_id' => $this->input->post('transaction_id'),
				'customer_ip_address' => $this->input->post('customer_ip_address'),
				'customer_user_agent' => $this->input->post('customer_user_agent'),
				'created_via' => $this->input->post('created_via'),
				'date_completed' => $this->input->post('date_completed'),
				'date_paid' => $this->input->post('date_paid'),
				'cart_hash' => $this->input->post('cart_hash'),
				'amount' => $this->input->post('amount'),
				'refunded_by' => $this->input->post('refunded_by'),
				'reason' => $this->input->post('reason'),
			];

			
			$save_lbb_woocommerce_orders = $this->model_lbb_woocommerce_orders->change($id, $save_data);

			if ($save_lbb_woocommerce_orders) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/lbb_woocommerce_orders', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/lbb_woocommerce_orders');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/lbb_woocommerce_orders');
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
	* delete Lbb Woocommerce Orderss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('lbb_woocommerce_orders_delete');

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
            set_message(cclang('has_been_deleted', 'lbb_woocommerce_orders'), 'success');
        } else {
            set_message(cclang('error_delete', 'lbb_woocommerce_orders'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Lbb Woocommerce Orderss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('lbb_woocommerce_orders_view');

		$this->data['lbb_woocommerce_orders'] = $this->model_lbb_woocommerce_orders->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Lbb Woocommerce Orders Detail');
		$this->render('backend/standart/administrator/lbb_woocommerce_orders/lbb_woocommerce_orders_view', $this->data);
	}
	
	/**
	* delete Lbb Woocommerce Orderss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$lbb_woocommerce_orders = $this->model_lbb_woocommerce_orders->find($id);

		
		
		return $this->model_lbb_woocommerce_orders->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('lbb_woocommerce_orders_export');

		$this->model_lbb_woocommerce_orders->export('lbb_woocommerce_orders', 'lbb_woocommerce_orders');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('lbb_woocommerce_orders_export');

		$this->model_lbb_woocommerce_orders->pdf('lbb_woocommerce_orders', 'lbb_woocommerce_orders');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('lbb_woocommerce_orders_export');

		$table = $title = 'lbb_woocommerce_orders';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_lbb_woocommerce_orders->find($id);
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


/* End of file lbb_woocommerce_orders.php */
/* Location: ./application/controllers/administrator/Lbb Woocommerce Orders.php */