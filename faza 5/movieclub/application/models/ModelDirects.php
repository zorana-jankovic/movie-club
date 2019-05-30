<?php

class ModelDirects extends CI_Model {

   public function __construct() {
        parent::__construct();
    }
    
   public function fetch($idMovie){
       
        $this->db->where("idMovie",$idMovie);
        $this->db->where("dir.idDirector=d.id");
        $this->db->from('Directors d, Directs dir');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
        
    }

    public function add($idDirector, $idMovie) {
        $this->db->set("idDirector",$idDirector);
        $this->db->set("idMovie",$idMovie);

        $this->db->insert("directs");
        
    }
    
    
  
    
}