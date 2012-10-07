<?php

class Followmodel extends FDZ_Model{

	var $tablename = "fdz_follow";

	function get_one_by_pair($from_user_id,$to_user_id){
		$query = $this->db->select()->from($this->tablename)->where(array(
			"from_user_id" => $from_user_id,
			"to_user_id" => $to_user_id
		))->get();
		
		return $query->row();
	}
}