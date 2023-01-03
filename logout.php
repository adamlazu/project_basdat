<?php 
require_once "./core/init.php";
$user->logout();
header("location: index.php")
?>