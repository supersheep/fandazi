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

	function insert($data){
		$query = $this->db->insert($this->tablename,$data);
	}


	function small_name($pic){
		return base_url($pic->path."/".$pic->name."_small.jpg");
	}

	function middle_name($pic){
		return base_url($pic->path."/".$pic->name."_middle.jpg");
	}

	function large_name($pic){
		return base_url($pic->path."/".$pic->name."_large.jpg");
	}

}