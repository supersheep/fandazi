<?php

class FDZ_Model extends CI_Model{

	public function __construct(){

		parent::__construct();
		$this->load->database();
	}

	public function get_by_id($id){
		$query = $this->db->select()->where(array("id"=>$id))->get($this->tablename);
		return $query->row();
	}

}

