<?php

class User{
    private $db;
    private $table = "users";

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function register($username, $email, $password){
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $escapedUser = $this->db->escape($username);
        $escapedEmail = $this->db->escape($email);
        $escapedPass = $this->db->escape($password);
        $query = "INSERT INTO $this->table (username, email, password) VALUES ('$escapedUser', '$escapedEmail', '$escapedPass')";
        if($this->db->insert($query)){
            return true;
        }else{
            return false;
        }
    }

    public function login($username, $password){
        $escapedUser = $this->db->escape($username);
        $escapedPass = $this->db->escape($password);
        $query = "SELECT * FROM $this->table WHERE username = $escapedUser";
        $result = $this->db->get($query);
        $hashed = $result->password;
        if(password_verify($escapedPass, $hashed)){
            $_SESSION["user"]= array(
                "id"=>$result->id,
                "username"=>$result->username
            );
            return true;
        }else{
            return false;
        }
    }
}