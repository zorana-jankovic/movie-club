<?php

class User extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelNews");
        $this->load->model("ModelUser");
        $this->load->helper('url');
        $this->load->helper('html');
        
        if (($this->session->userdata('user')) == NULL) {
            redirect("Guest");
        } elseif ($this->session->userdata('user')->type == 0) {
            redirect("Admin"); 
        }
        elseif ($this->session->userdata('user')->type == 1) {
            redirect("Moderator"); 
        }
    }
    
    //pomocna metoda koja sluzi za ucitavanje stranice posto nam se svaka stranica sadrzi iz tri dela
    private function showContent($mainContent,$data=[]){
      
        $this->load->view("templates/header_user.php");
        $this->load->view($mainContent, $data);
        $this->load->view("templates/footer.php");
    }
    
    //metoda koja se sluza za ucitavanje svih vesti
    public function index(){
        
        $data['news'] = $this->ModelNews->fetchAll();
        $data['controller']="User";
        $this->showContent( "news.php",$data);  
       
    }
    
//    // metoda koja se poziva prilikom pretrage
//    public function pretraga(){
//        $trazi=$this->input->get('pretraga');
//        $this->index($trazi);
//    }
//    
//    //metoda koja ucitava formu za dodavanje vesti
//    public function dodajvest(){
//        $this->showContent("dodavanjevesti.php");
//    }
//
//    //metoda koja se poziva klikom na submit forme za dodavanje vesti
//    public function dodavanjeVesti(){
//        //ovde je koriscena pomocna klasa radi lakse provere ispravnosti unetih podataka u formu 
//        $this->form_validation->set_rules('naziv','Naziv', 'required|min_length[10]|max_length[20]');
//        $this->form_validation->set_rules('sadrzaj','Sadrzaj','required');
//        if($this->form_validation->run()==FALSE){
//            //neispravni podaci
//            $this->dodajvest();// ne treba redirect jer na refresh treba da proba da opet nesto doda
//        }
//        else{
//            //ispravni podaci
//            $naslov=$this->input->post("naziv");
//            $sadrzaj=$this->input->post("sadrzaj");
//            $autorId=$this->session->userdata("autor")->id;
//            $this->ModelVest->dodaj($naslov, $sadrzaj,$autorId);
//            redirect("Korisnik/index");
//        }
//    }
//    
//    
//    
    public function logout(){
        $this->session->unset_userdata("user");
        $this->session->sess_destroy(); 
        redirect("Guest");
    }
//
//    //metoda za prikaz mojih vesti
//    public function mojevesti(){
//        $idAutor=$this->session->userdata("autor")->korisnicko_ime;
//        $vesti=$this->ModelVest->fetchAll($idAutor);
//        $podaci['vesti']=$vesti;
//        $this->showContent("mojevesti.php",$podaci);
//    }
//    
//    //metoda za prikaz stranice za izmenu vesti
//    public function izmenivest($idvesti){
//        $vest=$this->ModelVest->dohvatiVest($idvesti);
//        $this->showContent("izmenavesti.php",['vest'=>$vest]);
//    }
//
//    //metoda koja se poziva prilikom klika na submit forme za izmenu vesti
//    //u njoj se prvo proverava ispravnost unetih podataka a zatim i menaju podaci ako su ispravni
//    public function menjajvest($idVest){
//        $this->form_validation->set_rules('naslov','Naslov','required|min_length[10]|max_length[20]');
//        $this->form_validation->set_rules('sadrzaj','Sadrzaj','required');
//        if($this->form_validation->run()==FALSE){
//            $this->izmenivest($idVest);// ne treba redirect jer na refresh treba da proba da opet nesto doda
//        }
//        else{
//            //ispravno
//            $naslov=$this->input->post("naslov");
//            $sadrzaj=$this->input->post("sadrzaj");
//            $autorId=$this->session->userdata("autor")->id;
//            $this->ModelVest->izmeniVest($idVest, $naslov, $sadrzaj,$autorId);
//
//            redirect("Korisnik/mojevesti");
//        }
//    }
//    
//    //metoda za brisanje vesti
//    public function obrisivest($idvest){
//        $autorId=$this->session->userdata("autor")->id;
//        $this->ModelVest->obrisiVest($idvest,$autorId);
//        redirect("Korisnik/mojevesti");
//    }
//
//    //metoda za prikaz jedne vesti
//    public function prikazivest($id){
//        $this->showContent("vestprikaz.php", ["vest"=>$this->ModelVest->dohvatiVest($id)]);
//    }
}
