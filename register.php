<?php 
require_once "./core/init.php";

if(isset($_POST['register'])){
    if($user->register($_POST["username"],$_POST['email'],$_POST['password'])){
        header("location: index.php");
    }else{
        echo "<script>alert('register gagal!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1>register</h1>
        <div class="card mx-auto" style="width: 50%;">
            <div class="card-body">
                <form action="register.php" method="post" >
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">username</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="username">

                        <label for="exampleFormControlInput1" class="form-label">email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email">

                        <label for="exampleFormControlInput1" class="form-label">password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" name="password">

                        <button type="submit" class="btn btn-primary mt-3" name="register">register</button>
                    </div>
                </form>
                <h6>already have an account? <a href="login.php">login here</a></h6>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>