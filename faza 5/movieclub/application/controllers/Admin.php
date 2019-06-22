<?php

/**
 * Admin – Kontroler za admina
 *
 * @author Zorana Jankovic 0143/16
 * @version 1.0
 */

require_once APPPATH . 'core/Core.php';

class Admin extends Core {
    

     /**
     * Kreiranje nove instance
     * @return void
     */
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

    /**
     * showContent funkcija koja prikazuje sadrzaj
     * @author Zorana Jankovic 0143/16
     *
     * @param $mainContent prikaz
     * @param $data podaci za prikaz
     * 
     * @return void
     */
    public function showContent($mainContent, $data) {

        $this->load->view("templates/header_admin.php", $data);
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }

    /**
     * index funkcija koja ucitava pocetni sadrzaj 
     * @author Zorana Jankovic 0143/16
     *
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function index($controller = null) {

        $controller = "Admin";

        $vesti = $this->ModelNews->fetchAllUnread();
        $korisnici1 = $this->ModelUser->fetchAll1();
        $korisnici2 = $this->ModelUser->fetchAll2();

        $this->showContent("adminPocetna.php", array('vesti' => $vesti, 'korisnici1' => $korisnici1,'korisnici2' => $korisnici2, 'controller' => $controller));
    }
    

     /**
     * about funkcija koja ucitava informacije o sajtu i njegovim kreatorima 
     * @author Zorana Jankovic 0143/16
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function about($controller = null) {
        $controller = "Admin";
        parent::about($controller);
    }

    /**
     * movies funkcija koja ucitava informacije o trazenim filmovima 
     * @author Zorana Jankovic 0143/16
     * 
     * @param Controller $controller Controller
     * @param ModelMovies[] $movies niz filmova koje je potrebno prikazati
     * @param boolean $myMovies flag za ispis korisnickih ili svih filmova iz baze
     * 
     * @return void
     */
    public function movies($controller = null, $movies = null, $myMovies = null) {
        $controller = "Admin";
        parent::movies($controller);
    }
    
    

    /**
     * showMovie funkcija koja ucitava informacije o trazenom filmu 
     * @author Zorana Jankovic 0143/16
     * 
     * @param Controller $controller Controller
     * @param int $id jedinstveni identifikator filma koji se prikazuje
     *
     *  @return void
     */
    public function showMovie($id, $controller = null) {

        $controller = "Admin";
        parent::showMovie($id, $controller);
    }

    /**
     * actors funkcija koja ucitava informacije o glumcima 
     * @author Zorana Jankovic 0143/16
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function actors($controller = null) {

        $controller = "Admin";
        parent::actors($controller);
    }

     /**
     * showActor funkcija koja ucitava informacije o glumcu
     * @author Zorana Jankovic 0143/16
     * 
     * @param int $id jedinstveni identifikator glumca koji se prikazuje
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function showActor($id, $controller = null) {

        $controller = "Admin";
        parent::showActor($id, $controller);
    }

     /**
     * directors funkcija koja ucitava informacije o reziserima 
     * @author Zorana Jankovic 0143/16
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function directors($controller = null) {

        $controller = "Admin";
        parent::directors($controller);
    }
    
    
     /**
     * news funkcija koja ucitava informacije o vestima
     * @author Zorana Jankovic 0143/16
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function news($controller=null){
        $controller = "Admin";
        parent::index($controller);
    }
    

     /**
     * showDirector funkcija koja ucitava informacije o reziseru
     * @author Zorana Jankovic 0143/16
     * 
     * @param int $id jedinstveni identifikator rezisera koji se prikazuje
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function showDirector($id, $controller = null) {

        $controller = "Admin";
        parent::showDirector($id, $controller);
    }

     /**
     * logout funkcija koja odjavljuje admina sa sajta 
     * @author Zorana Jankovic 0143/16
     *
     * @return void
     */
    public function logout() {
        $this->session->unset_userdata("user");
        $this->session->sess_destroy();
        redirect("Guest");
    }
    
    
    
     /**
     * sort funkcija koja sortira filmove prema zeljenom kriterijumu 
     * @author Zorana Jankovic 0143/16
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
      public function sort($controller = null) {
        $controller = "Admin";
        parent::sort($controller);
    }

    /**
     * search funkcija koja pretrazuje film po imenu
     * @author Zorana Jankovic 0143/16
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function search($controller = null) {

        $controller = "Admin";
        parent::search($controller);
    }

    
    /**
     * ukloniKorisnika funkcija koja uklanja korisnika 
     * u smislu da ako je korisnik obican korisnik on se
     * uklanja iz sistema, a ako je admin umanjuje mu se privilegija
     * i postaje obican korisnik
     * 
     * @author Zorana Jankovic 0143/16
     * 
     * @param int $id jedinstveni identifikator korisnika koji se uklanja
     * 
     * @return void
     */
    public function ukloniKorisnika($id) {
        $this->ModelUser->deleteUser($id);
        redirect("Admin");
    }

     /**
     * unaprediKorisnika funkcija koja unapredjuje
     * obicnog korisnika u moderatora
     * 
     * @author Zorana Jankovic 0143/16
     * 
     * @param int $id jedinstveni identifikator korisnika koji se unapredjuje
     * 
     * @return void
     */
    public function unaprediKorisnika($id) {
        
        $this->ModelUser->promoteUser($id);
        redirect("Admin");
        
    }

     /**
     * dodajVest funkcija kojom admin odobrava
     * dodavanje vesti
     * 
     * @author Zorana Jankovic 0143/16
     * 
     * @param int $id jedinstveni identifikator vesti koja se dodaje
     * @return void
     */
    public function dodajVest($id) {
        $this->ModelNews->ApproveNews($id);
        redirect("Admin");
    }

     /**
     * odbijVest funkcija kojom admin odbija
     * dodavanje vesti
     * 
     * @author Zorana Jankovic 0143/16
     * 
     * @param int $id jedinstveni identifikator vesti koja se odbija
     * 
     * @return void
     */
    public function odbijVest($id) {
        $this->ModelNews->deleteNews($id);
        redirect("Admin");
    }
    
    
     /**
     * obrisiKomentar funkcija kojom admin brise
     * komentar
     * 
     * @author Zorana Jankovic 0143/16
     * 
     * @param int $id jedinstveni identifikator komentara koji se brise
     * @param int @movieid jedinstveni identifikator filma na koji se odnosi komentar
     * 
     * @return void
     */
    public function obrisiKomentar($id,$movieid){
        $this->ModelComments->deleteComment($id);
        $this->showMovie($movieid);
    }

}
