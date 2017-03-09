<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_m extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->_table_name = 'approvals';
    $this->_table_role = 'roles';
    // $this->_lessor_table = 'lessors';
    // $this->_business_activity_table = 'business_activities';
  }

  public function insert($fields = null)
  {
  	$this->db->insert($this->_table_name, $fields);
  }

  public function get_all_desc($query = null)
  {
    if($query != null)
      $this->db->where($query);
    $this->db->select('*')->from($this->_table_name)->order_by('createdAt','desc');
    $result = $this->db->get();

    return $result->result();
  }

  public function get_approvals($reference_num, $year)
  {
    //select roles.name from approvals join roles on roles.roleId = approvals.role where type = "Approve"
    $this->db->where(['referenceNum' => $reference_num, 'YEAR(approvals.createdAt)' => $year, 'type' => 'Approve']);
    $this->db->select('approvals.*, roles.name')->from($this->_table_name)->join($this->_table_role, 'roles.roleId = approvals.role');

    return $this->db->get()->result();
  }

  public function get_all_sorted($query = null)
  {
    if($query != null)
      $this->db->where($query);
    $this->db->select('*')->from($this->_table_name)->order_by('createdAt','desc');
    $result = $this->db->get();

    return $result->result();
  }

    public function get_all($query = null)
  {
    if($query != null)
      $this->db->where($query);
    $this->db->select('*')->from($this->_table_name);
    $result = $this->db->get();

    return $result->result();
  }

  public function check_action_count($reference_num)
  {
    // $this->db->where(['type' => 'Approve', 'referenceNum' => $reference_num, 'YEAR(createdAt)' => date('Y')]);
    $this->db->where('(type = "Approve" or type = "Validate") and YEAR(createdAt) = "'.date('Y').'" and referenceNum = "'.$reference_num.'"');
    $this->db->select('*')->from($this->_table_name);
    return $this->db->get()->result();
  }

  public function get_latest_approval($query = null)
  {
    if($query != null)
      $this->db->where($query);
    $this->db->select('*')->from($this->_table_name)->order_by('createdAt', 'desc')->limit(1);
    $result = $this->db->get();

    return $result->result();
  }

}//END OF CLASS