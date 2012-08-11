<?php

class Sessionmodel extends FDZ_Model{

	var $tablename = "fdz_session";


	function get_by_email($emal){
		$query = $this->db->select()->from($this->tablename)->get();
		return $query->row();
	}

	function insert($data){
		$this->db->insert($this->tablename,$data);
	}

	function delete_by_session($session){
		$this->db->where('session',$session);
		$this->db->delete($this->tablename);
	}

	function delete_by_email($email){
		$this->db->where('email',$email);
		$this->db->delete($this->tablename);
	}
}