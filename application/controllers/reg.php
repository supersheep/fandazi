<?php

	
class Reg extends FDZ_Controller {

	public function index(){
		$this->load->model(array("citymodel","usermodel","messagemodel","tokenmodel"));
		


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
				"email" => $email
			));


			$message = $this->load->view("mail/confirm",array(
				"link" => base_url("/reg/confirm/".$code)
			),true);

			$this->usermodel->insert(array(
				"name" => $this->input->post("name"),
				"email" => $this->input->post("email"),
				"city" => $this->input->post("city"),
				"create_time" => date("Y-m-d h:i:s"),
				"status" => 0
			));

			$this->messagemodel->sendmail($this->db->insert_id(),$message);
			$this->view = "reg_success";
			$this->header();
		}
	}

	function confirm($code){
		$this->load->model(array("usermodel","tokenmodel"));
		$this->load->helper("url");
		$token = $this->tokenmodel->get_by_code($code);
		if(!count($token)){
			$this->view = "pageerror";
			$this->data["msg"] = "激活码不存在";
			$this->header();
		}else{
			$user = $this->usermodel->get_by_email($token->email);
			$this->usermodel->login($user->email,null,true);
			redirect("/");
		}
	}

	function valid_invitecode($val){
		return $val === "fandazi";
	}
}

?>