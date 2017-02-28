<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_Address_m extends CI_Model {

	// private $table = 'business_addresses';
	// public function __construct()
	// {
	// 	parent::__construct();
	// }

	// public function get_all_business_addresses($query = null)
	// {
	// 	if($query != null)
	// 		$this->db->where($query);
	// 	$this->db->select('*')->from($this->table);
	// 	$result = $this->db->get();

	// 	return $result->result();
	// }

	// public function insert($fields = null)
	// {
	// 	$this->db->select('addressName')->from($this->table)->where(['addressName' => $fields['addressName']]);
	// 	if($this->db->count_all_results() > 0)
	// 		return false;
	// 	else
	// 	{	
	// 		$this->db->insert($this->table,$fields);
	// 		return true;
	// 	}
	// }

	// public function count_addresses()
	// {
	// 	$this->db->where(['userId' => $this->encryption->decrypt($this->session->userdata['userdata']['userId'])]);
	// 	$this->db->from($this->table);
	// 	return $this->db->count_all_results();
	// }
}//END OF CLASS