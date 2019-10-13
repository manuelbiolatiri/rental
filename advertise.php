<?php 
    include('inc/config.php');

    $msg = "";
    if(isset($_POST['register'])){
    // if(isset($_SERVER['REQUEST_METHOD'])=='POST'){
        $prop_address = mysqli_real_escape_string($con, $_POST['address']);
        

        $check = "SELECT * FROM address_tb WHERE address ='$prop_address'";
        $res = mysqli_query($con, $check);
        $count = mysqli_num_rows($res);
        if($count){
            $msg = "property Already Exist! ";
        }else{

        $sql = "INSERT INTO address_tb (address) VALUES('$prop_address')";
        $result = mysqli_query($con, $sql);

        if($result){
            $msg =  "property saved";
        }else{
            die('Connection Failed:' .mysqli_connect_error());
        }

    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Advertise</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="bootstrap-select.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">

</head>
<body style="background-color:#d1d1d1; font-family: verdana;">

    <div class="card" style="width: 30rem; border: none; padding: 20px;">
        <h2 class="card-title" >List Your Property</h2>
        <div card-body">
        <form action="" method="POST" enctype="multipart/form-data">    
                <!-- <p><?php echo $msg; ?></p> -->
  <div class="form-group">
    <label for="addressInput">Address</label>
    <input type="text" name="address" class="form-control" id="addressInput" placeholder="Enter address">
    
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Property Type</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Flat</option>
      <option>House</option>
      <option>Room</option>
      <option>Shops</option>
      <option>self contain</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Bedrooms</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Bathrooms</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>0</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Rent</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Lease</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
  <label class="form-check-label" for="inlineRadio3">Sale</label>
</div>
</div>
</br>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder=" such as -> price range, color, has gate, etc"></textarea>
  </div>
  <button type="submit" name="register" class="btn btn-outline-danger">Submit</button>
            </form>

        </div>
    </div>


</body>
</html>