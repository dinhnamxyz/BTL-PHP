<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: ../admin/dang-nhap.php");
    die();  
}

require('../database/connect.php'); 
require('../database/query.php');

$madonhang = $_GET['id'];
$trangthai = $_GET['action'];

$sql = "UPDATE `donhang` SET `trangthai`= ".$trangthai." WHERE `madonhang`= ".$madonhang."";
$result = queryExecute($conn,$sql);

echo "<script>window.location.href = 'don-hang.php';</script>";

?>