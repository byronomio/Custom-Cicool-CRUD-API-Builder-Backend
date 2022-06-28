<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siteproduct extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'siteproduct';
    private $field_search   = ['id', 'product_name', 'sku', 'category_main', 'category_sub', 'brand', 'simpleorvariant', 'price', 'description', 'whatsinthebox', 'first_image', 'second_image', 'gallery', 'website', 'status', 'created_at'];

    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
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
                    $where .= "siteproduct.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "siteproduct.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "siteproduct.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
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
                    $where .= "siteproduct.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "siteproduct.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "siteproduct.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
                $this->db->order_by('siteproduct.'.$this->primary_key, "DESC");
                $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('category_main', 'category_main.category_name = siteproduct.category_main', 'LEFT');
        $this->db->join('category_sub', 'category_sub.category_sub_name = siteproduct.category_sub', 'LEFT');
        $this->db->join('brand', 'brand.brand_name = siteproduct.brand', 'LEFT');
        $this->db->join('form_single_or_variant', 'form_single_or_variant.id = siteproduct.simpleorvariant', 'LEFT');
        $this->db->join('website', 'website.website_name = siteproduct.website', 'LEFT');
        $this->db->join('status', 'status.status_name = siteproduct.status', 'LEFT');
        
        $this->db->select('siteproduct.*,category_main.category_name as category_main_category_name,category_sub.category_sub_name as category_sub_category_sub_name,brand.brand_name as brand_brand_name,form_single_or_variant.id as form_single_or_variant_id,website.website_name as website_website_name,status.status_name as status_status_name');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_siteproduct.php */
/* Location: ./application/models/Model_siteproduct.php */