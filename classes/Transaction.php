<?php

class Transaction{
    private $db;
    private $table = "transaction";

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getbyid($id){
        $query = "SELECT * FROM $this->table WHERE user_id = $id";
        $detail = $this->db->get($query);
        if($detail){
            return $detail;
        }else{
            return false;
        }
    }
}