<?php

require_once APPPATH . 'core/Core.php';

class Guest extends Core {

    public function __construct() {

        parent::__construct();

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

    public function showContent($mainContent, $data) {

        $this->load->view("templates/header_guest.php", $data);
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }

    public function index($controller = null) {

        $controller = "Guest";
        parent::index($controller);
    }

    public function about($controller = null) {
        $controller = "Guest";
        parent::about($controller);
    }

    public function movies($controller = null, $movies = null, $myMovies = null) {
        $controller = "Guest";
        parent::movies($controller);
    }

    public function showMovie($id, $controller = null) {

        $controller = "Guest";
        parent::showMovie($id, $controller);
    }

    public function actors($controller = null) {

        $controller = "Guest";
        parent::actors($controller);
    }

    public function showActor($id, $controller = null) {

        $controller = "Guest";
        parent::showActor($id, $controller);
    }

    public function directors($controller = null) {

        $controller = "Guest";
        parent::directors($controller);
    }

    public function showDirector($id, $controller = null) {

        $controller = "Guest";
        parent::showDirector($id, $controller);
    }

    public function showLoginForm($mssg = NULL) {

        $data = [];
        if ($mssg) {
            $data['mssg'] = $mssg;
        }
        $this->showContent('login.php', $data);
    }

    public function submitLogin() {


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
    }

    public function showRegistrationForm($mssg = NULL) {

        $data = [];
        if ($mssg) {
            $data['mssg'] = $mssg;
        }
        $this->showContent('register.php', $data);
    }

    public function submitRegistration() {


        if (!$this->ModelUser->checkEmail($this->input->post('email'))) {

            if (!$this->ModelUser->checkUsername($this->input->post('username'))) {

                $password = $this->input->post('password');

                if (strlen($password) >= 4) {

                    $user = $this->ModelUser->createAccount($this->input->post('email'), $this->input->post('username'), $this->input->post('password'));
                    $this->session->set_userdata('user', $user);

                    redirect("User");
                } else {
                    $this->showRegistrationForm("Password must be at least 4 caracters long!");
                }
            } else {
                $this->showRegistrationForm("Username already exists!");
            }
        } else {
            $this->showRegistrationForm("Email alrady in use!");
        }
    }

    public function sort($controller = null) {
        $controller = "Guest";
        parent::sort($controller);
    }

    public function search($controller = null) {

        $controller = "Guest";
        parent::search($controller);
    }

}
