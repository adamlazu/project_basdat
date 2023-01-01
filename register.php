<?php 
require_once "./core/init.php";

if(isset($_POST['submit'])){
    if($user->register($_POST["username"],$_POST['email'],$_POST['password'])){
        echo "berhasil";
    }else{
        echo "gagal";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="post">
        <input type="text" name="username">
        <input type="text" name="email">
        <input type="password" name="password">
        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>