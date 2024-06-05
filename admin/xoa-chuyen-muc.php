<?php 
require('../database/connect.php');	
require('../database/query.php');	

$machuyenmuc = $_GET['id'];

$sql = "DELETE FROM chuyenmuc WHERE machuyenmuc=".$machuyenmuc;
$result = queryResult($conn,$sql);

header("Location: chuyen-muc.php");

?>