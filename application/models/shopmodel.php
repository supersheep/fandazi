<?php

class Shopmodel extends FDZ_Model {
    
	var $tablename = "fdz_shop";

    function __construct(){

        parent::__construct();
        $this->load->model(array("citymodel","districtmodel"));
    }

    function get_by_dpurl($url){
        preg_match('/^http:\/\/www\.dianping\.com\/shop\/(\w+)$/', $url,$matches);
        $id = $matches[1];
        $query = $this->db->select()->where(array("dpid"=>$id))->get($this->tablename);
        return $query->row();
    }

    function get_by_id($id){
        $query = $this->db->select()->where(array("id"=>$id))->get($this->tablename);

        $shop = $query->row();
        if(count($shop)){
            $city = $this->citymodel->get_by_id($shop->city);
            $district = $this->districtmodel->get_by_id($shop->district);
            $shop->cityname = $city->name;
            $shop->districtname = $district->name;
            $shop->address = $shop->cityname.$shop->districtname.$shop->location;
        }
        return $shop;
    }

    function scratch($url){
        $this->load->model(array("citymodel","districtmodel"));
        $this->load->library("simple_html_dom");

        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>'User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_4) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11' .
                'Cookie:abtest="17,40\|16,37\|18,42\|8,16\|9,18\|14,31\|15,32"; _hc.v="\"4ed473ed-69a3-4330-a512-86cceffc08a6.1344899289\""; JSESSIONID=301482D    6DB813B94A83A0A5ADA66E2EE; aburl=1; cy=1; lb.dp=3657564426.20480.0000; __utma=1.2136653078.1344899292.1344899292.1344899292.1; __utmb=1.18.10.1344899    292; __utmc=1; __utmz=1.1344899292.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)'
            )
        );
        $context = stream_context_create($opts);



        $html = file_get_html($url,false,$context);
        
        preg_match('/^http:\/\/www.dianping.com\/shop\/(\w+)/', $url,$matches);
        $dpid = $matches[1];

        $cityname = $html->find("#G_loc .txt",0)->plaintext;
        $districtname = $html->find(".region",0)->plaintext;
        $location = $html->find(".shop-info-content span",1)->plaintext;
        $name = $html->find(".shop-title",0)->plaintext;
        $bizarea = $html->find(".breadcrumb a span",2)->plaintext;
        $taste = $html->find(".breadcrumb a span",3)->plaintext;
        $type = null;
        $average = null;

        $cityname = explode("站",$cityname);
        $cityname = $cityname[0];
        
        $city = $this->citymodel->get_by_name($cityname);
        $district = $this->districtmodel->get_by_name($districtname);

        // bizarea to db
        $arr = array(
            "name" => $name,
            "dpid" => $dpid,
            "type" => $type,
            "city" => $city->id,
            "location" => $location,
            "district" => $district->id,
            "bizarea" => $bizarea,
            "taste" => $taste,
            "average" => $average
        );
        return (object) $arr;
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