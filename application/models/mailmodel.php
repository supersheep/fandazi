<?php

class Mailmodel extends FDZ_Model{

	var $tablename = "fdz_mail";

	function get_last_out($user_id,$start=0){
		$query = $this->db->select("fdz_user.id as user_id,fdz_user.name as user_name,fdz_mail.*")->from($this->tablename)
		->join("fdz_user","fdz_user.id=fdz_mail.to_user_id")
		->where(array("from_user_id"=>$user_id))
		->limit(30,$start)->get();
		return $query->result();
	}

	function get_by_id($id){
		$query = $this->db->select("fdz_user.id as user_id,fdz_user.name as user_name,fdz_mail.*")->from($this->tablename)
		->join("fdz_user","fdz_user.id=fdz_mail.from_user_id")
		->where(array("fdz_mail.id"=>$id))
		->get();
		return $query->row();
	}

	function get_last_in($user_id,$start=0){
		$query = $this->db->select("fdz_user.id as user_id,fdz_user.name as user_name,fdz_mail.*")->from($this->tablename)
		->join("fdz_user","fdz_user.id=fdz_mail.from_user_id")
		->where(array("to_user_id"=>$user_id))
		->limit(30,$start)->get();
		return $query->result();
	}

	function send_email($userid,$message){
		$this->load->model("usermodel");
		$this->load->library('email');

		$user = $this->usermodel->get_by_id($userid);

		$this->email->from("noreply@fandazi.com","饭搭子");
		$this->email->to($user->email); 
		$this->email->subject("欢迎来到饭搭子");
		$this->email->message($message);
		$this->email->send();
	}
}
	