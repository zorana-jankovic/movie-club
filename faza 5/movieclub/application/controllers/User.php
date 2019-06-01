<?php

require_once APPPATH . 'core/Core.php';

class User extends Core {

    public function __construct() {

        parent::__construct();


        if (($this->session->userdata('user')) == NULL) {
            redirect("Guest");
        } elseif ($this->session->userdata('user')->type == 0) {
            redirect("Admin");
        } elseif ($this->session->userdata('user')->type == 1) {
            redirect("Moderator");
        }
    }

    public function showContent($mainContent, $data = []) {

        $this->load->view("templates/header_user.php");
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }

    public function logout() {
        $this->session->unset_userdata("user");
        $this->session->sess_destroy();
        redirect("Guest");
    }

    public function index($controller = null) {

        $controller = "User";
        parent::index($controller);
    }

    public function about($controller = null) {

        $controller = "User";
        parent::about($controller);
    }

    public function notifications($controller=null,$id=NULL){
        $controller = "User";
        $user=$this->session->userdata('user')->id;
        parent::notifications($controller,$user);
    }
    
    public function movies($controller = null, $movies = null, $myMovies = null) {
        $controller = "User";
        parent::movies($controller);
    }

    public function showMovie($id, $controller = null) {

        $controller = "User";
        parent::showMovie($id, $controller);
    }

    public function actors($controller = null) {

        $controller = "User";
        parent::actors($controller);
    }

    public function showActor($id, $controller = null) {

        $controller = "User";
        parent::showActor($id, $controller);
    }

    public function directors($controller = null) {

        $controller = "User";
        parent::directors($controller);
    }

    public function showDirector($id, $controller = null) {

        $controller = "User";
        parent::showDirector($id, $controller);
    }

    public function myMovies() {

        $id = $this->session->userdata("user")->id;
        $movies = $this->ModelSavedMovies->fetch($id);
        $controller = "User";

        
        parent::movies($controller, $movies, true);
    }

    public function sort($controller = null) {
        $controller = "User";
        parent::sort($controller);
    }

    public function search($controller = null) {

        $controller = "User";
        parent::search($controller);
    }

    public function addComment($idMovie) {


        $title = $this->input->post("name");
        $body = $this->input->post("text");
        $author = $this->session->userdata("user")->username;

        $this->ModelComments->add($title, $body, $author, $idMovie);

        $location = site_url("User/showMovie/" . $idMovie);
        header('Location: ' . $location);
    }

    public function subscribe($idActor) {

        $user = $this->session->userdata("user");


        $result = $this->ModelSubscriptions->fetch($user->id, $idActor);

        if ($result != null) {
            $message = "You are already subscribed";
        } else {
            $message = "Success! You will start receiving notifications.";
            $this->ModelSubscriptions->add($user->id, $idActor);
        }


        $location = site_url("User/showActor/" . $idActor);


        header('Location: ' . $location);
    }

    public function addToMyMovies($movieId) {

        $id = $this->session->userdata("user")->id;
        $movie = $this->ModelSavedMovies->check($id, $movieId);
        if($movie == null) {
        $this->ModelSavedMovies->add($id, $movieId);
        }
        $movies = $this->ModelSavedMovies->fetch($id);
        $controller = "User";
        parent::movies($controller, $movies);
        
    }

    public function rate($movieId) {
        $id = $this->session->userdata("user")->id;
        $rate = $this->ModelRatings->check($id, $movieId);
        $oldRating = null;
        if($rate == null) {
            $this->ModelRatings->add($id, $movieId, $this->input->post("stars"));
        } else {
            $oldRating = $rate->rating;
            $this->ModelRatings->update($id, $movieId, $this->input->post("stars"));
        }
        $this->ModelMovies->updateRating($movieId, $this->input->post("stars"),$oldRating);
        $this->showMovie($movieId);
    }

     public Function obrisiNot($id){
        $this->ModelTags->obrisiNot($id);
        $this->notifications();
    }
}
