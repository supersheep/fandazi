<?php
	
class Mealdiscuss extends FDZ_Controller{

	public function show($meal_id,$discussion_id){
		$this->load->model(array(
			"discussmodel",
			"replymodel",
			"picturemodel"
			)
		);
		$this->load->library('form_validation');
		$this->load->helper("url");

		$this->view = "discuss_detail";

		if($this->form_validation->run("mealdiscuss/show") == TRUE && $this->current_user){

			
			$this->replymodel->insert(array(
				"refer_id"=>$discussion_id,
				"user"=>$this->current_user->id,
				"content"=>$this->input->post("content"),
				"create_time"=>date("Y-m-d h:i:s")
			));
			redirect(current_url());
		}else{
			$discuss = $this->discussmodel->get_by_id($discussion_id);


			$discuss->avatar = $this->picturemodel->small_name(array(
				"name"=>$discuss->avatar,"path"=>"avatars"));

			$replies = $this->replymodel->get_by_refer_id($discussion_id);
			foreach($replies as $reply){
				$reply->avatar = $this->picturemodel->small_name(array(
					"name"=>$reply->avatar,"path"=>"avatars"));
			}
			$this->data = array(
				'discuss'=>$discuss,
				'replies'=>$replies
			);
			$this->header();

		}

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