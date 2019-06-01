<?php

class ModelTags extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($idNews, $idTag) {
        $this->db->set("idNews", $idNews);
        $this->db->set("idTag", $idTag);
        $this->db->insert("tags");
    }

    public function addNotification($news, $tag) {
        $niz = $this->db->where("idActor", $tag)->get("subscriptions")->result();

        foreach ($niz as $elem) {
            $this->db->set("idNews", $news);
            $this->db->set("idUser", $elem->idUser);
            $this->db->insert("notifications");
        }
    }
    
    public function dohvatiNot($id){
        $this->db->where("idUser",$id);
        $this->db->select("idNews");
        $rez=$this->db->get("notifications")->result();
        return $rez;
    }
    
     public function obrisiNot($id){
        $this->db->where("idNews",$id);
        $this->db->where("idUser",$this->session->userdata('user')->id);
        $this->db->delete("notifications");
    }

}
