<?php 
	include 'inc/session.php';
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
<script  src="bootstrap/js/popper.min.js"></script>
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
    <ul class="navbar-nav mr-auto">
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
          <a class="dropdown-item" href="#">BLOG</a>
          <a class="dropdown-item" href="#">THE TEAM</a>
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
  <div class="jumbotron jumbotron-fluid text-center table-responsive-sm">
  	<h2>ADMIN DASHBOARD</h2>
    <table class="table">
    <thead class="thead-dark">
    <tr>
    	<th>#</th>
		<th>PHOTO</th>
		<th>PRICE</th>
		<th>PRODUCT</th>
		<th>EDIT</th>
		<th>DELETE</th>
		<th>APPROVE</th>
  	</tr>
  	</thead>
    <?php 
    $sqll = "SELECT * FROM listing";
    $listing = mysqli_query($con, $sqll);
    
      while($rw = mysqli_fetch_assoc($listing)) {
       $product =$rw['product'];
       $price =$rw['price'];
       $image =$rw['image'];
  ?>
  	<tbody>
      <tr>
      	<td><?php echo $rw['id'];?></td>
        <td><img src="upload/<?php echo $image; ?>" height="100px" width="100px"></td>
        <td> <?php echo $price; ?></td>
        <td><?php echo $product; ?></td>
        <td><a href="edit.php?edit=<?php echo $rw['id']; ?>"><button class="btn btn-info">Edit</button></td>
        <td>  <a href="delete.php?del=<?php echo $rw['id']; ?>"><button class="btn btn-danger">Delete</button></a></td>
        <td>  <a href="approve.php?ids=<?php echo $rw['id']; ?>"><button class="btn btn-success">
        	<?php 
        	if ($rw['status']==0) {
        	 	echo "not approved";
        	 }
        	 else{
        	 	echo "approved";
        	 } ?>
        </button></a></td>
      </tr>
      </tbody>
    <?php } ?>
    </table>
 </body>
 </html>