<?php 

include('inc/config.php');
if(isset($_GET['ids'])) {
	$id = (int)$_GET['ids'];
 $sqll = "SELECT * FROM listing WHERE id = '{$id}'";
    $listing = mysqli_query($con, $sqll);
    while($rw = mysqli_fetch_array($listing)) {
	if($rw['status']==0){
		$sql = "UPDATE listing SET status=1 WHERE id = '{$id}'";
		$res = mysqli_query($con, $sql);
	}
	else{
		$sql = "UPDATE listing SET status=0 WHERE id = '{$id}'";
		$res = mysqli_query($con, $sql);	
	}
} 
}
header('location:admin.php');
?>