<?php 
require 'function.php';
$minuman = query("SELECT * FROM masakan WHERE kategori='Minuman' ORDER BY id_masakan DESC");
$makanan = query("SELECT * FROM masakan WHERE kategori='Makanan' ORDER BY id_masakan DESC");

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min-1.css">
    <link rel="stylesheet" href="css/bootstrap.min-2.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

    <title>Halaman Pelanggan</title>
    <link rel="shortcut icon" type="img/png" href="img/sendok.png">
  </head>
<body style="background-color: lightgrey;">
     <nav class="navbar  navbar-expand-lg navbar-light bg-warning fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#" style="font-family: jokerman;"><img src="img/sendok.png" width="25">  <b>Cafee ITS</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
           <a class="nav-item nav-link active page-scroll" href="#" ><b>Home</b> <span class="sr-only">(current)</span></a>
           <a class="nav-item nav-link active page-scroll" href="#sejarah"><b>Sejarah</b></a>
           <a class="nav-item nav-link active page-scroll" href="logout.php">Logout</a>
           <a class="nav-link" href="keranjang.php">
              <i class="fas fa-fw fa-shopping-cart"></i>
    </div>
  </div>
  </div>
</nav>
<section class="p-b-55">
  <div class="row align-items-center" style="height:650px; background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('img/kopi5.jpg') no-repeat; background-size: cover;">
        <div class="col text-right" style="margin-right: 6%;">
            <h1 class="text-warning" style="font-size: 60px; font-family: jokerman;">Cafee ITS</h1>
            <p class="text-white" style="font-size: 25px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit</
        </div>
  </div>
</section>

<div class="container mt-5">
      <div class="text-left">
        <h2 style="font-family: forte;"><b>
          <a class="text-dark">Minuman</a></b>
        </h2>
          <div class="progress" style="height: 3px;">
            <div class="progress-bar bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="25" ria-valuemin="100"></div>
          </div>
      </div>
      <form class="mt-5" action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <?php foreach ($minuman as $row) : ?>
          <div class="col-lg-3 mb-2">
            <div class="card border-bottom-info shadow mb-4">
                <p class="m-0 font-weight-bold text-primary mt-2 ml-2"><?= $row["kategori"]; ?></p>
  
              <div class="card-body text-center">
                <img style="height: 90px;" src="img/<?= $row["gambar"]; ?>" alt="...">
                <h6 class="m-0 font-weight-bold text-dark mt-2"><?= $row["nama_masakan"]; ?></h6>
                <h6 class="m-0 font-weight-bold text-primary">Rp. <?= $row["harga"]; ?></h6>
              </div>
              <div class="card-footer text-center">
                
                <a href="keranjang_aksi.php?id=<?= $row["id_masakan"]; ?>" class="btn shadow btn-warning"><b>Pesan</b></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </form> <!-- Minuman -->

      <div class="text-left">
        <h2 style="font-family: forte;"><b>
          <a class="text-dark">Makanan</a></b>
        </h2>
          <div class="progress" style="height: 3px;">
            <div class="progress-bar bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="25" ria-valuemin="100"></div>
          </div>
      </div>
      <form class="mt-5" action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <?php foreach ($makanan as $row) : ?>
          <div class="col-lg-3 mb-2">
            <div class="card border-bottom-info shadow mb-4">
                <p class="m-0 font-weight-bold text-primary text-left ml-2 mt-2"><?= $row["kategori"]; ?></p>
              <div class="card-body text-center">
                <img style="height: 90px;" src="img/<?= $row["gambar"]; ?>" alt="...">
                <h6 class="m-0 font-weight-bold text-dark mt-2"><?= $row["nama_masakan"]; ?></h6>
                <h6 class="m-0 font-weight-bold text-primary">Rp. <?= $row["harga"]; ?></h6>
              </div>
              <div class="card-footer text-center">
                
                <a href="keranjang_aksi.php?id=<?= $row["id_masakan"]; ?>" class="btn shadow btn-warning"><b>Pesan</b></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </form> <!-- Makanan -->
</div>

<footer class="text-white bg-dark">
  <div class="container">
    <div class="row pt-3">
      <div class="col text-center">
        <p>Copyright @CafeeITS2020</p>
      </div>
    </div>
  </div>
</footer>

</body>
</html>