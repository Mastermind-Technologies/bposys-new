<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_m extends CI_Model {

	private $table = 'businesses';
	private $table_bplo = 'application_bplo';
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($fields = null)
	{
		$this->db->insert($this->table, $fields);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	public function get_all_businesses($query = null)
	{
		if($query != null)
			$this->db->where($query);
		$this->db->select('*')->from($this->table)->order_by('businessName', 'asc');
		$result = $this->db->get();

		return $result->result();
	}

	public function get_all_unapplied_businesses($user_id)
	{
		//SELECT * FROM `businesses` left join application_bplo ON businesses.businessId = application_bplo.businessId where application_bplo.businessId IS NULL 
		$this->db->select('businesses.businessId, businesses.businessName')->from($this->table)->join($this->table_bplo, 'businesses.businessId = application_bplo.businessId', 'left')->where([$this->table_bplo.".businessId" => NULL, 'businesses.userId' => $user_id])->or_where([$this->table_bplo.".status" => 'Draft'])->group_by('businesses.businessName');

		return $this->db->get()->result();
	}

	public function count_businesses()
	{
		$this->db->where(['userId' => $this->encryption->decrypt($this->session->userdata['userdata']['userId'])]);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function count_businesses_by_barangay()
	{
		//select businesses.barangay, count(businesses.barangay) as 'count' from businesses left join application_bplo on businesses.businessId = application_bplo.businessId where application_bplo.status = 'active' group by barangay
		$this->db->select('businesses.barangay, count(businesses.barangay) as count')->from($this->table);
		$this->db->join($this->table_bplo, 'businesses.businessId = application_bplo.businessId', 'left');
		$this->db->where(['application_bplo.status' => 'active'])->or_where('application_bplo.status', 'expired');
		$this->db->group_by('businesses.barangay');
		// echo "<pre>";
		// print_r($this->db->get()->result());
		// echo "</pre>";
		// exit();


		return $this->db->get()->result();
	}

	public function count_expired_businesses_by_barangay()
	{
		$this->db->select('businesses.barangay, count(businesses.barangay) as expired')->from($this->table);
		$this->db->join($this->table_bplo, 'businesses.businessId = application_bplo.businessId', 'left');
		$this->db->where(['application_bplo.status' => 'expired']);
		$this->db->group_by('businesses.barangay');
		// echo "<pre>";
		// print_r($this->db->get()->result());
		// echo "</pre>";
		// exit();
		

		return $this->db->get()->result();
	}

	public function update_business($business_id, $fields)
	{
		$this->db->where('businessId', $business_id);
		$this->db->update($this->table, $fields);
	}
}//END OF CLASS