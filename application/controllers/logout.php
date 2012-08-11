<?php
	
class Logout extends FDZ_Controller{

	public function index()
	{
		$this->load->model('usermodel');
		$this->load->helper('url');
		
		$this->usermodel->logout();
		redirect('/');
		
	}


}