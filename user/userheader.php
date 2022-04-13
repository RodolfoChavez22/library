<?php
  session_start();
  include("../connect.php");

  if(empty($_SESSION['User_id'])){
    $_SESSION['User_Status'] = '';
  }


  if(!empty($_SESSION['User_id'])){
    $log = 'LOGOUT';
    $logref = '../logout.php';

  }
  else{
    $log = 'LOGIN';
    $logref = '../login.php';

  }

  if(!empty($_SESSION['User_id'])){
    if($_SESSION['User_Status'] == 'admin'){
      $sign = 'ADMIN PANEL';
      $signref = '../admin/adminbook.php';
    }
    else{
      $sign = 'USER PANEL';
      $signref = 'userdashboard.php';
    }
  }
  else{
    $sign = 'SIGNUP';
    $signref = '../signup.php';
    }
?>




<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="header-top">
      <h1>Team 1: Library Database</h1>
    </div>
    <div class="header" id="myHeader">
      <button class="button buttonHome" onclick="location.href='../homepage.php';">HOME</button>
			<button class="button buttonCatalog" onclick="location.href='../catalog.php';">CATALOG</button>
			<button class="button buttonLogin" onclick="location.href='<?php echo $logref; ?>';"><?php echo $log; ?></button>
      <button class="button buttonSignup" onclick="location.href='<?php echo $signref; ?>';"><?php echo $sign; ?></button>
			<button class="button buttonAbout" onclick="location.href='../about.php';">ABOUT</button>
    </div>
                        
