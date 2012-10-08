<?php

class Noticemodel extends FDZ_Model{
	var $tablename = "fdz_notice";
	

	function get_by_content_and_user($content,$user){
		$query = $this->db->select()->from($this->tablename)->where(array(
			"content"=>$content,
			"to_user_id"=>$user
		))->get();

		return $query->row();
	}

}