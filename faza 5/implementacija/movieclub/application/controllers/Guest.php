<?php

class Guest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->model("ModelNews");
        $this->load->model("ModelUser");
        $this->load->model("ModelMovies");
        $this->load->model("ModelActors");
        
        if (($this->session->userdata('user')) != NULL) {
            if ($this->session->userdata('autor')->type == 0) {
                redirect("Admin");
            } else if ($this->session->userdata('autor')->type == 1) {
                redirect("Moderator");
            } else {
                redirect("User");
            }
        }
    }

    private function showContent($mainContent, $data) {
        $this->load->view("templates/header_guest.php", $data);
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }

    public function index() {

        $news = $this->ModelNews->fetchAll();

        $featured = [];
        $featured[0] = $this->ModelNews->fetchFeatured();
        $latest_date = $featured[0]->date;

        for ($i = 1; $i < 3; $i++) {
            $featured[$i] = $this->ModelNews->fetchFeatured($latest_date);
            $latest_date = $featured[$i]->date;
        }


        $this->showContent("news.php", array('news' => $news, 'featured' => $featured, 'controller' => "Guest"));
    }
    
    public function about() {
        $this->showContent("about.php", null);
    }

    public function movies() {

        $movies = $this->ModelMovies->fetchAll();
        $this->showContent("movies.php", array('movies' => $movies, 'controller' => "Guest"));
    }

    public function showMovie($id) {

        $movie = $this->ModelMovies->fetch($id);
        $this->showContent("movie.php", ["movie" => $movie]);
    }
    
    public function actors() {

        $actors = $this->ModelActors->fetchAll();
        $this->showContent("actors.php", array('actors' => $actors, 'controller' => "Guest"));
    }

    public function showActor($id) {

        $actor = $this->ModelActors->fetch($id);
        $this->showContent("actor.php", ["actor" => $actor]);
    }

         
    public function showLoginForm($mssg = NULL) {
        $data = [];
        if ($mssg) {
            $data['mssg'] = $mssg;
        }
        $this->showContent('login.php', $data);
    }

 
    public function submitLogin() {
        $this->form_validation->set_rules("username", "username", "required");
        $this->form_validation->set_rules("password", "password", "required");
        $this->form_validation->set_message("required", "Field {field} is required");
        if ($this->form_validation->run()) {
            if (!$this->ModelUser->fetch($this->input->post('username'))) {
                $this->showLoginForm("Incorrect username!");
            } else if (!$this->ModelUser->checkPassword($this->input->post('password'))) {
                $this->showLoginForm("Incorrect password!");
            } else {
                $user = $this->ModelUser->user;
                $this->session->set_userdata('user', $user);
                if ($user->type == 0) {
                    redirect("Admin");
                } else if ($user->type == 1) {
                    redirect("Moderator");
                } else {
                    redirect("User");
                }
            }
        } else {
            $this->showLoginForm();
        }
    }

}
