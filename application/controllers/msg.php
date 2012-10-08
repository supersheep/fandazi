<?php
	
class Msg extends FDZ_Controller{

	

	public function notice(){
		$this->checklogin();
		$this->load->model(array("mailmodel","noticemodel"));

		$notices = $this->noticemodel->get_all_by_data(array(
			"to_user_id" => $this->current_user->id,
			"status" => 0
		));

		$this->data["css"] = array("msg");
		$this->data["jsmain"] = "notice";
		$this->data["notices"] = $notices;
		$this->view = "notice_show";
		$this->header();
	}

	public function mail_show($id){
		$this->checklogin();
		$this->load->model(array("mailmodel","noticemodel"));
		$this->load->helper("url");

		$this->data["css"] = array("msg");
		


		$mail = $this->mailmodel->get_by_id($id);
		
		if(!count($mail)){
			redirect("msg/mail");
		}else{
			$this->data["mail"] = $mail;
			$this->view = "mail_show";
			$this->header();
		}

	}

	public function mail_inbox(){
		$this->checklogin();
		$this->load->model(array("mailmodel","noticemodel"));
		$this->load->helper("url");

		$this->data["css"] = array("msg");

		$this->data["mails"] = $this->mailmodel->get_last_in($this->current_user->id);
		$this->data["box"] = "in";
		$this->view = "mail_list";
		$this->header();
	}

	public function mail_outbox(){
		$this->checklogin();
		$this->load->model(array("mailmodel","noticemodel"));
		$this->load->helper("url");

		$this->data["css"] = array("msg");

		$this->data["mails"] = $this->mailmodel->get_last_out($this->current_user->id);
		$this->data["box"] = "out";
		$this->view = "mail_list";
		$this->header();
	}

	public function mail_new(){
		// 若未登录
		$this->checklogin();
		$this->load->model("usermodel");
		$this->load->library('form_validation');


		if($this->form_validation->run("msg/new_mail")){
			$this->load->model("mailmodel");
			$this->mailmodel->insert(array(
				"from_user_id" => $this->current_user->id,
				"to_user_id" => $this->input->post("to_user_id"),
				"title" => $this->input->post("title"),
				"content" => $this->input->post("content"),
				"create_time" => date("Y-m-d h:i:s"),
				"status" => 0
			));
			redirect("/msg/mail/outbox");
		}else{
			$to = $this->input->get("to");
			$reply_mail_id = $this->input->get("reply");

			if($to){
				$to_user_id = $to;
				$title = "";
				$content = "";
			}else if($reply_mail_id){
				$this->load->model("mailmodel");
				$mail = $this->mailmodel->get_one_by_data(array(
					"id" => $reply_mail_id
				));
				if(!count($mail)){
					redirect("/msg/mail");
				}else{
					$to_user_id = $mail->to_user_id;
					$title = "回复：".$mail->title;
					$content = "\n\n\n---------------------------\n".$mail->content;
				}
			}

			$to_user = $this->usermodel->get_by_id($to_user_id);

			if(!count($to_user)){
				// redirect("/msg/mail");
			}

			$this->data["css"] = array("msg");
		 	$this->data["user"] = $to_user;
		 	$this->data["title"] = $title;
		 	$this->data["content"] = $content;
			$this->load->library('form_validation');
			$this->load->helper("url");
			$this->view = "mail_new";
			$this->header();
		}
	}
}