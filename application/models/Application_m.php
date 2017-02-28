<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application_m extends CI_Model {

  private $bplo = 'application_bplo';
  private $cenro = 'application_cenro';
  private $sanitary = 'application_sanitary';
  private $zoning = 'application_zoning';
  private $bfp = 'application_bfp';
  private $engineering = 'application_engineering';
  private $lessor = 'lessors';
  private $business_activity = 'business_activities';
  private $assessment = 'assessments';
  private $charge = 'charges';
  
  public function __construct()
  {
    parent::__construct();
  }

  public function insert_bplo($fields)
  {
    $this->db->insert($this->bplo,$fields);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function insert_cenro($fields)
  {
    $this->db->insert($this->cenro,$fields);
  }

  public function insert_sanitary($fields)
  {
    $this->db->insert($this->sanitary,$fields);
  }

  public function insert_zoning($fields)
  {
    $this->db->insert($this->zoning,$fields);
  }

  public function insert_bfp($fields)
  {
    $this->db->insert($this->bfp, $fields);
  }

  public  function insert_engineering($fields)
  {
    $this->db->insert($this->engineering, $fields);
  }

  public function update_bplo($fields)
  {
    $this->db->where(['referenceNum' => $fields['referenceNum']]);
    $this->db->update($this->bplo, $fields);

    $this->db->select('applicationId')->where(['referenceNum' => $fields['referenceNum']])->from($this->bplo);
    return $this->db->get()->result()[0]->applicationId;
  }

  public function update_zoning($fields)
  {
    $this->db->where(['referenceNum' => $fields['referenceNum']]);
    $this->db->update($this->zoning, $fields);
  }

  public function update_cenro($fields)
  {
    $this->db->where(['referenceNum' => $fields['referenceNum']]);
    $this->db->update($this->cenro, $fields);
  }

  public function update_sanitary($fields)
  {
    $this->db->where(['referenceNum' => $fields['referenceNum']]);
    $this->db->update($this->sanitary, $fields);
  }

  public function update_bfp($fields)
  {
    $this->db->where(['referenceNum' => $fields['referenceNum']]);
    $this->db->update($this->bfp, $fields);
  }

  public function update_engineering($fields)
  {
    $this->db->where(['referenceNum' => $fields['referenceNum']]);
    $this->db->update($this->engineering, $fields);
  }

  public function get_all_bplo_applications($query = null)
  {
    if($query != null)
      $this->db->where($query);

    $this->db->select('*')->from($this->bplo);
    $result = $this->db->get();

    return $result->result();
  }

  public function get_all_bplo_applications_with_unsettled_charges()
  {
    //select application_bplo.* from application_bplo join assessments on assessments.referenceNum = application_bplo.referenceNum join charges on assessments.assessmentId = charges.assessmentId where charges.status = 'not paid' group by application_bplo.referenceNum 
    $this->db->select('application_bplo.*');
    $this->db->from($this->bplo);
    $this->db->join($this->assessment, 'assessments.referenceNum = application_bplo.referenceNum');
    $this->db->join($this->charge, 'assessments.assessmentId = charges.assessmentId');
    $this->db->where('charges.status', 'not paid');
    $this->db->where('application_bplo.status', 'active');
    $this->db->group_by('application_bplo.referenceNum');

    return $this->db->get()->result();
  }

  public function get_latest_bplo_applications($query = null)
  {
    if($query != null)
      $this->db->where($query);

    $this->db->select('*')->from($this->bplo)->order_by('createdAt', 'desc')->limit(5);
    $result = $this->db->get();

    return $result->result();
  }

  public function get_all_zoning_applications($query = null)
  {
    if($query != null)
      $this->db->where($query);

    $this->db->select('*')->from($this->zoning)->order_by('createdAt', 'desc');
    $result = $this->db->get();

    return $result->result();
  }

  public function get_all_cenro_applications($query = null)
  {
    if($query != null)
      $this->db->where($query);

    $this->db->select('*')->from($this->cenro)->order_by('createdAt', 'desc');
    $result = $this->db->get();

    return $result->result();
  }

  public function get_all_sanitary_applications($query = null)
  {
    if($query != null)
      $this->db->where($query);

    $this->db->select('*')->from($this->sanitary)->order_by('createdAt', 'desc');
    $result = $this->db->get();

    return $result->result();
  }

  public function get_all_bfp_applications($query = null)
  {
    if($query != null)
      $this->db->where($query);

    $this->db->select('*')->from($this->bfp)->order_by('createdAt', 'desc');
    $result = $this->db->get();

    return $result->result();
  }

  public function get_all_engineering_applications($query = null)
  {
    if($query != null)
      $this->db->where($query);

    $this->db->select('*')->from($this->engineering)->order_by('createdAt', 'desc');
    $result = $this->db->get();

    return $result->result();
  }

  public function update_application($query = null, $application = null)
  {
    $this->db->where(['referenceNum' => $query['referenceNum']]);
    switch($application)
    {
      case "bplo": $this->db->update($this->bplo, $query); break;
      case "cenro": $this->db->update($this->cenro, $query); break;
      case "zoning": $this->db->update($this->zoning, $query); break;
      case "sanitary": $this->db->update($this->sanitary, $query); break;
      case "bfp": $this->db->update($this->bfp, $query); break;
      case "engineering": $this->db->update($this->engineering, $query); break;
    }  
  }

  public function check_status($reference_number, $application)
  {
    $this->db->where(['referenceNum' => $reference_number]);
    switch($application)
    {
      case "bplo": $this->db->select('status')->from($this->bplo); break;
      case "cenro": $this->db->select('status')->from($this->cenro); break;
      case "zoning": $this->db->select('status')->from($this->zoning); break;
      case "sanitary": $this->db->select('status')->from($this->sanitary); break;
      case "bfp": $this->db->select('status')->from($this->bfp); break;
      case "engineering": $this->db->select('status')->from($this->engineering); break;
      //bfp
    }
    $result = $this->db->get();
    return $result->result()[0]->status;
  }

  public function check_drafted_application($reference_num)
  {
    $this->db->select('*')->from($this->bplo)->where(['status' => 'Draft', 'referenceNum' => $reference_num])->limit(1);
    if($this->db->get()->num_rows() > 0)
    {
      return true; 
    }
    else
    {
      return false;
    }
  }

  public function get_status($query)
  {
    $this->db->select('status')->from($this->bplo)->where($query);
    return $this->db->get()->result()[0];
  }


}//END OF CLASS