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

			$this->data = array(
				"css" => array("user_show"),
				"recent_meals" => $recent_meals,
				"user" => $user
			);

			$this->view = "user_show";
			$this->header();
		}else{

			$this->error("该用户不存在");
		}
	}

}