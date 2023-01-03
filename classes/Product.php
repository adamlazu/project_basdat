<?php

class Product{
    private $db;
    private $table = "products";

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function addProduct($name, $description, $price, $imgname){
        $escname = $this->db->escape($name);
        $escdes = $this->db->escape($description);
        $escimg = $this->db->escape($imgname);
        $query = "INSERT INTO $this->table (name, description, price, imgname) VALUES ('$escname','$escdes',$price,'$imgname')";
        if($this->db->insert($query)){
            return true;
        }else{
            return false;
        }
    }

    public function getAll(){
        $query = "SELECT * FROM $this->table";
        $products = $this->db->get($query);
        if($products != false){
            return $products;
        }else{
            return false;
        }
    }

    public function getbyid($id){
        $query = "SELECT * FROM $this->table WHERE id = $id";
        $detail = $this->db->get($query);
        if($detail){
            return $detail->fetch_object();
        }else{
            return false;
        }
    }
}