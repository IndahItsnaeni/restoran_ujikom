<?php 
session_start(); 
include "function.php"; 
$sid = $_SESSION["petugas_id"];
$total=0;
$sql = mysqli_query($conn,"SELECT * FROM detail_orders INNER JOIN masakan ON detail_orders.id_masakan=masakan.id_masakan WHERE id_orders='$_GET[id]'");
$d=mysqli_num_rows($sql);


$sql = mysqli_query($conn,"SELECT id_orders FROM transaksi WHERE id_orders='$_GET[id]' AND id_user='$sid'");        
$ketemu=mysqli_num_rows($sql);
if ($ketemu==0){ 
$tgl_skrg = date("Ymd");
$total = $_POST['total'];               
// kalau barang belum ada, maka di jalankan perintah insert                
mysqli_query($conn,"INSERT INTO transaksi 
							(id_user, id_orders, tanggal, total_bayar)                                
					 VALUES ('$sid', '$_GET[id]', '$tgl_skrg', '$total')");

mysqli_query($conn,"UPDATE orders SET status_orders = 'Sudah Dibayar' WHERE id_orders='$_GET[id]'");        
} else {                
//  kalau barang ada, maka di jalankan perintah update                
	mysqli_query($conn,"UPDATE status_orders                        
		SET status_detail_orders = 'Pesanan Diterima' WHERE id_status_orders='$_GET[id]'");        
}        
		header('Location:entriOrderKasir.php');
 ?>