<?php
	
class Msg extends FDZ_Controller{

	public function mail(){
		$this->checklogin();
		$this->load->model(array("discussmodel","mealmodel"));
		$this->load->helper("url");
	}

	public function notice(){
		$this->checklogin();
		$this->load->helper("url");
	}

	public function new_mail(){
		// 若未登录
		$this->checklogin();
		$this->load->model(array(""));
		$this->load->library('form_validation');
		$this->load->helper("url");
		$this->view = "mail_new";
		$this->header();
	}
}