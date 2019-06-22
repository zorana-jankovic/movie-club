<?php

require_once APPPATH . 'core/Core.php';

/**
 * Guest – Kontroler za registrovanog clana
 *
 * @author Marko Todorovic 2016/0314
 * @version 1.1
 */
class User extends Core {

    /**
     * Kreiranje nove instance
     * @return void
     */
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

     /**
     * showContent funkcija koja prikazuje sadrzaj
     * @author Marko Todorovic 2016/0314
     *
     * @param $mainContent prikaz
     * @param $data podaci za prikaz
     * 
     * @return void
     */
    public function showContent($mainContent, $data = []) {

        $this->load->view("templates/header_user.php");
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }

    /**
     * logout funkcija koja unistava sesiju korisnika 
     * @author Marko Todorovic 2016/0314
     *
     * @return void
     */
    public function logout() {
        $this->session->unset_userdata("user");
        $this->session->sess_destroy();
        redirect("Guest");
    }

    /**
     * index funkcija koja ucitava pocetni sadrzaj 
     * @author Marko Todorovic 2016/0314
     *
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function index($controller = null) {

        $controller = "User";
        parent::index($controller);
    }

    
    /**
     * about funkcija koja ucitava informacije o sajtu i njegovim kreatorima 
     * @author Marko Todorovic 2016/0314
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function about($controller = null) {

        $controller = "User";
        parent::about($controller);
    }

    public function notifications($controller=null,$id=NULL){
        $controller = "User";
        $user=$this->session->userdata('user')->id;
        parent::notifications($controller,$user);
    }
    
     /**
     * movies funkcija koja ucitava informacije o trazenim filmovima 
     * @author Marko Todorovic 2016/0314
     * 
     * @param Controller $controller Controller
     * @param ModelMovies[] $movies niz filmova koje je potrebno prikazati
     * @param boolean $myMovies flag za ispis korisnickih ili svih filmova iz baze
     * 
     * @return void
     */
    public function movies($controller = null, $movies = null, $myMovies = null) {
        $controller = "User";
        parent::movies($controller);
    }

    /**
     * showMovie funkcija koja ucitava informacije o trazenom filmu 
     * @author Marko Todorovic 2016/0314
     * 
     * @param Controller $controller Controller
     * @param int $id jedinstveni identifikator filma koji se prikazuje
     *
     *  @return void
     */
    public function showMovie($id, $controller = null) {

        $controller = "User";
        parent::showMovie($id, $controller);
    }

    /**
     * actors funkcija koja ucitava informacije o glumcima 
     * @author Marko Todorovic 2016/0314
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function actors($controller = null) {

        $controller = "User";
        parent::actors($controller);
    }

    /**
     * showActor funkcija koja ucitava informacije o glumcu
     * @author Marko Todorovic 2016/0314
     * 
     * @param int $id jedinstveni identifikator glumca koji se prikazuje
     * 
     * @return void
     */
    public function showActor($id, $controller = null) {

        $controller = "User";
        parent::showActor($id, $controller);
    }

    /**
     * directors funkcija koja ucitava informacije o reziserima 
     * @author Marko Todorovic 2016/0314
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function directors($controller = null) {

        $controller = "User";
        parent::directors($controller);
    }

    /**
     * showDirector funkcija koja ucitava informacije o reziseru
     * @author Marko Todorovic 2016/0314
     * 
     * @param int $id jedinstveni identifikator rezisera koji se prikazuje
     * 
     * @return void
     */
    public function showDirector($id, $controller = null) {

        $controller = "User";
        parent::showDirector($id, $controller);
    }

    /**
     * myMovies funkcija koja ucitava sacuvane filmove aktivnog korisnika
     * @author Marko Todorovic 2016/0314
     *
     * 
     * @return void
     */
    public function myMovies() {

        $id = $this->session->userdata("user")->id;
        $movies = $this->ModelSavedMovies->fetch($id);
        $controller = "User";

        
        parent::movies($controller, $movies, true);
    }

    /**
     * sort funkcija koja sortira filmove prema zeljenom kriterijumu 
     * @author Marko Todorovic 2016/0314
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function sort($controller = null) {
        $controller = "User";
        parent::sort($controller);
    }

    
    /**
     * search funkcija koja prikazuje trazeeni film po imenu 
     * @author Marko Todorovic 2016/0314
     * 
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function search($controller = null) {

        $controller = "User";
        parent::search($controller);
    }

    /**
     * addComment funkcija koja dodaje komentar na odabrani film 
     * @author Marko Todorovic 2016/0314
     * 
     * @param int $idMovie jedinstveni identifikator filma 
     * 
     * @return void
     */
    public function addComment($idMovie) {


        $title = $this->input->post("name");
        $body = $this->input->post("text");
        $author = $this->session->userdata("user")->username;
        
       if ($title!="" && $body!="") {
        $this->ModelComments->add($title, $body, $author, $idMovie);
       }

        $location = site_url("User/showMovie/" . $idMovie);
        header('Location: ' . $location);
    }

    /**
     * subscribe funkcija koja pretplacuje korisnika na pracenje vesti o odabranom glumcu
     * @author Marko Todorovic 2016/0314
     * 
     * @param int $idActor jedinstveni identifikator glumca
     * 
     * @return void
     */
    public function subscribe($idActor) {

        $user = $this->session->userdata("user");
        $result = $this->ModelSubscriptions->fetch($user->id, $idActor);

        if ($result == null) {
           
            $this->ModelSubscriptions->add($user->id, $idActor);
        }


        $location = site_url("User/showActor/" . $idActor);


        header('Location: ' . $location);
        //$this->showActor($idActor, "User");
        
    }

    
    /**
     * addToMyMovies funkcija koja dodaje odabrani film u korisnikovu watchlistu
     * @author Marko Todorovic 2016/0314
     * 
     * @param int $movieId jedinstveni identifikator filma
     * 
     * @return void
     */
    public function addToMyMovies($movieId) {

        $id = $this->session->userdata("user")->id;
        $movie = $this->ModelSavedMovies->check($id, $movieId);
        if($movie == null) {
        $this->ModelSavedMovies->add($id, $movieId);
        } 
        $movies = $this->ModelSavedMovies->fetch($id);
        $controller = "User";
        
        $location = site_url("User/myMovies");
        header('Location: ' . $location);
        
        
    }

    /**
     * rate funkcija koja daje ocenu odabranom filmu
     * @author Marko Todorovic 2016/0314
     * 
     * @param int $movieId jedinstveni identifikator filma
     * 
     * @return void
     */
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
