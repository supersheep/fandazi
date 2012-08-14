<?php

class districtmodel extends FDZ_Model{

	var $tablename = "fdz_district";
	function get_by_name($name){
		$query = $this->db->select()->where(array("name"=>$name))->get($this->tablename);
		$row = $query->row();
		return count($row) ? $row : null;
	}
}