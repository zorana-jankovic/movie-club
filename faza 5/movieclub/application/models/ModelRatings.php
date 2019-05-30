<?php

class ModelRatings extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($idUser, $idMovie, $rating) {
        $this->db->set("idUser", $idUser);
        $this->db->set("idMovie", $idMovie);
        $this->db->set("rating", $rating);
        $this->db->insert("ratings");
    }

    public function update($idUser, $idMovie, $rating) {
        $this->db->set('rating', $rating); 
        $this->db->where('idUser', $idUser); 
        $this->db->where('idMovie', $idMovie);
        $this->db->update('ratings');
    }

    public function check($idUser, $idMovie) {
        $this->db->where("idUser",$idUser);
        $this->db->where("idMovie",$idMovie);
        $this->db->from('ratings');
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }

}