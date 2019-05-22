<?php

class ModelActors extends CI_Model{
    
      public function __construct() {
        parent::__construct();
    }
    
   public function fetch($id){
        $this->db->where("id",$id);
        $this->db->from('actors');
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }

    public function fetchAll() {

        $query = $this->db->get('actors');
        $result = $query->result();
        return $result;
    }
    
}
