<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requirement_m extends CI_Model {

  private $table = 'requirements';
  private $table_items = 'items';
  private $table_role = 'roles';
  private $table_submitted_requirements = 'submitted_requirements';
  public function __construct()
  {
    parent::__construct();
  }

  public function get_requirements($roleId)
  {
    //select items.name from items join requirements on items.itemId = requirements.itemId join roles on roles.roleId = requirements.roleId where roles.roleId = 4
    $this->db->select('requirements.requirementId, items.name')->from($this->table_items)->join($this->table, 'items.itemId = requirements.itemId')->join($this->table_role, 'roles.roleId = requirements.roleId')->where(['roles.roleId' => $roleId]);

    return $this->db->get()->result();
  }

  public function insert_submitted_requirements($field)
  {
    $this->db->insert($this->table_submitted_requirements, $field);
  }

  public function get_submitted_requirements($reference_num)
  {
    //select requirements.requirementId, items.name, submitted_requirements.submittedRequirementsId, roles.name from items join requirements on items.itemId = requirements.itemId join submitted_requirements on requirements.requirementId = submitted_requirements.requirementId join roles on requirements.roleId = roles.roleId where submitted_requirements.referenceNum = '1E5E2270C6'
    $this->db->select('requirements.requirementId, items.name, submitted_requirements.submittedRequirementsId, roles.name as role, submitted_requirements.expirationDate')->from($this->table_items)->join($this->table, 'items.itemId = requirements.itemId')->join($this->table_submitted_requirements, 'requirements.requirementId = submitted_requirements.requirementId')->join($this->table_role, 'requirements.roleId = roles.roleId')->where(['submitted_requirements.referenceNum' => $reference_num]);
    return $this->db->get()->result();
  }

  public function remove_requirement($query)
  {
    $this->db->delete($this->table_submitted_requirements, $query);
  }

  // public function insert($fields = null)
  // {
  // 	$this->db->insert($this->_table_name, $fields);
  // }

  // public function get_all($query = null)
  // {
  //   if($query != null)
  //     $this->db->where($query);
  //   $this->db->select('*')->from($this->_table_name);
  //   $result = $this->db->get();

  //   return $result->result();
  // }

  // public function check_action_count($reference_num)
  // {
  //   // $this->db->where(['type' => 'Approve', 'referenceNum' => $reference_num, 'YEAR(createdAt)' => date('Y')]);
  //   $this->db->where('(type = "Approve" or type = "Validate") and YEAR(createdAt) = "'.date('Y').'" and referenceNum = "'.$reference_num.'"');
  //   $this->db->select('*')->from($this->_table_name);
  //   return $this->db->get()->result();
  // }

  // public function get_latest_approval($query = null)
  // {
  //   if($query != null)
  //     $this->db->where($query);
  //   $this->db->select('*')->from($this->_table_name)->order_by('createdAt', 'desc')->limit(1);
  //   $result = $this->db->get();

  //   return $result->result();
  // }

}//END OF CLASS
