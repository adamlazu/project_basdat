<?php
require_once "./core/init.php";

if(isset($_GET["method"]) || isset($_GET["product_id"])){
    $pid = (int) $_GET["product_id"];
    $uid = (int) $_SESSION['user']["id"];
    if($_GET["method"]=='new'){
        if($cart->new($pid,$uid)){
            header("Location: index.php");
        }else{
            echo "<script>alert('gagal menambahkan ke cart')</script>";
            header("Location: index.php");
        }
    }elseif($_GET["method"]=='add'){
        if($cart->add($_GET['id'])){
            header("Location: shoppingcart.php?user_id=".$_SESSION['user']['id']);
        }else{
            echo "<script>alert('gagal menambahkan ke cart')</script>";
            header("Location: shoppingcart.php?user_id=".$_SESSION['user']['id']);
        }
    }elseif($_GET["method"]=='min'){
        if($cart->min($_GET['id'])){
            header("Location: shoppingcart.php?user_id=".$_SESSION['user']['id']);
        }else{
            echo "<script>alert('gagal menambahkan ke cart')</script>";
            header("Location: shoppingcart.php?user_id=".$_SESSION['user']['id']);
        }
    }
}
?>