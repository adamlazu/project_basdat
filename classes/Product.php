<?php

class Product{
    private $db;
    private $table = "products";

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getAll(){
        return true;
    }

    public function getbyid(){
        return true;
    }
}