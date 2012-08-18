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
		$this->load->model(array('shopmodel','mealmodel','participantmodel'));
		$this->load->library('form_validation');
		$this->load->helper("url");

		// 若未登录
		if(!$this->logged){
			$redir = "?redir=".urlencode(current_url());
			redirect("/login".$redir);
		}

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

			redirect("/meal/".$id."/upload_poster");
			
		}
	}

	public function upload_poster($id){
		$this->view = "meal_upload_poster";
		$this->load->model("mealmodel");
		$this->load->helper("url");
		$meal = $this->mealmodel->get_by_id($id);

		if(!$this->logged){
			redirect("/login?redir=".urlencode(current_url()));
		}else{
			if($meal->host == $this->current_user->id){
				$this->view = "noauthority";
				$this->header();
			}else{
				$this->data = array(
					"css" => array("meal_create")
				);
				$this->header();
			}
		}

	}

	public function show($id){


		$this->view = "meal_show";

		$this->load->model("mealmodel");
		$meal = $this->mealmodel->get_by_id($id);
		$meal = $this->mealmodel->get_full_info($meal);

		if($this->logged){
			$ishost = $this->current_user->id === $meal->host;
		}else{
			$ishost = false;
		}

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
		$this->header();
	}





	/* validation functions */

	public function dpurl($str){
		return (bool) preg_match("/^http:\/\/www\.dianping\.com\/shop\/(\w)+/", $str);
	}

	public function date($str){
		return (bool) preg_match("/^\d{4}-\d{2}-\d{2}$/",$str);
	}


}

?>