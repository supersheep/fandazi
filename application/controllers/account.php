<?php
	
class Account extends FDZ_Controller{

	public function setting(){
/*
		$this->load->model("usermodel");
		$user = $this->usermodel->get_by_id($id);
 */
		$user = array();
		$this->data = array(
			"user" => $user
		);

		$this->view = "account_setting";
		parent::header();
	}


}