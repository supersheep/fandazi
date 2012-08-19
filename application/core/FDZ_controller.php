<?php

class FDZ_Controller extends CI_Controller{
	
	public function __construct(){

		parent::__construct();
		$this->load->model("usermodel");
		$logged = $this->logged = $this->usermodel->logged();
		if($logged){
			$this->current_user = $this->usermodel->current();
		}else{
			$this->current_user = null;
		}
	}

	// 若未登录
	function checklogin(){
		if(!$this->logged){
			$redir = "?redir=".urlencode(current_url());
			redirect("/login".$redir);
		}
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

		$this->load->view("frag/header",$this->data);
		$this->load->view("pages/".$this->view,$this->data);
		$this->load->view("frag/footer",$this->data);

	}

}