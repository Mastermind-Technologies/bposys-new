<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessor_m extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->_table_name = 'lessors';
  }

  public function insert_lessor($fields = null)
  {
  	$this->db->insert($this->_table_name, $fields);
  }

  public function update_lessor($fields)
  {
    $this->db->where(['bploId' => $fields['bploId']]);
    $this->db->update($this->_table_name, $fields);
  }

  public function delete_lessor($bplo_id)
  {
   $this->db->where(['bploId' => $bplo_id]);
   $this->db->delete($this->_table_name);
  }
  public function get_all_lessor($query = null)
  {
    if($query != null)
      $this->db->where($query);

    $this->db->select('*')->from($this->_table_name);
    $result = $this->db->get();
    return $result->result();
  }

  public function check_existing_lessor($bplo_id)
  {
    $this->db->select('*')->from($this->_table_name)->where(['bploId' => $bplo_id])->limit(1);
    if($this->db->get()->num_rows() > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  // public function get_lessor_details($lessor_id)
  // {
  // 	$this->db->select('*')->from($this->_table_name)->where(['lessorId' => $lessor_id])->limit(1);
  // 	$result = $this->db->get();

  // 	return $result->result();
  // }
}