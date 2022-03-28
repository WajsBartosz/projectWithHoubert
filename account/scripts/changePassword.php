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
    
  }
  else{
    $sql = 'update '
  }

?>