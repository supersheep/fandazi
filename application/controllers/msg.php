<?php
	
class Msg extends FDZ_Controller{

	public function mail(){
		$this->checklogin();
		$this->load->model(array("mailmodel","noticemodel"));
		$this->load->helper("url");

		$this->data["css"] = array("msg");
		$this->view = "mail_show";
		$this->header();
	}

	public function notice(){
		$this->checklogin();
		$this->load->model(array("mailmodel","noticemodel"));

		$notices = $this->noticemodel->get_all_by_data(array(
			"to_user_id" => $this->current_user->id,
			"status" => 0
		));




		$this->data["css"] = array("msg");
		$this->data["notices"] = $notices;
		$this->view = "notice_show";
		$this->header();
	}

	public function new_mail(){
		// 若未登录
		$this->checklogin();
		$this->data["css"] = array("msg");
		$this->load->library('form_validation');
		$this->load->helper("url");
		$this->view = "mail_new";
		$this->header();
	}
}