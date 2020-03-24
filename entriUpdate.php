<?php 
session_start(); 
include "function.php"; 
$sid = $_SESSION["petugas_id"];

		mysqli_query($conn,"UPDATE detail_orders                        
		SET status_detail_orders = 'Pesanan Diterima' WHERE id_detail_orders='$_GET[ids]'");
    
		header('Location:entriOrderData.php');
 ?>