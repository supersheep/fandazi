<?php

class Citymodel extends FDZ_Model{

	var $tablename = "fdz_city";

	function get_all(){

		$query = $this->db->select()->get($this->tablename);
		return $query->result();

	}
}