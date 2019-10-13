<?php 
  include('inc/session.php');
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
<body class="bg-light" style="font-family: 'Cute Font', cursive;">
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">RENTAGE24</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">APARTMENTS</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          SERVICES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">HANDYMAN</a>
          <a class="dropdown-item" href="#">LEGAL ADVISOR</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">WEB DEV</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ABOUT US</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">CONTACT US</a>
      </li>
    </ul>
  </div>
</nav>
</div>
  <?php

  $msg = "";
if(isset($_POST['submit'])){
  $product = $_POST['product'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  move_uploaded_file($tmp, "upload/$image");
  $date = date('Y-m-d h:m:s');

$sql = "INSERT INTO listing (product, price, image, date) VALUES ('$product', '$price', '$image', '$date')";
$query = mysqli_query($con, $sql);
if ($query) { 
  $msg = "your property is listed";
  // header('location:admin.php');
} else{
  $msg = "failed";
}
}

  ?>
    <div class="row">
        <div class="col-lg-6 m-auto" style="padding-top: 70px">
          <div class="jumbotron text-center">
            <p><?php echo $msg; ?></p>
              <div>
                    <h2>List Your Propety</h2>
                </div>
                    <form action="" method="POST" enctype="multipart/form-data" class="form-group">
                        <div class="form-group">
                            <input  class="form-control" type="text" name="product" placeholder="product" required>
                        </div>
                     
                        <div class="form-group">
                            <input  class="form-control" type="text" name="price" placeholder="price" required>
                        </div>
                        <div class="form-group">
                            <input  class="form-control" type="file" name="image" placeholder="">
                        </div>
                        <div class="form-group">
                            <input  class="form-control" type="date" name="date" placeholder="date">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-info" name="submit">submit</button>
                        </div>
                      </form>
                </div>
            </div>      
        </div>
</body>
</html>