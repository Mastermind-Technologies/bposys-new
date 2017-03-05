<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_m extends CI_Model {

	private $table = 'changes';
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($fields)
	{
		$this->db->insert($this->table, $fields);
	}

	public function check_recent_change($reference_num)
	{
		$this->db->where(['referenceNum' => $reference_num, "YEAR(createdAt)" => date('Y')]);
		$this->db->select('*')->from($this->table)->limit(1);

		if($this->db->get()->num_rows() > 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
}