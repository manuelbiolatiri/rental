<?php 
include('inc/config.php');
if(isset($_GET['del'])) {
	$id = (int)$_GET['del'];
	$sql = "DELETE FROM listing WHERE id = '{$id}'";
	$res = mysqli_query($con, $sql);
}
header('location:admin.php');
?>