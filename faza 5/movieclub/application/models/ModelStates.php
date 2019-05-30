<?php

class ModelStates extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function fetch($id) {
        $this->db->where("id", $id);
        $this->db->from('states');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function fetchAll() {

        $query = $this->db->get('states');
        $result = $query->result();
        return $result;
    }

    public function fetchCityState($city, $state) {
        $this->db->where("city", $city);
        $this->db->where("state", $state);
        $this->db->from('states');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

}
