<?php 
session_start(); 
$sid = $_SESSION["petugas_id"]; 
include "function.php"; 
$total = 0;
$sql = mysqli_query($conn,"SELECT * FROM keranjang, masakan WHERE 
            id_user='$sid' AND keranjang.id_masakan=masakan.id_masakan");
if (isset($_POST["simpan"]) ) { 
  if (order ($_POST) > 0 ) {}
}  
               
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<nav class="navbar  navbar-expand-lg navbar-light bg-warning">
  <div class="container">
        <a class="navbar-brand" href="#" style="font-family: jokerman;"><img src="img/sendok.png" width="25">  <b>Keranjang Cafee ITS</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
           <a class="nav-item nav-link active page-scroll" href="pageUser.php" ><b>Home</b> <span class="sr-only">(current)</span></a>
         </div>
  </div>
  </div>
</nav>

<div class="container mt-5">

 
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-success text-center">Keranjang Anda</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="order.php" method="post" enctype="multipart/form-data">
                      <div class="form-group form-label-group" style="width: 15%;">
                        <input type="number" name="no_meja"
                        class="form-control"
                        id="iNoMeja" placeholder="No. Meja" required>
                      </div>
                      
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead class="thead bg-warning">
                    <tr>
                      <th scope="col">Gambar</th>
                      <th scope="col">Nama Masakan</th>
                      <th scope="col">Catatan</th>
                      <th scope="col">-</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">+</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Total</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while($row = mysqli_fetch_array($sql)) {      
                      $subtotal = $row['harga'] * $row['jumlah'];
                      $total = $total + $subtotal; ?>
                        <tr class="bg-light">
                            <td><img style="height: 70px;" src="img/<?= $row["gambar"]; ?>" alt="..."></td>
                            <td><?= $row["nama_masakan"]; ?></td>
                            <td>
                              <div class="form-group form-label-group">
                            <input type="text" name="ket[]"
                            class="form-control"
                            id="iketerangan" placeholder="Catatan Pemesanan">
                          </div>
                            </td>
                        <td width="5"><a href="keranjangMinus.php?id=<?= $row["id_masakan"]; ?>"><b>-</b></a></td>
                        <td width="15"><?= $row["jumlah"]; ?></td>
                        <td width="5"><a href="keranjang_aksi.php?id=<?= $row["id_masakan"]; ?>"><b>+</b></a></td>
                        <td>Rp. <?= $row["harga"]; ?></td>
                        <td>Rp. <?= $subtotal; ?></td>
                        <td><a href="hapusKeranjang.php?id=<?= $row["id_keranjang"]; ?>">Batal</a></td>
                        </tr>
                    </tbody>
                <?php } ?>
                  </table>
             <div class="form-group form-label-group" style="width: 50%;">
                        <input type="text" name="ket_meja"
                        class="form-control" 
                        id="iNoMeja" placeholder="Catatan di Meja Pemesanan">
                      </div>
                        <tr>
                          <td><input type="submit" class="btn shadow btn-primary" Value="Pesan"></td>
                          <td><a href="pageUser.php" class="btn shadow btn-success">Tambah Lagi</b></a></td>
                        </tr>
                        <h2 class="mb-4 text-right">Total Belanja : Rp. <?= $total; ?></h2>
                   


                </form>
              </div>
            </div>
        </div>
    
</div>

</body>
</html>