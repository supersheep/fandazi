<?php
	
class User extends FDZ_Controller{

	public function show($id){

		$this->load->model("usermodel");
		$user = $this->usermodel->get_by_id($id);

		$this->data = array(
			"user" => $user
		);
		$this->view = "user";
		parent::header();
	}


}