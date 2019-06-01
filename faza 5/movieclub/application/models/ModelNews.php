<?php

class ModelNews extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function fetchAll() {

        $status = 1;
        $this->db->where("status", $status);
        $query = $this->db->get('news');
        $result = $query->result();
        return $result;
    }

    public function fetchAllUnread() {

        $status = 0;
        $this->db->where("status", $status);
        $query = $this->db->get('news');
        $result = $query->result();
        return $result;
    }

    public function fetchFeatured($latest_date = null) {

        $this->db->select('*');
        if ($latest_date) {
            $this->db->where('date <', $latest_date);
        }
        $this->db->order_by('date', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('news');

        $result = $query->row();
        return $result;
    }

    public function fetchById($id) {
       
        $this->db->where("id", $id);
        $this->db->from('news');
        return $this->db->get()->result();
        
    }

    public function fetchByName($title) {
        $this->db->where("title", $title);
        $this->db->from('news');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function add($title, $body, $imgSrc, $author) {

        $status = 0;
        $this->db->set("title", $title);
        $this->db->set("body", $body);
        $this->db->set("imgSrc", $imgSrc);
        $this->db->set("author", $author);
        $this->db->set("date", date('Y-m-d'));
        $this->db->set("status", $status);

        $this->db->insert("news");
    }

    public function deleteNews($id) {
        $this->db->where("id", $id);
        $this->db->delete("news");
    }

    public function ApproveNews($id) {

        $val = 1;
        $this->db->set("status", $val);
        $this->db->where("id", $id);
        $this->db->update("news");
    }

}
