<?php

class Usermodel extends FDZ_Model{

	var $tablename = "fdz_user";

	var $cookie_email = 'fdzua';
	var $cookie_name = 'fdzsession'; 

	/**
	 * 基础数据库交互方法
	 */
	function get_by_id($id){
		$query = $this->db->select()->where(array("id"=>$id))->get($this->tablename);
		$user = $query->row();
		if(is_null($user->avatar)){
			$user->avatar = "/s/i/default_avatar.png";
		}
		return $user;
	}

	function get_by_email($email){
		$query = $this->db->select()->from($this->tablename)->where('email',$email)->get();
		return $query->row();
	}

	/**
	 * 用户验证方法
	 */
	function current(){
		$email = $this->input->cookie($this->cookie_email);

		if(!$email){
			return false;
		}else{
			return $this->get_by_email($email);
		}
	}

	function login($email,$password,$ignorepwd=false){
		$this->load->library(array('user_agent','session'));
		$this->load->model("sessionmodel");

		$password = md5($password);
		$user = $this->get_by_email($email);
		
		
		if(!count($user)){
			// 用户不存在
			return -1;
		}


		if($user->password !== $password && !$ignorepwd){
			// 密码错误
			return -2;
		}
		
		
		// 登录成功
		
		// 写session
		$ua = $this->agent->browser().' '.$this->agent->version();
		$ip =  $this->input->ip_address();
		$encrypt = $this->config->item('session_encrypt_code');
		$session = md5($email.$ua.$ip.$encrypt);
		
		$this->sessionmodel->insert(array(
			'email' => $email,
			'session'=> $session,
			'ua' => $ua,
			'ip' => $ip,
		));

		// 写cookie一个月
		$expire = time()+60*60*24*30;
		$this->input->set_cookie($this->cookie_name,$session,$expire);
		$this->input->set_cookie($this->cookie_email,$email,$expire);
	
		// 返回成功
		return 1;
	}


	function logout(){
		$this->load->helper('cookie');
		$session = $this->input->cookie('cidiu');
		delete_cookie($this->cookie_name);
		delete_cookie($this->cookie_email);


		return $this->sessionmodel->delete_by_session($session);
	}

	function logged(){
		$this->load->helper('cookie');
		$this->load->library('user_agent');
		$this->load->model("sessionmodel");


		$session = $this->input->cookie($this->cookie_name);
		$email = $this->input->cookie($this->cookie_email);
		
		$ua = $this->agent->browser().' '.$this->agent->version();
		$ip = $this->input->ip_address();
		$encrypt = $this->config->item('session_encrypt_code');
		
		// 没有相应cookie则未登录
		if(!$session || !$email){
			return false;
		}

		/**
		 * 查找session
		 */
		if($this->sessionmodel->get_by_email($email)){
			
			$s = md5($email.$ua.$ip.$encrypt);
			// 若存在匹配，则已登录
			if($s == $session){
				return true;
			}else{
			// 反之则未登录，清理session
				$this->sessionmodel->delete_by_email($email);
				delete_cookie($this->cookie_name);
				delete_cookie($this->cookie_email);
				return false;
			}
			
		}else{
			// 若不存在则删除cookie
			delete_cookie($this->cookie_name);
			delete_cookie($this->cookie_email);
			return false;
		}
		
	}
}