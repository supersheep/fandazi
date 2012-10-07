<?php

class Mailmodel extends FDZ_Model{

	var $tablename = "fdz_mail";

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
	