<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renewal_m extends CI_Model {

  private $table = 'renewals';
  public function __construct()
  {
    parent::__construct();
  }

  public function insert($fields)
  {
  	$this->db->insert($this->table, $fields);
  }

  public function check_application($reference_num)
  {
    $this->db->where(['referenceNum' => $reference_num]);
    $this->db->select('*')->from($this->table);
    if($this->db->get()->num_rows() > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  // public function update($fields)
  // {
  //   $this->db->where(['bploId' => $fields['bploId']]);
  //   $this->db->update($this->table, $fields);
  // }

  public function get_allr($query)
  {
    if($query != null)
      $this->db->where($query);

    $this->db->select('*')->from($this->table);
    $result = $this->db->get();
    return $result->result();
  }
}