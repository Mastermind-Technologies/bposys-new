<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retirement_m extends CI_Model {

  private $table = 'retirements';
  public function __construct()
  {
    parent::__construct();
  }

  public function insert($fields = null)
  {
  	$this->db->insert($this->table, $fields);
  }

  public function get_all($query = null)
  {
    if($query != null)
      $this->db->where($query);
    $this->db->select('*')->from($this->table)->order_by('status', 'desc');
    $result = $this->db->get();

    return $result->result();
  }

  public function update_retirement_status($reference_num, $fields)
  {
    $this->db->where('referenceNum', $reference_num);
    $this->db->update($this->table, $fields);
  }

  // public function get_latest_approval($query = null)
  // {
  //   if($query != null)
  //     $this->db->where($query);
  //   $this->db->select('*')->from($this->table)->order_by('createdAt', 'desc')->limit(1);
  //   $result = $this->db->get();

  //   return $result->result();
  // }

}//END OF CLASS