<?php
	
class Account extends FDZ_Controller{

	public function setting(){
		$this->load->model(array("citymodel"));
		$this->load->library('form_validation');
		$this->load->helper("url");

		if(!$this->logged){
			redirect("/login?redir=".urlencode("/account_setting"));	
		}


		if($this->input->post() == false){
			$this->form_validation->set_error_delimiters('<span class="err">', '</span>');


			$this->data = array(
				"cities" => $this->citymodel->get_all(),
				"css" => array("account")
			);

			$this->view = "account_setting";

			$this->header();
		}else{
			$postdata = $this->input->post();
			$this->usermodel->update($this->current_user->id,array(
				"company" => $postdata["company"],
				"duty" => $postdata["duty"],
				"city" => $postdata["city"],
				"bio" => $postdata["bio"],
				"school" => $postdata["school"],
				"graduation_year" => $postdata["graduation_year"],
				"interests" => $postdata["interests"]
			));
			redirect("/user/".$this->current_user->id);
		}
		

	}


}