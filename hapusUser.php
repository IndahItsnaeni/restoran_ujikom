<?php 
require 'function.php';

$id = $_GET["id_user"];

if(hapususer($id) > 0) {
	echo "
			<script>
				alert('Data Berhasil Dihapus!!!');
				document.location.href ='user.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('Data Gagal Dihapus!!!');
				document.location.href ='user.php';
			</script>
		";
}		
 ?>
