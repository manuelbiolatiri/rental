
<?php 
  include('inc/config.php');
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
    if(isset($_POST['register'])){
    // if(isset($_SERVER['REQUEST_METHOD'])=='POST'){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
        $hashed_password = sha1($password);

        if($_POST['password'] != $_POST['confirm_password']){
            $msg = "Password Not Match";
        }else{


        $check = "SELECT * FROM rent WHERE email ='$email' ";
        $res = mysqli_query($con, $check);
        $count = mysqli_num_rows($res);
        if($count){
            $msg = "User Already Exist! ";
        }else{

        $sql = "INSERT INTO rent (email, password)VALUES('$email','$hashed_password')";
        $result = mysqli_query($con, $sql);

        if($result){
            $msg =  "1 user has been added";
        }else{
            die('Connection Failed:' .mysqli_connect_error());
        }

    }
}
}

?>

<!-- agent registration form -->
    <div class="row">
        <div class="col-lg-4 m-auto" style="padding-top: 70px;">
            <div class="jumbotron" style="background-color:black;">
              <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <h2><i class="fa fa-user text-secondary fa-2x"></i>Register as an Agent</h2>
                </div>

    <p><?php echo $msg; ?></p>
        <div class="form-group">
            <input type="email" name="email" placeholder="Enter Your Email Address" required="required" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Create password" required="required" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="confirm_password" placeholder="Confirm password" required="required" class="form-control">
        </div>
    <div>
        <input type="checkbox"class="form-control-checkbox" >
        <label form="checkbox" class="form-check-label">Remember me</label>
        <button type="submit" name="register" class="btn btn-danger btn-lg ">Register</button>
    </div>
    <a href="">forgot password?</a>
</form>
</div>
</div>
</div>
</body>
</html>