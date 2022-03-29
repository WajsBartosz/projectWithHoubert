<?php
  session_start();
  //$_SESSION['login'] = login
  //$_SESSION['type'] = user/admin
  require_once('../../php/scripts/connect.php');
  $country=$_POST['country'];
  echo $country; 
  $sql="update `users` set  `country`=$country where `login` like '$_SESSION[login]'";
  //echo $sql;
  $connect->query($sql);
  header("location: ../editProfile.php?changePhone=1");
  ?>