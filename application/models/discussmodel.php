<?php

class Discussmodel extends FDZ_Model{

	var $tablename = "fdz_discuss";

	function get_by_refer_id($refer_id){
		$query = $this->db->select()->from($this->tablename)->where(array(
			"refer_id"=>$refer_id))->get();
		return $query->result();
	}
}