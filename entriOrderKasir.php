<?php 
require 'admin/sidebar.php';
require 'function.php';

$order = mysqli_query($conn, "SELECT * FROM orders INNER JOIN user WHERE status_orders = 'Belum Dibayar' AND orders.id_user=user.id_user ORDER BY id_orders DESC");
 ?>

<div class="container">
	<div class="mt-3">
		<h1 class="h3 mb-4 text-gray-800"><b>Data</b> Order</h1>
			<hr>
		</h2>
	</div>
	<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-success">Data Table Order</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          	
          	<form>
          		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          			<thead>
          				<tr>
          					<th>Kode TSK</th>
	          				<th>No. Meja</th>
	          				<th>Pemesan</th>
	          				<th>Ket</th>
	          				<th>Status Order</th>
          				</tr>        				
          			</thead>
          			<tbody>
          			<?php while($row = mysqli_fetch_assoc($order)) : ?>

          				<tr>
          					<td><a style="color: red;" href="entriOrderData.php?id=<?= $row["id_orders"]; ?>"><b><?= $row["kode_beli"]; ?></b></a></td>
          					<td><?= $row["no_meja"]; ?></td>
          					<td><?= $row["nama_user"]; ?></td>
          					<td><?= $row["keterangan"] ?></td>
          					<td><?= $row["status_orders"]; ?></td>
          				</tr>
          			<?php endwhile; ?>
          			</tbody>
          		</table>
          	</form>


          </div>
        </div>
    </div>
		
</div>

 <?php require 'admin/footer.php'; ?>