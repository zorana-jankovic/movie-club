<?php

class Admin extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelNews");
        $this->load->model("ModelUser");
        $this->load->library('session');
        
        if (($this->session->userdata('user')) == NULL) {
            redirect("Guest");
        } elseif ($this->session->userdata('user')->type == 1) {
            redirect("Moderator");
        } elseif ($this->session->userdata('user')->type == 2) {
            redirect("User");
        }
    }
    
    private function showContent($mainContent,$data=[]){
        $podaci['user']=$this->session->userdata('user');
        $this->load->view("templates/header_admin.php");
       // $this->load->view($mainContent, $podaci);
        $this->load->view("templates/footer.php");
    }
    
    public function index(){
        //  $podaci['news'] = $this->ModelNews->fetchAll();
        //  $this->showContent("adminvesti.php",$podaci); 
         $this->showContent("adminvesti.php",NULL);     
    }
    
    public function logout(){
        $this->session->unset_userdata("user");
        $this->session->sess_destroy();
        redirect("Guest");
    }
    
    public function obrisivest($idvest){
//        $this->ModelVest->obrisiVest($idvest);
//        redirect("Admin/index");
    }

}
