<?php require 'admin/sidebar.php';
	  require 'function.php';

$user = mysqli_query($conn,"SELECT * FROM user u INNER JOIN level l ON u.id_level=l.id_level");

?>

<div class="container">

	<div class="mt-3">
		<h1 class="h3 mb-4 text-gray-800"><b>Settings</b> User</h1>
			<hr>
		</h2>
	</div>
	<div class="row">
		<div class="col">
			<div class="col-md-6 mb-3">
				<a href="register.php" class="btn shadow btn-warning text-dark"><b>[+] Tambah</b></a>
			</div>
		</div>
	</div>
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Data Table User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="#" method="post" enctype="multipart/form-data">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama User</th>
                      <th>Username</th>
                      <th>Akses</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama User</th>
                      <th>Username</th>
                      <th>Akses</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?= $i = 1; ?>
<?php while($row = mysqli_fetch_assoc($user)) { ?>
                    <tr>
                      <td style="width: 5%;"><?= $i; ?></td>
                      <td><?= $row["nama_user"]; ?></td>
                      <td><?= $row["username"]; ?></td>
                      <td><?= $row["nama_level"]; ?></td>
                      <td style="width: 10%;">
                        <a href="updateUser.php?id_user=<?= $row["id_user"]; ?>" class="btn btn-success btn-circle btn-sm">
                          <i class="fas fa-edit"></i>
                        </a>
              <?php if($_SESSION['petugas_id'] != $row["id_user"]) { ?>
                        <a href="hapusUser.php?id_user=<?= $row["id_user"]; ?>" class="btn btn-danger btn-circle btn-sm">
                          <i class="fas fa-trash"></i>
                        </a>
              <?php } ?>
                      </td>
                    </tr>
<?php $i++; ?>
<?php } ?>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
        </div>
		
</div>

<?php require 'admin/footer.php'; ?>