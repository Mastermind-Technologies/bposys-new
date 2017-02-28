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
}