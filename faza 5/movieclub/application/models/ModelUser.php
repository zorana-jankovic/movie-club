<?php

class ModelUser extends CI_Model {
    public $user;
    
    public function __construct() {
        parent::__construct();
        $this->user=NULL;
    }
    
    public function fetch($username){
        $result=$this->db->where('username',$username)->get('users');
        $user=$result->row();
        if ($user!=NULL) {
            $this->user=$user;
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function checkPassword($password){
        if ($this->user->password == $password) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function checkEmail($email){
        $result=$this->db->where('email',$email)->get('users');
        $user=$result->row();
        if ($user!=NULL) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
     public function checkUsername($username){
        $result=$this->db->where('username',$username)->get('users');
        $user=$result->row();
        if ($user!=NULL) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
     public function createAccount($email, $username, $password) {
          
        $this->db->set("email", $email);
        $this->db->set("username", $username);
        $this->db->set("password",$password);
        $this->db->set("type",3);
        $this->db->insert("users");
        
        $result=$this->db->where('username',$username)->get('users');
        
        $user=$result->row();
        return $user;
    
     }
   
    
}
