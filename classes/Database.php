<?php
class Database{
    private $connection;
    private static $instance = null;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "shoppingcart";

    public function __construct(){
        $this->connection = new mysqli($this->host,$this->user,$this->password,$this->dbname);
        if ($this->connection->connect_errno){
            echo "gagal menyambungkan.";
        }
    }

    // Singleton pattern
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function get($query){
        $result = $this->connection->query($query);
        if($result->num_rows!=0){
            return $result;
        }else{
            return false;
        }
    }

    public function insert($query){
        if($this->connection->query($query)){
            return true;
        }else{
            return false;
        }
    }
    
    public function update($query){
        if($this->connection->query($query)){
            return true;
        }else{
            return false;
        }
    }

    public function delete($query){
        if($this->connection->query($query)){
            return true;
        }else{
            return false;
        }
    }

    public function escape($string){
        $string = $this->connection->real_escape_string($string);
        return $string;
    }
}