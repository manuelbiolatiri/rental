<?php 
include('inc/config.php');
//header('location:admin.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Rentage</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width initial-scale=1">
<link rel="stylesheet" href="bootstrap-select.min.css">
<script src="bootstrap-select.min.js"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
		<?php 
			if (isset($_GET['edit'])) {
	$id = (int)$_GET['edit'];
	$sql = "SELECT * FROM listing WHERE id = '{$id}'";
	$res = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($res)) {
		 ?>
	<div class="jumbotron">
		<h2>EDIT MY POST</h2>
	</div>
	<form action="" method="POST" enctype="multipart/form-data">
		<div><input type="text" name="product" class="form-control" value="<?php echo $row['product']; ?>"></div>
		<div><input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>"></div>
		<div><input type="file" name="image" class="form-control" value="<?php echo $row['image']; ?>"></div>
		<div><input type="submit" name="submit" value="submit"></div>
	</form>
	<?php }
} 
?>
<?php 
	if (isset($_POST['submit'])) {
		$product = $_POST['product'];
		$price = $_POST['price'];
		$image = $_FILES['image']['name'];
 		 $tmp = $_FILES['image']['tmp_name'];
  		move_uploaded_file($tmp, "upload/$image");

  		$sql = "UPDATE listing SET product = '{$product}', price = '{$price}', image = '{$image}' WHERE id ='{$id}'";
  		$result = mysqli_query($con, $sql);
  		if ($result) {
  			header('location:admin.php');
  		}
	}
 ?>

</body>
</html>