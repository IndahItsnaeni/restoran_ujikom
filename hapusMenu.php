<?php 
require 'function.php';

$id = $_GET["id"];

if(hapusmenu($id) > 0) {
	echo "
			<script>
				alert('Data Berhasil Dihapus!!!');
				document.location.href ='referensi.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('Data Gagal Dihapus!!!');
				document.location.href ='referensi.php';
			</script>
		";
}		
 ?>
