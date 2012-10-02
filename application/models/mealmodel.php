<?php

class Mealmodel extends FDZ_Model{

	var $tablename = "fdz_meal";

	function get_by_hash($hash){
		$query = $this->db->select()->where(array("hash"=>$hash))->get($this->tablename);
		return $query->row();
	}

	function get_last($data=array(),$limit=10,$offset=0,$by="start"){
		$where = array($this->tablename.".status"=>1) + $data;
		$query = $this->db->select("fdz_meal.id,shop_id,title,pic,host,start,createtime,describe,fdz_meal.status,attend_count,name")
			->join('fdz_shop', 'fdz_shop.id = fdz_meal.shop_id')
			->where($where)->order_by($by,"desc")->get($this->tablename,$limit,$offset);
		
		return $query->result();
	}

	function get_user_last_attend($userid,$limit=5){
		$query = $this->db->select("fdz_meal.*")->from($this->tablename)->join("fdz_participant","fdz_participant.meal_id = fdz_meal.id")->where(array("user_id"=>$userid))->get();
		return $query->result();
	}

	function add_one_attender($id){
		$this->db->set("attend_count","attend_count+1",FALSE);
		$this->db->where(array("id"=>$id));
		$this->db->update($this->tablename);
	}


	function remove_one_attender($id){
		$this->db->set("attend_count","attend_count-1",FALSE);
		$this->db->where(array("id"=>$id));
		$this->db->update($this->tablename);
	}

	function get_attenders($meal){
		$this->load->model(array("usermodel","participantmodel"));

		if(!is_null($meal)){
			$participants = $this->participantmodel->get_all_by_meal_id($meal->id);
			$attenders = array();
			
			foreach ($participants as $key => $participant) {
				$user = $this->usermodel->get_by_id($participant->user_id);
				if(count($user)){
					$attenders[] = $user;
				}
			}

			$meal->participants = $attenders;

		}
		return $meal;
	}

	function get_shop_info($meal){
		$this->load->model("shopmodel");

		if(!is_null($meal)){
			$shop = $this->shopmodel->get_by_id($meal->shop_id);
			$meal->shop = $shop;
		}
		return $meal;
	}

	function get_pic_info($meal){
		$this->load->model("picturemodel");

		if(!is_null($meal)){

			$pic_id = $meal->pic;
			if(!is_null($pic_id)){
				$pic = $this->picturemodel->get_by_id($pic_id);
				$meal->pic_large = $this->picturemodel->large_name($pic);
				$meal->pic_middle = $this->picturemodel->middle_name($pic);
				$meal->pic_small = $this->picturemodel->small_name($pic);
			}else{
				$meal->pic_large = "/s/i/default_meal_large.png";
				$meal->pic_middle = "/s/i/default_meal_middle.png";
				$meal->pic_small = "/s/i/default_meal_small.png";
			}
		}
		return $meal;
	}

	function get_full_info($meal){

		$meal = $this->get_attenders($meal);
		$meal = $this->get_shop_info($meal);
		$meal = $this->get_pic_info($meal);

		return $meal;
	}
	

}