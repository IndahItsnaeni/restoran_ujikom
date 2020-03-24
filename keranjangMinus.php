<?php 
session_start();
include "function.php";
$sid = $_SESSION["petugas_id"];
$id = $_GET["id"];

$sql = mysqli_query($conn, "SELECT id_masakan FROM keranjang WHERE 
							id_masakan='$_GET[id]' AND id_user='$sid'");
	$ketemu=mysqli_num_rows($sql);
	if ($ketemu > 0 ) {
		mysqli_query($conn, "UPDATE keranjang SET jumlah = jumlah - 1 WHERE
					id_user = '$sid' AND id_masakan='$_GET[id]'");
	}

	header('Location:keranjang.php');

 ?>