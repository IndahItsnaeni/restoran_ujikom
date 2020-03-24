<?php 
require 'admin/sidebar.php';
require 'function.php';
$total = 0;
$id = $_GET["id"];
$odr = mysqli_query($conn, "SELECT * FROM detail_orders INNER JOIN masakan WHERE id_orders = $id AND detail_orders.id_masakan=masakan.id_masakan");
$e = mysqli_fetch_assoc($odr);
$order = mysqli_query($conn, "SELECT * FROM detail_orders INNER JOIN masakan WHERE id_orders = $id AND detail_orders.id_masakan=masakan.id_masakan ");
$ids = $_GET["ids"];
$update = mysqli_query($conn, "SELECT * FROM detail_orders INNER JOIN masakan WHERE id_detail_orders = $ids AND detail_orders.id_masakan=masakan.id_masakan ");
$up = mysqli_fetch_assoc($update);
 ?>

<div class="container">
	<div class="mt-3">
		<h1 class="h3 mb-4 text-gray-800"><b>Data</b> Order</h1>
			<hr>
		</h2>
	</div>
	<div class="card shadow mb-4" style="width: 80%;">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-success">Data Table Order</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          	
          	<form method="post" enctype="multipart/form-data" action="entriTransaksi_aksi.php?id=<?= $e["id_orders"]; ?>">
          		<table class="table table-bordered" id="dataTable" cellspacing="0">
          			<thead>
          				<tr>
          					<th>Kode TSK</th>
	          				<th>Menu Masakan</th>
	          				<th>Jumlah</th>
                    <th>Total Harga</th>
<?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 4) { ?>
	          				<th>Status Detail Order</th>
<?php } ?>
          				</tr>        				
          			</thead>
          			<tbody>
          			<?php while($row = mysqli_fetch_assoc($order)) {      
                      $subtotal = $row['harga'] * $row['jumlah'];
                      $total = $total + $subtotal; ?>

          				<tr>
          					<td style="color: red;"><b><?= $row["kode_beli"]; ?></b></td>
          					<td><?= $row["nama_masakan"]; ?></td>
          					<td><?= $row["jumlah"]; ?></td>
                    <td>Rp. <?= $subtotal; ?></td>
<?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 4) { ?>
          					<td><a href="entriUpdate.php?ids=<?= $row["id_detail_orders"]; ?>" class="btn btn-warning"><b><?= $row["status_detail_orders"]; ?></b></a>
</td>
<?php } ?>
          				</tr>
          			<?php } ?>
          			</tbody>
              </table>
<?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 2) { ?>
              <h4 class="text-right" style="color: red;"><b>Total Belanja : Rp. <?= $total; ?></b></h4>
              <input type="number" name="total" class="form-control mb-2" style="width: 15%;" value="<?= $total; ?>">
              <input type="submit" class="btn shadow btn-warning text-dark" Value="Bayar Sekarang">
<?php } ?>

          	</form>
          </div>
        </div>
    </div>
		
</div>

 <?php require 'admin/footer.php'; ?>