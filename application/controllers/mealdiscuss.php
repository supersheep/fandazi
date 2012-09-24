<?php
	
class Mealdiscuss extends FDZ_Controller{

	public function show($meal_id,$discuession_id){

	}

	public function create($meal_id){
		// 若未登录
		$this->checklogin();
		$this->load->model(array("discussmodel","mealmodel"));
		$this->load->library('form_validation');
		$this->load->helper("url");



		$meal = $this->mealmodel->get_by_id($meal_id);
		if(!count($meal)){
			$this->error("聚餐不存在");
		}
 
		if($this->form_validation->run("mealdiscuss/create") == FALSE){

			$this->form_validation->set_error_delimiters('<span class="err">', '</span>');
			$this->view = "discuss_create";

			$this->header();
		}else{
			$this->discussmodel->insert(array(
				"title" => $this->input->post("title"),
				"content" => $this->input->post("title"),
				"user" => $this->current_user->id,
				"create_time" => date("Y-m-d h:i:s"),
				"reply_count" => 0
			));
			$discussion_id = $this->db->insert_id(); 
			redirect("/meal/".$meal_id."/discuss/".$discussion_id);
		}
	}
}