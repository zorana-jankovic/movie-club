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
   
    
}
