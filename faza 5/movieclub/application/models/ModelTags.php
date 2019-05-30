<?php

class ModelTags extends CI_Model {
   
     public function __construct() {
        parent::__construct();
    }
    
    public function add($idNews, $idTag){
        $this->db->set("idNews", $idNews);
        $this->db->set("idTag", $idTag);
        $this->db->insert("tags");
    }
    
}
