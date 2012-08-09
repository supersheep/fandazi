<?php

	
class Reg extends FDZ_Controller {

	public function index(){
		$this->load->model("citymodel");
		
		$this->data["css"] = array("reg");
		$this->data["cities"] = $this->citymodel->get_all();
		$this->view = "reg";
		parent::header();
	}
}

?>