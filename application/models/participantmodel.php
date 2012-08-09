<?php

class Participantmodel extends FDZ_Model{

	var $tablename = "fdz_participant";

	function get_all_by_meal_id($id){

		$query = $this->db->select()->where(array("meal_id"=>$id))->get($this->tablename);
		
		return $query->result();
	}


}