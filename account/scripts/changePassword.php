<?php
  session_start();
  //$_SESSION['login'] = login
  //$_SESSION['type'] = user/admin
  require_once('../../php/scripts/connect.php'); 
  $sql="select `password` from `users` where `login` like '$_SESSION[login]'";
  $result = $connect->query($sql);
  $key = $result->fetch_assoc();
  print_r($key);
  $old_pass = sha1($_POST['oldPass']);
  $new_pass = sha1($_POST['newPass']);
  echo "<br>$old_pass";
  if($key['password']!=$old_pass){
      header("location: ../editprofile.php?passError=1");
  }else{
    $sql="update users set `password` = '$new_pass' where `login` like '$_SESSION[login]'";
    $connect->query($sql);  
    header("location: ../editprofile.php?changePass=1");
  }
  

?>