<?php

class Main extends FDZ_Controller{

	public function index(){
		$this->view = "main";
		$this->load->model(array("tastemodel","categorymodel"));
		$this->data = array(
			"css"=>array("index"),
			"taste" => $this->tastemodel->get_all(),
			"cate" => $this->categorymodel->get_all()
		);
		parent::header();
	}


}