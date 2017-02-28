<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification_m extends CI_Model {

	private $table = 'verifications';
	public function __construct()
	{
		parent::__construct();
	}

	public function generate_verification_code($param)
	{
		$id = $this->db->count_all($this->table)+1;
		$raw_code = $this->encryption->encrypt($id.$param['lastName'].$param['firstName']);
		$code = strtoupper(substr($raw_code, 0, 10));

		$fields = array(
			'userId' => $param['userId'],
			'code' => $code,
			'status' => 0,
			);
		$this->db->insert($this->table, $fields);

		return $code;
	}

	public function verify($query)
	{
		$this->db->select('*')->from($this->table)->where($query);
		$result = $this->db->get();
		if($result->num_rows() == 1)
		{
			$this->db->where($query);
			$this->db->update($this->table, ['status' => 1]);
			$this->db->select('userId')->from($this->table)->where($query)->limit(1);
			$user_id = $this->db->get();
			return $user_id->result()[0]->userId;
		}
		else
		{
			return false;
		}
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
      //bfp
		}  
	}

	public function check_verification($query)
	{
		$this->db->select('*')->from($this->table)->where($query)->limit(1);
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
}//END OF CLASS