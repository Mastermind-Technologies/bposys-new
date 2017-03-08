<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_m extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->_table_name = 'roles';
    // $this->_lessor_table = 'lessors';
    // $this->_business_activity_table = 'business_activities';
  }

  public function get_roleId($name = null)
  {
    $this->db->select('roleId')->from($this->_table_name)->where(['name' => $name])->limit(1);
    $result = $this->db->get();

    return $result->result()[0];
  }

  public function insert($fields = null)
  {
  	$this->db->insert($this->_table_name, $fields);
  }


}//END OF CLASS