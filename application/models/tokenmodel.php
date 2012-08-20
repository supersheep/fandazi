<?php

class Tokenmodel extends FDZ_Model{

	var $tablename = "fdz_token";

	function get_by_code($code){
		$query = $this->db->select()->where(array("code"=>$code))->get($this->tablename);
		return $query->row();
	}
}