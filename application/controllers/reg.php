<?php

	
class Reg extends FDZ_Controller {

	public function index(){
		$this->load->model(array("citymodel","usermodel","mailmodel","tokenmodel"));
		


		$this->load->library('form_validation');
		$this->load->helper("url");

		if($this->form_validation->run() == FALSE){
			$this->form_validation->set_error_delimiters('<span class="err">', '</span>');

			$this->data = array(
				"css" => array("reg"),
				"cities" => $this->citymodel->get_all()
			);

			$this->view = "reg";
			$this->header();
		}else{
			$email = $this->input->post("email");
			$create_time = date("Y-m-d h:i:s");
			$code = md5($email.$create_time);

			$this->tokenmodel->insert(array(
				"code" => $code,
				"email" => $email,
				"status" => 0
			));


			$message = $this->load->view("mail/confirm",array(
				"link" => base_url("/reg/confirm/".$code)
			),true);

			$this->usermodel->insert(array(
				"password"=> md5($this->input->post("password")),
				"name" => $this->input->post("name"),
				"email" => $this->input->post("email"),
				"city" => $this->input->post("city"),
				"create_time" => date("Y-m-d h:i:s"),
				"status" => 0
			));

			$this->mailmodel->send_email($this->db->insert_id(),$message);
			$this->view = "reg_success";
			$this->simpleheader();
		}
	}

	function confirm($code){
		$this->load->model(array("usermodel","tokenmodel"));
		$this->load->helper("url");
		$token = $this->tokenmodel->get_by_code($code);
		if(!count($token) || $token->status == 1){
			$this->view = "pageerror";
			$this->data["msg"] = "激活码不存在";
			$this->header();
		}else{

			$user = $this->usermodel->get_by_email($token->email);

			$this->usermodel->update($user->id,array(
				"status" =>1
			));
			$this->tokenmodel->update($token->id,array(
				"status" =>1
			));

			$ret = $this->usermodel->login($token->email,null,true);
			if($ret == -1){
				$this->view = "pageerror";
				$this->data["msg"] = "用户不存在";
				$this->header();
			}else{
				redirect("/");
			}; 
		}
	}

	function valid_invitecode($val){
		return $val === "fandazi";
	}
}

?>