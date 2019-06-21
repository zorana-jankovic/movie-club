<?php

/**
 * Guest – Kontroler za neregistrovanog clana
 *
 * @author Ana Dimitrijevic 2016/0442
 * @version 1.1
 */
require_once APPPATH . 'core/Core.php';

class Guest extends Core {

     * Kreiranje nove instance
     * @return void
     */
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

    /**
     * showContent funkcija koja prikazuje sadrzaj
     * @author Ana Dimitrijevic 2016/0442
     *
     * @param $mainContent prikaz
     * @param $data podaci za prikaz
     * 
     * @return void
     */
    public function showContent($mainContent, $data) {

        $this->load->view("templates/header_guest.php", $data);
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }

    /**
     * index funkcija koja ucitava pocetni sadrzaj 
     * @author Ana Dimitrijevic 2016/0442
     *
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function index($controller = null) {

        $controller = "Guest";
        parent::index($controller);
    }

    /**
     * about funkcija koja ucitava informacije o sajtu i njegovim kreatorima 
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function about($controller = null) {
        $controller = "Guest";
        parent::about($controller);
    }

    /**
     * movies funkcija koja ucitava informacije o trazenim filmovima 
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param Controller $controller Controller
     * @param ModelMovies[] $movies niz filmova koje je potrebno prikazati
     * @param boolean $myMovies flag za ispis korisnickih ili svih filmova iz baze
     * 
     * @return void
     */
    public function movies($controller = null, $movies = null, $myMovies = null) {
        $controller = "Guest";
        parent::movies($controller);
    }

    /**
     * showMovie funkcija koja ucitava informacije o trazenom filmu 
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param Controller $controller Controller
     * @param int $id jedinstveni identifikator filma koji se prikazuje
     *
     *  @return void
     */
    public function showMovie($id, $controller = null) {

        $controller = "Guest";
        parent::showMovie($id, $controller);
    }

    /**
     * actors funkcija koja ucitava informacije o glumcima 
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function actors($controller = null) {

        $controller = "Guest";
        parent::actors($controller);
    }

    /**
     * showActor funkcija koja ucitava informacije o glumcu
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param int $id jedinstveni identifikator glumca koji se prikazuje
     * 
     * @return void
     */
    public function showActor($id, $controller = null) {

        $controller = "Guest";
        parent::showActor($id, $controller);
    }

    /**
     * directors funkcija koja ucitava informacije o reziserima 
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function directors($controller = null) {

        $controller = "Guest";
        parent::directors($controller);
    }

    /**
     * showDirector funkcija koja ucitava informacije o reziseru
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param int $id jedinstveni identifikator rezisera koji se prikazuje
     * 
     * @return void
     */
    public function showDirector($id, $controller = null) {

        $controller = "Guest";
        parent::showDirector($id, $controller);
    }

    /**
     * showLoginForm funkcija koja ucitava formu za logovanje
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param $msg opciona poruka o gresci pri logovanju
     * 
     * @return void
     */
    public function showLoginForm($mssg = NULL) {

        $data = [];
        if ($mssg) {
            $data['mssg'] = $mssg;
        }
        $this->showContent('login.php', $data);
    }

    /**
     * submitLogin funkcija koja proverava kredencijale i kreira sesiju
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @return void
     */
    public function submitLogin() {


        if ($this->input->post('username') != "" && $this->input->post('password') != "") {
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
            $this->showLoginForm("Please fill in the required fields!");
        }
    }

    /**
     * showRegistrationForm funkcija koja ucitava formu za registrovanje
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param $msg opciona poruka o gresci pri registrovanju
     * 
     * @return void
     */
    public function showRegistrationForm($mssg = NULL) {

        $data = [];
        if ($mssg) {
            $data['mssg'] = $mssg;
        }
        $this->showContent('register.php', $data);
    }

    /**
     * submitRegistration funkcija koja proverava podatke i kreira novog korisnika
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @return void
     */
    public function submitRegistration() {

        if ($this->input->post('email') != "" && $this->input->post('username') != "" && $this->input->post('password') != "") {

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
        } else {
            $this->showRegistrationForm("Please fill in the required fields!");
        }
    }

    /**
     * sort funkcija koja sortira filmove prema zeljenom kriterijumu 
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function sort($controller = null) {
        $controller = "Guest";
        parent::sort($controller);
    }

    /**
     * search funkcija koja prikazuje trazeeni film po imenu 
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function search($controller = null) {

        $controller = "Guest";
        parent::search($controller);
    }

}
