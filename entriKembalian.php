<?php 
$masuk = $_POST['masuk'];
$total = $_POST['total'];
$hasil = $masuk - $total;

header('Location:entriOrderData.php');
  ?>