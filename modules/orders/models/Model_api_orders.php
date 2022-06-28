<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api_orders extends MY_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'orders';
	private $field_search 	= ['id', 'order_id', 'order_status', 'order_date', 'billing_last_name', 'billing_first_name', 'shipping_adress_1', 'shipping_adress_2', 'shipping_city', 'shipping_post_code', 'shipping_state', 'billing_phone', 'waybill', 'billing_email', 'product_1', 'product_2', 'product_3', 'product_4', 'product_5', 'product_6', 'product_7', 'product_8', 'product_9', 'product_10', 'product_11', 'product_12', 'price_1', 'price_2', 'price_3', 'price_4', 'price_5', 'price_6', 'price_7', 'price_8', 'price_9', 'price_10', 'price_11', 'price_12', 'product_sku_1', 'product_sku_2', 'product_sku_3', 'product_sku_4', 'product_sku_5', 'product_sku_6', 'product_sku_7', 'product_sku_8', 'product_sku_9', 'product_sku_10', 'product_sku_11', 'product_sku_12', 'item_quantity_1', 'item_quantity_2', 'item_quantity_3', 'item_quantity_4', 'item_quantity_5', 'item_quantity_6', 'item_quantity_7', 'item_quantity_8', 'item_quantity_9', 'item_quantity_10', 'item_quantity_11', 'item_quantity_12', 'shipping_method', 'shipping_cost', 'total_order', 'coupon_used', 'coupon_discount_amount', 'invoice', 'packing_slip', 'shipping_first_name', 'shipping_last_name', 'customer_note', 'note_content'];

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

/* End of file Model_orders.php */
/* Location: ./application/models/Model_orders.php */