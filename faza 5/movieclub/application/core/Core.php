<?php

class Core extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');

        $this->load->model("ModelNews");
        $this->load->model("ModelUser");
        $this->load->model("ModelMovies");
        $this->load->model("ModelActors");
        $this->load->model("ModelDirectors");
        $this->load->model("ModelGenres");
        $this->load->model("ModelComments");
        $this->load->model("ModelCast");
        $this->load->model("ModelStates");
        $this->load->model("ModelTags");
        $this->load->model("ModelRatings");
        $this->load->model("ModelSubscriptions");
        $this->load->model("ModelDirects");
        $this->load->model("ModelSavedMovies");
    }

    public function index($controller) {

        $poruka=NULL;
        if ($this->session->userdata('user')!=NULL){
            $notifications = $this->ModelTags->dohvatiNot($this->session->userdata('user')->id);

            $cnt=0;
            foreach($notifications as $not){
                $vest=$this->ModelNews->fetchById($not->idNews);
                if ($vest[0]->status==1){
                    $cnt=$cnt+1;
               }
            }
      
            if ($cnt>0){
                $poruka="YOU HAVE NEW NOTIFICATIONS";
            }
        }
        $news = $this->ModelNews->fetchAll();

        $featured = [];
        $featured[0] = $this->ModelNews->fetchFeatured();
        $latest_date = $featured[0]->date;


        for ($i = 1; $i < 3; $i++) {
            $featured[$i] = $this->ModelNews->fetchFeatured($latest_date);
            $latest_date = $featured[$i]->date;
        }


        $this->showContent("news.php", array('news' => $news, 'featured' => $featured,'poruka'=>$poruka, 'controller' => $controller));
    }

    public function about($controller) {
        $this->showContent("about.php", array('controller' => $controller));
    }

    public function notifications($controller,$idUser){
        $vesti=[];
         if ($this->session->userdata('user')!=NULL){
            $notifications = $this->ModelTags->dohvatiNot($idUser);

            
            foreach($notifications as $not){
             $vest=$this->ModelNews->fetchById($not->idNews);
             if ((in_array($vest[0], $vesti)))
             {}
             else{
                array_push($vesti,$vest[0]);
             }
            }
           $this->showContent("newsNot.php", array('vesti'=>$vesti, 'controller' => $controller));
        }
        
    }
    public function movies($controller, $movies = null, $myMovies = null) {

        if ($movies == null) {
            $movies = $this->ModelMovies->fetchAll();
        }

        $i = 0;
        $directors = [];
        $cast = [];


        foreach ($movies as $movie) {
            $directors[$i] = $this->ModelDirects->fetch($movie->id);
            $cast[$i] = $this->ModelCast->fetch($movie->id);
            $i++;
        }

        $this->showContent("movies.php", array('movies' => $movies, 'directors' => $directors, 'cast' => $cast, 'myMovies' => $myMovies, 'controller' => $controller));
    }

    public function showMovie($id, $controller = null) {

        $movie = $this->ModelMovies->fetch($id);
        $comments = $this->ModelComments->fetch($id);
        $cast = $this->ModelCast->fetch($id);
        $directors = $this->ModelDirects->fetch($id);
        $this->showContent("movie.php", ["movie" => $movie, "comments" => $comments, "cast" => $cast, "directors" => $directors, "controller" => $controller]);
    }

    public function actors($controller) {

        $actors = $this->ModelActors->fetchAll();
        $this->showContent("actors.php", array('actors' => $actors, 'controller' => $controller));
    }

    public function showActor($id, $controller) {

        $actor = $this->ModelActors->fetch($id);
        $state = $this->ModelStates->fetch($actor->birthplace);

        $this->showContent("actor.php", ["actor" => $actor, "state" => $state, "controller" => $controller]);
    }

    public function directors($controller) {

        $directors = $this->ModelDirectors->fetchAll();
        $this->showContent("directors.php", array('directors' => $directors, 'controller' => $controller));
    }

    public function showDirector($id, $controller) {

        $director = $this->ModelDirectors->fetch($id);
        $state = $this->ModelStates->fetch($director->birthplace);

        $this->showContent("director.php", ["director" => $director, "state" => $state, "controller" => $controller]);
    }

    public function search($controller) {

        $searchName = $_POST['search'];
        $movies = $this->ModelMovies->fetchByName($searchName);

        $i = 0;
        $directors = [];
        $cast = [];


        foreach ($movies as $movie) {
            $directors[$i] = $this->ModelDirects->fetch($movie->id);
            $cast[$i] = $this->ModelCast->fetch($movie->id);
            $i++;
        }

        $this->showContent("movies.php", array('movies' => $movies, 'directors' => $directors, 'cast' => $cast, 'myMovies' => null, 'controller' => $controller));
    }

    public function sort($controller) {

        $sortType = $_POST['sort'];


        switch ($sortType) {
            case "Name/Ascending" : {
                    $sortedMovies = $this->ModelMovies->fetchAllNameAsc();
                    break;
                }
            case "Name/Descending" : {
                    $sortedMovies = $this->ModelMovies->fetchAllNameDesc();
                    break;
                }
            case "Rating/Ascending" : {
                    $sortedMovies = $this->ModelMovies->fetchAllRatingAsc();
                    break;
                }
            case "Rating/Descending" : {
                    $sortedMovies = $this->ModelMovies->fetchAllRatingDesc();
                    break;
                }
        }

        $i = 0;
        $directors = [];
        $cast = [];


        foreach ($sortedMovies as $movie) {
            $directors[$i] = $this->ModelDirects->fetch($movie->id);
            $cast[$i] = $this->ModelCast->fetch($movie->id);
            $i++;
        }

        $this->showContent("movies.php", array('movies' => $sortedMovies, 'directors' => $directors, 'cast' => $cast, 'myMovies' => null, 'controller' => $controller));
    }

}
