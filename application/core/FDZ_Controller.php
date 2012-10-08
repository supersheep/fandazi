<?php

class FDZ_Controller extends CI_Controller{
	
	public function __construct(){

		parent::__construct();
		$this->load->model("usermodel");
		$logged = $this->logged = $this->usermodel->logged();
		if($logged){
			$this->current_user = $this->usermodel->current();
			$this->load->model(array("noticemodel","mailmodel"));
			$notices = $this->noticemodel->get_all_by_data(array(
				"to_user_id"=>$this->current_user->id,
				"status"=>0));
			$mails = $this->mailmodel->get_all_by_data(array(
				"to_user_id"=>$this->current_user->id,
				"status"=>0));
			$this->msgcount = count($notices) + count($mails);
		}else{
			$this->msgcount = null;
			$this->current_user = null;
		}
	}

	function error($msg){
		$this->view = "pageerror";
		$this->data["msg"] = $msg;
		$this->header();
	}

	// 若未登录
	function checklogin(){
		if(!$this->logged){
			$this->load->helper("url");
			$redir = "?redir=".urlencode(current_url());
			redirect("/login".$redir);
		}
	}

	public function simpleheader(){
		if(!isset($this->data)){
			$this->data = array();
		}
		if(!isset($this->data["js"])){
			$this->data["js"] = array();
		}
		if(!isset($this->data["css"])){
			$this->data["css"] = array();
		}
		
		$this->load->view("frag/simpleheader",$this->data);
		$this->load->view("pages/".$this->view,$this->data);
		$this->load->view("frag/footer",$this->data);
	}

	public function header(){
		if(!isset($this->data)){
			$this->data = array();
		}
		if(!isset($this->data["js"])){
			$this->data["js"] = array();
		}
		if(!isset($this->data["css"])){
			$this->data["css"] = array();
		}
		
		$this->data["current_user"] = $this->current_user;
		$this->data["logged"] = $this->logged;
		$this->data["msgcount"] = $this->msgcount;

		$this->load->view("frag/header",$this->data);
		$this->load->view("pages/".$this->view,$this->data);
		$this->load->view("frag/footer",$this->data);
	}

}
