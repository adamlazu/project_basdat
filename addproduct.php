<?php
require_once "./core/init.php";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = (int) $_POST['price'];
    $imgname = $_POST['imgname'];
    if($product->addProduct($name,$description,$price,$imgname)){
        $target_dir = "storage/";
        $target_file = $target_dir . $imgname .".png";
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }else{
        echo "<script>alert('produk gagal ditambahkan!')</script>";
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
<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <?php if($_SESSION['user']['admin']==1){ ?>
        <li class="nav-item">
          <a class="nav-link active" href="addproduct.php">add products</a>
        </li>
        <?php }else { ?>
        <li class="nav-item">
          <a class="nav-link active" href="shoppingcart.php?user_id=<?php echo $_SESSION['user']['id']; ?>">cart</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
        <h1>add product</h1>
        <div class="card mx-auto" style="width: 50%;">
            <div class="card-body">
                <form action="addproduct.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">nama produk</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">

                        <label for="exampleFormControlInput1" class="form-label">harga</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="price">

                        <div class="form-floating mt-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
                            <label for="floatingTextarea2">deskripsi</label>
                        </div>

                        <div class="input-group mb-3 mt-3">
                            <label class="input-group-text" for="inputGroupFile01">image</label>
                            <input type="file" class="form-control" id="inputGroupFile01" name="image">
                        </div>

                        <label for="exampleFormControlInput1" class="form-label">nama image</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="imgname">

                        <button type="submit" class="btn btn-primary mt-3" name="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>