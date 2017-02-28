<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_Activity_m extends CI_Model {

  var $table = 'business_activities';
  var $bplo = 'application_bplo';
  private $amusement_devices = 'amusement_devices';
  private $fee_amusement_devices = 'fee_amusement_devices';
  private $bowling_alleys = 'bowling_alleys';
  private $financial_institution = 'financial_institution';
  private $fee_financial_institution = 'fee_financial_institution';
  private $golf_links = 'golf_links';
  private $line_of_businesses = 'line_of_businesses';

  public function __construct()
  {
    parent::__construct();

  }

  public function insert_business_activity($fields = null)
  {
  	$this->db->insert($this->table, $fields);
  }

  public function get_all_business_activity($query = null)
  {
    $active = ['activityStatus !=' => 'cancelled'];
    if($query != null)
    {
      $query = array_merge($query, $active);
      $this->db->where($query);
    }
    $this->db->select('*')->from($this->table)->join($this->line_of_businesses, 'line_of_businesses.name = business_activities.lineOfBusiness');
    $result = $this->db->get();

    return $result->result();
  }

  public function get_business_activity($id)
  {
    $this->db->where('activityId', $id);
    $this->db->select('*')->from($this->table)->join($this->line_of_businesses, 'line_of_businesses.name = business_activities.lineOfBusiness');
    $result = $this->db->get();

    return $result->result();
  }

  public function get_all_business_activity_by_reference_num($reference_num)
  {
    //select business_activities.lineOfBusiness, business_activities.capitalization from business_activities join application_bplo on application_bplo.applicationId = business_activities.bploId where application_bplo.referenceNum = "4824FE5C5F"
    $this->db->select('business_activities.lineOfBusiness, business_activities.capitalization, business_activities.bploId');
    $this->db->from($this->table);
    $this->db->join($this->bplo, 'business_activities.bploId = application_bplo.applicationId');
    $this->db->where(['application_bplo.referenceNum' => $reference_num, 'activityStatus' => 'active']);

    return $this->db->get()->result();
  }

  public function check_business_activity($bplo_id, $line_of_business)
  {
    $this->db->where(['bploId' => $bplo_id, 'lineOfBusiness' => $line_of_business, 'activityStatus' => 'active' ])->limit(1);
    $this->db->select('*')->from($this->table);
    $result = $this->db->get()->result();
    if(count($result) == 1)
    {
      return $result;
    }
    else
    {
      return false;
    }
  }

  public function update_business_activity($activity_id, $fields)
  {
    $this->db->where(['activityId' => $activity_id]);
    $this->db->update($this->table, $fields);
  }


  public function insert_amusement_device($fields)
  {
    $this->db->insert($this->amusement_devices, $fields);
  }

  public function insert_financial_institution($fields)
  {
    $this->db->insert($this->financial_institution, $fields);
  }

  public function insert_golf_link($fields)
  {
    $this->db->insert($this->golf_links, $fields);
  }

  public function insert_bowling_alley($fields)
  {
    $this->db->insert($this->bowling_alleys, $fields);
  }

  public function get_amusement_devices($activity_id)
  {
    //select fee_amusement_devices.name, fee_amusement_devices.ratePerUnit, amusement_devices.units from fee_amusement_devices join amusement_devices on amusement_devices.amusementDeviceId = fee_amusement_devices.amusementDeviceId join business_activities on amusement_devices.activityId = business_activities.activityId where business_activities.activityId = 62 
    $this->db->select('fee_amusement_devices.name, fee_amusement_devices.ratePerUnit, amusement_devices.units');
    $this->db->from($this->fee_amusement_devices);
    $this->db->join($this->amusement_devices, 'amusement_devices.amusementDeviceId = fee_amusement_devices.amusementDeviceId');
    $this->db->join($this->table, 'amusement_devices.activityId = business_activities.activityId');
    $this->db->where([$this->table.'.activityId' => $activity_id, 'YEAR(amusement_devices.createdAt)' => date('Y')]);
    return $this->db->get()->result();
  }

  public function get_bowling_alleys($activity_id)
  {
    //SELECT bowling_alleys.nonAutomaticLanes, bowling_alleys.automaticLanes FROM `bowling_alleys` join business_activities on bowling_alleys.activityId = business_activities.activityId where business_activities.activityId = 62 
    $this->db->select('bowling_alleys.nonAutomaticLanes, bowling_alleys.automaticLanes');
    $this->db->from($this->bowling_alleys);
    $this->db->join($this->table, 'business_activities.activityId = bowling_alleys.activityId');
    $this->db->where([$this->table.".activityId" => $activity_id, 'YEAR(bowling_alleys.createdAt)' => date('Y')])->limit(1);
    return $this->db->get()->result();
  }

  public function get_financial_institution_fee($activity_id)
  {
    //select fee_financial_institution.fee from fee_financial_institution join financial_institution on financial_institution.financialInstitutionId = fee_financial_institution.financialInstitutionId join business_activities on business_activities.activityId = financial_institution.activityId where business_activities.activityId = 62 

    $this->db->select('fee_financial_institution.fee');
    $this->db->from($this->fee_financial_institution);
    $this->db->join($this->financial_institution, 'financial_institution.financialInstitutionId = fee_financial_institution.financialInstitutionId');
    $this->db->join($this->table, 'business_activities.activityId = financial_institution.activityId');
    $this->db->where([$this->table.".activityId" => $activity_id, 'YEAR(financial_institution.createdAt)' => date('Y')])->limit(1);
    return $this->db->get()->result()[0];
  }

  public function get_golf_link_fees($activity_id)
  {
    //select golf_links.activityId, golf_links.holes from golf_links join business_activities on golf_links.activityId = business_activities.activityId where business_activities.activityId = 62 
    $this->db->select('golf_links.activityId, golf_links.holes');
    $this->db->from($this->golf_links);
    $this->db->join($this->table, 'business_activities.activityId = golf_links.activityId');
    $this->db->where([$this->table.'.activityId' => $activity_id, 'YEAR(golf_links.createdAt)' => date('Y')])->limit(1);
    return $this->db->get()->result();
  }

}
