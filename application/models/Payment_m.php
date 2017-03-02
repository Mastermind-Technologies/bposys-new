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
    $this->db->select('payments.*, businesses.businessName')->from($this->table)->join('reference_numbers', 'reference_numbers.referenceNum = payments.referenceNum')->join('application_bplo', 'reference_numbers.referenceNum = application_bplo.referenceNum')->join('businesses', 'businesses.businessId = application_bplo.businessesId')->where('reference_numbers.userId', $user_id)->group_by('payments.transactionId');
    return $this->db->get()->result();
  }

  public function get_recent_payments($assessment_id)
  {
    $this->db->select('referenceNum, amountPaid')->from($this->table)->where('assessmentId', $assessment_id);
    // print_r($this->db->get()->result());
    return $this->db->get()->result();

  }

  // public function insert_business_activity($fields)
  // {
  //   $this->db->insert($this->table_business_activities, $fields);
  // }

  // public function insert_lessor($fields)
  // {
  //   $this->db->insert($this->table_lessors, $fields);
  // }

  // public function get_all_archived($query = null)
  // {
  //   if($query != null)
  //     $this->db->where($query);
  //   $this->db->select('*')->from($this->table_applications);
  //   $result = $this->db->get()->result();

  //   foreach ($result as $key => $res) {
  //     $this->db->select('*')->from($this->table_lessors)->where(['referenceNum' => $res->referenceNum]);

  //     //attach lessor if application is rented
  //     $lessors = $this->db->get()->result();
  //     if(count($lessors) > 0)
  //     {
  //       $result->lessor = $lessor;
  //     }

  //     //attach business activities
  //     $this->db->select('*')->from($this->table_business_activities)->where(['referenceNum' => $res->referenceNum]);
  //     $business_activities = $this->db->get()->result();
  //     $res->business_activities = $business_activities;
  //   }

  //   return $result;
  // }

}//END OF CLASS