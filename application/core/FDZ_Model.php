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

	public function get_one_by_data($data){
		$query = $this->db->select()->where($data)->get($this->tablename);
		return $query->row();
	}

	public function get_all(){
		$query = $this->db->select()->get($this->tablename);
		return $query->result();
	}

	public function get_all_by_data($data){
		$query = $this->db->select()->where($data)->get($this->tablename);
		return $query->result();
	}

	public function delete_by_data($data){
		$this->db->where($data)->delete($this->tablename);
	}


	public function insert($data){
		$this->db->insert($this->tablename,$data);
	}

	public function update($id,$data){
		$this->db->where(array("id"=>$id))->update($this->tablename,$data);
	}

	public function update_by_data($where,$data){
		$this->db->where($where)->update($this->tablename,$data);
	}
}

