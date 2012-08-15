<?php
	
class Ajax extends FDZ_Controller{

	public function meal($type){
		if($type === "attend"){
			$this->meal_attend();
		}else if($type === "unattend"){
			$this->meal_unattend();
		}else{
			$this->error("action not found");
		}
	}

	public function meal_attend(){
		if(!$this->logged){
			$this->forbidden();
		}else{
			$this->load->model(array("mealmodel","participantmodel"));
			$mealid = $this->input->get("mealid");
			$data = array(
				"user_id" => $this->current_user->id,
				"meal_id" => $mealid
			);

			$meal = $this->mealmodel->get_by_id($mealid);
			$attend = $this->participantmodel->get_one_by_data($data);

			//
			if(!count($meal)){
				$this->error("该聚餐不存在");
			}else if(count($attend)){
				$this->error("已报名");
			}else{
				$this->participantmodel->insert($data);
				$this->success("报名成功");
			};
		}
	}

	public function meal_unattend(){
		if(!$this->logged){
			$this->forbidden();
		}else{
			$this->load->model(array("mealmodel","participantmodel"));
			$mealid = $this->input->get("mealid");
			$userid = $this->current_user->id;

			$data = array(
				"user_id" => $userid,
				"meal_id" => $mealid
			);

			$meal = $this->mealmodel->get_by_id($mealid);
			$attend = $this->participantmodel->get_one_by_data($data);

			if(!count($meal)){
				$this->error("该聚餐不存在");
			}else if(!count($attend)){
				$this->error("未报名无法取消");
			}else if($userid == $meal->host){
				$this->error("发起人无法直接取消");
			}else{
				$this->participantmodel->delete_by_data($data);
				$this->success("取消报名成功");
			};
		}
	}

	private function forbidden(){
		echo json_encode(array(
			'code'=>403,
			'msg'=>"未登录"
		));
	}
	
	private function error($msg){
	
		echo json_encode(array(
			'code'=>500,
			'msg'=>$msg
		));
	}
	
	private function success($result){
		echo json_encode(array(
			'code'=>200,
			'msg'=>$result
		));
	}

}