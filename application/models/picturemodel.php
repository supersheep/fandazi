<?php
	

class Picturemodel extends FDZ_Model{

	var $tablename = "fdz_pic";

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	function get_by_name($name){
		$query = $this->db->select()->where(array("name"=>$name))->get($this->tablename);
		return $query->row();
	}

	private function get_name($pic,$type){
		$pic = (object)$pic;
		if($pic->path == "avatars"){
			$suffix = substr($type,0,1);
			if(!isset($pic->name)){
				return "/s/i/default_avatar.png";
			}
		}else{
			$suffix = $type; 
		}
		return base_url($pic->path."/".$pic->name."_".$suffix.".jpg");
	}
        
	function insert($data){
		$query = $this->db->insert($this->tablename,$data);
	}

	function small_name($pic){
		return $this->get_name($pic,"small");
	}

	function middle_name($pic){
		return $this->get_name($pic,"middle");
	}

	function large_name($pic){
		return $this->get_name($pic,"large");
	}

}