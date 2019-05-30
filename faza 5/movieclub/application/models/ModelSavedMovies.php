<?php

class ModelSavedMovies extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function fetch($idUser) {


        $this->db->where("idUser", $idUser);
        $this->db->where("sm.idMovie=m.id");
        $this->db->from('savedmovies sm, movies m');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function add($idUser, $idMovie) {
        $this->db->set("idUser", $idUser);
        $this->db->set("idMovie", $idMovie);
        $this->db->insert("savedmovies");
    }

    public function check($idUser, $idMovie) {
        $this->db->where("idUser", $idUser);
        $this->db->where("idMovie", $idMovie);
        $this->db->from('savedmovies');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

}
