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

	function get_followers_of_user($userid,$start,$offset){
		$this->load->model("usermodel");
		$query = $this->db->select("fdz_user.*")->from($this->tablename)->join("fdz_user","fdz_follow.from_user_id=fdz_user.id")->where(array("to_user_id"=>$userid))->limit($offset,$start)->get();
		$result = $query->result();

		foreach($result as $user){
			$this->usermodel->deal_avatar($user);
		}
		return $result;
	}
}