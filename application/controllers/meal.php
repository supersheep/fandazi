<?php

	
class Meal extends FDZ_Controller {

	public function index(){
		// echo 'Hello World!'; 
	}

	public function create(){
		$this->load->model(array('shopmodel','mealmodel'));
		$this->load->library('form_validation');


		if($this->form_validation->run() == FALSE){
			$this->form_validation->set_error_delimiters('<span class="err">', '</span>');

			$this->load->model("categorymodel");	
			$this->view = "meal_create";
			$this->data = array(
				"category" => $this->categorymodel->get_all(),
				"css" => array("meal_create")
			);
			parent::header();
		}else{
			$row = $this->shopmodel->get_by_dpurl($this->input->post("dpurl"));
			if(!count($row)){
				$row = $this->shopmodel->scratch();
			}

			//var_dump($row);
			

			

			// 避免重复创建,hash

			$this->mealmodel->insert(array(
				"shop_id" => $row->id,
				"title" => $this->input->post("title"),
				"host" => $this->current_user->id,
				"start" => $this->input->post("date").' '.$this->input->post("time"),
				"createtime" => date('Y-m-d h:i:s'),
				"describe" => $this->input->post("describe"),
				"status" => 0
			));

			// 添加当前用户到participants
			//$this->participantmodel->insert();

			echo "success";
		}
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