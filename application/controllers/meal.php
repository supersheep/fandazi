<?php

	
class Meal extends FDZ_Controller {

	public function index(){
		// echo 'Hello World!'; 
	}

	public function create(){
		$this->load->model(array('shopmodel','mealmodel'));
		$this->load->library('form_validation');
		$this->load->helper("url");

		// 表单验证不通过
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
		// 表单验证通过
			$url = $this->input->post("dpurl");
			$shop = $this->shopmodel->get_by_dpurl($url);
			if(!count($shop)){
				$shop = $this->shopmodel->scratch($url);
				//var_dump($shop);
			}

			// 避免重复创建,hash
			$start = $this->input->post("date").' '.$this->input->post("time");
			$hash = md5($shop->id.$start);
			$meal = $this->mealmodel->get_by_hash($hash);

			if(count($meal)){
				$id = $meal->id;
			}else{
				$this->mealmodel->insert(array(
					"shop_id" => $shop->id,
					"title" => $this->input->post("title"),
					"host" => $this->current_user->id,
					"start" => $start,
					"createtime" => date('Y-m-d h:i:s'),
					"describe" => $this->input->post("describe"),
					"status" => 0,
					"hash" => $hash
				));
				$id = $this->db->insert_id();

				$this->participantmodel->insert(array(
					"user_id"=>$this->current_user->id,
					"meal_id"=>$id
				));
			}

			redirect("/meal/".$id);
			
		}
	}

	public function show($id){


		$this->view = "meal_show";

		$this->load->model("mealmodel");
		$meal = $this->mealmodel->get_by_id($id);
		$meal = $this->mealmodel->get_full_info($meal);

		$ishost = $this->current_user->id === $meal->host;

		$this->data = array(
			"jsdata"=>array(
				"userid"=>$this->current_user ? $this->current_user->id : "null",
				"mealid"=>$meal->id,
				"cityid"=>$meal->shop->city
			),
			"css"=>array("meal"),
			"jsmain"=>"meal", 
			"ishost"=>$ishost,
			"meal"=>$meal
		);
		$this->data["meal"] = $meal;
		parent::header();
	}
}

?>