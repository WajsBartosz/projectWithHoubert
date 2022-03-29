<!doctype html>
<?php
  session_start();
  //$_SESSION['login'] = login
  //$_SESSION['type'] = user/admin 
  require_once('../../php/scripts/connect.php');
  if(!isset($_SESSION['login'])) header("location: ../index.php");
  if(trim($_POST['password'])=="") header("location: ../editProfile.php");
  if(trim($_POST['email'])=="") header("location: ../editProfile.php");
  $sql="select * from `users` where `login` like '$_SESSION[login]'";
  $result=$connect->query($sql);
  $userInformation=$result->fetch_assoc();
  if($userInformation['password']!=sha1($_POST['password'])){
      header("location: ../editProfile.php?error=1");
  }
  else if(strpos($_POST['email'],'@')==false){
      header("location: ../editProfile.php?error=2");
  }
  else{
  $sql = "update users set `mail` = '$_POST[email]' where `login` like '$_SESSION[login]'";
  $connect->query($sql);
  echo $sql;
  header("location: ../editProfile.php?changeMail=1");
  }
  
?>

