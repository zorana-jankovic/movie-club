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
    
    public function add($name, $birthday, $birthplace, $biography, $posterSrc, $profileImgLeft, $profileImgRight, $funfact, $highlight){
        
        $this->db->set("name", $name);
        $this->db->set("birthday",$birthday);
        
        $this->db->set("birthplace", $birthplace);
        
        $this->db->set("biography",$biography);
        $this->db->set("posterSrc",$posterSrc);
        $this->db->set("profileImgLeft",$profileImgLeft);
        $this->db->set("profileImgRight",$profileImgRight);
        $this->db->set("funfact",$funfact);
        $this->db->set("highlight",$highlight);
        
        $this->db->insert("actors");
    }
    
    public function fetchByName($name) {
        $this->db->where("name", $name);
        $this->db->from('actors');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    
    
}
