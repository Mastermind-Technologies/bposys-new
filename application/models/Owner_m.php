<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_m extends CI_Model {

  private $table = 'owners';
  private $table_users = 'users';
  private $table_bplo = 'application_bplo';
  private $table_business = 'businesses';

  public function __construct()
  {
    parent::__construct();
  }

  public function insert($fields = null)
  {
    $this->db->insert('owners', $fields);
    $insert_id = $this->db->insert_id();

    return $insert_id;
  }

  public function get_all_owners($query = null)
  {
    if($query != null)
      $this->db->where($query);
    $this->db->select('*')->from($this->table)->order_by('firstName','asc');
    $result = $this->db->get();

    return $result->result();
  }

  public function get_owner_name($id)
  {
    $this->db->select('firstName, middleName, lastName')->from($this->table)->where(['ownerId' => $id])->limit(1);
    $result = $this->db->get();

    return $result->result();
  }

  public function count_owners()
  {
   $this->db->where(['userId' => $this->encryption->decrypt($this->session->userdata['userdata']['userId'])]);
   $this->db->from($this->table);
   return $this->db->count_all_results();
 }

 public function count_male_owners()
 {
  //select owners.firstName from owners join businesses on owners.ownerId = businesses.ownerId join application_bplo on businesses.businessId = application_bplo.businessId where owners.gender = 'male' and application_bplo.status = 'active' group by owners.firstName
  // $this->db->where($query);
  // $this->db->where(['application_bplo.status' => 'Active'])->or_where('application_bplo.status =', 'Expired');
  $this->db->select('owners.firstName, owners.gender')->from($this->table)->join($this->table_business,'owners.ownerId = businesses.ownerId')->join($this->table_bplo, 'businesses.businessId = application_bplo.businessId')->where(['owners.gender' => 'male', 'application_bplo.status' => 'active'])->or_where('application_bplo.status', 'expired');
  $this->db->group_by('owners.firstName');

  return $this->db->count_all_results();
  // return $this->db->get()->result();
}

public function count_female_owners()
{
  //select owners.firstName from owners join businesses on owners.ownerId = businesses.ownerId join application_bplo on businesses.businessId = application_bplo.businessId where owners.gender = 'male' and application_bplo.status = 'active' group by owners.firstName
  // $this->db->where($query);
  // $this->db->where(['application_bplo.status' => 'Active'])->or_where('application_bplo.status =', 'Expired');
  $this->db->select('owners.firstName, owners.gender')->from($this->table)->join($this->table_business,'owners.ownerId = businesses.ownerId')->join($this->table_bplo, 'businesses.businessId = application_bplo.businessId')->where(['owners.gender' => 'female', 'application_bplo.status' => 'active'])->or_where('application_bplo.status', 'expired');
  $this->db->group_by('owners.firstName');

  return $this->db->count_all_results();
}

public function check_owner($user_id)
{
  $this->db->select('*')->from($this->table)->where(['userId' => $user_id])->limit(1);
  $result = $this->db->get();

  if($result->num_rows() == 1)
  {
    return true;
  }
  else
  {
    return false;
  }
}

public function get_unapplied_business_owners($user_id)
{
  //select * from owners left join businesses on owners.ownerId = businesses.ownerId left join application_bplo on businesses.businessId = application_bplo.businessId where businesses.businessId IS NULL
  $this->db->select('owners.firstName, owners.lastName, owners.ownerId');
  $this->db->from('owners');
  $this->db->join($this->table_business, 'owners.ownerId = businesses.ownerId', 'left');
  $this->db->join($this->table_bplo, 'businesses.businessId = application_bplo.businessId', 'left');
  $this->db->where(['owners.userId' => $user_id, 'businesses.businessId' => NULL]);

  return $this->db->get()->result();
}

public function get_all_applied_businesses()
{
  //select * from owners left join businesses on owners.ownerId = businesses.ownerId left join application_bplo on
  //businesses.businessId = application_bplo.businessId where businesses.businessId IS NOT NULL group by owners.ownerId
  $this->db->select('*');
  $this->db->from('owners');
  $this->db->join($this->table_business, 'owners.ownerId = businesses.ownerId', 'left');
  $this->db->join($this->table_bplo, 'businesses.businessId = application_bplo.businessId', 'left');
  $this->db->where('businesses.businessId IS NOT NULL');
  $this->db->group_by('owners.ownerId');

  return $this->db->get()->result();
}

public function update_owner($owner_id, $fields)
{
  $this->db->where('ownerId', $owner_id);
  $this->db->update($this->table, $fields);
}

  // public function register_owner($fields = null)
  // {
  //   $this->db->insert($this->_table_name, $fields);

  //   return true;
  // }

  // public function get_all_owner($query = null)
  // {
  //   if($query != null)
  //   {
  //     $this->db->where($query);
  //   }
  //   $this->db->select('*')->from($this->_table_name)->join($this->_table_users,'owners.userId = users.userId');
  //   $result = $this->db->get();

  //   return $result->result();
  // }

  // public function get_full_details($fields = null)
  // {
  //   $this->db->select('*')->from($this->_table_name)->join($this->_table_users,'owners.userId = users.userId')->where('owners.userId',$this->encryption->decrypt($fields['userId']));
  //   $result = $this->db->get();
  //   // echo "<pre>";
  //   // print_r($result->result());
  //   // echo "</pre>";
  //   // exit();
  //   return $result->result();
  // }

  // public function update_owner_details($user_fields = null, $applicant_fields = null)
  // {
  //  $this->db->where('users.userId', $this->encryption->decrypt($this->session->userdata['userdata']['userId']));
  //  $this->db->update($this->_table_users, $user_fields);

  //  $this->db->where('owners.userId', $this->encryption->decrypt($this->session->userdata['userdata']['userId']));
  //  $this->db->update($this->_table_name, $applicant_fields);

  //  return true;
  // }

}//END OF CLASS
