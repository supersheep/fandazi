<?php
	
class Upload extends FDZ_Controller{

	var $errors = array(
		"access deny" => "没有操作权限",
		"meal not exist" => "该聚餐不存在",
		"error processing" => "处理图片发生错误"
	);

	private function success($msg){
		$this->load->view("pages/upload",array(
			"type"=> "success",
			"msg" => $msg
		));
	}

	private function fail($code){
		if(isset($this->errors[$code])){
			$msg = $this->errors[$code];
		}else{
			$msg = $code;
		}
		$this->load->view("pages/upload",array(
			"type"=> "fail",
			"msg" => $msg
		));
	}

	function avatar(){}

	function poster(){
		// var_dump(is_dir('./poster/'));
		// var_dump($this->input->post('poster'));
		$this->load->model("picturemodel");

		if(!$this->logged){
			$this->fail("access deny");
			return;
		}

		$this->load->model("mealmodel");
		$meal = $this->mealmodel->get_by_id($this->input->post("mealid"));

		if(!count($meal)){
			$this->fail("meal not exist");
		}

		if($meal->host !== $this->current_user->id){
			$this->fail("access deny");
		}

		$this->load->model("uploadmodel");


		$origin_name = substr(md5($meal->id.$meal->createtime),0,10);

		$path_name = "poster";

		if(!$this->uploadmodel->upload($origin_name,$path_name)){
			$this->fail($this->uploadmodel->error());
		}else{
			$this->uploadmodel->create_small();
			$this->uploadmodel->create_middle();
			$this->uploadmodel->create_large();

			$data = array(
				"name" => $origin_name,
				"path" => $path_name
			);

			$pic = $this->picturemodel->get_by_name($origin_name);

			if(!count($pic)){
				$this->picturemodel->insert($data);
				$this->mealmodel->update($meal->id,array(
					"pic" => $this->db->insert_id()
				));
				$pic = (object) $data;
			}
			
			$middle_name = $this->picturemodel->middle_name($pic);
			$this->success($middle_name);
		}




	}

}