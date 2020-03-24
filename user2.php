<?php require 'admin/sidebar.php' ;
require 'function.php';

$user = mysqli_query($conn,"SELECT * FROM user u INNER JOIN level l ON u.id_level=l.id_level");
?>
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
                    </tbody>
                    <?php $i++; ?>

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
<?php require 'admin/footer.php' ?>