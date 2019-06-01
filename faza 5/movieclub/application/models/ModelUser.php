<?php

class ModelUser extends CI_Model {
    public $user;
    
    public function __construct() {
        parent::__construct();
        $this->user=NULL;
    }
    
    public function fetchAll() {

        $query = $this->db->get('users');
        $result = $query->result();
        return $result;
    }
    
    public function fetchAll1() {
        $val='1';
        $this->db->where("type",$val);
        $query = $this->db->get('users');
        $result = $query->result();
        return $result;
    }
    
    public function fetchAll2() {
        $val='2';
        $this->db->where("type",$val);
        $query = $this->db->get('users');
        $result = $query->result();
        return $result;
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
   
     public function deleteUser($id) {

        $res = $this->db->where("id", $id)->get('users');
        $kor = $res->row();

        $val ='1';

        if ($kor->type!= $val) {
            $this->db->where("id", $id);
            $this->db->delete("users");
        } else {
            $val ='2';
            $this->db->set("type", $val);
            $this->db->where("id", $id);
            $this->db->update("users");
        }
    }

    public function promoteUser($id) {
        $val='1';
        $this->db->set("type", $val);
        $this->db->where("id", $id);
        $this->db->update("users");
    }

}
