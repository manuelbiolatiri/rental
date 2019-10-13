<?php 
include('inc/config.php');
session_start();
?>
    <?php 
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = sha1($password);
        $sql = "SELECT * FROM rent WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($con, $sql);
$rw = mysqli_fetch_array($result);
$count=mysqli_num_rows($result);
if ($count==1){
    $_SESSION['id'] = $rw['id'];
    $_SESSION['level'] = $rw['level'];
    if ($_SESSION['level']==1) {
            header('location:admin.php');
    }
     elseif($_SESSION['level']==2){
         header('location:subadmin.php');
    }else{
      header('location:home.php');
    }
   
    }else{
      echo "Register first";
    }
  }
     
    ?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width initial-scale=1">
<link rel="stylesheet" href="bootstrap-select.min.css">
<script src="bootstrap-select.min.js"></script>
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="page-container">
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
      <li class="nav-item">
        <a class="nav-link" href="agentregistration.php"><button class=" btn btn-danger">REGISTER</button></a>
      </li>
    </ul>
  </div>
</nav>
</div>
    <div class="row">
        <div class="col-lg-4 m-auto" style="padding-top: 70px;">
            <div class="jumbotron" style="background-color: aqua;">
                <div>
                    <h2><i class="fa fa-user text-secondary fa-2x"></i>Login Here</h2>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="enter your username">
                            
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="enter your passsword">
                        </div>
                    <div>
                        <input type="checkbox"class="form-control-checkbox" >
                        <label form="checkbox" class="form-check-label">Remember me</label>
                        <button type="submit" name="login" class="btn btn-danger btn-lg">Sign In</button>
                    </div>
                </form>
            </div>
      </div>
  </div>
</body>
</html>