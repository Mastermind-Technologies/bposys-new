<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment_m extends CI_Model {

  var $table = 'assessments';
  var $table_charge = 'charges';
  var $table_payments = 'payments';
  var $table_applications = 'application_bplo';
  var $table_owners = 'owners';
  var $table_businesses = 'businesses';
  var $table_users = 'users';
  public function __construct()
  {
    parent::__construct();
  }

  public function get_unsettled_charges($query)
  {
    //SELECT users.userId, application_bplo.referenceNum, charges.particulars, charges.due, charges.status,charges.period from users join application_bplo on users.userId = application_bplo.userId join 	assessments on assessments.referenceNum = application_bplo.referenceNum join charges on charges.assessmentId = assessments.assessmentId where charges.status = 'Paid' and (charges.period = 'Q2' or charges.period = 'Q3' or charges.period = 'Q4')
    $this->db->select('users.userId, application_bplo.referenceNum, businesses.businessName, charges.particulars, charges.due, charges.surcharge, charges.interest, charges.status,charges.period, charges.createdAt, charges.updatedAt')->from($this->table_users)->join($this->table_applications, 'users.userId = application_bplo.userId')->join($this->table, 'assessments.referenceNum = application_bplo.referenceNum')->join($this->table_charge, 'charges.assessmentId = assessments.assessmentId')->join($this->table_businesses, 'application_bplo.businessId = businesses.businessId')->where($query);
    return $this->db->get()->result();
  }

  public function insert_assessment($fields)
  {
    $this->db->insert($this->table, $fields);
    return $this->db->insert_id();
  }

  public function get_assessment($query = null)
  {
    if($query != null)
      $this->db->where($query);
    $this->db->select('*')->from($this->table)->order_by('createdAt', 'desc')->limit(1);
    $result = $this->db->get();

    return $result->result();
  }

  public function update_assessment_status($query, $status)
  {
    $this->db->where($query);
    $this->db->update($this->table, ['status' => $status]);
  }


  public function refresh_assessment_amount($query)
  {
    //get assessment for specific application
    $assessment = $this->get_assessment($query);

    //get total amount paid [NOT FINISHED]
    $this->db->select('*')->from($this->table_payments)->where($query);
    $payments = $this->db->get()->result();
    $amount_paid = 0;
    if(count($payments) > 0)
    {
      foreach ($payments as $key => $paid) {
        $amount_paid += $paid->amountPaid;
      }
    }
    //finish total amount paid

    unset($query);

    //get uncomputed charges for retrieved assessment
    $query['assessmentId'] = $assessment[0]->assessmentId;
    // $query['computed'] = 0;
    $charges = $this->get_charges($query);

    //compute total
    $total = 0;
    foreach ($charges as $key => $charge) {
      $total += $charge->due;
      $total += $charge->surcharge;
      $total += $charge->interest;
    }

    $total = $total - $amount_paid;

    //update amount
    unset($query);
    $query['assessmentId'] = $assessment[0]->assessmentId;
    $this->db->where($query);
    $this->db->update($this->table, ['amount' => $total]);
  }

  public function update_assessment($query, $amount_paid, $paid_up_to)
  {
    //get latest assessment to be updated
    $this->db->select('amount, assessmentId')->from($this->table)->where($query)->order_by('createdAt', 'desc')->limit(1);
    $result = $this->db->get()->result()[0];
    $amount = $result->amount;
    $assessmentId = $result->assessmentId;

    // var_dump($assessmentId);
    // exit();


    //deduct amountPaid on assessmentAmount and set paidUpTo
    if($amount_paid > $amount)
    {
      $set['amount'] = 0;
    }
    else
    {
      $set['amount'] = $amount - $amount_paid;
    }

    $set['paidUpTo'] = $set['amount']==0 ? 'Fourth Quarter' : $paid_up_to;

    $this->db->where(['assessmentId' => $assessmentId]);
    $this->db->update($this->table, $set);
  }

  public function add_charge($fields)
  {
    $this->db->insert($this->table_charge, $fields);
  }

  public function get_charges($query = null)
  {
    if($query != null)
    {
      $this->db->where($query);
    }

    $this->db->select('*')->from($this->table_charge);
    $result = $this->db->get();

    return $result->result();
  }

  public function update_charge($charge_id, $fields)
  {
    $this->db->where('chargeId', $charge_id);
    $this->db->update($this->table_charge, $fields);
  }

  public function update_charges($query, $fields)
  {
    $this->db->where($query);
    $this->db->update($this->table_charge, $fields);
  }

  public function get_delinquencies($reference_num)
  {
    //select charges.* from charges join assessments on assessments.assessmentId = charges.assessmentId where assessments.referenceNum = 'D283D76BE0' and charges.status = 'not paid' 
    $this->db->select('charges.*');
    $this->db->from($this->table_charge);
    $this->db->join($this->table, 'assessments.assessmentId = charges.assessmentId');
    $this->db->where(['assessments.referenceNum' => $reference_num, 'charges.status' => 'not paid']);

    return $this->db->get()->result();
  }
}
