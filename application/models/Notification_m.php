<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_m extends CI_Model {

  private $table = 'notifications';
  private $reference = 'reference_numbers';
  private $application_bplo = 'application_bplo';

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
    $this->db->select('*')->from($this->table);
    $result = $this->db->get();

    return $result->result();
  }

  public function get_applicant_notif($roleId = null, $userId = null)
  {
    $this->db->where(['notifications.role' => $roleId, 'reference_numbers.userId' => $userId]);
    $this->db->select('notifications.referenceNum, application_bplo.applicationId, reference_numbers.referenceNum, notifications.notifMessage,notifications.createdAt');
    $this->db->from($this->table);
    $this->db->join($this->reference, 'reference_numbers.referenceNum = notifications.referenceNum');
    $this->db->join($this->application_bplo, 'reference_numbers.referenceNum = application_bplo.referenceNum')->limit(10)->order_by("notifications.createdAt", "desc");
    $result = $this->db->get();

    return $result->result();
  }

  public function get_applicant_unread($roleId = null, $userId = null)
  {
    $this->db->where(['notifications.role' => $roleId, 'reference_numbers.userId' => $userId, 'notifications.status' => "Unread"]);
    $this->db->select('notifications.referenceNum, notifications.notifMessage,notifications.createdAt')->from($this->table)->join($this->reference, 'reference_numbers.referenceNum = notifications.referenceNum')->order_by("notifications.createdAt", "desc");
    $result = $this->db->get();

    return $result->result();
  }

  public function update($query = null, $set = null)
  {
    $this->db->where($query);
    $this->db->update($this->table, $set);
  }


}//END OF CLASS
