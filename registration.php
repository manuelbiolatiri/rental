<?php 
    include 'inc/config.php';
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
<body>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="jumbotron">
                <div>
                    <h2><i class="fa fa-user text-secondary fa-2x"></i>Register</h2>
                </div>
<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="user" class="form-control" placeholder="firstname">
        </div>
        <div class="form-group">
            <input type="text" name="user" class="form-control" placeholder="lastname">
        </div>
        <div class="form-group">
        <input type="email" name="user" class="form-control" placeholder="enter email">
        </div>
        <div class="form-group">
            <select name="gender" class="form-control">
                <option>--gender--</option>
                <option></option>
            </select>
        </div>
        <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="passsword">
        </div>
    <div>
        <button type="submit" name="submit" class="btn btn-danger btn-lg">Register</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>