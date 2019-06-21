<?php

/**
 * Moderator – Kontroler za clana koji ima moderatorske privilegije
 *
 * @author Ana Dimitrijevic 2016/0442
 * @version 1.1
 */
require_once APPPATH . 'core/Core.php';

class Moderator extends Core {

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
        } elseif ($this->session->userdata('user')->type == 2) {
            redirect("User");
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
    public function showContent($mainContent, $data = []) {

        $this->load->view("templates/header_moderator.php");
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }

    /**
     * logout funkcija koja unistava sesiju korisnika 
     * @author Ana Dimitrijevic 2016/0442
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
     * @author Ana Dimitrijevic 2016/0442
     *
     * @param Controller $controller Controller
     * 
     * @return void
     */
    public function index($controller = null) {

        $controller = "Moderator";
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

        $controller = "Moderator";
        parent::about($controller);
    }

    public function notifications($controller = null, $id = NULL) {
        $controller = "Moderator";
        $user = $this->session->userdata('user')->id;
        parent::notifications($controller, $user);
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
        $controller = "Moderator";
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

        $controller = "Moderator";
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

        $controller = "Moderator";
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

        $controller = "Moderator";
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

        $controller = "Moderator";
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

        $controller = "Moderator";
        parent::showDirector($id, $controller);
    }

    /**
     * myMovies funkcija koja ucitava sacuvane filmove aktivnog korisnika
     * @author Ana Dimitrijevic 2016/0442
     *
     * 
     * @return void
     */
    public function myMovies() {

        $id = $this->session->userdata("user")->id;
        $movies = $this->ModelSavedMovies->fetch($id);
        $controller = "Moderator";

        parent::movies($controller, $movies, true);
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
        $controller = "Moderator";
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

        $controller = "Moderator";
        parent::search($controller);
    }

    /**
     * addComment funkcija koja dodaje komentar na odabrani film 
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param int $idMovie jedinstveni identifikator filma 
     * 
     * @return void
     */
    public function addComment($idMovie) {


        $title = $this->input->post("name");
        $body = $this->input->post("text");
        $author = $this->session->userdata("user")->username;

        if ($title != "" && $body != "") {
            $this->ModelComments->add($title, $body, $author, $idMovie);
        }

        $location = site_url("Moderator/showMovie/" . $idMovie);
        header('Location: ' . $location);
    }

    /**
     * addMovie funkcija koja prikazuje formu za dodavanje filma
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param String $mssg poruka o eventualnoj gresci
     * 
     * @return void
     */
    public function addMovie($mssg = null) {

        $genres = $this->ModelGenres->fetchAll();
        $actors = $this->ModelActors->fetchAll();
        $directors = $this->ModelDirectors->fetchAll();

        $data['mssg'] = $mssg;
        $data['genres'] = $genres;
        $data['actors'] = $actors;
        $data['directors'] = $directors;
        $data['controller'] = "Moderator";

        $this->showContent("addMovie.php", $data);
    }

    /**
     * submitMovie funkcija koja proverava podatke i kreira novi film
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @return void
     */
    public function submitMovie() {

        $title = $this->input->post("title");
        $genre = $this->input->post("genre");
        $duration = $this->input->post("duration");
        $year = $this->input->post("year");
        $posterSrc = $this->input->post("posterSrc");
        $img1 = $this->input->post("imgSrc1");
        $img2 = $this->input->post("imgSrc2");
        $img3 = $this->input->post("imgSrc3");
        $img4 = $this->input->post("imgSrc4");
        $cast = $this->input->post("cast");
        $directors = $this->input->post("directors");
        $trailerSrc = $this->input->post("trailerSrc");
        $description = $this->input->post("description");

        if ($title == "" || $genre == "" || $duration == "" || $year == "" || $posterSrc == "" || $img1 == "" || img2 == "" || $img3 == "" || $img4 == "" || $cast == "" || $directors == "" || $trailerSrc == "" || $description == "") {

            $this->addMovie("Please fill in the required fields!");
        } else {

            $this->ModelMovies->add($title, $genre, $duration, $year, "images/" . $posterSrc, $img1, $img2, $img3, $img4, $trailerSrc, $description);


            $movie = $this->ModelMovies->fetchByName($title);


            foreach ($directors as $directorName) {

                $director = $this->ModelDirectors->fetchByName($directorName);
                $this->ModelDirects->add($director->id, $movie[0]->id);
            }


            foreach ($cast as $actorName) {

                $actor = $this->ModelActors->fetchByName($actorName);
                $this->ModelCast->add($actor->id, $movie[0]->id);
            }


            redirect("Moderator");
        }
    }

    /**
     * addActor funkcija koja prikazuje formu za dodavanje glumca
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param String $mssg poruka o eventualnoj gresci
     * 
     * @return void
     */
    public function addActor($mssg = null) {


        $states = $this->ModelStates->fetchAll();
        $data['mssg'] = $mssg;
        $data['states'] = $states;
        $data['controller'] = "Moderator";
        $this->showContent("addActor.php", $data);
    }

    /**
     * submitActor funkcija koja proverava podatke i kreira novog glumca
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @return void
     */
    public function submitActor() {

        $name = $this->input->post("name");
        $birthday = $this->input->post("birthday");
        $birthplaceName = $this->input->post("birthplace");
        $biography = $this->input->post("biography");
        $posterSrc = $this->input->post("posterSrc");
        $profileImgLeft = $this->input->post("profileImgLeft");
        $profileImgRight = $this->input->post("profileImgRight");
        $funfact = $this->input->post("funfact");
        $highlight = $this->input->post("highlight");

        if ($name == "" || $birthday == "" || $birthplaceName == "" || $posterSrc == "" || $profileImgLeft == "" || $profileImgRight == "" || $funfact == "" || $highlight == "") {
            $this->addActor("Please fill in the required fields!");
        } else {

            $myArray = explode(',', $birthplaceName);
            $birthplace = $this->ModelStates->fetchCityState($myArray[0], $myArray[1]);


            $this->ModelActors->add($name, $birthday, $birthplace->id, $biography, "images/" . $posterSrc, "images/" . $profileImgLeft, "images/" . $profileImgRight, $funfact, $highlight);

            redirect("Moderator");
        }
    }

    /**
     * addDirector funkcija koja prikazuje formu za dodavanje rezisera
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @return void
     */
    public function addDirector() {

        $states = $this->ModelStates->fetchAll();
        $data['states'] = $states;
        $data['controller'] = "Moderator";
        $this->showContent("addDirector.php", $data);
    }

    /**
     * submitDirector funkcija koja proverava podatke i kreira novog rezisera
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @return void
     */
    public function submitDirector() {

        $name = $this->input->post("name");
        $birthday = $this->input->post("birthday");
        $birthplaceName = $this->input->post("birthplace");
        $biography = $this->input->post("biography");
        $posterSrc = $this->input->post("posterSrc");
        $profileImgLeft = $this->input->post("profileImgLeft");
        $profileImgRight = $this->input->post("profileImgRight");
        $funfact = $this->input->post("funfact");
        $highlight = $this->input->post("highlight");

        $myArray = explode(',', $birthplaceName);

        $birthplace = $this->ModelStates->fetchCityState($myArray[0], $myArray[1]);


        $this->ModelDirectors->add($name, $birthday, $birthplace->id, $biography, "images/" . $posterSrc, "images/" . $profileImgLeft, "images/" . $profileImgRight, $funfact, $highlight);

        redirect("Moderator");
    }

    /**
     * addNews funkcija koja prikazuje formu za dodavanje vesti
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param String $mssg poruka o eventualnoj gresci
     * 
     * @return void
     */
    public function addNews($mssg = null) {

        $data['tags'] = $this->ModelActors->fetchAll();
        $data['controller'] = "Moderator";
        $data['mssg'] = $mssg;

        $this->showContent("addNews.php", $data);
    }

    /**
     * submitNews funkcija koja proverava podatke i kreira novu vest
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @return void
     */
    public function submitNews() {

        $title = $this->input->post("title");
        $body = $this->input->post("body");
        $tags = $this->input->post("tags");
        $imgSrc = $this->input->post("imgSrc");
        $author = $this->session->userdata("user")->username;

        if ($title == "" || $body == "" || $tags == "" || $imgSrc == "") {
            $this->addNews("Please fill in the required fields!");
        } else {
            $this->ModelNews->add($title, $body, "images/" . $imgSrc, $author);
            $news = $this->ModelNews->fetchByName($title);

            foreach ($tags as $tagName) {
                $tag = $this->ModelActors->fetchByName($tagName);
                $this->ModelTags->add($news->id, $tag->id);
                $this->ModelTags->addNotification($news->id, $tag->id);
            }



            redirect("Moderator");
        }
    }

    /**
     * subscribe funkcija koja pretplacuje korisnika na pracenje vesti o odabranom glumcu
     * @author Ana Dimitrijevic 2016/0442
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


        $location = site_url("Moderator/showActor/" . $idActor);


        header('Location: ' . $location);
    }

    /**
     * addToMyMovies funkcija koja dodaje odabrani film u korisnikovu watchlistu
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param int $movieId jedinstveni identifikator filma
     * 
     * @return void
     */
    public function addToMyMovies($movieId) {

        $id = $this->session->userdata("user")->id;
        $movie = $this->ModelSavedMovies->check($id, $movieId);
        if ($movie == null) {
            $this->ModelSavedMovies->add($id, $movieId);
        }
        $movies = $this->ModelSavedMovies->fetch($id);
        $controller = "Moderator";

        $location = site_url("Moderator/myMovies");
        header('Location: ' . $location);
    }

    /**
     * rate funkcija koja daje ocenu odabranom filmu
     * @author Ana Dimitrijevic 2016/0442
     * 
     * @param int $movieId jedinstveni identifikator filma
     * 
     * @return void
     */
    public function rate($movieId) {

        $id = $this->session->userdata("user")->id;
        $rate = $this->ModelRatings->check($id, $movieId);
        $oldRating = null;
        if ($rate == null) {
            $this->ModelRatings->add($id, $movieId, $this->input->post("stars"));
        } else {
            $oldRating = $rate->rating;
            $this->ModelRatings->update($id, $movieId, $this->input->post("stars"));
        }
        $this->ModelMovies->updateRating($movieId, $this->input->post("stars"), $oldRating);

        $this->showMovie($movieId);
    }

    public Function obrisiNot($id) {
        $this->ModelTags->obrisiNot($id);
        $this->notifications();
    }

}
