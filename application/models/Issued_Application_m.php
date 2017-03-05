<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issued_Application_m extends CI_Model {
	private $table = 'issued_applications';

	public function construct()
	{
		parent::__construct();
	}

	public function insert($fields = null)
	{
		$this->db->insert($this->table,$fields);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function get_all($query = null)
	{
		if($query != null)
			$this->db->where($query);

		$this->db->select('*')->from($this->table);
		$result = $this->db->get();

		return $result->result();
	}

	public function get_current_issued($query = null)
	{
		if($query != null)
			$this->db->where($query);

		$this->db->select('*')->from($this->table)->limit(1);
		$result = $this->db->get();

		return $result->result();
	}

	public function get_latest_issued($query = null)
	{
		if($query != null)
			$this->db->where($query);

		$this->db->select('*')->from($this->table)->order_by('createdAt', 'desc')->limit(5);
		$result = $this->db->get();

		return $result->result();
	}

	public function get_issued_organization_type($role)
	{
		//select businesses.businessName, businesses.organizationType from issued_applications join application_bplo on issued_applications.referenceNum = application_bplo.referenceNum join businesses on businesses.businessId = application_bplo.businessId where issued_applications.dept = "Zoning" 
		$this->db->select('application_bplo.referenceNum, businesses.businessName, businesses.organizationType');
		$this->db->from($this->table);
		$this->db->join('application_bplo', 'issued_applications.referenceNum = application_bplo.referenceNum');
		$this->db->join('businesses', 'businesses.businessId = application_bplo.businessId');
		$this->db->where('issued_applications.dept', $role);

		return $this->db->get()->result();
	}

	public function get_unique_issued_applications()
	{
		//select * from issued_applications where dept = "BPLO" group by referenceNum
		$this->db->select('referenceNum')->from($this->table)->where('dept', "BPLO")->group_by('referenceNum');
		return $this->db->get()->result();
	}
}