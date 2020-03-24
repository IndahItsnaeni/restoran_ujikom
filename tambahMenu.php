<?php require 'admin/sidebar.php'; 
	  require 'function.php';

if (isset($_POST["simpan"]) ) { 

  if (tambahmenu ($_POST) > 0 ) {
    echo "
      <script>
        alert('Data Berhasil Ditambahkan!!!');
        document.location.href ='referensi.php';
      </script>
    ";  
  } else {
    echo "
    <script>
        alert('Data Gagal Ditambahkan!!!');
        document.location.href ='referensi.php';
      </script>
    ";
  }
  

} 
?>

<div class="container">
	<div class="mt-3">
		<h1 class="h3 mb-4 text-gray-800"><b>Tambah</b> Daftar Menu Masakan</h1>
			<hr>
		</h2>
	</div>
<form action="" method="post" enctype="multipart/form-data" style="width: 40%;">

<div class="card">
	<div class="card-header">
		<h5>Tambah Data Baru</h5>
	</div>

	<div class="card-body">
					
					<!-- Input gambar -->
					<div class="form-group form-label-group">
						<input type="file" name="foto"
						class="form-control"
						id="gambar" placeholder="Gambar Produk">
						<small for="iStatus">Ukuran File Gambar Max.5mb</small>
					</div>

					<!-- input nama produk -->
					<div class="form-group form-label-group">
						<input type="text" name="nama_masakan"
						class="form-control"
						id="iNamaMasakan" placeholder="Nama Masakan" required>
					</div>

					<!-- input harga -->
					<div class="form-group form-label-group">
						<input type="number" name="harga"
						class="form-control"
						id="iHarga" placeholder="Harga" required>
						<small for="iStatus">Tidak perlu dengan Rp. (langsung angkanya saja)</small>
					</div>

					<!-- input status Order -->
					<div class="form-group form-label-group">
						<input type="text" name="status"
						class="form-control"
						id="iStatus" placeholder="Status Order" required>
						<small for="iStatus">Diisi dengan Tersedia/Tidak Tersedia</small>
					</div>

					<!-- input kategori -->
					<div class="form-group form-label-group">
						<input type="text" name="kategori"
						class="form-control"
						id="iKategori" placeholder="Kategori" required>
						<small for="iStatus">Diisi dengan Makanan/Minuman</small>
					</div>
				</div><!-- End Card Body -->

				<div class="card-footer">
					<button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
				</div><!-- End card footer -->
</div>

	
</form>
</div>


<?php require 'admin/footer.php'; ?>