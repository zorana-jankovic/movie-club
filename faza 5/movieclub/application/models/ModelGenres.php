<?php

class ModelGenres extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    

    public function fetchAll() {

        $query = $this->db->get('genres');
        $result = $query->result();
        return $result;
    }
    
    public function fetch($id) {
        
        $this->db->where("id",$id);
        $this->db->from('genres');
        
        $query=$this->db->get();
        $result=$query->row();
        return $result;
        
    }
    
}