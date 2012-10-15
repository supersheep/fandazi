<?php
	
class User extends FDZ_Controller{

	public function show($id){

		$this->load->model("usermodel");
		$user = $this->usermodel->get_by_id($id);

		if(count($user)){
			$this->load->model("mealmodel");
			$recent_meals = $this->mealmodel->get_user_last_attend($user->id);
			foreach ($recent_meals as $meal) {
				$meal = $this->mealmodel->get_pic_info($meal);
				$meal = $this->mealmodel->get_shop_info($meal);
			}

			$this->load->model("followmodel");

			// 和该用户发生关系
			if(!$this->current_user){
				$followed = false;
			}else{
				$pair = $this->followmodel->get_one_by_pair($this->current_user->id,$user->id);
				$followed = $this->logged && count($pair);
			}

			$followers = $this->followmodel->get_followers_of_user($user->id,0,10);

			$this->data = array(
				"css" => array("user_show"),
				"recent_meals" => $recent_meals,
				"jsmain" => "user_show",
				"followed" => $followed,
				"followers" => $followers,
				"jsdata" => array(
					"userid"=>$user->id
				),
				"user" => $user
			);

			$this->view = "user_show";
			$this->header();
		}else{

			$this->error("该用户不存在");
		}
	}

}