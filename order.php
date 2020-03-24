<?php 
session_start(); 
$sid = $_SESSION["petugas_id"]; 
include "function.php"; 
$total = 0;

function isi_keranjang(){       
  $isikeranjang = array();        
  $sid = $_SESSION["petugas_id"]; 
  $conn = mysqli_connect("localhost", "root", "", "db_restoran");       
  $result = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user='$sid'");

   while ($r=mysqli_fetch_array($result)) {                
    $isikeranjang[] = $r;        
    }        
    return $isikeranjang; 
} 

//kode acak
$text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pnj = 4;
$text1 = strlen($text)-1;
$kode_beli = '';
for ($i=1; $i<=$pnj; $i++) {
  $kode_beli .= $text[rand(0, $text1)];
}

$tgl_skrg = date("Ymd");
$no_meja = $_POST['no_meja'];
$ket_meja = $_POST['ket_meja'];  
mysqli_query($conn, "INSERT INTO orders(id_orders,kode_beli, no_meja, tanggal, id_user, keterangan, status_orders) VALUES
                     ('','$kode_beli', '$no_meja', '$tgl_skrg', '$sid','$ket_meja', 'Belum dibayar')");

$isikeranjang = isi_keranjang(); 
$jml          = count($isikeranjang);
$ket = $_POST['ket'];  

$req = mysqli_query($conn, "SELECT * FROM orders WHERE id_user='$sid' AND kode_beli='$kode_beli'");
$row = mysqli_fetch_array($req);
$id = $row['id_orders'];

//simpan data detail pemesanan 
for ($i = 0; $i < $jml; $i++){  
  mysqli_query($conn, "INSERT INTO detail_orders(id_detail_orders, id_orders, kode_beli, id_masakan, jumlah, keterangan, status_detail_orders) 
         VALUES('', '$id','$kode_beli',{$isikeranjang[$i]['id_masakan']}, {$isikeranjang[$i]['jumlah']},'$ket[$i]', 'Diproses')"); 
        }
// for ($i = 0; $i < $jml; $i++){  
//  mysqli_query($conn, "INSERT INTO detail_beli(id_beli, kode_beli, id_masakan,id_user, jumlah, keterangan) 
//         VALUES('',$kode_beli',{$isikeranjang[$i]['id_masakan']},{$isikeranjang[$i]['id_user']}, {$isikeranjang[$i]['jumlah']}, '$ket')"); 
//        }
for ($i = 0; $i < $jml; $i++) { 
    mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = {$isikeranjang[$i]['id_keranjang']}");
    }
$sql1 = mysqli_query($conn,"SELECT * FROM detail_orders, masakan WHERE 
              id_orders='$id' AND kode_beli='$kode_beli'");
$sql = mysqli_query($conn,"SELECT * FROM detail_orders INNER JOIN masakan ON detail_orders.id_masakan=masakan.id_masakan WHERE id_orders='$id' AND kode_beli='$kode_beli'");
$e = mysqli_fetch_assoc($sql1);
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
              <h3 class="m-0 font-weight-bold text-success text-center">Struk Belanja</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="selesai.php" method="post" enctype="multipart/form-data">                      
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead class="thead bg-warning">
                    <tr>
                      <th scope="col">Nama Masakan</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php while($d=mysqli_fetch_array($sql)){                
            $subtotal    = $d['harga']* $d['jumlah'];                
            $total       = $total + $subtotal; ?>
              <tbody >
                  <tr class="bg-light">
                      <td><?= $d["nama_masakan"]; ?></td>
                  <td width="15"><?= $d["jumlah"]; ?></td>
                  <td>Rp. <?= $d["harga"]; ?></td>
                  <td>Rp. <?= $subtotal; ?></td>
                  </tr>
              </tbody>
          <?php } ?>
                  </table>
              <tr>
                <h2>Kode Order : <a href="#"><?= $e["kode_beli"]; ?></a></h2>
              </tr>
      <h2 class="mb-4 text-right">Total Belanja : Rp. <?= $total; ?></h2>
                   

<a href="pageUser.php" class="btn shadow btn-primary text-dark"><b>Selesai</b></a>
                </form>
              </div>
            </div>
        </div>
    
</div>

</body>
</html>