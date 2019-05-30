<?php

class ModelNews extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function fetchAll() {

        $query = $this->db->get('news');
        $result = $query->result();
        return $result;
    }

    public function fetchFeatured($latest_date = null) {

        $this->db->select('*');
        if ($latest_date) {
            $this->db->where('date <', $latest_date);
        }
        $this->db->order_by('date', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('news');

        $result = $query->row();
        return $result;
    }
    
     public function fetchByName($title) {
        $this->db->where("title",$title);
        $this->db->from('news');
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }

    public function add($title, $body, $imgSrc, $author){
        
        $this->db->set("title",$title);
        $this->db->set("body",$body);
        $this->db->set("imgSrc", $imgSrc);
        $this->db->set("author",$author);
        $this->db->set("date", date('Y-m-d'));
        
        
        $this->db->insert("news");
    }

}
