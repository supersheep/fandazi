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
				$this->mealmodel->add_one_attender($meal->id);
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
				$this->mealmodel->remove_one_attender($meal->id);
				$this->success("取消报名成功");
			};
		}
	}

	public function follow(){
		if(!$this->logged){
			$this->forbidden();
		}else{
			$this->load->model("usermodel");
			$from = $this->input->get("userid");
			if(!count($this->usermodel->get_by_id($from))){
				$this->error("该用户不存在");
			}else{
				$to = $this->current_user->id;
				$data = array(
					"from" => $from,
					"to" => $to
				);
				$this->load->model("followmodel");
				$this->followmodel->insert($data);
				$this->success();
			}
		}
	}

	private function forbidden(){
		echo json_encode(array(
			'code'=>403,
			'msg'=>"未登录"
		));
	}
	
	function error($msg){
		$ret = array();
		$ret["code"] = 500;
		if(isset($msg)){
			$ret["msg"] = $msg;
		}
		echo json_encode($ret);
	}
	
	function success($msg){
		$ret = array();
		$ret["code"] = 200;
		if(isset($msg)){
			$ret["msg"] = $msg;
		}
		echo json_encode($ret);
	}

}