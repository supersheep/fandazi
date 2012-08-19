<?php

	
class Reg extends FDZ_Controller {

	public function index(){
		$this->load->model("citymodel");
		


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
			echo "ok";
			//$this->sendmail();
			//$this->view = "reg_success";
			//$this->header();
		}
	}

	function valid_invitecode($val){
		return $val === "fandazi";
	}
}

?>