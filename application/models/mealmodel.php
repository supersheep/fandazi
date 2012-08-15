<?php

class Mealmodel extends FDZ_Model{

	var $tablename = "fdz_meal";

	function insert($data){
		$this->db->insert($this->tablename,$data);
	}

	function get_by_hash($hash){
		$query = $this->db->select()->where(array("hash"=>$hash))->get($this->tablename);
		return $query->row();
	}

	function get_last($limit=10,$offset=0){

		$query = $this->db->select()->where(array("status"=>1))->get($this->tablename,$limit,$offset);
		return $query->result();
	}

	function get_full_info($meal){
		$this->load->model(array("shopmodel","usermodel","participantmodel","mealmodel"));
		if(!is_null($meal)){
			$shop = $this->shopmodel->get_by_id($meal->shop_id);

			$meal->shop = $shop;

			$participants = $this->participantmodel->get_all_by_meal_id($meal->id);
			$attenders = array();
			

			foreach ($participants as $key => $participant) {
				$user = $this->usermodel->get_by_id($participant->user_id);
				$attenders[] = $user;
			}

			$pic_id = $meal->pic;
			if(!is_null($pic_id)){
				$pic = $this->picmodel->get_by_id($pic_id);
				$meal->pic_large = $pic->large;
				$meal->pic_small = $pic->small;
			}else{
				$meal->pic_large = "/s/i/default_meal_large.png";
				$meal->pic_small = "/s/i/default_meal_small.png";
			}
			$meal->participants = $attenders;
		}

		return $meal;
	}
	

}