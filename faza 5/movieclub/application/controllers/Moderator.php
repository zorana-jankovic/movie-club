<?php

require_once APPPATH . 'core/Core.php';

class Moderator extends Core {

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

    public function showContent($mainContent, $data = []) {

        $this->load->view("templates/header_moderator.php");
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }

    public function logout() {
        $this->session->unset_userdata("user");
        $this->session->sess_destroy();
        redirect("Guest");
    }

    public function index($controller = null) {

        $controller = "Moderator";
        parent::index($controller);
    }

    public function about($controller = null) {

        $controller = "Moderator";
        parent::about($controller);
    }

    public function movies($controller = null, $movies = null, $myMovies = null) {
        $controller = "Moderator";
        parent::movies($controller);
    }

    public function showMovie($id, $controller = null) {

        $controller = "Moderator";
        parent::showMovie($id, $controller);
    }

    public function actors($controller = null) {

        $controller = "Moderator";
        parent::actors($controller);
    }

    public function showActor($id, $controller = null) {

        $controller = "Moderator";
        parent::showActor($id, $controller);
    }

    public function directors($controller = null) {

        $controller = "Moderator";
        parent::directors($controller);
    }

    public function showDirector($id, $controller = null) {

        $controller = "Moderator";
        parent::showDirector($id, $controller);
    }

    public function myMovies() {

        $id = $this->session->userdata("user")->id;
        $movies = $this->ModelSavedMovies->fetch($id);
        $controller = "Moderator";

        parent::movies($controller, $movies, true);
    }

    public function sort($controller = null) {
        $controller = "Moderator";
        parent::sort($controller);
    }

    public function search($controller = null) {

        $controller = "Moderator";
        parent::search($controller);
    }

    public function addComment($idMovie) {


        $title = $this->input->post("name");
        $body = $this->input->post("text");
        $author = $this->session->userdata("user")->username;


        $this->ModelComments->add($title, $body, $author, $idMovie);

        $location = site_url("Moderator/showMovie/" . $idMovie);
        header('Location: ' . $location);
    }

    public function addMovie() {

        $genres = $this->ModelGenres->fetchAll();
        $actors = $this->ModelActors->fetchAll();
        $directors = $this->ModelDirectors->fetchAll();

        $data['genres'] = $genres;
        $data['actors'] = $actors;
        $data['directors'] = $directors;
        $data['controller'] = "Moderator";

        $this->showContent("addMovie.php", $data);
    }

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

    public function addActor() {


        $states = $this->ModelStates->fetchAll();
        $data['states'] = $states;
        $data['controller'] = "Moderator";
        $this->showContent("addActor.php", $data);
    }

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


        $myArray = explode(',', $birthplaceName);
        $birthplace = $this->ModelStates->fetchCityState($myArray[0], $myArray[1]);


        $this->ModelActors->add($name, $birthday, $birthplace->id, $biography, "images/" . $posterSrc, "images/" . $profileImgLeft, "images/" . $profileImgRight, $funfact, $highlight);

        redirect("Moderator");
    }

    public function addDirector() {

        $states = $this->ModelStates->fetchAll();
        $data['states'] = $states;
        $data['controller'] = "Moderator";
        $this->showContent("addDirector.php", $data);
    }

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

    public function addNews() {

        $data['tags'] = $this->ModelActors->fetchAll();
        $data['controller'] = "Moderator";

        $this->showContent("addNews.php", $data);
    }

    public function submitNews() {

        $title = $this->input->post("title");
        $body = $this->input->post("body");
        $tags = $this->input->post("tags");
        $imgSrc = $this->input->post("imgSrc");
        $author = $this->session->userdata("user")->username;

        $this->ModelNews->add($title, $body, "images/" . $imgSrc, $author);

        $news = $this->ModelNews->fetchByName($title);

        foreach ($tags as $tagName) {
            $tag = $this->ModelActors->fetchByName($tagName);
            $this->ModelTags->add($news->id, $tag->id);
        }



        redirect("Moderator");
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


        $location = site_url("Moderator/showActor/" . $idActor);


        header('Location: ' . $location);
    }

    
     public function addToMyMovies($movieId) {

        $id = $this->session->userdata("user")->id;
        $movie = $this->ModelSavedMovies->check($id, $movieId);
        if($movie == null) {
        $this->ModelSavedMovies->add($id, $movieId);
        }
        $movies = $this->ModelSavedMovies->fetch($id);
        $controller = "Moderator";
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
}
