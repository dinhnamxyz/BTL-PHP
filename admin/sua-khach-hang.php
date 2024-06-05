<?php 
require('../database/connect.php');	
require('../database/query.php');	

$makhachhang = $_GET['id'];
$action = $_GET['action'];

$sql = "UPDATE khachhang SET trangthai = ".$action." WHERE makhachhang =".$makhachhang;
$result = queryResult($conn,$sql);
header("Location: khach-hang.php");

?>