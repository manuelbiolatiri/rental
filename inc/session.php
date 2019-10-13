<?php 
	include('inc/config.php');
	session_start();
	 $user_check = $_SESSION['id'];
	 $ses_sql = mysqli_query($con, "SELECT * FROM rent WHERE id = '$user_check' ");
     $rw = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
     $login_session = $rw['id'];

     if(!isset($_SESSION['id'])){
      header("location:index.php");
      die('connection Failed:' .mysqli_connect_error($con));
   }





?>