<?php

class Shopmodel extends FDZ_Model {
    
	var $tablename = "fdz_shop";

    function get_by_dpurl($url){
        preg_match('/^http:\/\/www\.dianping\.com\/shop\/(\w+)/', $url,$matches);
        $id = $matches[1];
        $query = $this->db->select()->where(array("dpid"=>$id))->get($this->tablename);
        return $query->row();
    }

    function get_by_id($id){
        $this->load->model(array("citymodel","districtmodel"));
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
        $this->load->model(array("citymodel","districtmodel","tastemodel"));
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
        $cityname = explode("站",$cityname);
        $cityname = $cityname[0];
        $districtname = $html->find(".region",0)->plaintext;
        $location = $html->find(".shop-info-content span",1)->plaintext;
        $name = $html->find(".shop-title",0)->plaintext;
        $bizarea = $html->find(".breadcrumb a span",2)->plaintext;
        $tastename = $html->find(".breadcrumb a span",3)->plaintext;
        $type = $html->find(".bread-name",0)->plaintext;
        $type = explode($cityname,$type);
        $type = $type[1];
        $average = $html->find(".comment-rst dd",0)->plaintext;
        $average = explode("¥",$average);
        $average = $average[1];
        
        $city = $this->citymodel->get_by_name($cityname);
        $district = $this->districtmodel->get_by_name($districtname);
        $taste = $this->tastemodel->get_by_name($tastename);

        if(is_null($taste)){
            $this->tastemodel->insert(array(
                "name"=>$name));
            $taste = new stdClass();
            $taste->id = $this->db->insert_id();
        }


        // bizarea to db
        $arr = array(
            "name" => $name,
            "dpid" => $dpid,
            "type" => $type,
            "city" => isset($city->id)?$city->id:null,
            "location" => $location,
            "district" => isset($district->id)?$district->id:null,
            "bizarea" => $bizarea,
            "taste" => $taste->id,
            "average" => $average
        );

        $this->db->insert($this->tablename,$arr);
        $ret = (object) $arr;
        $ret->id = $this->db->insert_id();
        return $ret;
    }


}