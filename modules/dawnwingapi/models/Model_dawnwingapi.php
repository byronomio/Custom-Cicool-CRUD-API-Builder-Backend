<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dawnwingapi extends MY_Model {

    private $primary_key    = 'WaybillNo';
    private $table_name     = 'dawnwingapi';
    private $field_search   = ['id', 'PostID', 'SendAccNo', 'SendSite', 'SendCompany', 'SendAdd1', 'SendAdd2', 'SendAdd3', 'SendAdd4', 'SendAdd5', 'SendContactPerson', 'SendHomeTel', 'SendWorkTel', 'SendCell', 'RecCompany', 'RecAdd1', 'RecAdd2', 'RecAdd3', 'RecAdd4', 'RecAdd5', 'RecAdd6', 'RecAdd7', 'RecContactPerson', 'RecHomeTel', 'RecWorkTel', 'RecCell', 'SpecialInstructions', 'ServiceType', 'TotQTY', 'TotMass', 'Insurance', 'InsuranceValue', 'CustomerRef', 'StoreCode', 'SecurityStamp', 'RequiredDocs', 'WaybillInstructions', 'InstructionCode', 'IsSecureDelivery', 'VerificationNumbers', 'GenerateSecurePin', 'CollectionNo', 'invoiceRef', 'CompleteWaybillAfterSave', 'ParcelsWaybillNo', 'ParcelsLength', 'ParcelsHeight', 'ParcelsWidth', 'ParcelsMass', 'ParcelDescription', 'ParcelNo', 'ParcelCount', 'OrderStatus', 'OrderDiscountTotal', 'OrderDiscountTax', 'OrderShippingTotal', 'OrderShippingTax', 'OrderTotal'];

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
                    $where .= "dawnwingapi.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "dawnwingapi.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "dawnwingapi.".$field . " LIKE '%" . $q . "%' )";
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
                    $where .= "dawnwingapi.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "dawnwingapi.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "dawnwingapi.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
                $this->db->order_by('dawnwingapi.'.$this->primary_key, "DESC");
                $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        
        $this->db->select('dawnwingapi.*');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_dawnwingapi.php */
/* Location: ./application/models/Model_dawnwingapi.php */