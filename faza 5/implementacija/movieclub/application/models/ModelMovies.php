<?php

class ModelMovies extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
   public function fetch($id){
        $this->db->where("id",$id);
        $this->db->from('movies');
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }

    public function fetchAll() {

        $query = $this->db->get('movies');
        $result = $query->result();
        return $result;
    }

  
    
}
