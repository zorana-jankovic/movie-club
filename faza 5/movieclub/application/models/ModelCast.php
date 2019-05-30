<?php

class ModelCast extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
   public function fetch($idMovie){
       
        $this->db->where("idMovie",$idMovie);
        $this->db->where("c.idActor=a.id");
        $this->db->from('Actors a, Cast c');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
        
    }
    
    public function add($idActor, $idMovie) {
        $this->db->set("idActor",$idActor);
        $this->db->set("idMovie",$idMovie);

        $this->db->insert("cast");
        
    }
    
    

   
  
    
}

