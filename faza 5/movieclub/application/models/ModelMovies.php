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

    public function fetchAllNameAsc() {
        $this->db->from("movies");
        $this->db->order_by("title", "asc");
        $query = $this->db->get(); 
        return $query->result();
    }
    
     public function fetchAllNameDesc() {
        $this->db->from("movies");
        $this->db->order_by("title", "desc");
        $query = $this->db->get(); 
        return $query->result();
    }
    public function fetchAllRatingAsc() {
        $this->db->from("movies");
        $this->db->order_by("rating", "asc");
        $query = $this->db->get(); 
        return $query->result();
    }
    
     public function fetchAllRatingDesc() {
        $this->db->from("movies");
        $this->db->order_by("rating", "desc");
        $query = $this->db->get(); 
        return $query->result();
    }
    
    public function fetchByName($title) {
        $this->db->where("title",$title);
        $this->db->from('movies');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    
    public function add($title, $genre, $duration, $year, $poster, $img1, $img2, $img3, $img4, $trailerSrc, $description){
        
        $this->db->set("title", $title);
       // $this->db->set("genre", $title);
        $this->db->set("duration",$duration);
        $this->db->set("rating",0);
        $this->db->set("year",$year);
        $this->db->set("posterSrc",$poster);
        $this->db->set("description",$description);
        $this->db->set("img1","images/".$img1);
        $this->db->set("img2","images/".$img2);
        $this->db->set("img3","images/".$img3);
        $this->db->set("img4","images/".$img4);
        $this->db->set("trailerSrc",$trailerSrc);
        
        
        $this->db->insert("movies");
    }
  
    
    public function updateRating($idMovie, $rating,$oldRating = NULL) {
        $movie = $this->fetch($idMovie);
        $oldMovieRating = $movie->rating;
        $cnt = $movie->ratingcnt;
        if(!$oldRating) {
            $newRating = ($oldMovieRating*$cnt + $rating)/($cnt + 1);
        } else {
            $newRating = (($oldMovieRating*$cnt) - $oldRating + $rating)/$cnt;
        }
        $this->db->set('rating', $newRating); 
        if(!$oldRating) {
            $this->db->set('ratingcnt', $cnt + 1); 
        }
        $this->db->where('id', $idMovie);
        $this->db->update('movies');
    }
}
