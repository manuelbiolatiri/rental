
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

<body class="bg-light" style="font-family: 'montserrate', cursive;">
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php"><img src="img/rentage.png" style="width: 
  180px;height: 50px;"></a>
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
        <a class="nav-link" href="logout.php?logout"><button class=" btn btn-danger">logout</button></a>
      </li>
    </ul>
  </div>
</nav>
</div>
<!-- first inline form -->
<div class="jumbotron jumbotron-fluid text-center bg-dark" style="color:white;">
  <h1 class="display-4">RENTAGE24</h1>
  <p class="lead">Find the <span style="color:red;font-family:arial;">APARTMENT</span> that's right for you</p>
  <form class="form-group form-inline justify-content-center">
    <div class="row">
      <div class="col-lg-3">
        <select class="custom-select">
          <option disabled selected>State or city</option>
          <?php 
                  $sq = "SELECT * FROM find_tb";
                  $quer = mysqli_query($con, $sq);
                  while($rw = mysqli_fetch_array($quer, MYSQLI_ASSOC)){
                    $place = $rw['find'];
          ?>
          <option><?php echo $rw['find'];?></option>
            <?php } ?>
        </select>
      </div>
      <div class="col-lg-3">
        <select class="custom-select">
          <option disabled selected>Price Range</option>
          <?php 
                  $sq = "SELECT * FROM find_tb";
                  $quer = mysqli_query($con, $sq);
                  while($rw = mysqli_fetch_array($quer, MYSQLI_ASSOC)){
                    $price = $rw['price'];
                 
            ?>
            <option><?php echo $rw['price'];?></option>
                  <?php } ?>
        </select>
      </div>
      <div class="col-lg-3">
        <select class="custom-select">
          <option disabled selected>Bedroom(s)</option>
            <?php
              $sq = "SELECT * FROM find_tb";
              $quer = mysqli_query($con, $sq);
              while($rw = mysqli_fetch_array($quer, MYSQLI_ASSOC)){
                $bedrooms = $rw['bedrooms'];
              
            ?>
          <option><?php echo $rw['bedrooms'];?></option>
        <?php } ?>
        </select>
      </div>
      <div class="col-lg-3">
        <button class="btn btn-outline-danger" type="submit">Find</button>
      </div>
    </div>
  </form>
</div>
<!-- search form ends here -->

<!-- approved featured lisings starts -->
<div class="row">
<?php 
    $sqll = "SELECT * FROM listing WHERE status=1";
    $listing = mysqli_query($con, $sqll);
    
      while($rw = mysqli_fetch_assoc($listing)) {
       $product =$rw['product'];
       $price =$rw['price'];
       $image =$rw['image'];
  ?>

   <div class="card-group w-50" style="background-color: aqua;">
     <div class="card">
       <div class="card-img-top">
      <img src="upload/<?php echo $image; ?>" height="100px" width="100px">
         
       </div>
       <div class="card-body">
         <div class="card-title">
        <p><?php echo $product; ?></p>
         </div>
         <div class="card-text">
        <h6><?php echo $price; ?></h6>
         </div>
       </div>
       <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
       </div>
     </div>
   </div>
 <?php } ?>
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
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="jumbotron">
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
<div class="col-lg-6">
  <?php 
  $sql = "SELECT id, address FROM address_tb";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - address: " . $row["address"]. "<br>";
    }
} else {
    echo "0 results";
} ?>
  </div>
</div>
</div>

  <!-- new sectiom begins with carousel -->
    </table>
  </div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/rentage.jpeg" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="img/avatar.jpg" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="img/poolslide.jpg" class="d-block w-100" alt="">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="col-lg-6">
Lorem ipsum dolor sit amet, ei vim sint mandamus. Sit viderer delicatissimi eu. At eius mazim sea. Eu modo dictas interesset sea. At mea suavitate cotidieque persequeris, an eligendi philosophia est. Vim in tritani vocibus.

Nam ne iisque disputationi. Deleniti inimicus tractatos eu vis, tation audiam te usu. Eos tibique accumsan albucius id. Justo sanctus consectetuer an his, quo veritus argumentum philosophia in, quando consequat conceptam vix cu. Ex volumus ullamcorper nam, habeo error vitae cu usu.

Vim ex cibo error petentium, adipiscing dissentiunt et pri. Expetendis consectetuer pro ne, eu graece persecuti vix, has putant contentiones at. Te facilis deleniti nec, ei natum abhorreant philosophia per. In impetus inermis sea.

Nec ex graeci suscipiantur, ius augue veniam ei, qui natum voluptaria an. Doctus oportere at nam. Sit nulla legere putant eu, quis repudiare adversarium ut sit. Has no albucius lucilius.

Modus percipitur ad qui, pro et natum diceret. Vocibus explicari et his, quo probatus efficiantur ex, audiam deseruisse liberavisse ei sea. Ex vel diceret vocibus iracundia, modo habeo mei te, cum no omnis assentior dissentiet. Te cum modus etiam quaestio, et sea legendos dignissim.
</div>
</div>

<footer>
<div class="footer-area bg-dark"">
    <div class="container">
        <div class="row">
            <div class="col-lg-4" style=" color:white;">
                <div class="left-footer">
                   <p><h4>RENTAGE24</h4><br/>LASPOTECH FIRSTGATE, IKORODU,<br/>LAGOS, NIGERIA.<br/>+23480950001676<br/>MANUELLAIDE49@GMAIL.COM</p>
                </div>
                </div>
            <div class="col-lg-4" style="border-left:1px solid gray; color:white;">
                <div class="mid-footer">
                <p><h4>CONTACT</h4><br>
                   Email: manuellaide49@gmail.com<br>
                    Help center<br>
                    Become our partner<br>
                    About Us
                </p>
            </div>
            </div>
            <div class="col-lg-4" style="border-left:1px solid gray;color:white;">
                <div class="right-footer">
                    <p><h4>CONNECT WITH US</h4></p><br/>
                    <div class="footer-icon">
                        <ul class="social-icon list-inline">
                            <li class="facebook"><a href="https://www.facebook.com/biolatiri1" target="_blank" style="color:white"><i class="fa fa-facebook fa-2x"></i></a></li>
                            <li class="twitter"><a href="https://www.twitter.com" target="_blank" style="color:white"><i class="fa fa-twitter fa-2x"></i></a></li> 
                            <li class="instagram"><a href="https://www.instagram.com" target="_blank" style="color:white"><i class="fa fa-instagram fa-2x" style="color:white"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
</div>
    <div style="height:30px; color:white; text-align:center;">Copyright © 2019 All Rights Reserved by rentage24 Ltd</div>
</div>

</div>

</footer>

</body>

</html>