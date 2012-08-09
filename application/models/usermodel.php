<?php

class Usermodel extends FDZ_Model{

	var $tablename = "fdz_user";

	function get_by_id($id){
		$query = $this->db->select()->where(array("id"=>$id))->get($this->tablename);
		$user = $query->row();
		if(is_null($user->avatar)){
			$user->avatar = "/s/i/default_avatar.png";
		}
		return $user;
	}
}