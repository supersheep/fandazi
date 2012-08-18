<?php
	
class Upload extends FDZ_Controller{

	private function echoscript($msg){
		$this->load->view("pages/upload",array(
			"msg" => $msg
		));
	}

	function index(){
		var_dump($this->input->post());
		$this->echoscript(1);
	}

}

