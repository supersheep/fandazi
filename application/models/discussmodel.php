<?php

class Discussmodel extends FDZ_Model{

	var $tablename = "fdz_discuss";

	function get_by_refer_id($refer_id){
		$query = $this->db->select("fdz_discuss.*,fdz_user.name as username,fdz_user.avatar")->from($this->tablename)->join("fdz_user","fdz_user.id=user")->where(array(
			"refer_id"=>$refer_id))->get();
		return $query->result();
	}
	function get_by_id($id){
		$query = $this->db->select("fdz_discuss.*,fdz_user.name as username,fdz_user.avatar")->from($this->tablename)->join("fdz_user","fdz_user.id=user")->where(array(
			"fdz_discuss.id"=>$id))->get();
		return $query->row();
	}
}