<?php

class FDZ_Controller extends CI_Controller{
	
	public function __construct(){

		parent::__construct();


	}

	public function header(){
		if(!isset($this->data)){
			$this->data = array();
		}
		if(!isset($this->data["js"])){
			$this->data["js"] = array();
		}
		if(!isset($this->data["css"])){
			$this->data["css"] = array();
		}
		$this->load->view("frag/header",$this->data);
		$this->load->view("pages/".$this->view,$this->data);
		$this->load->view("frag/footer",$this->data);

	}

}