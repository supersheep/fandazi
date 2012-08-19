<?php

	
class Meal extends FDZ_Controller {

	public function scratchtest(){
		$this->load->model("shopmodel");
		$url = $this->input->get("url");
		if(empty($url)){
			echo "url required";
		}else{
			var_dump($shop = $this->shopmodel->scratch($url,true));
		}
	}

	public function create(){
		// 若未登录
		$this->checklogin();


		$this->load->model(array('shopmodel','mealmodel','participantmodel'));
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
			$this->header();
		}else{
		// 表单验证通过
			$url = $this->input->post("dpurl");
			$shop = $this->shopmodel->get_by_dpurl($url);
			if(!count($shop)){
				$shop = $this->shopmodel->scratch($url);
				//var_dump($shop);
			}

			$host = $this->current_user->id;
			$title = $this->input->post("title");
			// 避免重复创建,hash
			$start = $this->input->post("date").' '.$this->input->post("time");
			$hash = md5($host.$title.$shop->id.$start);
			$meal = $this->mealmodel->get_by_hash($hash);

			if(count($meal)){
				$id = $meal->id;
				// redirect("/meal/exist");
			}else{
				$this->mealmodel->insert(array(
					"shop_id" => $shop->id,
					"title" => $title,
					"host" => $host,
					"start" => $start,
					"createtime" => date('Y-m-d h:i:s'),
					"category" => $this->input->post("category"),
					"describe" => $this->input->post("describe"),
					"status" => 0,
					"hash" => $hash,
					"attend_count" => 1
				));
				$id = $this->db->insert_id();

				$this->participantmodel->insert(array(
					"user_id"=>$this->current_user->id,
					"meal_id"=>$id
				));
			}

			redirect("/meal/".$id."/upload_poster");
			
		}
	}

	public function upload_poster($id){

		$this->checklogin();


		$this->load->model("mealmodel");
		$this->load->helper("url");
		$meal = $this->mealmodel->get_by_id($id);

		if($meal->host !== $this->current_user->id){
			$this->error("您没有该页面的访问权限");
		}else{
			$this->view = "meal_upload_poster";
			$this->data = array(
				"jsdata"=>array(
					"mealid"=>$meal->id
				),
				"meal" => $this->mealmodel->get_full_info($meal),
				"css" => array("meal_create")
			);
			$this->header();
		}

	}

	public function show($id){


		$this->view = "meal_show";

		$this->load->model(array("usermodel","mealmodel","participantmodel"));
		$meal = $this->mealmodel->get_by_id($id);

		if(!count($meal)){
			$this->error("该聚餐不存在");
			return;
		}

		$meal = $this->mealmodel->get_full_info($meal);

		if($this->logged){
			$ishost = $this->current_user->id === $meal->host;
		}else{
			$ishost = false;
		}

		if($this->logged){

			$attend = $this->participantmodel->get_one_by_data(array(
				"user_id" => $this->current_user->id,
				"meal_id" => $meal->id
			));
			if(count($attend)){
				$attended = true; 
			}else{
				$attended = false;
			}

		}else{
			$attended = false;
		}


		$this->data = array(
			"jsdata"=>array(
				"userid"=>$this->current_user ? $this->current_user->id : "null",
				"mealid"=>$meal->id,
				"cityid"=>$meal->shop->city
			),
			"attended" => $attended,
			"css"=>array("meal"),
			"jsmain"=>"meal", 
			"ishost"=>$ishost,
			"host"=>$this->usermodel->get_by_id($meal->host),
			"meal"=>$meal
		);
		$this->data["meal"] = $meal;
		$this->header();
	}





	/* validation functions */

	public function valid_dpurl($str){
		return (bool) preg_match("/^http:\/\/www\.dianping\.com\/shop\/(\w)+/", $str);
	}

	public function valid_date($str){
		return (bool) preg_match("/^\d{4}-\d{2}-\d{2}$/",$str);
	}


}

?>