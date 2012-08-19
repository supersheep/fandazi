<?php

class Main extends FDZ_Controller{

	public function index(){

		$this->view = "main";
		$this->load->model(array("tastemodel","categorymodel","mealmodel"));

		$where = array();

		$cateid = $this->input->get("cate");
		$tasteid = $this->input->get("taste");


		if($cateid && $cateid !=="all"){
			$where["cate"] = $cateid;
		}

		if($tasteid && $tasteid !== "all"){
			$where["taste"] = $tasteid;
		}

		$meals = $this->mealmodel->get_last($where,10);

		$meals_full_info = array();

		foreach($meals as $meal){
			$meals_full_info[] = $this->mealmodel->get_full_info($meal);
		}

		$this->data = array(
			"css"=>array("index"),
			"taste" => $this->tastemodel->get_all(),
			"cate" => $this->categorymodel->get_all(),
			"meals" => $meals_full_info,
			"cateid" => $cateid=="" ? "all" : $cateid,
			"tasteid" => $tasteid=="" ? "all" : $tasteid,
		);
		$this->header();
	}


}