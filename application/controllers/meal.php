<?php

	
class Meal extends FDZ_Controller {

	public function index(){
		// echo 'Hello World!'; 
	}

	public function show($id){

		$this->load->model("mealmodel");

		$meal = $this->mealmodel->get_by_id($id);


		$this->view = "meal_show";
		$meal = $this->mealmodel->get_full_info($meal);


		$this->data = array(
			"jsdata"=>array(
				"cityid"=>$meal->shop->city
			),
			"css"=>array("meal"),
			"meal"=>$meal
		);
		$this->data["jsdata"] = array(
			"cityid"=>$meal->shop->city
		);
		$this->data["meal"] = $meal;
		parent::header();
	}
}

?>