<?php require 'admin/sidebar.php';
	  require 'function.php';

$masakan = query("SELECT * FROM masakan ORDER BY id_masakan DESC");

if(isset ($_POST["cari"]) ) {
	$masakan = cari($_POST["keyword"]);
}

?>

<div class="container">

	<div class="mt-3">
		<h1 class="h3 mb-4 text-gray-800"><b>Settings</b> Daftar Menu Masakan</h1>
			<hr>
		</h2>
	</div>
	<div class="row mb-5">
		<div class="col-lg-6">
			<div class="col-md-6 mb-3">
				<a href="tambahMenu.php" class="btn shadow btn-warning text-dark"><b>[+] Tambah</b></a>
			</div>
		</div>
		
			<form class="form-inline mb-3" method="post">                  
                <input type="text" name="keyword" class="form-control mr-sm-2" size="40" autofocus placeholder="Search for..." autocomplete="on">                   
                <button name="cari" class="btn btn-warning" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                </button>                
            </form>
		
	</div>	

<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<?php foreach ($masakan as $row) : ?>
		<div class="col-lg-3">
			<div class="card border-bottom-warning shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary"><?= $row["kategori"]; ?></h6>
				</div>
				<div class="card-body text-center">
					<img style="height: 90px;" src="img/<?= $row["gambar"]; ?>" alt="...">
					<h6 class="m-0 font-weight-bold text-dark mt-2"><?= $row["nama_masakan"]; ?></h6>
					<h6 class="m-0 font-weight-bold text-primary">Rp. <?= $row["harga"]; ?></h6>
				</div>
				<div class="card-footer text-center">
					
					<a href="updateMenu.php?id=<?= $row["id_masakan"]; ?>" class="btn btn-success btn-circle">
                    	<i class="fas fa-edit"></i>
                  	</a>

					<a href="hapusMenu.php?id=<?= $row["id_masakan"]; ?>" class="btn btn-danger btn-circle">
                    	<i class="fas fa-trash"></i>
                  	</a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>

</form>
</div>

<?php require 'admin/footer.php'; ?>