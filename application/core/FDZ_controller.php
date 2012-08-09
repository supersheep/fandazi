<?php

class FDZ_Controller extends CI_Controller{
	

	public function header(){

		$this->load->view("frag/header",$this->data);
		$this->load->view("pages/".$this->view,$this->data);
		$this->load->view("frag/footer",$this->data);

	}

}