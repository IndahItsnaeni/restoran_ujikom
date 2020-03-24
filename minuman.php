<?php require 'admin/sidebar.php';
	  require 'function.php';

$masakan = query("SELECT * FROM masakan WHERE kategori='Minuman' ORDER BY id_masakan DESC");

 ?>
 <div class="container">
	<div class="mt-3">
		<h1 class="h3 mb-4 text-gray-800 text-center"><b>Silahkan diorder</b></h1>
			<hr>
		</h1>
	</div>	
	<form action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<?php foreach ($masakan as $row) : ?>
			<div class="col-lg-3">
				<div class="card border-bottom-info shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary"><?= $row["kategori"]; ?></h6>
					</div>
					<div class="card-body text-center">
						<img style="height: 90px;" src="img/<?= $row["gambar"]; ?>" alt="...">
						<h6 class="m-0 font-weight-bold text-dark mt-2"><?= $row["nama_masakan"]; ?></h6>
						<h6 class="m-0 font-weight-bold text-primary">Rp. <?= $row["harga"]; ?></h6>
					</div>
					<div class="card-footer text-center">
						
						<a href="#" class="btn btn-warning">
	                    	<i class="fas fa">Pesan</i>
	                  	</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>

	</form>
 </div>
 <?php require 'admin/footer.php'; ?>