<?php

require_once APPPATH . 'core/Core.php';

class Admin extends Core {

    public function __construct() {

        parent::__construct();

        if (($this->session->userdata('user')) == NULL) {
            redirect("Guest");
        } else if ($this->session->userdata('user')->type == 1) {
            redirect("Moderator");
        } else if ($this->session->userdata('user')->type == 2) {
            redirect("User");
        }
    }

    public function showContent($mainContent, $data) {

        $this->load->view("templates/header_admin.php", $data);
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }

    public function index($controller = null) {

        $controller = "Admin";

        $vesti = $this->ModelNews->fetchAllUnread();
        $korisnici1 = $this->ModelUser->fetchAll1();
        $korisnici2 = $this->ModelUser->fetchAll2();

        $this->showContent("adminPocetna.php", array('vesti' => $vesti, 'korisnici1' => $korisnici1,'korisnici2' => $korisnici2, 'controller' => $controller));
    }

    public function about($controller = null) {
        $controller = "Admin";
        parent::about($controller);
    }

    public function movies($controller = null, $movies = null, $myMovies = null) {
        $controller = "Admin";
        parent::movies($controller);
    }

    public function showMovie($id, $controller = null) {

        $controller = "Admin";
        parent::showMovie($id, $controller);
    }

    public function actors($controller = null) {

        $controller = "Admin";
        parent::actors($controller);
    }

    public function showActor($id, $controller = null) {

        $controller = "Admin";
        parent::showActor($id, $controller);
    }

    public function directors($controller = null) {

        $controller = "Admin";
        parent::directors($controller);
    }
    
    public function news($controller=null){
        $controller = "Admin";
        parent::index($controller);
    }

    public function showDirector($id, $controller = null) {

        $controller = "Admin";
        parent::showDirector($id, $controller);
    }

    public function logout() {
        $this->session->unset_userdata("user");
        $this->session->sess_destroy();
        redirect("Guest");
    }
    
      public function sort($controller = null) {
        $controller = "Admin";
        parent::sort($controller);
    }

    public function search($controller = null) {

        $controller = "Admin";
        parent::search($controller);
    }

    public function ukloniKorisnika($id) {
        $this->ModelUser->deleteUser($id);
        redirect("Admin");
    }

    public function unaprediKorisnika($id) {
        
        $this->ModelUser->promoteUser($id);
        redirect("Admin");
        
    }

    public function dodajVest($id) {
        $this->ModelNews->ApproveNews($id);
        redirect("Admin");
    }

    public function odbijVest($id) {
        $this->ModelNews->deleteNews($id);
        redirect("Admin");
    }
    
    public function obrisiKomentar($id,$movieid){
        $this->ModelComments->deleteComment($id);
        $this->showMovie($movieid);
    }

}
