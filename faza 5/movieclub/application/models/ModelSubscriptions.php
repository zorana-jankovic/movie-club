<?php

class ModelSubscriptions extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function fetch($idUser, $idActor) {
        $this->db->where("idUser", $idUser);
        $this->db->where("idActor", $idActor);
        $this->db->from('subscriptions');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function add($idUser, $idActor) {
        $this->db->set("idUser", $idUser);
        $this->db->set("idActor", $idActor);

        $this->db->insert("subscriptions");
    }

}
