<?php

class Cart{
    private $db;
    private $table = "cart";
    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function new($product_id,$user_id){
        $query = "SELECT * FROM $this->table WHERE product_id = $product_id AND user_id = $user_id";
        if($this->db->get($query)){
            $statement = "UPDATE $this->table SET quantity = quantity + 1 WHERE product_id = $product_id AND user_id = $user_id ";
            if($this->db->update($statement)){
                return true;
            }else{
                return false;
            }
        }else{
            $statement = "INSERT INTO $this->table (product_id, user_id, quantity) VALUES ($product_id, $user_id, 1)";
            if($this->db->insert($statement)){
                return true;
            }else{
                return false;
            }
        }
    }

    public function add($id){
        $statement = "UPDATE $this->table SET quantity = quantity + 1 WHERE id = $id";
        if($this->db->update($statement)){
           return true;
        }else{
            return false;
        }
    }

    public function min($id){
        $query = "SELECT * FROM $this->table WHERE id = $id";
        $detail = $this->db->get($query)->fetch_object();
        if($detail->quantity == 1){
            $statement = "DELETE FROM $this->table WHERE id = $id";
            if($this->db->delete($statement)){
                return true;
            }else{
                return false;
            }
        }else{
            $statement = "UPDATE $this->table SET quantity = quantity - 1 WHERE id = $id";
            if($this->db->update($statement)){
                return true;
            }else{
                return false;
            }
        }
    }

    public function get($user_id){
        $query = "SELECT * FROM $this->table WHERE user_id = $user_id";
        $detail = $this->db->get($query);
        if($detail){
            return $detail;
        }else{
            return false;
        }
    }
}