<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api_api_orders extends MY_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'api_orders';
	private $field_search 	= ['id', 'order_id', 'user_id', 'order_number', 'order_parent_id', 'order_status', 'order_currency', 'order_version', 'order_payment_method', 'order_payment_method_title', 'order_date_created', 'order_date_modified', 'order_timestamp_created', 'order_timestamp_modified', 'order_discount_total', 'order_discount_tax', 'order_shipping_total', 'order_shipping_tax', 'order_total_tax', 'order_customer_id', 'order_billing_first_name', 'order_billing_last_name', 'order_billing_company', 'order_billing_address_1', 'order_billing_city', 'order_billing_state', 'order_billing_postcode', 'order_billing_country', 'order_billing_email', 'order_billing_phone', 'order_shipping_first_name', 'order_shipping_last_name', 'order_shipping_company', 'order_shipping_address_1', 'order_shipping_address_2', 'order_shipping_city', 'order_shipping_state', 'order_shipping_postcode', 'order_shipping_country'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	public function count_all($q = null, $field = null)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= $field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
        }

        $this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= $field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	if (in_array($field, $select_field)) {
        		$where .= "(" . $field . " LIKE '%" . $q . "%' )";
        	}
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		if ($where) {
        	$this->db->where($where);
		}
        $this->db->limit($limit, $offset);
        $this->db->order_by($this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

}

/* End of file Model_api_orders.php */
/* Location: ./application/models/Model_api_orders.php */