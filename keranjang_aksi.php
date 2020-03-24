<?php 
session_start(); 
include "function.php"; 
$sid = $_SESSION["petugas_id"];
//di cek dulu apakah barang yang di beli sudah ada di tabel keranjang 
$sql = mysqli_query($conn,"SELECT id_masakan FROM keranjang WHERE id_masakan='$_GET[id]' AND id_user='$sid'");        
$ketemu=mysqli_num_rows($sql);        
if ($ketemu==0){                
// kalau barang belum ada, maka di jalankan perintah insert                
mysqli_query($conn,"INSERT INTO keranjang 
							(id_masakan, id_user, jumlah)                                
					 VALUES ('$_GET[id]', '$sid', 1)");        
} else {                
//  kalau barang ada, maka di jalankan perintah update                
	mysqli_query($conn,"UPDATE keranjang                        
		SET jumlah = jumlah + 1
		WHERE id_user ='$sid' AND id_masakan='$_GET[id]'");        
}        
		header('Location:keranjang.php');
?>
