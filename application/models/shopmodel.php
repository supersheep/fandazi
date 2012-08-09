<?php

class Shopmodel extends FDZ_Model {
    
	var $tablename = "fdz_shop";

    function __construct(){

        parent::__construct();
        $this->load->model(array("citymodel","districtmodel"));
    }

    function get_by_id($id){
        $query = $this->db->select()->where(array("id"=>$id))->get($this->tablename);
        $shop = $query->row();
        if(!is_null($shop)){
            $city = $this->citymodel->get_by_id($shop->city);
            $district = $this->districtmodel->get_by_id($shop->district);
            $shop->cityname = $city->name;
            $shop->districtname = $district->name;
            $shop->address = $shop->cityname.$shop->districtname.$shop->location;
        }
        return $shop;
    }
    // function get_last_ten_entries()
    // {
    //     $query = $this->db->get('entries', 10);
    //     return $query->result();
    // }

    // function insert_entry()
    // {
    //     $this->title   = $_POST['title']; // please read the below note
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->insert('entries', $this);
    // }

    // function update_entry()
    // {
    //     $this->title   = $_POST['title'];
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->update('entries', $this, array('id' => $_POST['id']));
    // }

}