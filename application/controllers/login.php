<?php
	
class Login extends FDZ_Controller{

	public function index(){

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('usermodel');
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		
		
		$this->data["errcode"] = 0;

		if($email && $password){
			
			// 若登录成功
			$login_code = $this->usermodel->login($email,$password);
		
			if($login_code == 1){
				redirect('/');
			}else{
				$this->data["errcode"] = $login;
			}
		}

		$this->data["css"] = array("reg");
		$this->view = "login";
		parent::header();
	}


}