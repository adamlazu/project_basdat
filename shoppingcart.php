<?php 
require_once "./core/init.php";
$current_cart = $cart->get((int)$_SESSION["user"]["id"]);
$total = 0;
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
          <a class="nav-link" href="addproduct.php">add products</a>
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

<?php if($current_cart){ ?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
        </div>

        <?php while($carts = $current_cart->fetch_object()){ 
              $productdetail = $product->getbyid((int)$carts->product_id)?>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="./storage/<?php echo $productdetail->imgname; ?>.png"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?php echo $productdetail->name; ?></p>
                
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <a class="btn btn-primary px-2" href="carthandling.php?method=add&id=<?php echo $carts->id; ?>">
                  +
                </a>

                <div>
                  <h5 class="text-center mx-3"><?php echo $carts->quantity; ?></h5>
                </div>

                <a class="btn btn-primary px-2" href="carthandling.php?method=min&id=<?php echo $carts->id; ?>">
                  -
                </a>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">Rp<?php echo number_format($productdetail->price, 0, "", "."); ?></h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php $total = $total + $carts->quantity*$productdetail->price; }?>

        <div class="card mb-3">
          <div class="card-body">
            <h5>Total: Rp <?php echo number_format($total, 0, "", "."); ?></h5>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <button type="button" class="btn btn-primary btn-block btn-lg">Proceed to Pay</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<?php }else{ ?>
<h3>cart masih kosong</h3>
<?php }?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>