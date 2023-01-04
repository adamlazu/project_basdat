<?php
require_once "./core/init.php";
$userid = $_GET["user_id"];
$history = $transaction->getbyid($userid);
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
        <li class="nav-item">
          <a class="nav-link active" href="shoppingcart.php?user_id=<?php echo $_SESSION['user']['id']; ?>">cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="transactionhistory.php?user_id=<?php echo $_SESSION['user']['id']; ?>">history</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php if($history){ ?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Transaction History</h3>
        </div>

        <!--head-->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-8 fw-bold">
                        Deskripsi
                    </div>
                    <div class="col fw-bold">
                        Total Harga
                    </div>
                </div>
            </div>
        </div>
        <?php while($hist = $history->fetch_object()){ ?>
        <!--body-->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                    <?php echo $hist->description; ?>
                    </div>
                    <div class="col">
                    Rp<?php echo number_format($hist->total, 0, "", "."); ?>
                    </div>
                </div>            
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-8">
                        Metode Pembayaran
                    </div>
                    <div class="col">
                    <?php echo $hist->method; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php } else{ ?>
<h3>belum ada transaksi</h3>
<?php } ?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>