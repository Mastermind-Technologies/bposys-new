<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_m extends CI_Model {

  private $table = 'payments';
  // private $table_reference_numbers = 'reference_numbers';

  public function __construct()
  {
    parent::__construct();
  }

  public function insert_payment($fields)
  {
  	$this->db->insert($this->table, $fields);
    return $this->db->insert_id();
  }

  public function get_all_payments($query = null)
  {
    if($query != null)
      $this->db->where($query);
    $this->db->select('*')->from($this->table);
    return $this->db->get()->result(); 
  }

  public function get_user_payments($user_id)
  {
    //select payments.*, businesses.businessName from payments join reference_numbers on reference_numbers.referencenum = payments.referenceNum join businesses on businesses.userId = reference_numbers.userId where businesses.userId = 1 group by payments.transactionId 
    $this->db->select('payments.*, businesses.businessName')->from($this->table)->join('reference_numbers', 'reference_numbers.referenceNum = payments.referenceNum')->join('application_bplo', 'reference_numbers.referenceNum = application_bplo.referenceNum')->join('businesses', 'businesses.businessId = application_bplo.businessId')->where('reference_numbers.userId', $user_id)->group_by('payments.transactionId');
    return $this->db->get()->result();
  }

  public function get_recent_payments($assessment_id)
  {
    $this->db->select('referenceNum, amountPaid')->from($this->table)->where('assessmentId', $assessment_id);
    return $this->db->get()->result();

  }

  public function get_initial_payment($reference_num)
  {
    $this->db->select('*')->from($this->table)->where('referenceNum',$reference_num)->order_by('createdAt', 'asc')->limit(1);
    return $this->db->get()->result();
  }
}//END OF CLASS