<?php require 'admin/sidebar.php'; 
	  require 'function.php';

$id = $_GET["id_user"];
$user = query ("SELECT * FROM user WHERE id_user = $id")[0];


if (isset($_POST["simpan"]) ) { 

  if (updateuser ($_POST) > 0 ) {
    echo "
      <script>
        alert('Data Berhasil Diubah!!!');
        document.location.href ='user.php';
      </script>
    ";  
  } else {
    echo "
    <script>
        alert('Data Gagal Diubah!!!');
        document.location.href ='user.php';
      </script>
    ";
  }
  

} 
?>

<div class="container">
	<div class="mt-3">
		<h1 class="h3 mb-4 text-gray-800"><b>Edit</b> User</h1>
			<hr>
		</h2>
	</div>
<form action="" method="post" enctype="multipart/form-data" style="width: 40%;">
<input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">
<div class="card">
	<div class="card-header">
		<h5>Edit Data User</h5>
	</div>

	<div class="card-body">

					<!-- input username -->
					<div class="form-group form-label-group">
						<label>Username :</label>
						<input type="text" name="username"
						class="form-control"
						value="<?= $user['username']; ?>" 
						id="iUserName" placeholder="Username" required>
					</div>

					<!-- input nama lengkap -->
					<div class="form-group form-label-group">
						<label>Nama Lengkap :</label>
						<input type="text" name="namaLengkap"
						class="form-control"
						value="<?= $user['nama_user']; ?>" 
						id="iNamaLengkap" placeholder="Nama Lengkap" required>
					</div>

					<!-- input password -->
					<div class="form-group form-label-group">
						<label>Password  :</label>
						<input type="password" name="password"
						class="form-control"
						value="<?= $user['password']; ?>" 
						id="iPassword" placeholder="Password" required>
					</div>					
				</div><!-- End Card Body -->

				<div class="card-footer">
					<button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
				</div><!-- End card footer -->
</div>

	
</form>
</div>


<?php require 'admin/footer.php'; ?>