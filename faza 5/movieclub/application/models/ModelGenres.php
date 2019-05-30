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
    
}