<?php

class Replymodel extends FDZ_Model{

	var $tablename = "fdz_reply";

	function get_by_refer_id($refer_id){
		$query = $this->db->select("fdz_reply.*,fdz_user.name as username,fdz_user.avatar")->from($this->tablename)->join("fdz_user","fdz_user.id=user")->where(array(
			"refer_id"=>$refer_id))->get();
		return $query->result();
	}
}