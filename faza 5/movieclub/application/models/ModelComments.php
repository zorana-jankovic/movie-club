<?php

class ModelComments extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
   public function fetch($idMovie){
        $this->db->where("idMovie",$idMovie);
        $this->db->from('comments');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    
    public function add($title,$body,$author,$idMovie){
        $this->db->set("author", $author);
        $this->db->set("title", $title);
        $this->db->set("body",$body);
        $this->db->set("idMovie",$idMovie);
        $this->db->insert("comments");
    }

   public function deleteComment($id){
       
       $this->db->where("id",$id);
       $this->db->delete("comments");
   }
  
    
}
