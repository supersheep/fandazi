<?php
	
class User extends FDZ_Controller{

	public function show($id){

		$this->load->model("usermodel");
		$user = $this->usermodel->get_by_id($id);

		if(count($user)){

			$this->data = array(
				"user" => $user
			);
			$this->view = "user_show";
			$this->header();
		}else{

			$this->error("该用户不存在");
		}
	}

}