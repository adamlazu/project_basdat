<?php
require_once "./core/init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>E-Commerce</title>
</head>
<body>
    <div class="payment">
    <form class="row g-3">
        <h1 class="paytitle">
            Silahkan isi data pembayaran
        </h1>
        <div class="col-md-6">
          <label for="namadep" class="form-label">Nama Depan</label>
          <input type="email" class="form-control" id="namadep">
        </div>
        <div class="col-md-6">
          <label for="namabel" class="form-label">Nama Belakang</label>
          <input type="password" class="form-control" id="namabel">
        </div>
        <div class="col-12">
          <label for="notelp" class="form-label">Nomor Telepon</label>
          <input type="text" class="form-control" id="notelp" placeholder="08..">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" rows="3" placeholder="Jl.Sakura 1234"></textarea>
          </div>
        <div class="col-md-10">
          <label for="idcard" class="form-label">Nomor Kartu</label>
          <input type="text" class="form-control" id="idcard">
        </div>
        <div class="col-md-2">
          <label for="CVV" class="form-label">CVV</label>
          <input type="password" class="form-control" id="CVV">
        </div>
        <div class="cards">
            <img src="./storage/mastercard.png" width="40" alt="" class="cardicon">
            <img src="./storage/visa.png" width="40" alt="" class="cardicon">
          </div>
          <div class="row g-2">
            <div class="col-md-2">
                <label for="bulan" class="form-label">Month</label>
                <input type="text" class="form-control" id="bulan" placeholder="MM">
              </div>
              <div class="col-md-3">
                <label for="tahun" class="form-label">Year</label>
                <input type="text" class="form-control" id="tahun" placeholder="YYYY">
              </div>
          </div>
        <div class="col-12">
          <a href="carthandling.php?method=checkout&payment=visa/mastercard" class="btn btn-primary">Bayar Sekarang</a>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>