<?php 
require 'function.php';

$id = $_GET["id"];

if(hapuskeranjang($id) > 0) {

}
header('Location:keranjang1.php');
		
 ?>
