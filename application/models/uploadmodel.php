<?php

/**
 * 图片上传类
 */
class Uploadmodel extends FDZ_Model{

	var $origin_name = "";
	var $origin_path = "";
	var $ext = ".jpg";

	private function name_with_suffix($name,$suffix){
		$suffix = empty($suffix)?"":"_".$suffix;
		return $name.$suffix.$this->ext;
	}

	function error(){
		return $this->upload->display_errors('','');
	}

	function upload($origin_name,$path){

		$upload_path = BASEPATH."../".$path."/";

		$this->origin_name = $origin_name;
		$this->origin_path = $upload_path.$origin_name;

		$config['file_name'] = $origin_name.$this->ext;
		
		// upload config
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['overwrite'] = TRUE; // 覆盖图片
		$config['max_size']	= '2048'; // 2M limit


		$this->load->library('upload', $config);

		return $this->upload->do_upload();
	}



	// 结果图片宽高与参数相同，超出部分裁减
	function resize_out($image_path,$width,$height){
		$new_name = "";
		return $new_name;
	}

	// 结果图片宽高不超出参数
	 
	function resize_in($image_path,$suffix="",$width,$height){
		
		$new_name = $this->name_with_suffix($image_path,$suffix);

		$config['image_library'] = 'gd2';
		$config['source_image']	= $image_path.$this->ext;
		$config['new_image'] = $new_name;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = $width;
		$config['height']	= $height;

		$this->load->library("image_lib");
		$this->image_lib->initialize($config);

		if(!$this->image_lib->resize()){
			$this->error("error processing");
		}
		
		$this->image_lib->clear();
		return $new_name;
	}
	
	function create_small(){
		$image_path = $this->origin_path;
		$this->resize_in($image_path,"small",160,120);
	}

	function create_middle(){
		$image_path = $this->origin_path;
		$this->resize_in($image_path,"middle",500,375);
	}

	function create_large(){
		$image_path = $this->origin_path;
		$this->resize_in($image_path,"large",1000,750);
	}
}