<?php

class Main extends FDZ_Controller{

	public function index(){

		$this->view = "main";
		$this->load->model(array("tastemodel","categorymodel","mealmodel"));

		$where = array();

		$cateid = $this->input->get("cate");
		$tasteid = $this->input->get("taste");

		// 取出所有分类
		if($cateid && $cateid !=="all"){
			$where["cate"] = $cateid;
		}

		// 取出所有口味
		if($tasteid && $tasteid !== "all"){
			$where["taste"] = $tasteid;
		}

		// 取出符合条件的最近的十次聚餐
		$meals = $this->mealmodel->get_last($where,10);

		$meals_full_info = array();

		foreach($meals as $meal){
			$meals_full_info[] = $this->mealmodel->get_full_info($meal);
		}

		// 取出热门用户，以关注数倒序排列
		$hotuser = $this->usermodel->get_hotests(5);

		// 取出热门聚餐
		$hotmeal = $this->mealmodel->get_last(array(),5,0,"start");
		foreach ($hotmeal as $meal) {
			$meal->date = $this->mealmodel->dealdate($meal->start);
			$meal->date = $meal->date[1];
		}

		// 取出所有中的最近的五次聚餐
		$lastmeal = $this->mealmodel->get_last(array(),5,0,"start");
		foreach ($lastmeal as $meal) {
			$meal->date = $this->mealmodel->dealdate($meal->start);
			$meal->date = $meal->date[1];
		}

		// 取出热门用户，以聚餐数倒序排列
		$hotshop = array();//$this->shopmodel->get_hotests(5);

		$this->data = array(
			"css"=>array("index"),
			"taste" => $this->tastemodel->get_all(),
			"cate" => $this->categorymodel->get_all(),
			"meals" => $meals_full_info,
			"cateid" => $cateid=="" ? "all" : $cateid,
			"hotuser" => $hotuser,
			"hotmeal" => $hotmeal,
			"hotshop" => $hotshop,
			"lastmeal" => $lastmeal,
			"tasteid" => $tasteid=="" ? "all" : $tasteid,
		);
		$this->header();
	}


}