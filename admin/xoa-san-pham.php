<?php 
require('../database/connect.php');	
require('../database/query.php');	

$masanpham = $_GET['id'];

$sql = "DELETE FROM sanpham WHERE masanpham=".$masanpham;
$result = queryResult($conn,$sql);

header("Location: san-pham.php");

?>